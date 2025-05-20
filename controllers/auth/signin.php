<?php
// Bắt đầu phiên làm việc
session_start();

// Kiểm tra xem form đã được gửi chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Kiểm tra dữ liệu có hợp lệ không
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = 'Vui lòng nhập đầy đủ email và mật khẩu';
        header('Location: ../../app/views/signIn.php');
        exit;
    }

    // Kết nối database
    require_once '../../config/database.php';
    $database = new Database();
    $db = $database->getConnection();

    // Kiểm tra thông tin đăng nhập
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Đăng nhập thành công - lưu thông tin vào session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        // Chuyển hướng tùy theo vai trò
        if ($user['role'] === 'doctor') {
            header('Location: ../../app/views/doctor_dashboard.php');
        } elseif ($user['role'] === 'admin') {
            header('Location: ../../app/views/admin_dashboard.php');
        } else {
            // Người dùng thông thường
            header('Location: ../../index.php');
        }
        exit;
    } else {
        // Đăng nhập thất bại
        $_SESSION['error'] = 'Email hoặc mật khẩu không chính xác';
        header('Location: ../../app/views/signIn.php');
        exit;
    }
} else {
    // Nếu không phải là POST request, chuyển hướng về trang đăng nhập
    header('Location: ../../app/views/signIn.php');
    exit;
}
?> 