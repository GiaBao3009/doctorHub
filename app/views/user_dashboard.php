<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit;
}
$user_id = $_SESSION['user_id'];

$conn = new mysqli('localhost', 'root', '', 'doctorhub');
$conn->set_charset('utf8mb4');
if ($conn->connect_error) {
    die('Kết nối thất bại: ' . $conn->connect_error);
}

// Xử lý đổi mật khẩu
$change_pass_msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['oldPassword'], $_POST['newPassword'], $_POST['confirmPassword'])) {
    $old = $_POST['oldPassword'];
    $new = $_POST['newPassword'];
    $confirm = $_POST['confirmPassword'];

    $sql = "SELECT password FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($db_pass);
    $stmt->fetch();
    $stmt->close();

    $is_hashed = (strlen($db_pass) > 30);
    $is_correct = $is_hashed ? password_verify($old, $db_pass) : ($old === $db_pass);

    if (!$is_correct) {
        $change_pass_msg = '<div class="alert alert-danger">Mật khẩu cũ không đúng!</div>';
    } elseif ($new !== $confirm) {
        $change_pass_msg = '<div class="alert alert-danger">Mật khẩu mới và xác nhận không khớp!</div>';
    } elseif (strlen($new) < 8) {
        $change_pass_msg = '<div class="alert alert-danger">Mật khẩu mới phải có ít nhất 8 ký tự!</div>';
    } else {
        $new_hash = password_hash($new, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $new_hash, $user_id);
        if ($stmt->execute()) {
            $change_pass_msg = '<div class="alert alert-success">Đổi mật khẩu thành công!</div>';
        } else {
            $change_pass_msg = '<div class="alert alert-danger">Có lỗi xảy ra, vui lòng thử lại!</div>';
        }
        $stmt->close();
    }
}

// Lấy thông tin user
$sql = "SELECT name, email, role, created_at FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

// Lấy lịch sử đặt lịch
$sql = "SELECT a.id, a.appointment_date, a.status, s.name AS service_name, u2.name AS doctor_name, a.patient_name, a.note
        FROM appointments a
        JOIN services s ON a.service_id = s.id
        JOIN users u2 ON a.doctor_user_id = u2.id
        WHERE a.user_id = ?
        ORDER BY a.appointment_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$appointments = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ sơ bệnh nhân - DoctorHub Medical Center</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --medical-blue: #0077be;
            --medical-light-blue: #e6f3ff;
            --medical-teal: #20b2aa;
            --medical-green: #28a745;
            --medical-red: #dc3545;
            --medical-orange: #fd7e14;
            --medical-gray: #6c757d;
            --medical-light-gray: #f8f9fa;
            --medical-white: #ffffff;
            --medical-dark: #2c3e50;
            --border-light: #dee2e6;
            --shadow-light: rgba(0, 119, 190, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            color: var(--medical-dark);
            line-height: 1.6;
        }

        /* Header Section */
        .medical-header {
            background: linear-gradient(135deg, var(--medical-blue), var(--medical-teal));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px var(--shadow-light);
        }

        .medical-header .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .medical-logo {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .header-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin: 0;
        }

        .header-subtitle {
            font-size: 0.9rem;
            opacity: 0.9;
            margin: 0;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 0.9rem;
        }

        .current-time {
            background: rgba(255, 255, 255, 0.2);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            backdrop-filter: blur(10px);
        }

        /* Navigation Breadcrumb */
        .medical-breadcrumb {
            background: var(--medical-white);
            padding: 1rem 0;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid var(--border-light);
        }

        .breadcrumb {
            background: none;
            margin: 0;
        }

        .breadcrumb-item a {
            color: var(--medical-blue);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--medical-gray);
        }

        /* Main Content */
        .main-content {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        @media (max-width: 992px) {
            .main-content {
                grid-template-columns: 1fr;
            }
        }

        /* Medical Cards */
        .medical-card {
            background: var(--medical-white);
            border: 1px solid var(--border-light);
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            margin-bottom: 1.5rem;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .medical-card:hover {
            box-shadow: 0 4px 16px rgba(0, 119, 190, 0.1);
            transform: translateY(-2px);
        }

        .medical-card-header {
            background: var(--medical-light-blue);
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--border-light);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .medical-card-header h5 {
            margin: 0;
            color: var(--medical-dark);
            font-weight: 600;
            font-size: 1.1rem;
        }

        .medical-card-header .card-icon {
            width: 32px;
            height: 32px;
            background: var(--medical-blue);
            color: white;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
        }

        .medical-card-body {
            padding: 1.5rem;
        }

        /* Patient Info */
        .patient-info-item {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            margin-bottom: 0.5rem;
            border-left: 3px solid var(--medical-blue);
            background: rgba(0, 119, 190, 0.02);
            border-radius: 0 8px 8px 0;
            transition: all 0.3s ease;
        }

        .patient-info-item:hover {
            background: rgba(0, 119, 190, 0.05);
        }

        .info-icon {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--medical-blue), var(--medical-teal));
            color: white;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 0.85rem;
        }

        .info-content .label {
            font-size: 0.8rem;
            color: var(--medical-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.25rem;
        }

        .info-content .value {
            font-weight: 600;
            color: var(--medical-dark);
            font-size: 1rem;
        }

        /* Medical Forms */
        .medical-form {
            background: var(--medical-white);
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            color: var(--medical-dark);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-control {
            border: 2px solid var(--border-light);
            border-radius: 8px;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: var(--medical-white);
        }

        .form-control:focus {
            border-color: var(--medical-blue);
            box-shadow: 0 0 0 0.2rem rgba(0, 119, 190, 0.15);
            background: var(--medical-white);
        }

        /* Medical Buttons */
        .btn-medical {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-medical-primary {
            background: linear-gradient(135deg, var(--medical-blue), var(--medical-teal));
            color: white;
        }

        .btn-medical-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 119, 190, 0.3);
            color: white;
        }

        .btn-medical-danger {
            background: linear-gradient(135deg, var(--medical-red), #c82333);
            color: white;
        }

        .btn-medical-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
            color: white;
        }

        /* Medical Table */
        .medical-table {
            background: var(--medical-white);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .medical-table table {
            margin: 0;
        }

        .medical-table thead th {
            background: linear-gradient(135deg, var(--medical-blue), var(--medical-teal));
            color: white;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem;
            border: none;
        }

        .medical-table tbody td {
            padding: 1rem;
            border-color: var(--border-light);
            font-size: 0.9rem;
        }

        .medical-table tbody tr:hover {
            background: rgba(0, 119, 190, 0.02);
        }

        /* Medical Status Badges */
        .status-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-completed {
            background: rgba(40, 167, 69, 0.1);
            color: var(--medical-green);
            border: 1px solid rgba(40, 167, 69, 0.3);
        }

        .status-pending {
            background: rgba(253, 126, 20, 0.1);
            color: var(--medical-orange);
            border: 1px solid rgba(253, 126, 20, 0.3);
        }

        .status-cancelled {
            background: rgba(220, 53, 69, 0.1);
            color: var(--medical-red);
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        /* Sidebar */
        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .quick-actions {
            background: var(--medical-white);
            border: 1px solid var(--border-light);
            border-radius: 12px;
            padding: 1.5rem;
        }

        .quick-actions h6 {
            color: var(--medical-dark);
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .quick-action-btn {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem;
            background: rgba(0, 119, 190, 0.05);
            border: 1px solid rgba(0, 119, 190, 0.1);
            border-radius: 8px;
            color: var(--medical-blue);
            text-decoration: none;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }

        .quick-action-btn:hover {
            background: rgba(0, 119, 190, 0.1);
            color: var(--medical-blue);
            transform: translateX(5px);
        }

        /* Medical Stats */
        .medical-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--medical-white);
            padding: 1.5rem;
            border-radius: 12px;
            border-left: 4px solid var(--medical-blue);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(0, 119, 190, 0.1);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--medical-blue);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--medical-gray);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Logout Section */
        .logout-section {
            background: var(--medical-white);
            border: 2px dashed var(--medical-red);
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            margin-top: 2rem;
        }

        .logout-section h6 {
            color: var(--medical-red);
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <!-- Medical Header -->
    <div class="medical-header">
        <div class="container">
            <div class="header-left">
                <div class="medical-logo">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <div>
                    <h1 class="header-title">DoctorHub</h1>
                    <p class="header-subtitle">Hồ sơ cá nhân</p>
                </div>
            </div>
            <div class="header-right">
                <div class="current-time">
                    <i class="fas fa-clock me-2"></i>
                    <span id="currentTime"></span>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Breadcrumb -->
    <div class="medical-breadcrumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/index.php"><i class="fas fa-home"></i> Trang chủ</a></li>
                    
                    <li class="breadcrumb-item active">Hồ sơ cá nhân</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Container -->
    <div class="container">
       

        <!-- Main Content Grid -->
        <div class="main-content">
            <!-- Left Column -->
            <div class="left-column">
                <!-- Thông tin bệnh nhân -->
                <div class="medical-card">
                    <div class="medical-card-header">
                        <div class="card-icon">
                            <i class="fas fa-user-injured"></i>
                        </div>
                        <h5>Thông tin bệnh nhân</h5>
                    </div>
                    <div class="medical-card-body">
                        <div class="patient-info-item">
                            <div class="info-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="info-content">
                                <div class="label">Họ và tên</div>
                                <div class="value"><?php echo htmlspecialchars($user['name']); ?></div>
                            </div>
                        </div>
                        <div class="patient-info-item">
                            <div class="info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="info-content">
                                <div class="label">Email liên hệ</div>
                                <div class="value"><?php echo htmlspecialchars($user['email']); ?></div>
                            </div>
                        </div>
                        <div class="patient-info-item">
                            <div class="info-icon">
                                <i class="fas fa-id-card"></i>
                            </div>
                            <div class="info-content">
                                <div class="label">Mã bệnh nhân</div>
                                <div class="value"><?php echo 'BN' . str_pad($user_id, 6, '0', STR_PAD_LEFT); ?></div>
                            </div>
                        </div>
                        <div class="patient-info-item">
                            <div class="info-icon">
                                <i class="fas fa-calendar-plus"></i>
                            </div>
                            <div class="info-content">
                                <div class="label">Ngày đăng ký</div>
                                <div class="value"><?php echo date('d/m/Y', strtotime($user['created_at'])); ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Đổi mật khẩu -->
                <div class="medical-card">
                    <div class="medical-card-header">
                        <div class="card-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h5>Bảo mật tài khoản</h5>
                    </div>
                    <div class="medical-card-body medical-form">
                        <?php if (!empty($change_pass_msg)) echo $change_pass_msg; ?>
                        <form method="post" action="#">
                            <div class="form-group">
                                <label for="oldPassword" class="form-label">
                                    <i class="fas fa-key"></i>
                                    Mật khẩu hiện tại
                                </label>
                                <input type="password" class="form-control" id="oldPassword" name="oldPassword" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="newPassword" class="form-label">
                                            <i class="fas fa-lock"></i>
                                            Mật khẩu mới
                                        </label>
                                        <input type="password" class="form-control" id="newPassword" name="newPassword" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="confirmPassword" class="form-label">
                                            <i class="fas fa-check-double"></i>
                                            Xác nhận mật khẩu
                                        </label>
                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-medical btn-medical-primary">
                                <i class="fas fa-save"></i>
                                Cập nhật mật khẩu
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Lịch sử khám bệnh -->
                <div class="medical-card">
                    <div class="medical-card-header">
                        <div class="card-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <h5>Lịch sử khám bệnh</h5>
                    </div>
                    <div class="medical-card-body">
                        <div class="medical-table">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th><i class="fas fa-calendar-alt me-2"></i>Ngày khám</th>
                                        <th><i class="fas fa-user-md me-2"></i>Bác sĩ</th>
                                        <th><i class="fas fa-clipboard-list me-2"></i>Ghi chú</th>
                                        <th><i class="fas fa-info-circle me-2"></i>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($appointments)): ?>
                                        <tr><td colspan="5" class="text-center">Chưa có lịch sử khám bệnh.</td></tr>
                                    <?php else: ?>
                                        <?php foreach ($appointments as $a): ?>
                                            <tr>
                                                <td>
                                                    <?php echo date('d/m/Y', strtotime($a['appointment_date'])); ?>
                                                    <br>
                                                    <small class="text-muted">
                                                        <?php echo date('H:i', strtotime($a['appointment_date'])); ?>
                                                    </small>
                                                </td>
                                                <td><?php echo htmlspecialchars($a['doctor_name']); ?></td>
                                                <td>
                                                    <?php if (!empty($a['note'])): ?>
                                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#noteModal<?php echo $a['id']; ?>">
                                                            Xem ghi chú
                                                        </button>
                                                    <?php else: ?>
                                                        <span class="text-muted">-</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        $status = $a['status'];
                                                        if ($status === 'completed') {
                                                            echo '<span class="status-badge status-completed"><i class="fas fa-check-circle"></i>Hoàn thành</span>';
                                                        } elseif ($status === 'pending') {
                                                            echo '<span class="status-badge status-pending"><i class="fas fa-clock"></i>Đang chờ</span>';
                                                        } elseif ($status === 'confirmed') {
                                                            echo '<span class="status-badge status-pending"><i class="fas fa-clock"></i>Đã xác nhận</span>';
                                                        } else {
                                                            echo '<span class="status-badge status-cancelled"><i class="fas fa-times-circle"></i>Đã hủy</span>';
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="sidebar">
                <!-- Quick Actions -->
                <div class="quick-actions">
                    <h6><i class="fas fa-bolt"></i> Thao tác nhanh</h6>
                    <a href="../../app/views/chuyenkhoa.php" class="quick-action-btn">
                        <i class="fas fa-calendar-plus"></i>
                        Đặt lịch khám mới
                    </a>
                    <a href="#" class="quick-action-btn">
                        <i class="fas fa-prescription-bottle"></i>
                        Xem đơn thuốc
                    </a>
                    <a href="#" class="quick-action-btn">
                        <i class="fas fa-file-medical"></i>
                        Tải hồ sơ y tế
                    </a>
                    <a href="#" class="quick-action-btn">
                        <i class="fas fa-phone-alt"></i>
                        Liên hệ hỗ trợ
                    </a>
                </div>

                <!-- Emergency Contact -->
                <div class="medical-card">
                    <div class="medical-card-header">
                        <div class="card-icon">
                            <i class="fas fa-ambulance"></i>
                        </div>
                        <h5>Cấp cứu</h5>
                    </div>
                    <div class="medical-card-body text-center">
                        <div class="mb-2">
                            <strong>Hotline 24/7</strong>
                        </div>
                        <div class="h4 text-danger mb-3">
                            <i class="fas fa-phone"></i> 115
                        </div>
                        <button class="btn btn-medical btn-medical-danger w-100">
                            <i class="fas fa-exclamation-triangle"></i>
                            Gọi cấp cứu
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logout Section -->
        <div class="logout-section">
            <h6><i class="fas fa-sign-out-alt me-2"></i>Đăng xuất để bảo vệ thông tin của bạn</h6>
            <form method="post" action="/logout.php">
                <button type="submit" class="btn btn-medical btn-medical-danger">
                    <i class="fas fa-power-off"></i>
                    Đăng xuất an toàn
                </button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script>
        // Hiển thị thời gian thực
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleString('vi-VN', { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
            document.getElementById('currentTime').textContent = timeString;
        }
        
        updateTime();
        setInterval(updateTime, 1000);

        // Form validation cho đổi mật khẩu
        document.querySelector('form').addEventListener('submit', function(e) {
            const oldPassword = document.getElementById('oldPassword').value;
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (newPassword !== confirmPassword) {
                e.preventDefault();
                alert('❌ Mật khẩu mới và xác nhận mật khẩu không khớp!');
                return false;
            }
            
            if (newPassword.length < 8) {
                e.preventDefault();
                alert('❌ Mật khẩu mới phải có ít nhất 8 ký tự để đảm bảo bảo mật!');
                return false;
            }

            if (oldPassword === newPassword) {
                e.preventDefault();
                alert('⚠️ Mật khẩu mới phải khác mật khẩu hiện tại!');
                return false;
            }
            
            // Kiểm tra độ mạnh mật khẩu
            const hasNumber = /\d/.test(newPassword);
            const hasLetter = /[a-zA-Z]/.test(newPassword);
            
            if (!hasNumber || !hasLetter) {
                e.preventDefault();
                alert('⚠️ Mật khẩu nên có cả chữ và số để tăng tính bảo mật!');
                return false;
            }
        });

// Animation cho các card khi load trang
document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.medical-card, .stat-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });

        // Hiệu ứng hover cho quick action buttons
        document.querySelectorAll('.quick-action-btn').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(5px) scale(1.02)';
            });
            
            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0) scale(1)';
            });
        });

        // Xác nhận trước khi đăng xuất
        document.querySelector('.logout-section form').addEventListener('submit', function(e) {
            if (!confirm('🔐 Bạn có chắc chắn muốn đăng xuất khỏi hệ thống không?')) {
                e.preventDefault();
            }
        });
    </script>

    <?php foreach ($appointments as $a): ?>
        <?php if (!empty($a['note'])): ?>
        <div class="modal fade" id="noteModal<?php echo $a['id']; ?>" tabindex="-1" aria-labelledby="noteModalLabel<?php echo $a['id']; ?>" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="noteModalLabel<?php echo $a['id']; ?>">Ghi chú lịch khám</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <?php echo nl2br(htmlspecialchars($a['note'])); ?>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
    <?php endforeach; ?>
</body>
</html>
