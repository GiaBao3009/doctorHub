<?php
session_start();
require_once '../../config/database.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: signIn.php');
    exit;
}

// Lấy thông tin từ URL
$doctor_user_id = isset($_GET['doctorId']) && !empty($_GET['doctorId']) ? (int)$_GET['doctorId'] : 5; // Mặc định là bác sĩ ID=5
$doctor_name = $_GET['doctorName'] ?? '';
$appointment_time = $_GET['time'] ?? '';
$appointment_date = $_GET['date'] ?? '';

// Ghi log để debug
error_log("URL Parameters: doctorId=" . $doctor_user_id . ", doctorName=" . $doctor_name);

// Đảm bảo doctorId luôn hợp lệ
if ($doctor_user_id <= 0) {
    $doctor_user_id = 5; // ID mặc định của bác sĩ Nguyễn Đức Gia Bảo
    error_log("Sử dụng doctor_user_id mặc định = 5");
}

// Kiểm tra doctorId có hợp lệ không
if (empty($doctor_user_id)) {
    $_SESSION['error'] = 'Thiếu thông tin bác sĩ!';
    header('Location: CoXuongKhop.php');
    exit;
}

// Kết nối database
$database = new Database();
$db = $database->getConnection();

// Lấy thông tin bác sĩ từ database theo ID
$stmt = $db->prepare("SELECT * FROM users WHERE id = ? AND role = 'doctor'");
$stmt->execute([$doctor_user_id]);
$doctor = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$doctor && empty($doctor_name)) {
    $_SESSION['error'] = 'Không tìm thấy thông tin bác sĩ!';
    header('Location: CoXuongKhop.php');
    exit;
}

// Sử dụng thông tin bác sĩ từ database nếu có, nếu không thì dùng từ URL
$doctor_name = $doctor['name'] ?? $doctor_name;

// Lấy thông tin người dùng
$user_id = $_SESSION['user_id'];
$stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Xử lý form khi submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra và ghi log các giá trị để debug
    error_log("POST Data: " . print_r($_POST, true));
    
    $name = $_POST['patient_name'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $year_of_birth = $_POST['year_of_birth'] ?? '';
    $province = $_POST['province'] ?? '';
    $district = $_POST['district'] ?? '';
    $address = $_POST['address'] ?? '';
    $reason = $_POST['reason'] ?? '';
    
    // Xử lý ngày giờ
    $date_parts = explode('/', $appointment_date);
    $time_parts = explode(' - ', $appointment_time);
    $start_time = trim($time_parts[0]);
    
    // Định dạng: YYYY-MM-DD HH:MM:SS
    $appointment_datetime = date("Y") . "-" . $date_parts[1] . "-" . $date_parts[0] . " " . $start_time . ":00";
    
    try {
        // Lấy doctor_id từ form, đảm bảo là integer
        $doctor_id_to_use = isset($_POST['doctor_id']) && !empty($_POST['doctor_id']) ? (int)$_POST['doctor_id'] : 5; // Default to 5 (Bác sĩ Nguyễn Đức Gia Bảo)
        
        error_log("Doctor ID to use: " . $doctor_id_to_use);
        
        if ($doctor_id_to_use <= 0) {
            $doctor_id_to_use = 5; // Make sure we have a valid doctor ID
            error_log("Using default doctor_id_to_use = 5");
        }
        
        // Tạo ghi chú chi tiết
        $note = "Bác sĩ: $doctor_name (ID: $doctor_user_id)\n";
        $note .= "Tên: $name\n";
        $note .= "Giới tính: $gender\n";
        $note .= "Điện thoại: $phone\n";
        $note .= "Email: $email\n";
        $note .= "Năm sinh: $year_of_birth\n";
        $note .= "Địa chỉ: $address, $district, $province\n";
        $note .= "Lý do khám: $reason\n";
        
        // Lấy service_id từ bảng services
        $service_stmt = $db->prepare("SELECT id FROM services WHERE name LIKE ? LIMIT 1");
        $service_stmt->execute(['%khám%']);
        $service = $service_stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$service) {
            // Thêm dịch vụ mới nếu chưa có
            $insert_service = $db->prepare("INSERT INTO services (name, description, price) VALUES (?, ?, ?)");
            $insert_service->execute(['Khám cơ xương khớp', 'Dịch vụ khám và tư vấn bệnh cơ xương khớp', 500000]);
            $service_id = $db->lastInsertId();
        } else {
            $service_id = $service['id'];
        }
        
        // Kiểm tra và lưu thông tin đặt lịch với patient_name
        $check_column = $db->query("SHOW COLUMNS FROM appointments LIKE 'patient_name'");
        $has_patient_name = $check_column->rowCount() > 0;
        
        // Kiểm tra trường doctor_user_id
        $check_doctor_column = $db->query("SHOW COLUMNS FROM appointments LIKE 'doctor_user_id'");
        $has_doctor_user_id = $check_doctor_column->rowCount() > 0;
        
        if (!$has_doctor_user_id) {
            // Thêm cột doctor_user_id nếu chưa có
            try {
                $db->exec("ALTER TABLE appointments ADD COLUMN doctor_user_id INT AFTER service_id");
                error_log("Đã thêm cột doctor_user_id thành công");
                $has_doctor_user_id = true;
            } catch (PDOException $e) {
                error_log("Không thể thêm cột doctor_user_id: " . $e->getMessage());
            }
        }
        
        // Log để debug
        error_log("Trạng thái cột: has_patient_name=" . ($has_patient_name ? 'true' : 'false') . 
                ", has_doctor_user_id=" . ($has_doctor_user_id ? 'true' : 'false'));
        
        try {
            // Chuẩn bị câu lệnh INSERT dựa trên tình trạng các cột
            if ($has_patient_name && $has_doctor_user_id) {
                $sql = "INSERT INTO appointments (user_id, service_id, doctor_user_id, appointment_date, status, note, patient_name) 
                       VALUES (?, ?, ?, ?, 'pending', ?, ?)";
                $params = [$user_id, $service_id, $doctor_id_to_use, $appointment_datetime, $note, $name];
                error_log("Thực thi SQL với doctor_user_id và patient_name: " . $sql);
            } elseif ($has_patient_name) {
                $sql = "INSERT INTO appointments (user_id, service_id, appointment_date, status, note, patient_name) 
                       VALUES (?, ?, ?, 'pending', ?, ?)";
                $params = [$user_id, $service_id, $appointment_datetime, $note, $name];
                error_log("Thực thi SQL với patient_name: " . $sql);
            } elseif ($has_doctor_user_id) {
                $sql = "INSERT INTO appointments (user_id, service_id, doctor_user_id, appointment_date, status, note) 
                       VALUES (?, ?, ?, ?, 'pending', ?)";
                $params = [$user_id, $service_id, $doctor_id_to_use, $appointment_datetime, $note];
                error_log("Thực thi SQL với doctor_user_id: " . $sql);
            } else {
                $sql = "INSERT INTO appointments (user_id, service_id, appointment_date, status, note) 
                       VALUES (?, ?, ?, 'pending', ?)";
                $params = [$user_id, $service_id, $appointment_datetime, $note];
                error_log("Thực thi SQL cơ bản: " . $sql);
            }
            
            error_log("Thông số SQL: " . json_encode($params));
            
            $stmt = $db->prepare($sql);
            $stmt->execute($params);
            
            // Lưu appointment_id để hiển thị trong modal
            $_SESSION['appointment_id'] = $db->lastInsertId();
            $_SESSION['appointment_info'] = [
                'doctor_name' => $doctor_name,
                'date' => $appointment_date,
                'time' => $appointment_time,
                'patient_name' => $name,
                'reason' => $reason,
                'price' => '500,000đ'
            ];
            $_SESSION['success'] = 'Đặt lịch khám thành công!';
            
        } catch (Exception $e) {
            $_SESSION['error'] = 'Đặt lịch thất bại: ' . $e->getMessage();
            error_log("Lỗi khi đặt lịch: " . $e->getMessage());
        }
    } catch (Exception $e) {
        $_SESSION['error'] = 'Đặt lịch thất bại: ' . $e->getMessage();
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
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
                        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                        <p class="mt-2">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#appointmentDetailsModal">
                                Xem chi tiết lịch khám
                            </button>
                            <a href="CoXuongKhop.php" class="btn btn-secondary">Quay lại</a>
                        </p>
                    </div>
                <?php else: ?>
                    <form method="POST" action="">
                        <input type="hidden" name="doctor_id" value="<?php echo (int)$doctor_user_id; ?>">
                        <!-- Thêm debugging để kiểm tra giá trị -->
                        <?php error_log("Hidden input doctor_id value: " . (int)$doctor_user_id); ?>
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
                            <input type="email" class="form-control" id="email" name="email" placeholder="Địa chỉ email" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>">
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
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Modal Hiển thị Chi tiết Lịch khám -->
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <?php if (isset($_SESSION['success'])): ?>
    <script>
        // Tự động hiển thị modal khi trang tải nếu đặt lịch thành công
        document.addEventListener('DOMContentLoaded', function() {
            var appointmentModal = new bootstrap.Modal(document.getElementById('appointmentDetailsModal'));
            appointmentModal.show();
        });
    </script>
    <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
    
    <script>
        // Toggle giữa đặt cho mình và người thân
        document.getElementById('for_self').addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('patient_name').value = '<?php echo htmlspecialchars($user['name'] ?? ''); ?>';
            }
        });
        
        document.getElementById('for_other').addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('patient_name').value = '';
            }
        });
        
        // Cập nhật quận/huyện dựa vào tỉnh/thành
        document.getElementById('province').addEventListener('change', function() {
            const province = this.value;
            const districtSelect = document.getElementById('district');
            
            // Xóa tất cả options hiện tại
            districtSelect.innerHTML = '<option value="">-- Chọn Quận/Huyện --</option>';
            
            // Thêm quận/huyện tương ứng
            if (province === 'Hà Nội') {
                ['Ba Đình', 'Hoàn Kiếm', 'Hai Bà Trưng', 'Đống Đa', 'Tây Hồ', 'Cầu Giấy'].forEach(district => {
                    const option = document.createElement('option');
                    option.value = district;
                    option.textContent = district;
                    districtSelect.appendChild(option);
                });
            } else if (province === 'TP. Hồ Chí Minh') {
                ['Quận 1', 'Quận 2', 'Quận 3', 'Quận 4', 'Quận 5', 'Quận 7'].forEach(district => {
                    const option = document.createElement('option');
                    option.value = district;
                    option.textContent = district;
                    districtSelect.appendChild(option);
                });
            } else if (province === 'Đà Nẵng') {
                ['Hải Châu', 'Thanh Khê', 'Liên Chiểu', 'Ngũ Hành Sơn', 'Sơn Trà', 'Cẩm Lệ'].forEach(district => {
                    const option = document.createElement('option');
                    option.value = district;
                    option.textContent = district;
                    districtSelect.appendChild(option);
                });
            } else if (province === 'Đà Lạt') {
                ['Đà Lạt', 'Bảo Lộc', 'Đức Trọng'].forEach(district => {
                    const option = document.createElement('option');
                    option.value = district;
                    option.textContent = district;
                    districtSelect.appendChild(option);
                });
            }
        });
    </script>
</body>
</html>