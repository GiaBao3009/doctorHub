<?php
session_start();

// Kết nối database
require_once '../../config/database.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: signIn.php');
    exit;
}

// Lấy thông tin từ URL
$doctor_user_id   = isset($_GET['doctorId']) && !empty($_GET['doctorId']) ? (int)$_GET['doctorId'] : 5;
$doctor_name      = $_GET['doctorName'] ?? '';
$appointment_time = $_GET['time'] ?? '';
$appointment_date = $_GET['date'] ?? '';

error_log("URL Parameters: doctorId=$doctor_user_id, doctorName=$doctor_name");

// Đặt giá trị mặc định cho doctor_user_id nếu không hợp lệ
if ($doctor_user_id <= 0) {
    $doctor_user_id = 5;
    error_log("Sử dụng doctor_user_id mặc định = 5");
}

if (empty($doctor_user_id)) {
    SmartRedirect::redirectWithMessage('Thiếu thông tin bác sĩ!');
}

// Kết nối database
$database = new Database();
$db       = $database->getConnection();

// Lấy thông tin bác sĩ
$stmt = $db->prepare("SELECT * FROM users WHERE id = ? AND role = 'doctor'");
$stmt->execute([$doctor_user_id]);
$doctor = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$doctor && empty($doctor_name)) {
    SmartRedirect::redirectWithMessage('Không tìm thấy thông tin bác sĩ!');
}

$doctor_name = $doctor['name'] ?? $doctor_name;

// Lấy thông tin người dùng từ database
$user_id = $_SESSION['user_id'];
$stmt    = $db->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Hàm gửi dữ liệu đến json-server
function sendToApi($data)
{
    $apiUrl = 'http://localhost:3000/appointments';
    $ch     = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    error_log("API Response: HTTP $httpCode - $response");
    return $httpCode === 201; // json-server trả về 201 khi tạo mới thành công
}

// Xử lý form khi submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_log("POST Data: " . print_r($_POST, true));

    // Lấy dữ liệu từ form
    $name          = $_POST['patient_name'] ?? '';
    $gender        = $_POST['gender'] ?? '';
    $phone         = $_POST['phone'] ?? '';
    $email         = $_POST['email'] ?? '';
    $year_of_birth = $_POST['year_of_birth'] ?? '';
    $province      = $_POST['province'] ?? '';
    $district      = $_POST['district'] ?? '';
    $address       = $_POST['address'] ?? '';
    $reason        = $_POST['reason'] ?? '';

    // Kiểm tra email hợp lệ
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        SmartRedirect::redirectWithMessage("Email không hợp lệ: $email");
    }

    // Sử dụng thời gian hiện tại làm appointment_date
    $appointment_datetime = date('Y-m-d H:i:s');

    try {
        $doctor_id_to_use = isset($_POST['doctor_id']) && !empty($_POST['doctor_id']) ? (int)$_POST['doctor_id'] : 5;
        error_log("Doctor ID to use: $doctor_id_to_use");

        if ($doctor_id_to_use <= 0) {
            $doctor_id_to_use = 5;
            error_log("Using default doctor_id_to_use = 5");
        }

        // Tạo ghi chú cho lịch hẹn
        $note = "Bác sĩ: $doctor_name (ID: $doctor_user_id)\n";
        $note .= "Tên: $name\n";
        $note .= "Giới tính: $gender\n";
        $note .= "Điện thoại: $phone\n";
        $note .= "Email: $email\n";
        $note .= "Năm sinh: $year_of_birth\n";
        $note .= "Địa chỉ: $address, $district, $province\n";
        $note .= "Lý do khám: $reason\n";

        // Kiểm tra dịch vụ trong database
        $service_stmt = $db->prepare("SELECT id FROM services WHERE name LIKE ? LIMIT 1");
        $service_stmt->execute(['%khám%']);
        $service = $service_stmt->fetch(PDO::FETCH_ASSOC);

        if (!$service) {
            $insert_service = $db->prepare("INSERT INTO services (name, description, price) VALUES (?, ?, ?)");
            $insert_service->execute(['Khám cơ xương khớp', 'Dịch vụ khám và tư vấn bệnh cơ xương khớp', 500000]);
            $service_id = $db->lastInsertId();
        } else {
            $service_id = $service['id'];
        }

        // Kiểm tra cột trong bảng appointments
        $check_column = $db->query("SHOW COLUMNS FROM appointments LIKE 'patient_name'");
        $has_patient_name = $check_column->rowCount() > 0;

        $check_doctor_column = $db->query("SHOW COLUMNS FROM appointments LIKE 'doctor_user_id'");
        $has_doctor_user_id = $check_doctor_column->rowCount() > 0;

        if (!$has_doctor_user_id) {
            try {
                $db->exec("ALTER TABLE appointments ADD COLUMN doctor_user_id INT AFTER service_id");
                error_log("Đã thêm cột doctor_user_id thành công");
                $has_doctor_user_id = true;
            } catch (PDOException $e) {
                error_log("Không thể thêm cột doctor_user_id: " . $e->getMessage());
            }
        }

        error_log("Trạng thái cột: has_patient_name=" . ($has_patient_name ? 'true' : 'false') .
            ", has_doctor_user_id=" . ($has_doctor_user_id ? 'true' : 'false'));

        // Lưu lịch hẹn vào database
        try {
            if ($has_patient_name && $has_doctor_user_id) {
                $sql = "INSERT INTO appointments (user_id, service_id, doctor_user_id, appointment_date, status, note, patient_name)
                       VALUES (?, ?, ?, ?, 'pending', ?, ?)";
                $params = [$user_id, $service_id, $doctor_id_to_use, $appointment_datetime, $note, $name];
                error_log("Thực thi SQL với doctor_user_id và patient_name: $sql");
            } elseif ($has_patient_name) {
                $sql = "INSERT INTO appointments (user_id, service_id, appointment_date, status, note, patient_name)
                       VALUES (?, ?, ?, 'pending', ?, ?)";
                $params = [$user_id, $service_id, $appointment_datetime, $note, $name];
                error_log("Thực thi SQL với patient_name: $sql");
            } elseif ($has_doctor_user_id) {
                $sql = "INSERT INTO appointments (user_id, service_id, doctor_user_id, appointment_date, status, note)
                       VALUES (?, ?, ?, ?, 'pending', ?)";
                $params = [$user_id, $service_id, $doctor_id_to_use, $appointment_datetime, $note];
                error_log("Thực thi SQL với doctor_user_id: $sql");
            } else {
                $sql = "INSERT INTO appointments (user_id, service_id, appointment_date, status, note)
                       VALUES (?, ?, ?, 'pending', ?)";
                $params = [$user_id, $service_id, $appointment_datetime, $note];
                error_log("Thực thi SQL cơ bản: $sql");
            }

            error_log("Thông số SQL: " . json_encode($params));

            $stmt = $db->prepare($sql);
            $stmt->execute($params);

            $appointment_id = $db->lastInsertId();

            // Gửi dữ liệu đến json-server
            $api_data = [
                'id'               => $appointment_id,
                'user_id'          => $user_id,
                'doctor_id'        => $doctor_id_to_use,
                'patient_name'     => $name,
                'appointment_date' => $appointment_datetime,
                'status'           => 'pending',
                'note'             => $note,
                'service_id'       => $service_id,
            ];

            if (!sendToApi($api_data)) {
                error_log("Gửi dữ liệu đến json-server thất bại");
                $_SESSION['warning'] = 'Đặt lịch thành công nhưng gửi dữ liệu đến API thất bại!';
            }

            // Lưu thông tin lịch khám để gửi email qua EmailJS
            $_SESSION['appointment_info'] = [
                'doctor_name'  => $doctor_name,
                'date'         => date('d/m/Y', strtotime($appointment_datetime)),
                'time'         => date('H:i', strtotime($appointment_datetime)),
                'patient_name' => $name,
                'reason'       => $reason ?: 'Không có',
                'price'        => '500,000đ',
                'location'     => 'Phòng khám Spinetech Clinic, 10a NĐ CP-25, Giải Phóng, Hoàng Mai, Đống Đa, Hà Nội',
                'email'        => $email,
                'user_name'    => $user['name'] ?? '',
                'user_email'   => $user['email'] ?? '',
            ];

            $_SESSION['appointment_id'] = $appointment_id;
            $_SESSION['success']        = 'Đặt lịch khám thành công!';
        } catch (Exception $e) {
            $_SESSION['error'] = 'Đặt lịch thất bại: ' . $e->getMessage();
            error_log("Lỗi khi đặt lịch: " . $e->getMessage());
        }
    } catch (Exception $e) {
        $_SESSION['error'] = 'Đặt lịch thất bại: ' . $e->getMessage();
        error_log("Lỗi khi đặt lịch: " . $e->getMessage());
    }
}

class SmartRedirect {
    public static function getSourcePage() {
        // Ưu tiên: source parameter > referer > default
        if (isset($_GET['source']) && !empty($_GET['source'])) {
            return $_GET['source'] . '.php';
        }
        $referer = $_SERVER['HTTP_REFERER'] ?? '';
        if (!empty($referer)) {
            $parsed = parse_url($referer);
            $path = basename($parsed['path'] ?? '');
            if (in_array($path, ['CoXuongKhop.php', 'thankinh.php', 'tim.php', 'mat.php'])) {
                return $path;
            }
        }
        return 'index.php'; // fallback
    }
    public static function redirectWithMessage($message, $type = 'error') {
        $_SESSION[$type] = $message;
        $redirect = self::getSourcePage();
        header("Location: $redirect");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lịch khám - DoctorHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Updated EmailJS SDK to the latest version -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3.12.1/dist/email.min.js"></script>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .appointment-header {
            background-color: #0d6efd;
            color: white;
            padding: 15px;
            border-radius: 8px 8px 0 0;
        }
        .appointment-container {
            max-width: 800px;
            margin: 30px auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .form-section {
            padding: 20px;
        }
        .price-section {
            background-color: #f8f9fa;
            padding: 15px;
            margin-top: 20px;
            border-radius: 5px;
        }
        .price-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        .notice-box {
            background-color: #e7f3ff;
            padding: 15px;
            border-radius: 5px;
            margin-top: 15px;
        }
        .btn-submit {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #000;
            font-weight: bold;
        }
        .btn-submit:hover {
            background-color: #e0a800;
            border-color: #e0a800;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="appointment-container">
            <div class="appointment-header">
                <h4>ĐẶT LỊCH KHÁM</h4>
                <p class="mb-0">PGS. TS. BSCKII. <?php echo htmlspecialchars($doctor_name); ?></p>
                <p class="mb-0"><i class="fas fa-calendar-check me-2"></i> <?php echo htmlspecialchars($appointment_date); ?> • <?php echo htmlspecialchars($appointment_time); ?></p>
                <p class="mb-0"><i class="fas fa-map-marker-alt me-2"></i> Phòng khám Spinetech Clinic</p>
                <p class="mb-0"><i class="fas fa-map-marked-alt me-2"></i> 10a NĐ CP-25/ Giải Phóng, Hoàng Mai, Đống Đa, Hà Nội</p>
            </div>

            <div class="form-section">
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success']; ?>
                        <p class="mt-2">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#appointmentDetailsModal">
                                Xem chi tiết lịch khám
                            </button>
                            <a href="CoXuongKhop.php" class="btn btn-secondary">Quay lại</a>
                        </p>
                    </div>
                <?php endif; ?>

                <form method="POST" action="" <?php echo isset($_SESSION['success']) ? 'style="display:none;"' : ''; ?>>
                    <input type="hidden" name="doctor_id" value="<?php echo (int) $doctor_user_id; ?>">
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="for_who" id="for_self" value="self" checked>
                            <label class="form-check-label" for="for_self">Đặt cho mình</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="for_who" id="for_other" value="other">
                            <label class="form-check-label" for="for_other">Đặt cho người thân</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="patient_name" name="patient_name" placeholder="Họ tên bệnh nhân (bắt buộc)" value="<?php echo htmlspecialchars($user['name'] ?? ''); ?>" required>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="Nam" checked>
                            <label class="form-check-label" for="male">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="Nữ">
                            <label class="form-check-label" for="female">Nữ</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Số điện thoại liên hệ (bắt buộc)" value="<?php echo htmlspecialchars($user['phone'] ?? ''); ?>" required>
                    </div>

                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Địa chỉ email" required value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="year_of_birth" name="year_of_birth" placeholder="Năm sinh (bắt buộc)" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <select class="form-select" id="province" name="province" required>
                                <option value="">-- Chọn Tỉnh/Thành --</option>
                                <option value="Hà Nội">Hà Nội</option>
                                <option value="TP. Hồ Chí Minh">TP. Hồ Chí Minh</option>
                                <option value="Đà Nẵng">Đà Nẵng</option>
                                <option value="Đà Lạt">Đà Lạt</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <select class="form-select" id="district" name="district" required>
                                <option value="">-- Chọn Quận/Huyện --</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ">
                    </div>

                    <div class="mb-3">
                        <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Lý do khám"></textarea>
                    </div>

                    <div class="price-section">
                        <h5>Giá khám</h5>
                        <div class="price-row">
                            <span>Giá khám</span>
                            <span>500,000đ</span>
                        </div>
                        <div class="price-row">
                            <span>Phí đặt lịch</span>
                            <span>Miễn phí</span>
                        </div>
                        <hr>
                        <div class="price-row">
                            <strong>Tổng cộng</strong>
                            <strong>500,000đ</strong>
                        </div>
                    </div>

                    <div class="notice-box mt-3">
                        <h6 class="text-uppercase fw-bold">Lưu ý</h6>
                        <p class="mb-1">Thông tin anh/chị cung cấp sẽ được sử dụng làm hồ sơ khám bệnh, khi điền thông tin anh/chị vui lòng:</p>
                        <ul class="mb-0">
                            <li>Ghi rõ họ và tên, viết hoa những chữ cái đầu tiên, ví dụ: Trần Văn Phú</li>
                            <li>Điền đầy đủ, đúng và vui lòng kiểm tra lại thông tin trước khi ấn "Xác nhận"</li>
                        </ul>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-submit btn-lg w-100">Xác nhận đặt khám</button>
                    </div>

                    <div class="mt-2 text-center">
                        <small>Bằng việc xác nhận đặt khám, bạn đã hoàn toàn đồng ý với các điều khoản sử dụng dịch vụ của chúng tôi.</small>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal hiển thị chi tiết lịch khám -->
    <?php if (isset($_SESSION['appointment_info'])): ?>
    <div class="modal fade" id="appointmentDetailsModal" tabindex="-1" aria-labelledby="appointmentDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="appointmentDetailsModalLabel">Chi tiết lịch khám</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="text-primary mb-0">Thông tin lịch khám</h5>
                                <span class="badge bg-success">Đã đặt thành công</span>
                            </div>

                            <div class="border-bottom pb-3 mb-3">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-light rounded-circle p-2 me-3">
                                        <i class="fas fa-user-md text-primary fs-4"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-bold">Bác sĩ</p>
                                        <p class="mb-0">PGS. TS. BSCKII. <?php echo htmlspecialchars($_SESSION['appointment_info']['doctor_name']); ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="border-bottom pb-3 mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bg-light rounded-circle p-2 me-3">
                                        <i class="fas fa-calendar-alt text-primary fs-4"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-bold">Ngày khám</p>
                                        <p class="mb-0"><?php echo htmlspecialchars($_SESSION['appointment_info']['date']); ?></p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-2">
                                    <div class="bg-light rounded-circle p-2 me-3">
                                        <i class="fas fa-clock text-primary fs-4"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-bold">Giờ khám</p>
                                        <p class="mb-0"><?php echo htmlspecialchars($_SESSION['appointment_info']['time']); ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="border-bottom pb-3 mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="bg-light rounded-circle p-2 me-3">
                                        <i class="fas fa-user text-primary fs-4"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-bold">Tên bệnh nhân</p>
                                        <p class="mb-0"><?php echo htmlspecialchars($_SESSION['appointment_info']['patient_name']); ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="border-bottom pb-3 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded-circle p-2 me-3">
                                        <i class="fas fa-comment-medical text-primary fs-4"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-bold">Lý do khám</p>
                                        <p class="mb-0"><?php echo htmlspecialchars($_SESSION['appointment_info']['reason'] ?: 'Không có'); ?></p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded-circle p-2 me-3">
                                        <i class="fas fa-money-bill text-primary fs-4"></i>
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-bold">Giá khám</p>
                                        <p class="mb-0"><?php echo htmlspecialchars($_SESSION['appointment_info']['price']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="dashboard.php" class="btn btn-outline-primary">Xem tất cả lịch đã đặt</a>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
   <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3.12.1/dist/email.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Initialize EmailJS with your updated User ID
        emailjs.init("Cnjni5BanXi0TOM8C");

        // Function to send email via EmailJS
        function sendEmail(appointmentInfo) {
            const templateParams = {
                to_email: appointmentInfo.email,           // Matches {to_email} from EmailJS config
                reply_to: appointmentInfo.user_email || appointmentInfo.email, // Matches {reply_to}
                doctor_name: appointmentInfo.doctor_name,
                appointment_date: appointmentInfo.date,
                appointment_time: appointmentInfo.time,
                patient_name: appointmentInfo.patient_name,
                reason: appointmentInfo.reason || 'Không có',
                price: appointmentInfo.price,
                location: appointmentInfo.location,
                user_name: appointmentInfo.user_name,
                user_email: appointmentInfo.user_email,
                subject: 'Xác nhận lịch khám - DoctorHub'   // Add subject for the email
            };

            emailjs.send('service_eied1q8', 'template_nc4abtv', templateParams)
                .then(function(response) {
                    console.log('Email sent successfully!', response.status, response.text);
                    Swal.fire({
                        icon: 'success',
                        title: 'Gửi email thành công!',
                        text: 'Thư xác nhận đã được gửi tới email thành công!',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#0d6efd'
                    });
                }, function(error) {
                    console.error('Failed to send email:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Lỗi gửi email!',
                        text: 'Thư xác nhận gửi tới email thất bại: ' + JSON.stringify(error),
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#dc3545'
                    });
                });
        }

        <?php if (isset($_SESSION['success'])): ?>
        document.addEventListener('DOMContentLoaded', function() {
            var appointmentModal = new bootstrap.Modal(document.getElementById('appointmentDetailsModal'));
            appointmentModal.show();

            // Hiển thị SweetAlert thông báo đăng ký thành công
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: 'Đăng ký lịch khám thành công!',
                confirmButtonText: 'OK',
                confirmButtonColor: '#0d6efd'
            }).then(function() {
                // Gửi email bằng EmailJS
                const appointmentInfo = <?php echo json_encode($_SESSION['appointment_info']); ?>;
                sendEmail(appointmentInfo);
            });
        });
        <?php
            unset($_SESSION['success']);
            unset($_SESSION['appointment_info']);
        ?>
        <?php endif; ?>

        document.addEventListener('DOMContentLoaded', function() {
            const forSelf = document.getElementById('for_self');
            const forOther = document.getElementById('for_other');
            const province = document.getElementById('province');

            if (forSelf) {
                forSelf.addEventListener('change', function() {
                    if (this.checked) {
                        document.getElementById('patient_name').value = '<?php echo htmlspecialchars($user['name'] ?? ''); ?>';
                    }
                });
            }

            if (forOther) {
                forOther.addEventListener('change', function() {
                    if (this.checked) {
                        document.getElementById('patient_name').value = '';
                    }
                });
            }

            if (province) {
                province.addEventListener('change', function() {
                    const districtSelect = document.getElementById('district');
                    if (districtSelect) {
                        districtSelect.innerHTML = '<option value="">-- Chọn Quận/Huyện --</option>';

                        if (this.value === 'Hà Nội') {
                            ['Ba Đình', 'Hoàn Kiếm', 'Hai Bà Trưng', 'Đống Đa', 'Tây Hồ', 'Cầu Giấy'].forEach(district => {
                                const option = document.createElement('option');
                                option.value = district;
                                option.textContent = district;
                                districtSelect.appendChild(option);
                            });
                        } else if (this.value === 'TP. Hồ Chí Minh') {
                            ['Quận 1', 'Quận 2', 'Quận 3', 'Quận 4', 'Quận 5', 'Quận 7'].forEach(district => {
                                const option = document.createElement('option');
                                option.value = district;
                                option.textContent = district;
                                districtSelect.appendChild(option);
                            });
                        } else if (this.value === 'Đà Nẵng') {
                            ['Hải Châu', 'Thanh Khê', 'Liên Chiểu', 'Ngũ Hành Sơn', 'Sơn Trà', 'Cẩm Lệ'].forEach(district => {
                                const option = document.createElement('option');
                                option.value = district;
                                option.textContent = district;
                                districtSelect.appendChild(option);
                            });
                        } else if (this.value === 'Đà Lạt') {
                            ['Đà Lạt', 'Bảo Lộc', 'Đức Trọng'].forEach(district => {
                                const option = document.createElement('option');
                                option.value = district;
                                option.textContent = district;
                                districtSelect.appendChild(option);
                            });
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>