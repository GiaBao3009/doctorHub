<?php
// Bắt đầu phiên làm việc
session_start();

// Xóa tất cả các biến session
$_SESSION = array();

// Nếu sử dụng cookie session, xóa cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// Hủy phiên làm việc
session_destroy();

// Chuyển hướng về trang đăng nhập
header('Location: ../../app/views/signIn.php');
exit;
?> 