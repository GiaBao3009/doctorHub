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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css" />
    <!-- *Fontawesome* -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <!-- *Stylesheets* -->
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/base.css" />
    <link rel="stylesheet" href="../../assets/css/responsive.css" />
    <link rel="stylesheet" href="../../assets/css/animation.css" />
    <!-- *Mobile Optimization* -->
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="theme-color" content="#0d6efd" />
</head>

<body>
    <!-- *Navbar* -->
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
                        <li class="nav-item <?php echo isActiveMenu('index.php'); ?>">
                            <a class="nav-link" href="../../index.php">Trang Chủ</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('book.php'); ?>">
                            <a class="nav-link" href="./appointment_form.php">Đặt Lịch Khám</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('consultation.php'); ?>">
                            <a class="nav-link" href="./consultation.php
                            ">Tư Vấn Sức Khỏe</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('services.php'); ?>">
                            <a class="nav-link" href="./app/views/services.php">Bài Test</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('contact.php'); ?>">
                            <a class="nav-link" href="./contact.php">Liên Hệ</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('blog.php'); ?>">
                            <a class="nav-link" href="./blog.php">Tin Tức</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('shop.php'); ?>">
                            <a class="nav-link" href="./shop.php">Cửa Hàng</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
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
    <!-- ** -->
    <footer class="bg-light pt-5 pb-3 border-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 mb-4">
                    <h5 class="fw-bold mb-3">LIÊN KẾT WEB</h5>
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

                <div class="col-md-3 col-sm-6 mb-4">
                    <h5 class="fw-bold mb-3">HỎI BÁC SĨ</h5>
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

                <div class="col-md-3 col-sm-6 mb-4">
                    <h5 class="fw-bold mb-3">MEDICAL CARE</h5>
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

                <div class="col-md-3 col-sm-6 mb-4">
                    <h5 class="fw-bold mb-3">THEO DÕI CHÚNG TÔI TRÊN</h5>
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
                    <h5 class="fw-bold mt-4 mb-3">CHỨNG NHẬN BỞI</h5>
                    <div class="d-flex align-items-center">
                        <img data-src="../../assets/images/Icon/20240706162441-0-BCT.png" alt="Chứng nhận 1"
                            class="me-2 lazyload" style="height: 30px" />
                        <img data-src="../../assets/images/Icon/20240706162441-0-DMCA.png" alt="Chứng nhận 2"
                            style="height: 30px" class="lazyload" />
                    </div>
                    <h5 class="fw-bold mt-4 mb-3">HỖ TRỢ THANH TOÁN</h5>
                    <div class="d-flex flex-wrap">
                        <img data-src="../../assets/images/Icon/20240706162440-0-COD.png" alt="COD"
                            class="me-2 mb-2 lazyload" style="height: 30px" />
                        <img data-src="../../assets/images/Icon/20240706162441-0-Visa.png" alt="VISA"
                            class="me-2 mb-2 lazyload" style="height: 30px" />
                        <img data-src="../../assets/images/Icon/20240706162441-0-MasterCard.png" alt="Mastercard"
                            class="me-2 mb-2 lazyload" style="height: 30px" />
                        <img data-src="../../assets/images/Icon/20240706162441-0-JCB.png" alt="JCB"
                            class="me-2 mb-2 lazyload" style="height: 30px" />
                        <img data-src="../../assets/images/Icon/20240706162441-0-Momo.png" alt="MoMo"
                            class="me-2 mb-2 lazyload" style="height: 30px" />
                        <img data-src="../../assets/images/Icon/20240706162729-0-ZaloPay.png" alt="ZaloPay"
                            class="me-2 mb-2 lazyload" style="height: 30px" />
                        <img data-src="../../assets/images/Icon/20241122062454-0-napas.png" alt="Napas"
                            class="me-2 mb-2 lazyload" style="height: 30px" />
                        <img data-src="../../assets/images/Icon/20240706162729-0-ZaloPay.png" alt="Apple Pay"
                            class="me-2 mb-2 lazyload" style="height: 30px" />
                    </div>
                </div>
            </div>

            <div class="text-center border-top pt-3 mt-3 small text-muted">
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
<script src="/assets/javascript/main.js" type="module"></script>
<!-- *Lazysizes* -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.0/lazysizes.min.js" async=""></script>
<!-- *Splide JS* -->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js"></script>

</html>