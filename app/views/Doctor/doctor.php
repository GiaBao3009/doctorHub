<?php
// Include initialization file
require_once '../../../config/init.php';
?>

<?php include '../../../partials/sidebar.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Information | DoctorHub</title>
    <link rel="icon" href="../../assets/images/Logo/DoctorHub.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/css/splide.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/base.css">    
    <link rel="stylesheet" href="../../../assets/css/responsive.css" />
    <link rel="stylesheet" href="../../../assets/css/animation.css" />
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
                            <a href="./signIn.php" class="topbar__home--login text-dark small d-none d-md-block">Đăng nhập</a>
                            <a href="./signUp.php" class="topbar__home--register text-dark small d-none d-md-block">Đăng ký</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand navbar__link d-flex align-items-center fw-bolder text-primary" href="../../index.php">
                    <img src="../../../assets/images/Logo/DoctorHub.png" alt="Logo" width="40px" height="40px" class="d-inline-block align-text-top me-2" style="border-radius: 50%;">
                    DoctorHub
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: end">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item <?php echo isActiveMenu('index.php'); ?>">
                            <a class="nav-link" href="../../../index.php">Trang Chủ</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('book.php'); ?>">
                            <a class="nav-link" href=".././appointment_form.php">Đặt Lịch Khám</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('consultation.php'); ?>">
                            <a class="nav-link" href=".././consultation.php
                            ">Tư Vấn Sức Khỏe</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('services.php'); ?>">
                            <a class="nav-link" href=".././services.php">Bài Test</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('contact.php'); ?>">
                            <a class="nav-link" href=".././contact.php">Liên Hệ</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('blog.php'); ?>">
                            <a class="nav-link" href=".././blog.php">Blog</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('shop.php'); ?>">
                            <a class="nav-link" href=".././shop.php">Shop</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <section class="visible py-5 featured-doctors border-bottom animate-on-scroll">
        <div class="container">
            <div class="col">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <h3 class="mb-2 text-center text-primary position-relative section-title-underline fw-bold text-capitalize">
                        Bác sĩ nổi bật
                    </h3>
                    <a href="./doctorList.php" class="px-4 d-none text-decoration-none btn rounded-pill fw-medium btn-more">Xem thêm</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="splide home-splide-cotor">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <!-- Bác sĩ 1 -->
                            <li class="splide__slide">
                                <a href="./doctorList.php?doctor_id=1" class="text-center doctor-card text-decoration-none">
                                    <div class="doctor-avatar">
                                        <img src="../../../assets/images/Doctors/032958-bac-si-da-lieu-hoang-hong-manh.jpg" alt="Bác sĩ Hoàng Hồng Mạnh" class="doctor-img" />
                                    </div>
                                    <div class="doctor-info">
                                        <h5 class="doctor-name">BS. Hoàng Hồng Mạnh</h5>
                                        <p class="doctor-department">Khoa da liễu</p>
                                        <span class="text-white btn btn-outline-primary btn-sm rounded-2 fw-bolder">Xem chi tiết</span>
                                    </div>
                                </a>
                            </li>
                            <!-- Bác sĩ 2 -->
                            <li class="splide__slide">
                                <a href="./doctorList.php?doctor_id=2" class="text-center doctor-card text-decoration-none">
                                    <div class="doctor-avatar">
                                        <img src="../../../assets/images/Doctors/045850-bac-si-da-lieu-hoai-thu.jpg" alt="Bác sĩ Hoài Thu" class="doctor-img" />
                                    </div>
                                    <div class="doctor-info">
                                        <h5 class="doctor-name">BS. Hoài Thu</h5>
                                        <p class="doctor-department">Khoa Nội tổng quát</p>
                                        <span class="text-white btn btn-outline-primary btn-sm rounded-2 fw-bolder">Xem chi tiết</span>
                                    </div>
                                </a>
                            </li>
                            <!-- Bác sĩ 3 -->
                            <li class="splide__slide">
                                <a href="./doctorList.php?doctor_id=3" class="text-center doctor-card text-decoration-none">
                                    <div class="doctor-avatar">
                                        <img src="../../../assets/images/Doctors/avatar-Huynh-Quoc-Hieu.jpg" alt="Bác sĩ Huỳnh Quốc Hiêu" class="doctor-img" />
                                    </div>
                                    <div class="doctor-info">
                                        <h5 class="doctor-name">BS. Huỳnh Quốc Hiêu</h5>
                                        <p class="doctor-department">Khoa Nội tổng quát</p>
                                        <span class="text-white btn btn-outline-primary btn-sm rounded-2 fw-bolder">Xem chi tiết</span>
                                    </div>
                                </a>
                            </li>
                            <!-- Bác sĩ 4 -->
                            <li class="splide__slide">
                                <a href="./doctorList.php?doctor_id=4" class="text-center doctor-card text-decoration-none">
                                    <div class="doctor-avatar">
                                        <img src="../../../assets/images/Doctors/avatar-TS.BS_.Chu-Trong-Hiep.webp" alt="Bác sĩ Chu Trọng Hiệp" class="doctor-img" />
                                    </div>
                                    <div class="doctor-info">
                                        <h5 class="doctor-name">BS. Chu Trọng Hiệp</h5>
                                        <p class="doctor-department">Khoa Nội tổng quát</p>
                                        <span class="text-white btn btn-outline-primary btn-sm rounded-2 fw-bolder">Xem chi tiết</span>
                                    </div>
                                </a>
                            </li>
                            <!-- Bác sĩ 5 -->
                            <li class="splide__slide">
                                <a href="./doctorList.php?doctor_id=5" class="text-center doctor-card text-decoration-none">
                                    <div class="doctor-avatar">
                                        <img src="../../../assets/images/Doctors/1536566238-bacsy.jpg" alt="Bác sĩ Lê Hoài Thương" class="doctor-img" />
                                    </div>
                                    <div class="doctor-info">
                                        <h5 class="doctor-name">BS. Lê Hoài Thương</h5>
                                        <p class="doctor-department">Khoa Nội tổng quát</p>
                                        <span class="text-white btn btn-outline-primary btn-sm rounded-2 fw-bolder">Xem chi tiết</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="module" src="../../services/handleQuestion.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/css/splide.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-JGLZOLoMCs5hQdIb2Rlp+vgbp7NjPR8tW3mv4TqRfj7sG04O1LYljX29lvH9acX7" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../../../services/handleCountDown.js" type="module"></script>
    <script src="../../../assets/javascript/main.js" type="module"></script>
    <script src="../../../services/handleModal.js"></script>
    <script src="../../../services/handleSlider.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.0/lazysizes.min.js" async=""></script>
</body>
</html>