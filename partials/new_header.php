<?php
session_start();

// Các hàm phụ để xử lý hiển thị đường dẫn
function isActiveMenu($pageName) {
    $currentPage = basename($_SERVER['PHP_SELF']); 
    return ($currentPage == $pageName) ? 'active' : '';
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- SEO Meta Tags -->
    <meta name="description" content="DoctorHub - Đặt lịch khám bệnh và tư vấn sức khỏe trực tuyến. Tiết kiệm thời gian, chăm sóc sức khỏe mọi lúc, mọi nơi." />
    <meta name="keywords" content="đặt lịch khám, tư vấn sức khỏe, khám bệnh trực tuyến, chăm sóc sức khỏe, đặt lịch bác sĩ" />
    <meta name="robots" content="index, follow" />
    
    <!-- Open Graph Meta Tags for Social Media -->
    <meta property="og:title" content="DoctorHub - Đặt lịch khám và tư vấn sức khỏe" />
    <meta property="og:description" content="DoctorHub giúp bạn dễ dàng đặt lịch khám bệnh và nhận tư vấn sức khỏe từ các bác sĩ uy tín." />
    <meta property="og:image" content="URL_of_image_for_social_sharing" />
    <meta property="og:url" content="https://www.doctorhub.com" />
    <meta property="og:type" content="website" />
    
    <!-- Title -->
    <title>DoctorHub - Đặt Lịch Khám và Tư Vấn Sức Khỏe</title>
    
    <!-- Favicon -->
    <link rel="icon" href="./assets/images/Logo/DoctorHub.png" type="image/x-icon" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    
    <!-- RemixIcon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" rel="stylesheet" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/base.css" />
    <link rel="stylesheet" href="./assets/css/responsive.css" />
    <link rel="stylesheet" href="./assets/css/animation.css" />
    
    <style>
    .user-profile {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    </style>
</head>

<body>
    <!-- Navbar -->
    <header class="header">
        <div class="container">
            <div class="topbar py-3 border-bottom bg-white">
                <div class="container d-flex justify-content-between align-items-center">
                    <div class="contact-info small text-muted d-flex">
                        <strong>Email:</strong>
                        <a href="mailto:vaniizit.work@gmail.com?subject=Yêu%20cầu%20được%20hỗ%20trợ%20từ%20website%20DoctorHub" class="topbar__mail">vaniizit.work@gmail.com</a>
                        |
                        <strong class="ms-1 d-none d-md-flex">Hotline:
                            <a href="tel:+84 252 032 375" class="text-decoration-none cart__home--phone text-dark fw-bold">+84 252 032 375</a>
                        </strong>
                    </div>
                    <div class="user-actions d-flex align-items-center gap-3">
                        <?php
                        // Check if user is logged in
                        if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
                            // User is logged in, show email and dropdown menu
                            echo '
                            <div class="user-profile">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="dropdownUser"
                                        data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-user me-1"></i>
                                        <span>' . htmlspecialchars($_SESSION['email']) . '</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/app/views/profile.php">Tài khoản</a></li>';
                                        
                            // Show different links based on user role
                            if (isset($_SESSION['role'])) {
                                if ($_SESSION['role'] === 'doctor') {
                                    echo '<li><a class="dropdown-item" href="/app/views/doctor_dashboard.php">Bảng điều khiển</a></li>';
                                } elseif ($_SESSION['role'] === 'admin') {
                                    echo '<li><a class="dropdown-item" href="/app/views/admin_dashboard.php">Quản trị</a></li>';
                                }
                            }
                            
                            echo '
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="/controllers/auth/logout.php">Đăng xuất</a></li>
                                    </ul>
                                </div>
                            </div>';
                        } else {
                            // User is not logged in, show login and register links
                            echo '
                            <a href="./app/views/signIn.php"
                                class="topbar__home--login text-dark small d-none d-md-block">Đăng
                                nhập</a>
                            <a href="./app/views/signUp.php"
                                class="topbar__home--register text-dark small d-none d-md-block">Đăng ký</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand navbar__link d-flex align-items-center" href="./index.php">
                    <img src="./assets/images/Logo/DoctorHub.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top img-fluid navbar__logo" />
                    DoctorHub
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: end">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item <?php echo isActiveMenu('index.php'); ?>">
                            <a class="nav-link" href="/index.php">Trang Chủ</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('book.php'); ?>">
                            <a class="nav-link" href="./app/views/book.php">Đặt Lịch Khám</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('consultation.php'); ?>">
                            <a class="nav-link" href="./app/views/consultation.php">Tư Vấn Sức Khỏe</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('services.php'); ?>">
                            <a class="nav-link" href="./app/views/services.php">Dịch Vụ Y Tế</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('contact.php'); ?>">
                            <a class="nav-link" href="./app/views/contact.php">Liên Hệ</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('blog.php'); ?>">
                            <a class="nav-link" href="./app/views/blog.php">Blog</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('shop.php'); ?>">
                            <a class="nav-link" href="./app/views/shop.php">Shop</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
</body>
</html> 