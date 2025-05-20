<?php
    // Include the initialization file
    require_once '../../config/init.php';
?>


<!-- $image_base_path = "assets/images/Shop/Medical/"; -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- *SEO Meta Tags* -->
    <meta name="description"
        content="DoctorHub - Đặt lịch khám bệnh và tư vấn sức khỏe trực tuyến. Tiết kiệm thời gian, chăm sóc sức khỏe mọi lúc, mọi nơi." />
    <meta name="keywords"
        content="đặt lịch khám, tư vấn sức khỏe, khám bệnh trực tuyến, chăm sóc sức khỏe, đặt lịch bác sĩ" />
    <meta name="robots" content="index, follow" />
    <!-- *Open Graph Meta Tags for Social Media* -->
    <meta property="og:title" content="DoctorHub - Đặt lịch khám và tư vấn sức khỏe" />
    <meta property="og:description"
        content="DoctorHub giúp bạn dễ dàng đặt lịch khám bệnh và nhận tư vấn sức khỏe từ các bác sĩ uy tín." />
    <meta property="og:image" content="URL_of_image_for_social_sharing" />
    <meta property="og:url" content="https://www.doctorhub.com" />
    <meta property="og:type" content="website" />
    <!-- *Twitter Card Meta Tags* -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="DoctorHub - Đặt lịch khám và tư vấn sức khỏe" />
    <meta name="twitter:description"
        content="Đặt lịch khám bệnh và tư vấn sức khỏe trực tuyến với DoctorHub, giúp bạn chăm sóc sức khỏe dễ dàng và hiệu quả." />
    <meta name="twitter:image" content="URL_of_image_for_twitter_card" />
    <!-- *Title* -->
    <title>DoctorHub - Đặt Lịch Khám và Tư Vấn Sức Khỏe</title>
    <!-- *Favicon* -->
    <link rel="icon" href="../../assets/images/Logo/DoctorHub.png" type="image/x-icon" />
    <!-- *Liên kết Bootstrap CSS* -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- *Liên kết RemixIcon* -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" rel="stylesheet" />
    <!-- *Splide CSS* -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js" />
    <!-- *Fontawesome* -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <!-- *RemixIcon* -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" />
    <!-- *LazySizes* -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" />

    <!-- *Stylesheets* -->
    <link rel="stylesheet" href="../../assets/css/base.css" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/responsive.css" />
    <link rel="stylesheet" href="../../assets/css/animation.css" />
    <!-- *Mobile Optimization* -->
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="theme-color" content="#0d6efd" />
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
                    <img src="../../assets/images/Logo/DoctorHub.png" alt="Logo" width="40px" height="40px" class="d-inline-block align-text-top me-2" style="border-radius: 50%;">
                    DoctorHub
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: end">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item                                            <?php echo isActiveMenu('index.php'); ?>">
                            <a class="nav-link" href="../../index.php">Trang Chủ</a>
                        </li>
                        <li class="nav-item                                            <?php echo isActiveMenu('book.php'); ?>">
                            <a class="nav-link" href="./appointment_form.php">Đặt Lịch Khám</a>
                        </li>
                      
                        <li class="nav-item                                            <?php echo isActiveMenu('services.php'); ?>">
                            <a class="nav-link" href="./app/views/services.php">Bài Test</a>
                        </li>
                        <li class="nav-item                                            <?php echo isActiveMenu('contact.php'); ?>">
                            <a class="nav-link" href="./contact.php">Liên Hệ</a>
                        </li>
                        <li class="nav-item                                            <?php echo isActiveMenu('blog.php'); ?>">
                            <a class="nav-link" href="./blog.php">Tin Tức</a>
                        </li>
                        <li class="nav-item                                            <?php echo isActiveMenu('shop.php'); ?>">
                            <a class="nav-link" href="./shop.php">Cửa Hàng</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- *Shop-Banner* -->
    <section class="container visible py-5 banner-container border-bottom animate-on-scroll">
        <div class="row align-items-center">
            <div class="col-md-8 me-0">
                <div class="splide splide-shop" aria-label="Banner chính">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <img data-src="../../assets/images/Banner/bannerShop.avif" alt="Banner 1" style="height: unset;"
                                    class="img-fluid rounded-2 lazyload" />
                            </li>

                            <li class="splide__slide">
                                <img data-src="../../assets/images/Banner/bannerShop02.avif" alt="Banner 2"
                                    class="img-fluid rounded-2 lazyload" />
                            </li>

                            <li class="splide__slide">
                                <img data-src="../../assets/images/Banner/bannerShop03.avif" alt="Banner 3"
                                    class="img-fluid rounded-2 lazyload" />
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="gap-2 col-md-4 d-flex flex-column d-none d-md-flex">
                <img data-src="../../assets/images/Banner/bannerShop-sm-01.avif" alt="Banner nhỏ 1"
                    class="img-fluid static-banner rounded-2 lazyload" />

                <img data-src="../../assets/images/Banner/bannerShop-sm-02.avif" alt="Banner nhỏ 2"
                    class="img-fluid static-banner rounded-2 lazyload" />
            </div>
        </div>
    </section>

    <!-- *Shop-Category* -->
    <section class="visible py-5 shop-sale border-bottom animate-on-scroll">
        <div class="container">
            <div class="row g-4">
                <div class="col">
                    <div class="sale-wrap d-flex justify-content-between align-items-center">
                        <div class="ms-3 d-flex align-items-center">
                            <img data-src="../../assets/images/Banner/deal.avif" alt="" class="img-fluid lazyload" />
                            <span class="countdown ms-2 d-none d-md-flex align-items-md-center">
                                <span class="countdown-box" id="hours">00</span>
                                <span class="text-white fw-bold">:</span>
                                <span class="countdown-box" id="minutes">00</span>
                                <span class="text-white fw-bold">:</span>
                                <span class="countdown-box" id="seconds">00</span>
                            </span>
                        </div>
                        <a href="#"
                            class="text-white g-1 align-items-center text-decoration-none me-3 d-none d-md-flex">
                            <span class="text-white me-1">Xem thêm</span><i
                                class="text-white fa-solid fa-arrow-right text-decoration-none"></i></a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="splide splide-medical">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <!-- *Item 01* -->
                                    <li class="splide__slide">
                                        <div class="overflow-hidden card">
                                            <div class="card-img position-relative card__img w-100">
                                                <img data-src="../../assets/images/Shop/Medical/medical01.avif" alt=""
                                                    class="img-fluid lazyload w-100" />
                                                <div class="card__wrap">
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-heart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-shopping-cart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-eye-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                    30%</span>
                                                <h5 class="card-title text-truncate--ellipse">
                                                    Kem Chống Nắng Make p:rem Vật Lý Kiềm Dầu Khô Ráo Uv
                                                    Defense Me. No Sebum (Tuýp 50ml)
                                                </h5>
                                                <p class="card-price d-flex flex-column">
                                                    <span
                                                        class="opacity-50 card-price--old text-decoration-line-through text-primary">480.000đ</span>
                                                    <span
                                                        class="card-price--new fw-semibold text-primary">297.000đ</span>
                                                </p>
                                                <div class="mb-2 progress" role="progressbar"
                                                    aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                        Đang bán chạy
                                                    </div>
                                                </div>

                                                <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                    href="/pages/detailMedicines.html?id=">
                                                    <div class="default-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle r="3" cy="12" cx="12"></circle>
                                                        </svg>
                                                        <span>Quick View</span>
                                                    </div>
                                                    <div class="hover-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                            <circle r="1" cy="21" cx="9"></circle>
                                                            <circle r="1" cy="21" cx="20"></circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg>
                                                        <span>Shop Now</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- *Item 02* -->
                                    <li class="splide__slide">
                                        <div class="overflow-hidden card">
                                            <div class="card-img position-relative card__img w-100">
                                                <img data-src="../../assets/images/Shop/Medical/medical02.avif" alt=""
                                                    class="img-fluid lazyload w-100" />
                                                <div class="card__wrap">
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-heart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-shopping-cart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-eye-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                    10%</span>
                                                <h5 class="card-title text-truncate--ellipse">
                                                    Nước uống collagen Elasten 2500mg hỗ trợ làm giảm
                                                    lão hoá da, giúp tăng độ đàn hồi và giữ độ ẩm cho da
                                                    (Hộp 28 ống x 25ml)
                                                </h5>
                                                <p class="card-price d-flex flex-column">
                                                    <span
                                                        class="opacity-50 card-price--old text-decoration-line-through text-primary">2.500.000đ</span>
                                                    <span
                                                        class="card-price--new fw-semibold text-primary">2.000.000đ</span>
                                                </p>
                                                <div class="mb-2 progress" role="progressbar"
                                                    aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                        Đang bán chạy
                                                    </div>
                                                </div>

                                                <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                    href="/pages/detailMedicines.html?id=">
                                                    <div class="default-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle r="3" cy="12" cx="12"></circle>
                                                        </svg>
                                                        <span>Quick View</span>
                                                    </div>
                                                    <div class="hover-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                            <circle r="1" cy="21" cx="9"></circle>
                                                            <circle r="1" cy="21" cx="20"></circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg>
                                                        <span>Shop Now</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- *Item 03* -->
                                    <li class="splide__slide">
                                        <div class="overflow-hidden card">
                                            <div class="card-img position-relative card__img w-100">
                                                <img data-src="../../assets/images/Shop/Medical/medical03.avif" alt=""
                                                    class="img-fluid lazyload w-100" />
                                                <div class="card__wrap">
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-heart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-shopping-cart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-eye-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                    30%</span>
                                                <h5 class="card-title text-truncate--ellipse">
                                                    Gel Actidem Derma Gel hỗ trợ ngăn ngừa mụn, làm mờ
                                                    vết thâm (40g)
                                                </h5>
                                                <p class="card-price d-flex flex-column">
                                                    <span
                                                        class="opacity-50 card-price--old text-decoration-line-through text-primary">380.000đ</span>
                                                    <span
                                                        class="card-price--new fw-semibold text-primary">297.000đ</span>
                                                </p>
                                                <div class="mb-2 progress" role="progressbar"
                                                    aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                        Đang bán chạy
                                                    </div>
                                                </div>

                                                <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                    href="/pages/detailMedicines.html?id=">
                                                    <div class="default-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle r="3" cy="12" cx="12"></circle>
                                                        </svg>
                                                        <span>Quick View</span>
                                                    </div>
                                                    <div class="hover-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                            <circle r="1" cy="21" cx="9"></circle>
                                                            <circle r="1" cy="21" cx="20"></circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg>
                                                        <span>Shop Now</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- *Item 04* -->
                                    <li class="splide__slide">
                                        <div class="overflow-hidden card">
                                            <div class="card-img position-relative card__img w-100">
                                                <img data-src="../../assets/images/Shop/Medical/medical04.avif" alt=""
                                                    class="img-fluid lazyload w-100" />
                                                <div class="card__wrap">
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-heart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-shopping-cart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-eye-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                    30%</span>
                                                <h5 class="card-title text-truncate--ellipse">
                                                    Tinh dầu hoa anh thảo Blackmores Evening Primrose
                                                    Oil hỗ trợ nội tiết tố nữ (Chai 190 viên)
                                                </h5>
                                                <p class="card-price d-flex flex-column">
                                                    <span
                                                        class="opacity-50 card-price--old text-decoration-line-through text-primary">980.000đ</span>
                                                    <span
                                                        class="card-price--new fw-semibold text-primary">679.000đ</span>
                                                </p>
                                                <div class="mb-2 progress" role="progressbar"
                                                    aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                        Đang bán chạy
                                                    </div>
                                                </div>

                                                <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                    href="/pages/detailMedicines.html?id=">
                                                    <div class="default-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle r="3" cy="12" cx="12"></circle>
                                                        </svg>
                                                        <span>Quick View</span>
                                                    </div>
                                                    <div class="hover-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                            <circle r="1" cy="21" cx="9"></circle>
                                                            <circle r="1" cy="21" cx="20"></circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg>
                                                        <span>Shop Now</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- *Item 05* -->
                                    <li class="splide__slide">
                                        <div class="overflow-hidden card">
                                            <div class="card-img position-relative card__img w-100">
                                                <img data-src="../../assets/images/Shop/Medical/medical05.avif" alt=""
                                                    class="img-fluid lazyload w-100" />
                                                <div class="card__wrap">
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-heart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-shopping-cart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-eye-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                    30%</span>
                                                <h5 class="card-title text-truncate--ellipse">
                                                    Viên uống Nature Gift Fish Oil Omega 369 hỗ trợ bổ
                                                    não, mắt và tim (Hộp 100 viên)
                                                </h5>
                                                <p class="card-price d-flex flex-column">
                                                    <span
                                                        class="opacity-50 card-price--old text-decoration-line-through text-primary">425.000đ</span>
                                                    <span
                                                        class="card-price--new fw-semibold text-primary">297.000đ</span>
                                                </p>
                                                <div class="mb-2 progress" role="progressbar"
                                                    aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                        Đang bán chạy
                                                    </div>
                                                </div>

                                                <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                    href="/pages/detailMedicines.html?id=">
                                                    <div class="default-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle r="3" cy="12" cx="12"></circle>
                                                        </svg>
                                                        <span>Quick View</span>
                                                    </div>
                                                    <div class="hover-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                            <circle r="1" cy="21" cx="9"></circle>
                                                            <circle r="1" cy="21" cx="20"></circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg>
                                                        <span>Shop Now</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- *Item 06* -->
                                    <li class="splide__slide">
                                        <div class="overflow-hidden card">
                                            <div class="card-img position-relative card__img w-100">
                                                <img data-src="../../assets/images/Shop/Medical/medical06.avif" alt=""
                                                    class="img-fluid lazyload w-100" />
                                                <div class="card__wrap">
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-heart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-shopping-cart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-eye-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                    30%</span>
                                                <h5 class="card-title text-truncate--ellipse">
                                                    Kem dưỡng siêu cấp ẩm căng mịn da L'oreal Revitalift
                                                    Hyaluronic Acid Plumping Cream Day (Hộp 50ml)
                                                </h5>
                                                <p class="card-price d-flex flex-column">
                                                    <span
                                                        class="opacity-50 card-price--old text-decoration-line-through text-primary">399.000đ</span>
                                                    <span
                                                        class="card-price--new fw-semibold text-primary">281.000đ</span>
                                                </p>
                                                <div class="mb-2 progress" role="progressbar"
                                                    aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                        Đang bán chạy
                                                    </div>
                                                </div>

                                                <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                    href="/pages/detailMedicines.html?id=">
                                                    <div class="default-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle r="3" cy="12" cx="12"></circle>
                                                        </svg>
                                                        <span>Quick View</span>
                                                    </div>
                                                    <div class="hover-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                            <circle r="1" cy="21" cx="9"></circle>
                                                            <circle r="1" cy="21" cx="20"></circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg>
                                                        <span>Shop Now</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- *Item 07* -->
                                    <li class="splide__slide">
                                        <div class="overflow-hidden card">
                                            <div class="card-img position-relative card__img w-100">
                                                <img data-src="../../assets/images/Shop/Medical/medical07.avif" alt=""
                                                    class="img-fluid lazyload w-100" />
                                                <div class="card__wrap">
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-heart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-shopping-cart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-eye-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                    30%</span>
                                                <h5 class="card-title text-truncate--ellipse">
                                                    Nước Uống Hồng Sâm Đông Trùng Hạ Thảo Hàn Quốc -
                                                    Welson Cordyceps Gold (Hộp 10 chai)
                                                </h5>
                                                <p class="card-price d-flex flex-column">
                                                    <span
                                                        class="opacity-50 card-price--old text-decoration-line-through text-primary">780.000đ</span>
                                                    <span
                                                        class="card-price--new fw-semibold text-primary">395.000đ</span>
                                                </p>
                                                <div class="mb-2 progress" role="progressbar"
                                                    aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                        Đang bán chạy
                                                    </div>
                                                </div>

                                                <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                    href="/pages/detailMedicines.html?id=">
                                                    <div class="default-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle r="3" cy="12" cx="12"></circle>
                                                        </svg>
                                                        <span>Quick View</span>
                                                    </div>
                                                    <div class="hover-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                            <circle r="1" cy="21" cx="9"></circle>
                                                            <circle r="1" cy="21" cx="20"></circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg>
                                                        <span>Shop Now</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- *Item 08* -->
                                    <li class="splide__slide">
                                        <div class="overflow-hidden card">
                                            <div class="card-img position-relative card__img w-100">
                                                <img data-src="../../assets/images/Shop/Medical/medical08.avif" alt=""
                                                    class="img-fluid lazyload w-100" />
                                                <div class="card__wrap">
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-heart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-shopping-cart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-eye-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                    30%</span>
                                                <h5 class="card-title text-truncate--ellipse">
                                                    Viên uống VITABIOTICS Visionace Original hỗ trợ cải
                                                    thiện thị lực (Hộp 2 vỉ x 15 viên)
                                                </h5>
                                                <p class="card-price d-flex flex-column">
                                                    <span
                                                        class="opacity-50 card-price--old text-decoration-line-through text-primary">780.000đ</span>
                                                    <span
                                                        class="card-price--new fw-semibold text-primary">423.000đ</span>
                                                </p>
                                                <div class="mb-2 progress" role="progressbar"
                                                    aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                        Đang bán chạy
                                                    </div>
                                                </div>

                                                <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                    href="/pages/detailMedicines.html?id=">
                                                    <div class="default-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle r="3" cy="12" cx="12"></circle>
                                                        </svg>
                                                        <span>Quick View</span>
                                                    </div>
                                                    <div class="hover-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                            <circle r="1" cy="21" cx="9"></circle>
                                                            <circle r="1" cy="21" cx="20"></circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg>
                                                        <span>Shop Now</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- *Item 09* -->
                                    <li class="splide__slide">
                                        <div class="overflow-hidden card">
                                            <div class="card-img position-relative card__img w-100">
                                                <img data-src="../../assets/images/Shop/Medical/medical09.avif" alt=""
                                                    class="img-fluid lazyload w-100" />
                                                <div class="card__wrap">
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-heart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-shopping-cart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-eye-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                    30%</span>
                                                <h5 class="card-title text-truncate--ellipse">
                                                    Viên uống Healthy Life Celery hỗ trợ điều trị gout
                                                    (Hộp 60 viên)
                                                </h5>
                                                <p class="card-price d-flex flex-column">
                                                    <span
                                                        class="opacity-50 card-price--old text-decoration-line-through text-primary">625.000đ</span>
                                                    <span
                                                        class="card-price--new fw-semibold text-primary">437.000đ</span>
                                                </p>
                                                <div class="mb-2 progress" role="progressbar"
                                                    aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                        Đang bán chạy
                                                    </div>
                                                </div>

                                                <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                    href="/pages/detailMedicines.html?id=">
                                                    <div class="default-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle r="3" cy="12" cx="12"></circle>
                                                        </svg>
                                                        <span>Quick View</span>
                                                    </div>
                                                    <div class="hover-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                            <circle r="1" cy="21" cx="9"></circle>
                                                            <circle r="1" cy="21" cx="20"></circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg>
                                                        <span>Shop Now</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                                    <!-- *Item 10* -->
                                    <li class="splide__slide">
                                        <div class="overflow-hidden card">
                                            <div class="card-img position-relative card__img w-100">
                                                <img data-src="../../assets/images/Shop/Medical/medical10.avif" alt=""
                                                    class="img-fluid lazyload w-100" />
                                                <div class="card__wrap">
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-heart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-shopping-cart-line"></i>
                                                    </div>
                                                    <div class="card__wrap--icon">
                                                        <i class="ri-eye-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                    30%</span>
                                                <h5 class="card-title text-truncate--ellipse">
                                                    Viên đông trùng hạ thảo Wellness Nutrition tăng
                                                    cường sức khỏe (Hộp 90 viên)
                                                </h5>
                                                <p class="card-price d-flex flex-column">
                                                    <span
                                                        class="opacity-50 card-price--old text-decoration-line-through text-primary">1480.000đ</span>
                                                    <span
                                                        class="card-price--new fw-semibold text-primary">785.000đ</span>
                                                </p>
                                                <div class="mb-2 progress" role="progressbar"
                                                    aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                        Đang bán chạy
                                                    </div>
                                                </div>

                                                <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                    href="/pages/detailMedicines.html?id=">
                                                    <div class="default-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle r="3" cy="12" cx="12"></circle>
                                                        </svg>
                                                        <span>Quick View</span>
                                                    </div>
                                                    <div class="hover-btn btn">
                                                        <svg class="css-i6dzq1" stroke-linejoin="round"
                                                            stroke-linecap="round" fill="none" stroke-width="2"
                                                            stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                            <circle r="1" cy="21" cx="9"></circle>
                                                            <circle r="1" cy="21" cx="20"></circle>
                                                            <path
                                                                d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                            </path>
                                                        </svg>
                                                        <span>Shop Now</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- *Shop Deal Online * -->
    <section class="visible py-5 shop-deals border-bottom animate-on-scroll">
        <div class="container">
            <div class="col">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <h3 class="">Siêu Deals Online</h3>
                    <a href="" class="px-4 text-decoration-none btn rounded-pill fw-medium btn-more">Xem thêm</a>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="splide splide-deals" style="padding: 0;">
                        <div class="splide__track" style="padding: 0;">
                            <ul class="splide__list">
                                <!-- *Item 01* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical11.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                20%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Sữa dưỡng thể ban đêm Vaseline Dewy Radiance (Túyp
                                                330ml)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">150.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">120.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 02* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical12.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                15%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Viên uống Blackmores Multivitamin For Men tăng cường
                                                sinh lý nam (Lọ 50 viên)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">561.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">476.850đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 03* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical14.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                25%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Nước uống collagen Nucos Super White hỗ trợ làm sáng
                                                da và chống lão hóa (10 chai)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">1.350.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">1.012.500đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 04* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical15.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                10%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Khẩu trang y tế màu đen 3 lớp Pharmacity bảo vệ khỏi
                                                vi khuẩn, khói và bụi mịn (Hộp 50 cái)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">135.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">60.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 05* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical16.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                20%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Dung dịch nhỏ mắt VROHTO Dryeye bôi trơn mắt và bổ
                                                sung nước mắt nhân tạo (Chai 13ml)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">62.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">49.600đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>
                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 06* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical18.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                30%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Tinh dầu hoa anh thảo SWISSE Ultiboost Evening
                                                Primrose Oil (Hộp 200 viên)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">1.599.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">1.119.300đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 07* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical07.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                30%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Nước Uống Hồng Sâm Đông Trùng Hạ Thảo Hàn Quốc -
                                                Welson Cordyceps Gold (Hộp 10 chai)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">780.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">395.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 08* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical08.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                30%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Viên uống VITABIOTICS Visionace Original hỗ trợ cải
                                                thiện thị lực (Hộp 2 vỉ x 15 viên)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">780.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">423.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 09* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical09.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                30%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Viên uống Healthy Life Celery hỗ trợ điều trị gout
                                                (Hộp 60 viên)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">625.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">437.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 10* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical10.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                30%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Viên đông trùng hạ thảo Wellness Nutrition tăng cường
                                                sức khỏe (Hộp 90 viên)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">1480.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">785.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- *Shop Family* -->
    <section class="visible py-5 shop-family border-bottom animate-on-scroll">
        <div class="container">
            <div class="col">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <h3 class="">Tủ thuốc gia đình - Giao nhanh 2H</h3>
                    <a href="" class="px-4 text-decoration-none btn rounded-pill fw-medium btn-more">Xem thêm</a>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="splide splide-newMedicines" style="padding: 0;">
                        <div class="splide__track" style="padding: 0;">
                            <ul class="splide__list">
                                <!-- *Item 01* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical19.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                20%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Dung dịch uống Enterogermina Gut Defense 2 tỷ lợi
                                                khuẩn/5ml hỗ trợ bảo vệ đường ruột (Hộp 20 ống)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">230.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">184.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 02* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical20.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                20%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Viên đặt âm đạo Fluomizin 10mg điều trị nhiễm nấm âm
                                                đạo, nhiễm khuẩn âm đạo (1 vỉ x 6 viên)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">231.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">130.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 03* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical21.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                15%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Viên uống Vitabiotics Pregnacare Breast-feeding bổ
                                                sung vitamin cho phụ nữ cho con bú (84 viên)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">350.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">212.500đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 04* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical22.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                10%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Thuốc nhỏ mắt Systane ultra nhức mỏi mắt, khô mắt,
                                                nhìn mờ (chai 5ml)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">120.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">67.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 05* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical23.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                10%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Viên nén BOCINOR 1.5MG thuốc tránh thai khẩn cấp trong
                                                vòng 72 giờ (1 vỉ X 1 viên)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">220.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">167.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 06* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical24.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                20%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Dung dịch Optive UD 0.4ml giảm tình trạng khô mắt và
                                                khó chịu sau phẫu thuật (30 ống x 0.4ml)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">305.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">205.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 07* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical25.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                30%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Dầu gió xanh Eagle Brand trị cảm cúm, sổ mũi, nghẹt
                                                mũi, chóng mặt, say tàu xe (chai 24ml)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">78.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">35.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 08* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical27.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                10%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Dung dịch Betadine antiseptic 10% sát khuẩn da và niêm
                                                mạc (chai 30ml)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">58.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">48.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>
                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 09* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical09.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                30%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Viên uống Healthy Life Celery hỗ trợ điều trị gout
                                                (Hộp 60 viên)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">625.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">437.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 10* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical10.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                30%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Viên đông trùng hạ thảo Wellness Nutrition tăng cường
                                                sức khỏe (Hộp 90 viên)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">1480.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">785.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- *Banner-Shop* -->
    <section class="visible py-5 border-bottom animate-on-scroll">
        <div class="container">
            <div class="col">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <h3 class="">Tủ thuốc gia đình - Giao nhanh 2H</h3>
                    <a href="" class="px-4 text-decoration-none btn rounded-pill fw-medium btn-more">Xem thêm</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="">
                        <img src="../../assets/images/Banner/bannerMedicines01.avif" alt=""
                            class="shadow img-fluid rounded-2 w-100" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="">
                        <img src="../../assets/images/Banner/bannerMedicines02.avif" alt=""
                            class="shadow img-fluid rounded-2 w-100" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="">
                        <img src="../../assets/images/Banner/bannerMedicines03.avif" alt=""
                            class="shadow img-fluid rounded-2 w-100" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="">
                        <img src="../../assets/images/Banner/bannerMedicines04.avif" alt=""
                            class="shadow img-fluid rounded-2 w-100" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- *New Medicines* -->
    <section class="visible py-5 shop-family border-bottom animate-on-scroll">
        <div class="container">
            <div class="col">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <h3 class="">Sản phẩm mới tại DoctorHub</h3>
                    <a href="" class="px-4 text-decoration-none btn rounded-pill fw-medium btn-more">Xem thêm</a>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="splide splide-family" style="padding: 0;">
                        <div class="splide__track" style="padding: 0;">
                            <ul class="splide__list">
                                <!-- *Item 01* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical19.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                20%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Dung dịch uống Enterogermina Gut Defense 2 tỷ lợi
                                                khuẩn/5ml hỗ trợ bảo vệ đường ruột (Hộp 20 ống)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">230.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">184.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 02* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical20.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                20%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Viên đặt âm đạo Fluomizin 10mg điều trị nhiễm nấm âm
                                                đạo, nhiễm khuẩn âm đạo (1 vỉ x 6 viên)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">231.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">130.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 03* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical21.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                15%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Viên uống Vitabiotics Pregnacare Breast-feeding bổ
                                                sung vitamin cho phụ nữ cho con bú (84 viên)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">350.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">212.500đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 04* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical22.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                10%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Thuốc nhỏ mắt Systane ultra nhức mỏi mắt, khô mắt,
                                                nhìn mờ (chai 5ml)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">120.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">67.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 05* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical23.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                10%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Viên nén BOCINOR 1.5MG thuốc tránh thai khẩn cấp trong
                                                vòng 72 giờ (1 vỉ X 1 viên)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">220.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">167.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 06* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical24.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                20%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Dung dịch Optive UD 0.4ml giảm tình trạng khô mắt và
                                                khó chịu sau phẫu thuật (30 ống x 0.4ml)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">305.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">205.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 07* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical25.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                30%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Dầu gió xanh Eagle Brand trị cảm cúm, sổ mũi, nghẹt
                                                mũi, chóng mặt, say tàu xe (chai 24ml)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">78.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">35.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 08* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical27.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                10%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Dung dịch Betadine antiseptic 10% sát khuẩn da và niêm
                                                mạc (chai 30ml)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">58.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">48.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>
                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 09* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical09.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                30%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Viên uống Healthy Life Celery hỗ trợ điều trị gout
                                                (Hộp 60 viên)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">625.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">437.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>

                                <!-- *Item 10* -->
                                <li class="splide__slide">
                                    <div class="overflow-hidden card">
                                        <div class="card-img position-relative card__img w-100">
                                            <img data-src="../../assets/images/Shop/Medical/medical10.avif" alt=""
                                                class="img-fluid lazyload w-100" />
                                            <div class="card__wrap">
                                                <div class="card__wrap--icon">
                                                    <i class="ri-heart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-shopping-cart-line"></i>
                                                </div>
                                                <div class="card__wrap--icon">
                                                    <i class="ri-eye-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <span class="badge bg-danger position-absolute badge-discount">Giảm
                                                30%</span>
                                            <h5 class="card-title text-truncate--ellipse">
                                                Viên đông trùng hạ thảo Wellness Nutrition tăng cường
                                                sức khỏe (Hộp 90 viên)
                                            </h5>
                                            <p class="card-price d-flex flex-column">
                                                <span
                                                    class="opacity-50 card-price--old text-decoration-line-through text-primary">1480.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">785.000đ</span>
                                            </p>
                                            <div class="mb-2 progress" role="progressbar"
                                                aria-label="Example with label" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100">
                                                <div class="progress-bar bg-danger fw-bolder" style="width: 95%">
                                                    Đang bán chạy
                                                </div>
                                            </div>

                                            <a class="d-flex justify-content-center align-items-center text-decoration-none w-100 btn-shop"
                                                href="/pages/detailMedicines.html?id=">
                                                <div class="default-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#FFF" height="20" width="20" viewBox="0 0 24 24">
                                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                        <circle r="3" cy="12" cx="12"></circle>
                                                    </svg>
                                                    <span>Quick View</span>
                                                </div>
                                                <div class="hover-btn btn">
                                                    <svg class="css-i6dzq1" stroke-linejoin="round"
                                                        stroke-linecap="round" fill="none" stroke-width="2"
                                                        stroke="#ffd300" height="20" width="20" viewBox="0 0 24 24">
                                                        <circle r="1" cy="21" cx="9"></circle>
                                                        <circle r="1" cy="21" cx="20"></circle>
                                                        <path
                                                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6">
                                                        </path>
                                                    </svg>
                                                    <span>Shop Now</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- *Sidebar* -->
    <div class="contact-sidebar">
  <a href="./appointment_form.php" class="contact-btn text-decoration-none" title="Đặt lịch" data-bs-toggle="tooltip"
   data-bs-placement="left" title="Đặt lịch">
   <i class="fa-solid fa-calendar-check"></i>
  </a>
  <a href="tel:0352032375" class="contact-btn text-decoration-none" title="Gọi điện" data-bs-toggle="tooltip"
   data-bs-placement="left" title="Gọi điện">
   <i class="fa-solid fa-phone"></i>
  </a>
  <a href="tel:0352032375" class="contact-btn text-decoration-none" title="Chat" data-bs-toggle="tooltip"
   data-bs-placement="left" title="Chat với bác sĩ">
   <i class="fa-solid fa-comments"></i>
  </a>
  <a href="mailto:vaniizit@gmail.com" class="contact-btn text-decoration-none" title="Email" data-bs-toggle="tooltip"
   data-bs-placement="left" title="Gửi email">
   <i class="fa-solid fa-envelope"></i>
  </a>
  <button id="scrollTopBtn" class="contact-btn d-none" data-bs-toggle="tooltip" data-bs-placement="left"
   title="Lên đầu trang" onclick="scrollToTop()">
   <i class="fa-solid fa-chevron-up"></i>
  </button>
 </div>

    <!-- *Footer* -->

    <footer class="pt-5 pb-3 bg-light border-top">
        <div class="container">
            <div class="row">
                <div class="mb-4 col-md-3 col-sm-6">
                    <h5 class="mb-3 fw-bold">LIÊN KẾT WEB</h5>
                    <ul class="list-unstyled text-muted">
                        <li class="text-decoration-none footer__item">
                            <a href="" class="text-decoration-none text-secondary">Bộ y tế</a>
                        </li>
                        <li class="text-decoration-none footer__item">
                            <a href="" class="text-decoration-none text-secondary">Tổ chức y tế thế giới</a>
                        </li>
                        <li class="text-decoration-none footer__item">
                            <a href="" class="text-decoration-none text-secondary">Viện vệ sinh dịch tễ TW</a>
                        </li>
                        <li class="text-decoration-none footer__item">
                            <a href="" class="text-decoration-none text-secondary">Hội nghị bệnh viện Châu Á</a>
                        </li>
                        <li class="text-decoration-none footer__item">
                            <a href="" class="text-decoration-none text-secondary">Bảo hiểm y tế ở nước ngoài</a>
                        </li>
                        <li class="text-decoration-none footer__item">
                            <a href="" class="text-decoration-none text-secondary">Bảo hiểm y tế quốc tế</a>
                        </li>
                    </ul>
                </div>

                <div class="mb-4 col-md-3 col-sm-6">
                    <h5 class="mb-3 fw-bold">HỎI BÁC SĨ</h5>
                    <ul class="list-unstyled text-muted">
                        <li class="text-decoration-none footer__item">
                            <a href="" class="text-decoration-none text-secondary">Chuyên mục Hỏi bác sĩ</a>
                        </li>
                        <li class="text-decoration-none footer__item">
                            <a href="" class="text-decoration-none text-secondary">Gửi câu hỏi</a>
                        </li>
                        <li class="text-decoration-none footer__item">
                            <a href="" class="text-decoration-none text-secondary">Câu hỏi đã trả lời</a>
                        </li>
                        <li class="text-decoration-none footer__item">
                            <a href="" class="text-decoration-none text-secondary">Câu hỏi đáng chú ý</a>
                        </li>
                        <li class="text-decoration-none footer__item">
                            <a href="" class="text-decoration-none text-secondary">Tra cứu</a>
                        </li>
                        <li class="text-decoration-none footer__item">
                            <a href="" class="text-decoration-none text-secondary">Tra cứu bệnh</a>
                        </li>
                    </ul>
                </div>

                <div class="mb-4 col-md-3 col-sm-6">
                    <h5 class="mb-3 fw-bold">MEDICAL CARE</h5>
                    <ul class="list-unstyled text-muted">
                        <li class="text-decoration-none footer__item">
                            <a href="" class="text-decoration-none text-secondary">Về chúng tôi</a>
                        </li>
                        <li class="text-decoration-none footer__item">
                            <a href="" class="text-decoration-none text-secondary">Tuyển dụng</a>
                        </li>
                        <li class="text-decoration-none footer__item">
                            <a href="" class="text-decoration-none text-secondary">Liên hệ</a>
                        </li>
                        <li class="text-decoration-none footer__item">
                            <a href="" class="text-decoration-none text-secondary">Quy trình giải quyết tranh chấp</a>
                        </li>
                        <li class="text-decoration-none footer__item">
                            <a href="" class="text-decoration-none text-secondary">Chính sách bảo mật thông tin</a>
                        </li>
                    </ul>
                </div>

                <div class="mb-4 col-md-3 col-sm-6">
                    <h5 class="mb-3 fw-bold">THEO DÕI CHÚNG TÔI TRÊN</h5>
                    <ul class="list-unstyled">
                        <li class="text-decoration-none footer__item">
                            <i class="fab fa-facebook-square me-2 text-primary"></i>
                            Facebook
                        </li>
                        <li class="text-decoration-none footer__item">
                            <i class="fab fa-youtube me-2 text-primary"></i> Youtube
                        </li>
                        <li class="text-decoration-none footer__item">
                            <i class="fab fa-telegram-plane me-2 text-primary"></i> Zalo
                        </li>
                    </ul>
                    <h5 class="mt-4 mb-3 fw-bold">CHỨNG NHẬN BỞI</h5>
                    <div class="d-flex align-items-center">
                        <img data-src="../../assets/images/Icon/20240706162441-0-BCT.png" alt="Chứng nhận 1"
                            class="me-2 lazyload" style="height: 30px" />
                        <img data-src="../../assets/images/Icon/20240706162441-0-DMCA.png" alt="Chứng nhận 2"
                            style="height: 30px" class="lazyload" />
                    </div>
                    <h5 class="mt-4 mb-3 fw-bold">HỖ TRỢ THANH TOÁN</h5>
                    <div class="flex-wrap d-flex">
                        <img data-src="../../assets/images/Icon/20240706162440-0-COD.png" alt="COD"
                            class="mb-2 me-2 lazyload" style="height: 30px" />
                        <img data-src="../../assets/images/Icon/20240706162441-0-Visa.png" alt="VISA"
                            class="mb-2 me-2 lazyload" style="height: 30px" />
                        <img data-src="../../assets/images/Icon/20240706162441-0-MasterCard.png" alt="Mastercard"
                            class="mb-2 me-2 lazyload" style="height: 30px" />
                        <img data-src="../../assets/images/Icon/20240706162441-0-JCB.png" alt="JCB"
                            class="mb-2 me-2 lazyload" style="height: 30px" />
                        <img data-src="../../assets/images/Icon/20240706162441-0-Momo.png" alt="MoMo"
                            class="mb-2 me-2 lazyload" style="height: 30px" />
                        <img data-src="../../assets/images/Icon/20240706162729-0-ZaloPay.png" alt="ZaloPay"
                            class="mb-2 me-2 lazyload" style="height: 30px" />
                        <img data-src="../../assets/images/Icon/20241122062454-0-napas.png" alt="Napas"
                            class="mb-2 me-2 lazyload" style="height: 30px" />
                        <img data-src="../../assets/images/Icon/20240706162729-0-ZaloPay.png" alt="Apple Pay"
                            class="mb-2 me-2 lazyload" style="height: 30px" />
                    </div>
                </div>
            </div>

            <div class="pt-3 mt-3 text-center border-top small text-muted">
                © Bản quyền thuộc về <strong>DoctorHub</strong> | Cung cấp bởi
                <a href="https://www.instagram.com/viinhneee/" class="fw-semibold text-decoration-none"
                    style="color: var(--primary-color)">VaniizIT</a>
            </div>
        </div>
    </footer>
</body>
<!-- *SplideJS Scripts* -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/css/splide.min.css" />
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/js/splide.min.js"></script>
<!-- *Popper* -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
    integrity="sha384-JGLZOLoMCs5hQdIb2Rlp+vgbp7NjPR8tW3mv4TqRfj7sG04O1LYljX29lvH9acX7" crossorigin="anonymous">
</script>
<!-- *Bootstrap* -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<!-- *Javascript* -->
<script src="../../services/handleCountDown.js" type="module"></script>
<script src="../../assets/javascript/main.js" type="module"></script>
<script src="../../services/handleModal.js"></script>
<script src="../../services/handleSlider.js"></script>
<!-- *Lazysizes* -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.0/lazysizes.min.js" async=""></script>
<!-- *Splide JS* -->

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>

</html>