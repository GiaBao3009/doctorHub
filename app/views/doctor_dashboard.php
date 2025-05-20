<?php
// Bắt đầu session để lấy thông báo
session_start();

// Tạo biến lưu thông báo để hiển thị
$success_message = $_SESSION['success_message'] ?? '';
$error_message = $_SESSION['error_message'] ?? '';
$warning_message = $_SESSION['warning_message'] ?? '';

// Xóa thông báo sau khi đã lấy
unset($_SESSION['success_message']);
unset($_SESSION['error_message']);
unset($_SESSION['warning_message']);

require_once '../../config/database.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'doctor') {
    header('Location: signIn.php');
    exit;
}

// Kết nối database
$database = new Database();
$db = $database->getConnection();

// Kiểm tra và thêm các cột cần thiết vào bảng users nếu chưa có
try {
    $check = $db->query('DESCRIBE users');
    $columns = [];
    while($row = $check->fetch(PDO::FETCH_ASSOC)) {
        $columns[] = $row['Field'];
    }
    
    $required_columns = ['avatar', 'specialty', 'phone', 'address'];
    $missing_columns = array_diff($required_columns, $columns);
    
    if (!empty($missing_columns)) {
        foreach($missing_columns as $column) {
            switch($column) {
                case 'avatar':
                case 'specialty':
                case 'address':
                    $db->exec("ALTER TABLE users ADD $column TEXT");
                    break;
                case 'phone':
                    $db->exec("ALTER TABLE users ADD $column VARCHAR(20)");
                    break;
            }
        }
    }
} catch (PDOException $e) {
    // Log lỗi nhưng không dừng chương trình
    error_log('Lỗi kiểm tra/thêm cột: ' . $e->getMessage());
}

// Lấy thông tin bác sĩ từ bảng users với role = doctor
$doctor_id = $_SESSION['user_id'];
$stmt = $db->prepare("SELECT * FROM users WHERE id = ? AND role = 'doctor'");
$stmt->execute([$doctor_id]);
$doctor = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$doctor) {
    header('Location: signIn.php');
    exit;
}

// Xử lý các action từ form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';
    
    // Xử lý AJAX request 
    $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    $response = ['success' => false, 'message' => ''];
    
    switch ($action) {
        case 'update_profile':
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $specialty = $_POST['specialty'] ?? '';
            $address = $_POST['address'] ?? '';
            
            // Kiểm tra các trường tồn tại trong database
            $stmt = $db->prepare("DESCRIBE users");
            $stmt->execute();
            $columns = $stmt->fetchAll(PDO::FETCH_COLUMN);
            
            $update_fields = [];
            $params = [];
            
            if (in_array('name', $columns)) {
                $update_fields[] = 'name = ?';
                $params[] = $name;
            }
            
            if (in_array('email', $columns)) {
                $update_fields[] = 'email = ?';
                $params[] = $email;
            }
            
            if (in_array('phone', $columns)) {
                $update_fields[] = 'phone = ?';
                $params[] = $phone;
            }
            
            if (in_array('specialty', $columns)) {
                $update_fields[] = 'specialty = ?';
                $params[] = $specialty;
            }
            
            if (in_array('address', $columns)) {
                $update_fields[] = 'address = ?';
                $params[] = $address;
            }
            
            // Xử lý upload avatar nếu có
            $avatar_path = $doctor['avatar'] ?? '';
            if (!empty($_FILES['avatar']['name'])) {
                $upload_dir = 'assets/images/Doctors/';
                
                // Đảm bảo thư mục upload tồn tại
                if (!file_exists('../../' . $upload_dir)) {
                    if (!mkdir('../../' . $upload_dir, 0777, true)) {
                        $error_msg = 'Không thể tạo thư mục để lưu avatar. Vui lòng kiểm tra quyền hạn của thư mục.';
                        error_log($error_msg);
                        if ($isAjax) {
                            $response['message'] = $error_msg;
                            echo json_encode($response);
                            exit;
                        } else {
                            $_SESSION['error'] = $error_msg;
                            break;
                        }
                    }
                }
                
                // Kiểm tra lỗi upload
                if ($_FILES['avatar']['error'] !== UPLOAD_ERR_OK) {
                    $upload_errors = [
                        UPLOAD_ERR_INI_SIZE => 'Kích thước file vượt quá giới hạn upload_max_filesize trong php.ini',
                        UPLOAD_ERR_FORM_SIZE => 'Kích thước file vượt quá giới hạn MAX_FILE_SIZE trong form HTML',
                        UPLOAD_ERR_PARTIAL => 'File được upload không hoàn chỉnh',
                        UPLOAD_ERR_NO_FILE => 'Không có file nào được upload',
                        UPLOAD_ERR_NO_TMP_DIR => 'Thư mục tạm không tồn tại',
                        UPLOAD_ERR_CANT_WRITE => 'Không thể ghi file vào đĩa',
                        UPLOAD_ERR_EXTENSION => 'Upload bị dừng bởi extension'
                    ];
                    $error_msg = 'Lỗi upload file: ' . ($upload_errors[$_FILES['avatar']['error']] ?? 'Lỗi không xác định');
                    error_log($error_msg);
                    if ($isAjax) {
                        $response['message'] = $error_msg;
                        echo json_encode($response);
                        exit;
                    } else {
                        $_SESSION['error'] = $error_msg;
                        break;
                    }
                }
                
                $file_extension = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));
                $filename = 'doctor_' . $doctor_id . '_' . time() . '.' . $file_extension;
                $upload_path = $upload_dir . $filename;
                
                // Kiểm tra loại file và kích thước
                $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
                if (!in_array($file_extension, $allowed_types)) {
                    $error_msg = 'Chỉ chấp nhận file ảnh: jpg, jpeg, png, gif';
                    error_log($error_msg);
                    if ($isAjax) {
                        $response['message'] = $error_msg;
                        echo json_encode($response);
                        exit;
                    } else {
                        $_SESSION['error'] = $error_msg;
                        break;
                    }
                }
                
                if ($_FILES['avatar']['size'] > 2 * 1024 * 1024) { // 2MB
                    $error_msg = 'Kích thước file quá lớn. Tối đa 2MB.';
                    error_log($error_msg);
                    if ($isAjax) {
                        $response['message'] = $error_msg;
                        echo json_encode($response);
                        exit;
                    } else {
                        $_SESSION['error'] = $error_msg;
                        break;
                    }
                }
                
                // Kiểm tra tính hợp lệ của file ảnh
                $image_info = getimagesize($_FILES['avatar']['tmp_name']);
                if ($image_info === false) {
                    $error_msg = 'File không phải là ảnh hợp lệ.';
                    error_log($error_msg);
                    if ($isAjax) {
                        $response['message'] = $error_msg;
                        echo json_encode($response);
                        exit;
                    } else {
                        $_SESSION['error'] = $error_msg;
                        break;
                    }
                }
                
                // Di chuyển file upload
                if (move_uploaded_file($_FILES['avatar']['tmp_name'], '../../' . $upload_path)) {
                    if (in_array('avatar', $columns)) {
                        $update_fields[] = 'avatar = ?';
                        $params[] = $upload_path;
                        $avatar_path = $upload_path;
                    }
                } else {
                    $error_details = error_get_last();
                    $error_msg = 'Không thể upload avatar. ';
                    if ($error_details) {
                        $error_msg .= 'Lỗi: ' . $error_details['message'];
                    }
                    error_log($error_msg);
                    if ($isAjax) {
                        $response['message'] = $error_msg;
                        echo json_encode($response);
                        exit;
                    } else {
                        $_SESSION['error'] = $error_msg;
                        break;
                    }
                }
            }
            
            // Kiểm tra nếu không có trường nào để cập nhật
            if (empty($update_fields)) {
                $error_msg = 'Không có trường nào được cập nhật.';
                if ($isAjax) {
                    $response['message'] = $error_msg;
                    echo json_encode($response);
                    exit;
                } else {
                    $_SESSION['error'] = $error_msg;
                    break;
                }
            }
            
            $params[] = $doctor_id; // thêm điều kiện WHERE id = ?
            
            try {
                $stmt = $db->prepare("UPDATE users SET " . implode(', ', $update_fields) . " WHERE id = ?");
                
                if ($stmt->execute($params)) {
                    if ($isAjax) {
                        $response['success'] = true;
                        $response['message'] = 'Cập nhật thông tin thành công!';
                        if (!empty($avatar_path)) {
                            $response['avatar_path'] = $avatar_path;
                        }
                        echo json_encode($response);
                        exit;
                    } else {
                        $_SESSION['success'] = 'Cập nhật thông tin thành công!';
                        // Redirect với fragment để chuyển đến tab profile
                        header('Location: ' . $_SERVER['PHP_SELF'] . '#profile');
                        exit;
                    }
                } else {
                    $error_msg = 'Cập nhật thông tin thất bại!';
                    if ($isAjax) {
                        $response['message'] = $error_msg;
                        echo json_encode($response);
                        exit;
                    } else {
                        $_SESSION['error'] = $error_msg;
                    }
                }
            } catch (PDOException $e) {
                $error_msg = 'Lỗi Database: ' . $e->getMessage();
                if ($isAjax) {
                    $response['message'] = $error_msg;
                    echo json_encode($response);
                    exit;
                } else {
                    $_SESSION['error'] = $error_msg;
                }
            }
            break;

        case 'change_password':
            $current_password = $_POST['current_password'] ?? '';
            $new_password = $_POST['new_password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';
            
            // Kiểm tra mật khẩu hiện tại
            if (!password_verify($current_password, $doctor['password'])) {
                if ($isAjax) {
                    $response['message'] = 'Mật khẩu hiện tại không đúng!';
                    echo json_encode($response);
                    exit;
                } else {
                    $_SESSION['error'] = 'Mật khẩu hiện tại không đúng!';
                    break;
                }
            }
            
            // Kiểm tra mật khẩu mới và xác nhận mật khẩu
            if ($new_password !== $confirm_password) {
                if ($isAjax) {
                    $response['message'] = 'Mật khẩu mới và xác nhận mật khẩu không khớp!';
                    echo json_encode($response);
                    exit;
                } else {
                    $_SESSION['error'] = 'Mật khẩu mới và xác nhận mật khẩu không khớp!';
                    break;
                }
            }
            
            // Cập nhật mật khẩu
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
            
            if ($stmt->execute([$hashed_password, $doctor_id])) {
                if ($isAjax) {
                    $response['success'] = true;
                    $response['message'] = 'Đổi mật khẩu thành công!';
                    echo json_encode($response);
                    exit;
                } else {
                    $_SESSION['success'] = 'Đổi mật khẩu thành công!';
                    // Redirect với fragment để chuyển đến tab profile
                    header('Location: ' . $_SERVER['PHP_SELF'] . '#profile');
                    exit;
                }
            } else {
                if ($isAjax) {
                    $response['message'] = 'Đổi mật khẩu thất bại!';
                    echo json_encode($response);
                    exit;
                } else {
                    $_SESSION['error'] = 'Đổi mật khẩu thất bại!';
                }
            }
            break;

        case 'add_appointment':
            $patient_id = $_POST['patient_id'] ?? '';
            $date = $_POST['date'] ?? '';
            $time = $_POST['time'] ?? '';
            $notes = $_POST['notes'] ?? '';
            
            $stmt = $db->prepare("INSERT INTO appointments (user_id, service_id, appointment_date, status, note) VALUES (?, ?, ?, 'pending', ?)");
            if ($stmt->execute([$doctor_id, $patient_id, "$date $time", $notes])) {
                $_SESSION['success'] = 'Thêm lịch hẹn thành công!';
            } else {
                $_SESSION['error'] = 'Thêm lịch hẹn thất bại!';
            }
            break;
    }
    
    // Nếu không phải Ajax request, redirect lại trang
    if (!$isAjax && in_array($action, ['update_profile', 'change_password'])) {
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Xác định thời gian hiện tại
$today = date('Y-m-d');

// Lấy số liệu thống kê
$stmt = $db->prepare("SELECT COUNT(*) FROM appointments WHERE doctor_user_id = ? AND DATE(appointment_date) = ?");
$stmt->execute([$doctor_id, $today]);
$today_appointments = $stmt->fetchColumn();

$stmt = $db->prepare("SELECT COUNT(*) FROM appointments WHERE doctor_user_id = ? AND status = 'pending'");
$stmt->execute([$doctor_id]);
$pending_appointments = $stmt->fetchColumn();

// Lấy danh sách lịch hẹn gần đây
$stmt = $db->prepare("SELECT a.*, a.patient_name, u.name as patient_user_name 
                    FROM appointments a 
                    LEFT JOIN users u ON a.user_id = u.id 
                    WHERE a.doctor_user_id = ? 
                    ORDER BY a.appointment_date DESC
                    LIMIT 5");
$stmt->execute([$doctor_id]);
$recent_appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Kết hợp thông báo session với thông báo cũ
if (isset($_SESSION['success'])) {
    $success_message = $_SESSION['success'];
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    $error_message = $_SESSION['error'];
    unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoctorHub - Trang Quản Lý Dành Cho Bác Sĩ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <style>
        :root {
            --primary-color: #3a57e8;
            --primary-light: #e0e7ff;
            --secondary-color: #6c757d;
            --success-color: #1aa053;
            --warning-color: #f9b115;
            --danger-color: #c03221;
            --info-color: #079aa2;
            --dark-color: #212529;
            --light-color: #f8f9fa;
            --sidebar-width: 280px;
            --body-bg: #f8f9fa;
            --card-bg: #ffffff;
            --border-radius: 10px;
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Roboto', 'Segoe UI', sans-serif;
            background-color: var(--body-bg);
            color: #555;
            margin: 0;
            padding: 0;
        }

        /* Sidebar styling */
        .sidebar {
            width: var(--sidebar-width);
            background: var(--card-bg);
            height: 100vh;
            position: fixed;
            box-shadow: var(--box-shadow);
            display: flex;
            flex-direction: column;
            transition: var(--transition);
            z-index: 1000;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-profile {
            padding: 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .sidebar-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-light);
            box-shadow: 0 0 10px rgba(58, 87, 232, 0.2);
        }

        .sidebar-name {
            margin-top: 0.75rem;
            margin-bottom: 0.25rem;
            font-weight: 600;
            color: var(--dark-color);
        }

        .sidebar-specialty {
            color: var(--secondary-color);
            font-size: 0.875rem;
        }

        .sidebar-menu {
            flex-grow: 1;
            padding: 1rem 0;
            overflow-y: auto;
        }

        .sidebar-item {
            padding: 0.8rem 1.5rem;
            display: flex;
            align-items: center;
            color: var(--secondary-color);
            transition: var(--transition);
            cursor: pointer;
            border-left: 3px solid transparent;
        }

        .sidebar-item:hover {
            background-color: rgba(58, 87, 232, 0.1);
            color: var(--primary-color);
            border-left-color: var(--primary-color);
        }

        .sidebar-item.active {
            background-color: var(--primary-light);
            color: var(--primary-color);
            border-left-color: var(--primary-color);
            font-weight: 500;
        }

        .sidebar-item i {
            font-size: 1.2rem;
            margin-right: 10px;
            width: 24px;
            text-align: center;
        }

        .sidebar-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Main content area */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem;
            transition: var(--transition);
        }

        /* Top bar */
        .top-bar {
            position: sticky;
            top: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            background-color: var(--card-bg);
            box-shadow: var(--box-shadow);
            margin-left: var(--sidebar-width);
            z-index: 900;
        }

        .search-box {
            width: 300px;
        }

        .search-box .input-group-text {
            background-color: transparent;
            border-right: none;
        }

        .search-box .form-control {
            border-left: none;
            box-shadow: none;
        }

        .top-actions {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .notification-icon {
            font-size: 1.25rem;
            color: var(--secondary-color);
            position: relative;
            cursor: pointer;
        }

        .doctor-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .doctor-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-light);
        }

        .doctor-name {
            font-weight: 600;
            color: var(--dark-color);
            margin: 0;
        }

        .doctor-role {
            font-size: 0.8rem;
            color: var(--secondary-color);
            margin: 0;
        }

        /* Card styling */
        .card {
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            border: none;
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .card-header {
            background-color: var(--card-bg);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.25rem 1.5rem;
        }

        .card-title {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 0;
        }

        /* Statistic cards */
        .stat-card {
            border-radius: var(--border-radius);
            padding: 1.5rem;
            color: white;
            height: 100%;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card.primary {
            background: linear-gradient(135deg, var(--primary-color), #5e72e4);
        }

        .stat-card.warning {
            background: linear-gradient(135deg, var(--warning-color), #feb04a);
        }

        .stat-card.success {
            background: linear-gradient(135deg, var(--success-color), #25ca6d);
        }

        .stat-card.info {
            background: linear-gradient(135deg, var(--info-color), #17a2b8);
        }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1rem;
            opacity: 0.9;
        }

        .stat-icon {
            position: absolute;
            bottom: 15px;
            right: 15px;
            font-size: 3rem;
            opacity: 0.2;
        }

        /* Table styling */
        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background-color: rgba(0, 0, 0, 0.02);
            font-weight: 600;
            color: var(--dark-color);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 0.75rem 1.5rem;
        }

        .table tbody td {
            padding: 1rem 1.5rem;
            vertical-align: middle;
            border-top: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .table tbody tr {
            transition: transform 0.2s ease;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
            transform: translateX(5px);
        }

        /* Button styling */
        .btn {
            border-radius: 6px;
            font-weight: 500;
            transition: var(--transition);
            padding: 0.5rem 1rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #2a47d8;
            border-color: #2a47d8;
        }

        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }

        .btn-danger:hover {
            background-color: #b02a1a;
            border-color: #b02a1a;
        }

        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }

        .btn-success:hover {
            background-color: #148843;
            border-color: #148843;
        }

        .btn-sm {
            padding: 0.3rem 0.7rem;
            font-size: 0.875rem;
        }

        /* Badge styling */
        .badge {
            font-weight: 500;
            padding: 0.35em 0.65em;
            border-radius: 4px;
        }

        /* Modal styling */
        .modal-content {
            border-radius: 10px;
            border: none;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.25rem 1.5rem;
        }

        .modal-footer {
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.25rem 1.5rem;
        }

        .modal-title {
            font-weight: 600;
            color: var(--dark-color);
        }

        /* Form controls */
        .form-control, .form-select {
            border-radius: 6px;
            padding: 0.5rem 1rem;
            border: 1px solid rgba(0, 0, 0, 0.1);
            transition: var(--transition);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(58, 87, 232, 0.1);
        }

        .form-label {
            color: var(--dark-color);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        /* Alert messages */
        .alert {
            border-radius: var(--border-radius);
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            border: none;
            animation: slideDown 0.3s ease-out forwards;
        }

        @keyframes slideDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
         
        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8; 
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .sidebar {
                width: 70px;
                overflow: visible;
            }
            
            .sidebar-item span,
            .sidebar-profile .sidebar-name,
            .sidebar-profile .sidebar-specialty {
                display: none;
            }
            
            .sidebar-profile .sidebar-avatar {
                width: 40px;
                height: 40px;
            }
            
            .main-content,
            .top-bar {
                margin-left: 70px;
            }
            
            .sidebar-header img {
                height: 24px;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 1rem;
            }
            
            .stat-value {
                font-size: 2rem;
            }

            .search-box {
                display: none;
            }
        }

        .content-section {
            display: none;
        }
        .content-section.active {
            display: block;
        }
        .avatar-wrapper {
            position: relative;
            width: 150px;
            height: 150px;
            margin: 0 auto;
        }
        .avatar-edit .btn {
            width: 40px;
            height: 40px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .highlight-row {
            animation: highlight-animation 2s ease-in-out;
        }
        @keyframes highlight-animation {
            0% { background-color: rgba(255, 193, 7, 0.2); }
            100% { background-color: transparent; }
        }
    </style>
</head>
<body>
<?php if (!empty($success_message)): ?>
    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
        <strong>Thành công!</strong> <?php echo htmlspecialchars($success_message); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (!empty($error_message)): ?>
    <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
        <strong>Lỗi!</strong> <?php echo htmlspecialchars($error_message); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div id="dashboard-page">
        <div class="d-flex">
            <!-- Sidebar -->
            <div id="sidebar" class="sidebar">
                <div class="sidebar-header">
                    <a href="../../index.php">
                        <img src="../../assets/images/Logo/DoctorHub.png" alt="DoctorHub Logo" height="32">
                    </a>
                </div>
                
                <div class="sidebar-profile mt-4 mb-3">
                    <div class="text-center">
                        <img src="<?php echo !empty($doctor['avatar']) ? '../../'.htmlspecialchars($doctor['avatar']) : '../../assets/images/Doctors/gay.jpg'; ?>" alt="Avatar" class="sidebar-avatar mb-2">
                        <h6 class="sidebar-name mb-1"><?php echo htmlspecialchars($doctor['name'] ?? 'Dr. Nguyễn Văn A'); ?></h6>
                        <span class="sidebar-specialty"><?php echo htmlspecialchars($doctor['specialty'] ?? 'Bác sĩ chuyên khoa'); ?></span>
                    </div>
                </div>
                
                <div class="sidebar-menu">
                    <div class="sidebar-item active" data-page="dashboard">
                        <i class="bi bi-house-door"></i>
                        <span>Tổng quan</span>
                    </div>
                    <div class="sidebar-item" data-page="appointments">
                        <i class="bi bi-calendar-check"></i>
                        <span>Lịch khám</span>
                    </div>
                    <div class="sidebar-item" data-page="patients">
                        <i class="bi bi-people"></i>
                        <span>Bệnh nhân</span>
                    </div>
                    <div class="sidebar-item" data-page="medical-records">
                        <i class="bi bi-journal-medical"></i>
                        <span>Bệnh án</span>
                    </div>
                    <div class="sidebar-item" data-page="prescriptions">
                        <i class="bi bi-file-earmark-medical"></i>
                        <span>Đơn thuốc</span>
                    </div>
                    <div class="sidebar-item" data-page="profile">
                        <i class="bi bi-person"></i>
                        <span>Hồ sơ</span>
                    </div>
                    <div class="sidebar-item" data-page="settings">
                        <i class="bi bi-gear"></i>
                        <span>Cài đặt</span>
                    </div>
                </div>

                <div class="sidebar-footer">
                    <div class="sidebar-item text-danger" onclick="logout()">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Đăng xuất</span>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="content-wrapper flex-grow-1">
                <div class="top-bar">
                    <div class="d-flex align-items-center w-100">
                        <div class="search-box me-auto">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control ps-0 border-start-0" placeholder="Tìm kiếm...">
                            </div>
                        </div>
                        <div class="top-actions d-flex align-items-center">
                            <div class="dropdown me-3">
                                <a href="#" class="position-relative text-secondary fs-5" data-bs-toggle="dropdown">
                                    <i class="bi bi-bell"></i>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">2</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end shadow border-0">
                                    <h6 class="dropdown-header">Thông báo</h6>
                                    <a href="#" class="dropdown-item">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-icon bg-primary-light text-primary rounded-circle">
                                                <i class="bi bi-calendar-plus"></i>
                                            </div>
                                            <div class="ms-3">
                                                <p class="mb-0">Bạn có lịch hẹn mới từ Nguyễn Văn B</p>
                                                <small class="text-muted">15 phút trước</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-icon bg-success-light text-success rounded-circle">
                                                <i class="bi bi-check-circle"></i>
                                            </div>
                                            <div class="ms-3">
                                                <p class="mb-0">Trần Thị C đã xác nhận lịch hẹn</p>
                                                <small class="text-muted">1 giờ trước</small>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item text-center">Xem tất cả thông báo</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <div class="doctor-info" data-bs-toggle="dropdown">
                                    <img src="<?php echo !empty($doctor['avatar']) ? '../../'.htmlspecialchars($doctor['avatar']) : '../../assets/images/Doctors/gay.jpg'; ?>" alt="Avatar" class="doctor-avatar">
                                    <div>
                                        <div class="doctor-name"><?php echo htmlspecialchars($doctor['name'] ?? 'Dr. Nguyễn Văn A'); ?></div>
                                        <div class="doctor-role"><?php echo htmlspecialchars($doctor['specialty'] ?? 'Bác sĩ chuyên khoa'); ?></div>
                                    </div>
                                    <i class="bi bi-chevron-down ms-2"></i>
                                </div>
                                <div class="dropdown-menu dropdown-menu-end shadow border-0">
                                    <a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> Hồ sơ</a>
                                    <a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Cài đặt</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#" onclick="logout()"><i class="bi bi-box-arrow-right me-2"></i> Đăng xuất</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dashboard Content -->
                <div class="main-content">
                    <!-- Hiển thị thông báo từ session nếu có -->
                    <?php if (!empty($success_message)): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> <?php echo $success_message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($error_message)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> <?php echo $error_message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($warning_message)): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-circle-fill me-2"></i> <?php echo $warning_message; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Nội dung dashboard -->
                    <!-- Dashboard Section -->
                    <div id="dashboard-section" class="content-section active">
                        <div class="content-header d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h4 class="mb-1">Xin chào, <?php echo htmlspecialchars($doctor['name'] ?? 'Dr. Nguyễn Văn A'); ?>!</h4>
                                <p class="text-muted mb-0">Chào mừng quay trở lại DoctorHub</p>
                            </div>
                            <div>
                                <button class="btn btn-primary" onclick="showAddAppointment()">
                                    <i class="bi bi-plus-circle me-1"></i> Thêm lịch hẹn
                                </button>
                            </div>
                        </div>

                        <!-- Statistics Cards -->
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6 col-lg-3">
                                <div class="stat-card primary">
                                    <div class="stat-value"><?php echo $today_appointments; ?></div>
                                    <div class="stat-label">Lịch khám hôm nay</div>
                                    <i class="bi bi-calendar-day position-absolute end-0 bottom-0 mb-3 me-4 fs-1 opacity-25"></i>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="stat-card warning">
                                    <div class="stat-value"><?php echo $pending_appointments; ?></div>
                                    <div class="stat-label">Đang chờ xác nhận</div>
                                    <i class="bi bi-hourglass-split position-absolute end-0 bottom-0 mb-3 me-4 fs-1 opacity-25"></i>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="stat-card success">
                                    <div class="stat-value">42</div>
                                    <div class="stat-label">Đã hoàn thành</div>
                                    <i class="bi bi-check-circle position-absolute end-0 bottom-0 mb-3 me-4 fs-1 opacity-25"></i>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="stat-card danger" style="background-color: #079aa2;">
                                    <div class="stat-value">120</div>
                                    <div class="stat-label">Tổng bệnh nhân</div>
                                    <i class="bi bi-people position-absolute end-0 bottom-0 mb-3 me-4 fs-1 opacity-25"></i>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-lg-8">
                                <!-- Upcoming Appointments -->
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Lịch khám sắp tới</h5>
                                        <a href="#" class="text-primary text-decoration-none" onclick="showSection('appointments-section'); return false;">Xem tất cả</a>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle">
                                            <thead>
                                                <tr>
                                                    <th>Bệnh nhân</th>
                                                    <th>Ngày khám</th>
                                                    <th>Giờ khám</th>
                                                    <th>Trạng thái</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($recent_appointments as $appointment): ?>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <img src="../../assets/images/avatar1.jpg" alt="Avatar" class="rounded-circle me-2" width="32" height="32">
                                                                <div>
                                                                    <div class="fw-medium">
                                                                        <?php 
                                                                        if (!empty($appointment['patient_name'])) {
                                                                            echo htmlspecialchars($appointment['patient_name']);
                                                                        } elseif (!empty($appointment['patient_user_name'])) {
                                                                            echo htmlspecialchars($appointment['patient_user_name']);
                                                                        } else {
                                                                            // Trích xuất tên từ ghi chú nếu không có cột patient_name
                                                                            $note = $appointment['note'] ?? '';
                                                                            if (preg_match('/Tên: ([^\n]+)/', $note, $matches)) {
                                                                                echo htmlspecialchars($matches[1]);
                                                                            } else {
                                                                                echo 'Không có tên';
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <div class="small text-muted">Bệnh nhân</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><?php echo date('d/m/Y', strtotime($appointment['appointment_date'])); ?></td>
                                                        <td><?php echo date('H:i', strtotime($appointment['appointment_date'])); ?></td>
                                                        <td>
                                                            <span class="badge bg-<?php 
                                                                echo $appointment['status'] == 'pending' ? 'warning' : 
                                                                      ($appointment['status'] == 'confirmed' ? 'success' : 
                                                                      ($appointment['status'] == 'completed' ? 'info' : 'danger')); 
                                                                ?>">
                                                                <?php 
                                                                    echo $appointment['status'] == 'pending' ? 'Chờ xác nhận' : 
                                                                      ($appointment['status'] == 'confirmed' ? 'Đã xác nhận' : 
                                                                      ($appointment['status'] == 'completed' ? 'Đã hoàn thành' : 'Đã hủy')); 
                                                                ?>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <button class="btn btn-sm btn-primary" onclick="viewAppointment(<?php echo $appointment['id']; ?>)">
                                                                    <i class="bi bi-eye"></i>
                                                                </button>
                                                                <?php if ($appointment['status'] == 'pending'): ?>
                                                                <button class="btn btn-sm btn-success" onclick="updateAppointmentStatus(<?php echo $appointment['id']; ?>, 'confirmed')">
                                                                    <i class="bi bi-check-lg"></i>
                                                                </button>
                                                                <?php endif; ?>
                                                                <?php if ($appointment['status'] != 'canceled' && $appointment['status'] != 'completed'): ?>
                                                                <button class="btn btn-sm btn-danger" onclick="cancelAppointment(<?php echo $appointment['id']; ?>)">
                                                                    <i class="bi bi-x-lg"></i>
                                                                </button>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <?php if (empty($recent_appointments)): ?>
                                                    <tr>
                                                        <td colspan="5" class="text-center py-3">Không có lịch hẹn nào gần đây</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <!-- Today's Schedule -->
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Lịch trình hôm nay</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="timeline">
                                            <?php
                                            // Thêm những lịch hẹn hôm nay
                                            $stmt = $db->prepare("SELECT a.*, u.name as patient_name 
                                                                FROM appointments a 
                                                                JOIN users u ON a.service_id = u.id 
                                                                WHERE a.user_id = ? AND DATE(a.appointment_date) = ? AND u.role = 'user'
                                                                ORDER BY a.appointment_date ASC");
                                            $stmt->execute([$doctor_id, $today]);
                                            $today_appointments_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            if (!empty($today_appointments_list)):
                                                foreach ($today_appointments_list as $app):
                                                    $borderClass = $app['status'] == 'pending' ? 'border-warning' : 
                                                                  ($app['status'] == 'confirmed' ? 'border-primary' : 
                                                                  ($app['status'] == 'completed' ? 'border-success' : 'border-danger'));
                                            ?>
                                                    <div class="timeline-item p-3 border-start border-3 <?php echo $borderClass; ?>">
                                                        <p class="mb-1 fw-medium"><?php echo date('H:i', strtotime($app['appointment_date'])); ?> - <?php echo date('H:i', strtotime($app['appointment_date']) + 1800); ?></p>
                                                        <p class="mb-1"><?php echo htmlspecialchars($app['patient_name']); ?></p>
                                                        <p class="small text-muted mb-0"><?php echo htmlspecialchars($app['note'] ? $app['note'] : 'Không có ghi chú'); ?></p>
                                                    </div>
                                            <?php
                                                endforeach;
                                            else:
                                            ?>
                                                <div class="p-3 text-center text-muted">Không có lịch hẹn nào hôm nay</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Recent Patients -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Bệnh nhân gần đây</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="list-group list-group-flush">
                                            <?php
                                            // Lấy danh sách bệnh nhân mới nhất
                                            $stmt = $db->prepare("SELECT DISTINCT 
                                                                    COALESCE(a.patient_name, u.name) as patient_name,
                                                                    u.id as user_id,
                                                                    MAX(a.appointment_date) as last_date 
                                                                FROM appointments a 
                                                                LEFT JOIN users u ON a.user_id = u.id 
                                                                WHERE a.doctor_user_id = ? 
                                                                GROUP BY COALESCE(a.patient_name, u.name), u.id
                                                                ORDER BY last_date DESC
                                                                LIMIT 3");
                                            $stmt->execute([$doctor_id]);
                                            $recent_patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            
                                            if (!empty($recent_patients)):
                                                foreach ($recent_patients as $patient):
                                            ?>
                                                <div class="list-group-item d-flex align-items-center p-3">
                                                    <img src="../../assets/images/avatar1.jpg" alt="Avatar" class="rounded-circle me-3" width="40" height="40">
                                                    <div>
                                                        <h6 class="mb-0"><?php echo htmlspecialchars($patient['patient_name']); ?></h6>
                                                        <p class="small text-muted mb-0">Khám ngày <?php echo date('d/m/Y', strtotime($patient['last_date'])); ?></p>
                                                    </div>
                                                    <button class="btn btn-sm btn-link ms-auto">
                                                        <i class="bi bi-file-earmark-medical"></i>
                                                    </button>
                                                </div>
                                            <?php
                                                endforeach;
                                            else:
                                            ?>
                                                <div class="list-group-item text-center py-3">Không có bệnh nhân nào gần đây</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Appointments Section -->
                    <div id="appointments-section" class="content-section">
                        <div class="content-header d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h4 class="mb-1">Quản lý lịch khám</h4>
                                <p class="text-muted mb-0">Tất cả các lịch hẹn của bạn</p>
                            </div>
                            <div>
                                <button class="btn btn-primary" onclick="showAddAppointment()">
                                    <i class="bi bi-plus-circle me-1"></i> Thêm lịch hẹn
                                </button>
                            </div>
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Tất cả lịch khám</h5>
                                <div>
                                    <select class="form-select form-select-sm" id="appointment-filter" style="width: 150px;">
                                        <option value="all">Tất cả</option>
                                        <option value="pending">Chờ xác nhận</option>
                                        <option value="confirmed">Đã xác nhận</option>
                                        <option value="completed">Đã hoàn thành</option>
                                        <option value="canceled">Đã hủy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover align-middle" id="appointments-table">
                                    <thead>
                                        <tr>
                                            <th>Bệnh nhân</th>
                                            <th>Ngày khám</th>
                                            <th>Giờ khám</th>
                                            <th>Trạng thái</th>
                                            <th>Ghi chú</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Lấy tất cả các lịch hẹn
                                        $stmt = $db->prepare("SELECT a.*, a.patient_name, u.name as patient_user_name 
                                                            FROM appointments a 
                                                            LEFT JOIN users u ON a.user_id = u.id 
                                                            WHERE a.doctor_user_id = ? 
                                                            ORDER BY a.appointment_date DESC");
                                        $stmt->execute([$doctor_id]);
                                        $all_appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        
                                        if (!empty($all_appointments)):
                                            foreach ($all_appointments as $appointment):
                                        ?>
                                            <tr data-status="<?php echo $appointment['status']; ?>" data-appointment-id="<?php echo $appointment['id']; ?>">
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="../../assets/images/avatar1.jpg" alt="Avatar" class="rounded-circle me-2" width="32" height="32">
                                                        <div>
                                                            <div class="fw-medium">
                                                                <?php 
                                                                if (!empty($appointment['patient_name'])) {
                                                                    echo htmlspecialchars($appointment['patient_name']);
                                                                } elseif (!empty($appointment['patient_user_name'])) {
                                                                    echo htmlspecialchars($appointment['patient_user_name']);
                                                                } else {
                                                                    // Trích xuất tên từ ghi chú nếu không có cột patient_name
                                                                    $note = $appointment['note'] ?? '';
                                                                    if (preg_match('/Tên: ([^\n]+)/', $note, $matches)) {
                                                                        echo htmlspecialchars($matches[1]);
                                                                    } else {
                                                                        echo 'Không có tên';
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="small text-muted">Bệnh nhân</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo date('d/m/Y', strtotime($appointment['appointment_date'])); ?></td>
                                                <td><?php echo date('H:i', strtotime($appointment['appointment_date'])); ?></td>
                                                <td>
                                                    <span class="badge bg-<?php 
                                                        echo $appointment['status'] == 'pending' ? 'warning' : 
                                                              ($appointment['status'] == 'confirmed' ? 'success' : 
                                                              ($appointment['status'] == 'completed' ? 'info' : 'danger')); 
                                                        ?> status-badge">
                                                        <?php 
                                                            echo $appointment['status'] == 'pending' ? 'Chờ xác nhận' : 
                                                                  ($appointment['status'] == 'confirmed' ? 'Đã xác nhận' : 
                                                                  ($appointment['status'] == 'completed' ? 'Đã hoàn thành' : 'Đã hủy')); 
                                                        ?>
                                                    </span>
                                                </td>
                                                <td><?php echo $appointment['note'] ? substr(htmlspecialchars($appointment['note']), 0, 30) . (strlen($appointment['note']) > 30 ? '...' : '') : 'Không có'; ?></td>
                                                <td>
                                                    <div class="d-flex gap-2 action-buttons">
                                                        <button class="btn btn-sm btn-primary" onclick="viewAppointment(<?php echo $appointment['id']; ?>)">
                                                            <i class="bi bi-eye"></i>
                                                        </button>
                                                        <?php if ($appointment['status'] == 'pending'): ?>
                                                        <button class="btn btn-sm btn-success" onclick="updateAppointmentStatus(<?php echo $appointment['id']; ?>, 'confirmed')">
                                                            <i class="bi bi-check-lg"></i>
                                                        </button>
                                                        <?php elseif ($appointment['status'] == 'confirmed'): ?>
                                                        <button class="btn btn-sm btn-info" onclick="updateAppointmentStatus(<?php echo $appointment['id']; ?>, 'completed')">
                                                            <i class="bi bi-clipboard-check"></i>
                                                        </button>
                                                        <?php endif; ?>
                                                        <?php if ($appointment['status'] != 'canceled' && $appointment['status'] != 'completed'): ?>
                                                        <button class="btn btn-sm btn-danger" onclick="cancelAppointment(<?php echo $appointment['id']; ?>)">
                                                            <i class="bi bi-x-lg"></i>
                                                        </button>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                            endforeach;
                                        else:
                                        ?>
                                            <tr>
                                                <td colspan="6" class="text-center py-3">Không có lịch hẹn nào</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Patients Section -->
                    <div id="patients-section" class="content-section">
                        <!-- Nội dung phần bệnh nhân sẽ được thêm vào sau -->
                        <div class="content-header d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">Danh sách bệnh nhân</h4>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <p class="text-muted">Nội dung về quản lý bệnh nhân sẽ được cập nhật sau.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Profile Section -->
                    <div id="profile-section" class="content-section">
                        <div class="content-header d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">Hồ sơ cá nhân</h4>
                            <button class="btn btn-primary" id="edit-profile-btn">
                                <i class="bi bi-pencil-square me-1"></i> Chỉnh sửa hồ sơ
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-body text-center">
                                        <div class="avatar-wrapper mb-3">
                                            <img id="profile-avatar" src="<?php echo !empty($doctor['avatar']) ? '../../'.htmlspecialchars($doctor['avatar']) : '../../assets/images/Doctors/gay.jpg'; ?>" 
                                                alt="Avatar" class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
                                            <div class="avatar-edit d-none">
                                                <label for="avatar-upload" class="btn btn-sm btn-primary position-absolute bottom-0 end-0 rounded-circle">
                                                    <i class="bi bi-camera"></i>
                                                </label>
                                                <input type="file" id="avatar-upload" class="d-none" accept="image/*">
                                            </div>
                                        </div>
                                        <h5 class="mb-1" id="profile-name"><?php echo htmlspecialchars($doctor['name'] ?? 'Chưa cập nhật'); ?></h5>
                                        <p class="text-muted" id="profile-specialty"><?php echo htmlspecialchars($doctor['specialty'] ?? 'Chưa cập nhật'); ?></p>
                                        <div class="d-flex justify-content-center mb-2">
                                            <button class="btn btn-outline-primary me-1" onclick="showSection('dashboard-section')">
                                                <i class="bi bi-house-door me-1"></i> Dashboard
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Thông tin liên hệ</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <p class="mb-0"><strong><i class="bi bi-envelope me-2"></i> Email:</strong></p>
                                            <p class="text-muted" id="profile-email"><?php echo htmlspecialchars($doctor['email'] ?? 'Chưa cập nhật'); ?></p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="mb-0"><strong><i class="bi bi-telephone me-2"></i> Điện thoại:</strong></p>
                                            <p class="text-muted" id="profile-phone"><?php echo htmlspecialchars($doctor['phone'] ?? 'Chưa cập nhật'); ?></p>
                                        </div>
                                        <div>
                                            <p class="mb-0"><strong><i class="bi bi-geo-alt me-2"></i> Địa chỉ:</strong></p>
                                            <p class="text-muted" id="profile-address"><?php echo htmlspecialchars($doctor['address'] ?? 'Chưa cập nhật'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-8">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Thông tin chi tiết</h5>
                                    </div>
                                    <div class="card-body">
                                        <!-- Profile View Mode -->
                                        <div id="profile-view-mode">
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <p class="mb-0"><strong>Họ và tên</strong></p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0"><?php echo htmlspecialchars($doctor['name'] ?? 'Chưa cập nhật'); ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <p class="mb-0"><strong>Email</strong></p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0"><?php echo htmlspecialchars($doctor['email'] ?? 'Chưa cập nhật'); ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <p class="mb-0"><strong>Điện thoại</strong></p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0"><?php echo htmlspecialchars($doctor['phone'] ?? 'Chưa cập nhật'); ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <p class="mb-0"><strong>Chuyên khoa</strong></p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0"><?php echo htmlspecialchars($doctor['specialty'] ?? 'Chưa cập nhật'); ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <p class="mb-0"><strong>Địa chỉ</strong></p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0"><?php echo htmlspecialchars($doctor['address'] ?? 'Chưa cập nhật'); ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0"><strong>Ngày tham gia</strong></p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0"><?php echo isset($doctor['created_at']) ? date('d/m/Y', strtotime($doctor['created_at'])) : 'Chưa cập nhật'; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Profile Edit Mode -->
                                        <div id="profile-edit-mode" class="d-none">
                                            <form id="profile-form" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="action" value="update_profile">
                                                
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Họ và tên</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($doctor['name'] ?? ''); ?>">
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($doctor['email'] ?? ''); ?>">
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Điện thoại</label>
                                                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($doctor['phone'] ?? ''); ?>">
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="specialty" class="form-label">Chuyên khoa</label>
                                                    <input type="text" class="form-control" id="specialty" name="specialty" value="<?php echo htmlspecialchars($doctor['specialty'] ?? ''); ?>">
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Địa chỉ</label>
                                                    <textarea class="form-control" id="address" name="address" rows="3"><?php echo htmlspecialchars($doctor['address'] ?? ''); ?></textarea>
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <label for="avatar" class="form-label">Avatar</label>
                                                    <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                                                    <small class="form-text text-muted">Chọn ảnh có kích thước tối đa 2MB. Định dạng cho phép: JPG, PNG, GIF.</small>
                                                </div>
                                                
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-secondary me-2" id="cancel-edit-btn">Hủy</button>
                                                    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Đổi mật khẩu</h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="password-form" method="post">
                                            <input type="hidden" name="action" value="change_password">
                                            
                                            <div class="mb-3">
                                                <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                                                <input type="password" class="form-control" id="current_password" name="current_password" required>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="new_password" class="form-label">Mật khẩu mới</label>
                                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="confirm_password" class="form-label">Xác nhận mật khẩu mới</label>
                                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                            </div>
                                            
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Thêm CSS cho content sections
    document.head.insertAdjacentHTML('beforeend', `
        <style>
            .content-section {
                display: none;
            }
            .content-section.active {
                display: block;
            }
            .avatar-wrapper {
                position: relative;
                width: 150px;
                height: 150px;
                margin: 0 auto;
            }
            .avatar-edit .btn {
                width: 40px;
                height: 40px;
                padding: 0;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .highlight-row {
                animation: highlight-animation 2s ease-in-out;
            }
            @keyframes highlight-animation {
                0% { background-color: rgba(255, 193, 7, 0.2); }
                100% { background-color: transparent; }
            }
        </style>
    `);
    
    // Helper functions for appointment status
    function getStatusColor(status) {
        return {
            'pending': 'warning',
            'confirmed': 'success',
            'completed': 'info',
            'canceled': 'danger',
            'cancelled': 'danger'  // Keep both for backward compatibility
        }[status] || 'secondary';
    }
    
    function getStatusText(status) {
        return {
            'pending': 'Chờ xác nhận',
            'confirmed': 'Đã xác nhận',
            'completed': 'Đã hoàn thành',
            'canceled': 'Đã hủy',
            'cancelled': 'Đã hủy'  // Keep both for backward compatibility
        }[status] || status;
    }
    
    function getActionButtons(id, status) {
        let buttons = `
            <button class="btn btn-sm btn-primary" onclick="viewAppointment(${id})">
                <i class="bi bi-eye"></i>
            </button>
        `;
        
        if (status === 'pending') {
            buttons += `
                <button class="btn btn-sm btn-success" onclick="updateAppointmentStatus(${id}, 'confirmed')">
                    <i class="bi bi-check-lg"></i>
                </button>
            `;
        } else if (status === 'confirmed') {
            buttons += `
                <button class="btn btn-sm btn-info" onclick="updateAppointmentStatus(${id}, 'completed')">
                    <i class="bi bi-clipboard-check"></i>
                </button>
            `;
        }
        
        if (status !== 'cancelled' && status !== 'completed') {
            buttons += `
                <button class="btn btn-sm btn-danger" onclick="updateAppointmentStatus(${id}, 'cancelled')">
                    <i class="bi bi-x-lg"></i>
                </button>
            `;
        }
        
        return buttons;
    }
    
    function cancelAppointment(id) {
        if (confirm('Bạn có chắc chắn muốn hủy lịch hẹn này?')) {
            updateAppointmentStatus(id, 'canceled');
        }
    }
    
    // Kiểm tra thông báo sau khi reload trang và highlight appointment nếu cần
    document.addEventListener('DOMContentLoaded', function() {
        // Check for URL parameter to identify which appointment was just updated
        const urlParams = new URLSearchParams(window.location.search);
        const updatedAppointmentId = urlParams.get('appointment_id');
        
        if (updatedAppointmentId) {
            // Find and highlight the row
            const row = document.querySelector(`tr[data-appointment-id="${updatedAppointmentId}"]`);
            if (row) {
                row.classList.add('highlight-row');
                
                // If this is a canceled appointment, check if the filter might be hiding it
                if (row.dataset.status === 'canceled') {
                    // Switch to the "all" filter to ensure it's visible
                    const filterSelect = document.getElementById('appointment-filter');
                    if (filterSelect && filterSelect.value !== 'all' && filterSelect.value !== 'canceled') {
                        filterSelect.value = 'all';
                        // Trigger the change event to apply the filter
                        filterSelect.dispatchEvent(new Event('change'));
                    }
                    
                    // Ensure appointments section is visible
                    showSection('appointments-section');
                    
                    // Scroll to the appointment
                    row.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }
            
            // Remove the parameter from URL to avoid highlighting on page refresh
            window.history.replaceState({}, document.title, window.location.pathname);
        }

        // Kiểm tra nếu có thông báo từ session storage
        if (sessionStorage.getItem('profile_updated') === 'true') {
            // Xóa thông báo từ session storage
            sessionStorage.removeItem('profile_updated');
            
            // Hiển thị thông báo thành công
            const alertDiv = document.createElement('div');
            alertDiv.className = 'alert alert-success alert-dismissible fade show';
            alertDiv.innerHTML = `
                <strong>Thành công!</strong> Thông tin cá nhân đã được cập nhật.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;
            
            // Thêm vào trang
            const headerElement = document.querySelector('.content-header');
            if (headerElement) {
                headerElement.after(alertDiv);
            } else {
                document.querySelector('.main-content').prepend(alertDiv);
            }
            
            // Tự động ẩn thông báo sau 5 giây
            setTimeout(() => {
                const bsAlert = new bootstrap.Alert(alertDiv);
                bsAlert.close();
            }, 5000);
            
            // Chuyển đến tab profile
            showSection('profile-section');
        }
        
        // Kiểm tra URL fragment
        if (window.location.hash === '#profile') {
            // Chuyển đến tab profile
            showSection('profile-section');
        }
    });

    function logout() {
        if (confirm('Bạn có chắc chắn muốn đăng xuất?')) {
            window.location.href = '../../controllers/auth/logout.php';
        }
    }

    function showSection(sectionId) {
        // Ẩn tất cả các section
        document.querySelectorAll('.content-section').forEach(section => {
            section.classList.remove('active');
        });
        
        // Hiển thị section được chọn
        document.getElementById(sectionId).classList.add('active');
        
        // Cập nhật active state cho sidebar
        document.querySelectorAll('.sidebar-item').forEach(item => {
            item.classList.remove('active');
        });
        
        // Tìm sidebar item tương ứng và set active
        let sectionMap = {
            'dashboard-section': 'dashboard',
            'appointments-section': 'appointments',
            'patients-section': 'patients',
            'profile-section': 'profile'
        };
        
        let menuItem = document.querySelector(`.sidebar-item[data-page="${sectionMap[sectionId]}"]`);
        if (menuItem) {
            menuItem.classList.add('active');
        }
    }

    // Profile chức năng xử lý
    document.getElementById('edit-profile-btn')?.addEventListener('click', function() {
        document.getElementById('profile-view-mode').classList.add('d-none');
        document.getElementById('profile-edit-mode').classList.remove('d-none');
        document.querySelector('.avatar-edit').classList.remove('d-none');
        this.classList.add('d-none');
    });

    document.getElementById('cancel-edit-btn')?.addEventListener('click', function() {
        document.getElementById('profile-view-mode').classList.remove('d-none');
        document.getElementById('profile-edit-mode').classList.add('d-none');
        document.querySelector('.avatar-edit').classList.add('d-none');
        document.getElementById('edit-profile-btn').classList.remove('d-none');
    });

    // Avatar preview
    document.getElementById('avatar-upload')?.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profile-avatar').src = e.target.result;
                
                // Cập nhật giá trị cho form chính
                const avatarInput = document.getElementById('avatar');
                if (avatarInput) {
                    // Sao chép file từ avatar-upload sang input avatar chính
                    const dt = new DataTransfer();
                    dt.items.add(new File([this.files[0]], this.files[0].name, {
                        type: this.files[0].type
                    }));
                    avatarInput.files = dt.files;
                }
            }.bind(this);
            reader.readAsDataURL(this.files[0]);
        }
    });

    // Xử lý form cập nhật profile
    document.getElementById('profile-form')?.addEventListener('submit', function(e) {
        // Cho phép form submit bình thường - không cần e.preventDefault()
        
        // Hiển thị thông báo đang xử lý
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang xử lý...';
        submitBtn.disabled = true;
        
        // Form sẽ tự động submit và trang sẽ reload
    });

    // Đảm bảo form password cũng được xử lý truyền thống
    document.getElementById('password-form')?.addEventListener('submit', function(e) {
        // Kiểm tra mật khẩu mới và xác nhận khớp nhau
        const newPassword = this.querySelector('[name="new_password"]').value;
        const confirmPassword = this.querySelector('[name="confirm_password"]').value;
        
        if (newPassword !== confirmPassword) {
            e.preventDefault();
            alert('Mật khẩu mới và xác nhận mật khẩu không khớp!');
            return false;
        }
        
        // Cho phép form submit bình thường
        const submitBtn = this.querySelector('button[type="submit"]');
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang xử lý...';
        submitBtn.disabled = true;
    });

    function showAddAppointment() {
        // Tạo modal động
        const modal = document.createElement('div');
        modal.className = 'modal fade';
        modal.id = 'addAppointmentModal';
        modal.innerHTML = `
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm Lịch Hẹn Mới</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="appointmentForm">
                            <input type="hidden" name="action" value="add_appointment">
                            <div class="mb-3">
                                <label class="form-label">Bệnh nhân</label>
                                <select class="form-select" name="patient_id" required>
                                    <option value="">Chọn bệnh nhân...</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ngày khám</label>
                                <input type="date" class="form-control" name="date" required min="${new Date().toISOString().split('T')[0]}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Giờ khám</label>
                                <input type="time" class="form-control" name="time" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ghi chú</label>
                                <textarea class="form-control" name="notes" rows="3"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-primary" onclick="submitAppointment()">Thêm lịch hẹn</button>
                    </div>
                </div>
            </div>
        `;
        
        document.body.appendChild(modal);
        
        // Lấy danh sách bệnh nhân
        fetch('../../controllers/user/get_patients.php')
            .then(response => response.json())
            .then(data => {
                const select = modal.querySelector('select[name="patient_id"]');
                data.forEach(patient => {
                    const option = document.createElement('option');
                    option.value = patient.id;
                    option.textContent = patient.name;
                    select.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
        
        // Hiển thị modal
        const modalInstance = new bootstrap.Modal(modal);
        modalInstance.show();
        
        // Xóa modal khi đóng
        modal.addEventListener('hidden.bs.modal', function () {
            document.body.removeChild(modal);
        });
    }

    function submitAppointment() {
        const form = document.getElementById('appointmentForm');
        const formData = new FormData(form);
        
        fetch(window.location.href, {
            method: 'POST',
            body: formData,
            credentials: 'same-origin'
        })
        .then(response => {
            location.reload(); // Tải lại trang để cập nhật danh sách và hiển thị thông báo
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi xảy ra khi thêm lịch hẹn!');
        });
    }

    function viewAppointment(id) {
        // Tạo modal với chỉ báo đang tải
        const modal = document.createElement('div');
        modal.className = 'modal fade';
        modal.id = 'viewAppointmentModal';
        modal.innerHTML = `
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Chi Tiết Lịch Hẹn</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Đang tải...</span>
                            </div>
                            <p class="ms-2">Đang tải thông tin lịch hẹn...</p>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        // Thêm modal vào body
        document.body.appendChild(modal);
        
        // Hiển thị modal
        const modalInstance = new bootstrap.Modal(modal);
        modalInstance.show();
        
        // Tạo URL để lấy thông tin chi tiết lịch hẹn
        const apiUrl = `/controllers/appointment/appointment_actions.php?appointment_id=${id}`;
        
        // Gửi request để lấy thông tin chi tiết
        fetch(apiUrl)
            .then(response => {
                // Kiểm tra response có phải JSON không
                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                    throw new Error(`Response không phải JSON: ${contentType}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Dữ liệu nhận được:', data);
                
                // Nếu lấy dữ liệu thành công
                if (data.success && data.data) {
                    const appointment = data.data;
                    
                    // Định dạng ngày và giờ
                    let formattedDate = '';
                    let formattedTime = '';
                    
                    if (appointment.formatted_date) {
                        formattedDate = appointment.formatted_date;
                    } else if (appointment.appointment_date) {
                        const date = new Date(appointment.appointment_date);
                        formattedDate = date.toLocaleDateString('vi-VN');
                    }
                    
                    if (appointment.formatted_time) {
                        formattedTime = appointment.formatted_time;
                    } else if (appointment.appointment_date) {
                        const date = new Date(appointment.appointment_date);
                        formattedTime = date.toLocaleTimeString('vi-VN');
                    }
                    
                    // Xử lý thông tin bệnh nhân từ note
                    const patientInfo = {};
                    if (appointment.note) {
                        const noteLines = appointment.note.split('\n');
                        noteLines.forEach(line => {
                            const parts = line.split(': ');
                            if (parts.length >= 2) {
                                const key = parts[0].trim();
                                const value = parts.slice(1).join(': ').trim();
                                patientInfo[key] = value;
                            }
                        });
                    }
                    
                    // Cập nhật nội dung modal
                    modal.querySelector('.modal-body').innerHTML = `
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="text-primary mb-3">Thông tin bệnh nhân</h6>
                                <div class="mb-2">
                                    <strong>Họ tên:</strong> ${appointment.patient_name || patientInfo['Tên'] || 'Không có thông tin'}
                                </div>
                                <div class="mb-2">
                                    <strong>Giới tính:</strong> ${patientInfo['Giới tính'] || 'Không có thông tin'}
                                </div>
                                <div class="mb-2">
                                    <strong>Năm sinh:</strong> ${patientInfo['Năm sinh'] || 'Không có thông tin'}
                                </div>
                                <div class="mb-2">
                                    <strong>Số điện thoại:</strong> ${patientInfo['Điện thoại'] || 'Không có thông tin'}
                                </div>
                                <div class="mb-2">
                                    <strong>Email:</strong> ${patientInfo['Email'] || 'Không có thông tin'}
                                </div>
                                <div class="mb-2">
                                    <strong>Địa chỉ:</strong> ${patientInfo['Địa chỉ'] || 'Không có thông tin'}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-primary mb-3">Thông tin lịch hẹn</h6>
                                <div class="mb-2">
                                    <strong>Ngày khám:</strong> ${formattedDate}
                                </div>
                                <div class="mb-2">
                                    <strong>Giờ khám:</strong> ${formattedTime}
                                </div>
                                <div class="mb-2">
                                    <strong>Trạng thái:</strong> 
                                    <span class="badge bg-${getStatusColor(appointment.status)}">
                                        ${getStatusText(appointment.status)}
                                    </span>
                                </div>
                                <div class="mb-2">
                                    <strong>Lý do khám:</strong>
                                    <p class="mt-2">${patientInfo['Lý do khám'] || 'Không có thông tin'}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    // Thêm các nút thao tác dựa vào trạng thái
                    const footerContent = `
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        ${appointment.status === 'pending' ? `
                            <button type="button" class="btn btn-success" onclick="updateAppointmentStatus(${appointment.id}, 'confirmed')">
                                Xác nhận lịch hẹn
                            </button>
                        ` : ''}
                        ${appointment.status === 'confirmed' ? `
                            <button type="button" class="btn btn-info" onclick="updateAppointmentStatus(${appointment.id}, 'completed')">
                                Hoàn thành khám
                            </button>
                        ` : ''}
                        ${(appointment.status === 'pending' || appointment.status === 'confirmed') ? `
                            <button type="button" class="btn btn-danger" onclick="cancelAppointment(${appointment.id})">
                                Hủy lịch hẹn
                            </button>
                        ` : ''}
                    `;
                    
                    const modalFooter = document.createElement('div');
                    modalFooter.className = 'modal-footer';
                    modalFooter.innerHTML = footerContent;
                    
                    modal.querySelector('.modal-content').appendChild(modalFooter);
                } else {
                    // Hiển thị thông báo lỗi nếu không lấy được dữ liệu
                    modal.querySelector('.modal-body').innerHTML = `
                        <div class="alert alert-danger">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            Không thể tải thông tin lịch hẹn. ${data.message || ''}
                        </div>
                    `;
                }
            })
            .catch(error => {
                console.error('Lỗi khi lấy thông tin lịch hẹn:', error);
                
                // Hiển thị thông báo lỗi trong modal
                modal.querySelector('.modal-body').innerHTML = `
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        Đã xảy ra lỗi: ${error.message}
                    </div>
                `;
            });
        
        // Xóa modal khi đóng
        modal.addEventListener('hidden.bs.modal', function () {
            document.body.removeChild(modal);
        });
    }

    function updateAppointmentStatus(id, status) {
        // Normalize to 'canceled' if status is 'cancelled'
        if (status === 'cancelled') {
            status = 'canceled';
        }
        
        const statusText = {
            'confirmed': 'xác nhận',
            'completed': 'hoàn thành',
            'canceled': 'hủy'
        }[status] || 'cập nhật';

        if (!confirm(`Bạn có chắc chắn muốn ${statusText} lịch hẹn này?`)) {
            return;
        }

        // Tạo form submit thay vì sử dụng fetch API
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/controllers/appointment/process_status_update.php';
        form.style.display = 'none';

        // Thêm input cho appointment_id
        const idInput = document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'appointment_id';
        idInput.value = id;
        form.appendChild(idInput);

        // Thêm input cho status
        const statusInput = document.createElement('input');
        statusInput.type = 'hidden';
        statusInput.name = 'status';
        statusInput.value = status;
        form.appendChild(statusInput);

        // Thêm input cho return_url
        const returnUrlInput = document.createElement('input');
        returnUrlInput.type = 'hidden';
        returnUrlInput.name = 'return_url';
        returnUrlInput.value = window.location.href;
        form.appendChild(returnUrlInput);

        // Thêm form vào body và submit
        document.body.appendChild(form);
        form.submit();

        // Hiển thị loading
        const loadingEl = document.createElement('div');
        loadingEl.style.cssText = 'position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.3); z-index: 9999; display: flex; align-items: center; justify-content: center;';
        loadingEl.innerHTML = `
            <div style="background: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); text-align: center;">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Đang xử lý...</span>
                </div>
                <p class="mt-2 mb-0">Đang ${statusText} lịch hẹn...</p>
            </div>
        `;
        document.body.appendChild(loadingEl);
    }

    // Bộ lọc lịch hẹn
    document.getElementById('appointment-filter')?.addEventListener('change', function() {
        const value = this.value;
        const rows = document.querySelectorAll('#appointments-table tbody tr');
        
        rows.forEach(row => {
            if (value === 'all' || row.dataset.status === value) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Thêm sự kiện cho các mục menu
    document.querySelectorAll('.sidebar-item').forEach(item => {
        item.addEventListener('click', function() {
            const page = this.dataset.page;
            
            // Xử lý hiển thị section tương ứng
            switch(page) {
                case 'dashboard':
                    showSection('dashboard-section');
                    break;
                case 'appointments':
                    showSection('appointments-section');
                    break;
                case 'patients':
                    showSection('patients-section');
                    break;
                case 'profile':
                    showSection('profile-section');
                    break;
                default:
                    // Các chức năng khác sẽ được xử lý sau
                    alert('Chức năng này đang được phát triển!');
            }
        });
    });
    </script>
</body>
</html> 