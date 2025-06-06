<?php
// Note: No session_start() here, it should be in init.php
// Do not output anything before this point
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoctorHub - Đặt Lịch Khám và Tư Vấn Sức Khỏe</title>
    
    <!-- Favicon -->
    <link rel="icon" href="./assets/images/Logo/DoctorHub.png" type="image/x-icon">
    
    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/css/animation.css">
    
    <style>
    .user-profile {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <!-- Top Bar -->
            <div class="topbar py-3 border-bottom bg-white">
                <div class="container d-flex justify-content-between align-items-center">
                    <!-- Contact Info -->
                    <div class="contact-info small text-muted d-flex">
                        <strong>Email:</strong>
                        <a href="mailto:vaniizit.work@gmail.com" class="topbar__mail text-primary">doctorhub.work@gmail.com</a>
                        |
                        <strong class="ms-1 d-none d-md-flex">
                            Hotline: <a href="tel:+84252032375" class="text-decoration-none text-dark fw-bold">+84 252 032 375</a>
                        </strong>
                    </div>
                    
                    <!-- User Actions -->
                    <div class="user-actions d-flex align-items-center gap-3">
                        <?php if (isLoggedIn()): ?>
                            <?php $user = getCurrentUser(); ?>
                            <div class="user-profile">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="dropdownUser" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-user me-1"></i>
                                        <span><?php echo htmlspecialchars($user['email']); ?></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/app/views/profile.php">Tài khoản</a></li>
                                        
                                        <?php if ($user['role'] === 'doctor'): ?>
                                            <li><a class="dropdown-item" href="/app/views/doctor_dashboard.php">Bảng điều khiển</a></li>
                                        <?php elseif ($user['role'] === 'admin'): ?>
                                            <li><a class="dropdown-item" href="/app/views/admin_dashboard.php">Quản trị</a></li>
                                        <?php endif; ?>
                                        
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="/controllers/auth/logout.php">Đăng xuất</a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php else: ?>
                            <a href="./app/views/signIn.php" class="topbar__home--login text-dark small d-none d-md-block">Đăng nhập</a>
                            <a href="./app/views/signUp.php" class="topbar__home--register text-dark small d-none d-md-block">Đăng ký</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand navbar__link d-flex align-items-center fw-bolder text-primary" href="./index.php">
                    <img src="./assets/images/Logo/DoctorHub.png" alt="Logo" width="40px" height="40px" class="d-inline-block align-text-top me-2" style="border-radius: 50%;">
                    DoctorHub
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: end">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item <?php echo isActiveMenu('index.php'); ?>">
                            <a class="nav-link" href="/index.php">Trang Chủ</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('book.php'); ?>">
                            <a class="nav-link" href="./app/views/appointment_form.php">Đặt Lịch Khám</a>
                        </li>
                        
                        <li class="nav-item <?php echo isActiveMenu('services.php'); ?>">
                            <a class="nav-link" href="./app/views/services.php">Dịch Vụ Y Tế</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('contact.php'); ?>">
                            <a class="nav-link" href="./app/views/contact.php">Liên Hệ</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('blog.php'); ?>">
                            <a class="nav-link" href="./app/views/blog.php">Tin Tức</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('shop.php'); ?>">
                            <a class="nav-link" href="./app/views/shop.php">Cửa Hàng</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</body>
</html> 