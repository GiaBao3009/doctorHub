<?php
// File này cần được include ở đầu mỗi trang trước bất kỳ output nào
session_start();

// Các hàm tiện ích chung
function isActiveMenu($pageName) {
    $currentPage = basename($_SERVER['PHP_SELF']);
    return ($currentPage == $pageName) ? 'active' : '';
}

// Kiểm tra xem người dùng đã đăng nhập chưa
function isLoggedIn() {
    return isset($_SESSION['user_id']) && isset($_SESSION['email']);
}

// Lấy thông tin người dùng đăng nhập
function getCurrentUser() {
    if (isLoggedIn()) {
        return [
            'id' => $_SESSION['user_id'],
            'email' => $_SESSION['email'],
            'name' => $_SESSION['name'] ?? '',
            'role' => $_SESSION['role'] ?? 'user'
        ];
    }
    return null;
}
?> 