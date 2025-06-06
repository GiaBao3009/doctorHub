<?php
// Include the initialization file
require_once 'config/init.php';
?>
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
                                        <li><a class="dropdown-item" href="/app/views/profile.php"></a></li>
                                        
                                        <?php if ($user['role'] === 'doctor'): ?>
                                            <li><a class="dropdown-item" href="/app/views/doctor_dashboard.php">Bảng điều khiển</a></li>
                                        <?php elseif ($user['role'] === 'user'): ?>
                                            <li><a class="dropdown-item" href="/app/views/user_dashboard.php">Tài Khoản</a></li>
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
                            <a class="nav-link" href="index.php">Trang Chủ</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('book.php'); ?>">
                            <a class="nav-link" href="./app/views/chuyenkhoa.php">Đặt Lịch Khám</a>
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


<!-- Content của trang chủ -->
<main>
    <!-- Banner-home -->
    <div class="banner__home py-5 border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-5 d-flex flex-column justify-content-center align-items-start order-last order-md-first">
                    <h4 class="banner__home--subtitle mb-3 text-warning-emphasis">
                        Khám bệnh trực tuyến, tiết kiệm thời gian
                    </h4>

                    <h1 class="banner__home--title mb-4 text-primary">
                        Khám Bệnh và Tư Vấn Sức Khỏe Online
                    </h1>

                    <p class="banner__home--description mb-4">
                        Đặt lịch khám và nhận tư vấn trực tuyến từ các bác sĩ uy tín, giúp
                        bạn chăm sóc sức khỏe một cách dễ dàng và nhanh chóng.
                    </p>
                    <!-- Nút Call-to-Action -->
                    <a class="text-decoration-none btn cssbuttons-io-button" href="./app/views/chuyenkhoa.php">
                        Đặt Lịch Ngay
                        <div class="icon">
                            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="col-md-7">
                    <a href="app/views/book.php" class="text-decoration-none banner__home--wrap mt-3 mt-md-0">
                        <img src="assets/images/Banner/BannerHome.png" alt="Banner Image" class="img-fluid w-100 shadow rounded-2 mb-md-0 mb-3" />
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- *about-home* -->
    <section class="about py-5 bg-light">
        <div class="container text-center">
            <!-- <div class="about__icon mb-3">
                <img data-src="/assets/images/Icon/doctornurse-svgrepo-com.svg" alt="" class="img-fluid lazyloaded"
                    style="width: 50px">
            </div> -->
            <h2 class="mb-3 text-primary position-relative section-title-underline animate-on-scroll visible">
                Về DoctorHub
            </h2>
            <p class="text-muted animate-on-scroll about__desc visible">
                DoctorHub là nền tảng kết nối giữa bệnh nhân và bác sĩ uy tín trên
                toàn quốc. Với sứ mệnh nâng cao trải nghiệm chăm sóc sức khỏe hiện
                 đại, tiện lợi và nhanh chóng.
            </p>
        </div>
    </section>

    <!-- *features-home* -->
    <section class="features py-5 bg-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-4 animate-on-scroll visible">
                    <a href="/pages/book.html"
                        class="d-flex flex-column align-items-center text-decoration-none feature-card p-4 rounded shadow-sm h-100">
                        <img data-src="./assets/images/Icon/appointment-dentist-svgrepo-com.svg" alt=""
                            class="features__icon lazyload" />
                        <h5 class="features-title fw-semibold mt-1">Đặt lịch dễ dàng</h5>
                        <p class="text-secondary">
                            Chọn lịch khám phù hợp chỉ với vài bước đơn giản.
                        </p>
                    </a>
                </div>
                <div class="col-md-4 mb-4 animate-on-scroll visible">
                    <a href="/pages/consultation.html"
                        class="d-flex flex-column align-items-center text-decoration-none feature-card p-4 rounded shadow-sm h-100">
                        <img data-src="./assets/images/Icon/doctor-files-medical-svgrepo-com.svg" alt=""
                            class="features__icon lazyload" />
                        <h5 class="features-title fw-semibold mt-1">
                            Tư vấn cùng bác sĩ
                        </h5>
                        <p class="text-secondary">
                            Kết nối trực tuyến với bác sĩ mọi lúc, mọi nơi.
                        </p>
                    </a>
                </div>
                <div class="col-md-4 mb-4 animate-on-scroll visible">
                    <a href="/pages/services.html"
                        class="d-flex flex-column align-items-center text-decoration-none feature-card p-4 rounded shadow-sm h-100">
                        <img data-src="../../assets/images/Icon/security-shield-svgrepo-com.svg" alt=""
                            class="features__icon lazyloaded"
                            src="./assets/images/Icon/security-shield-svgrepo-com.svg" />
                        <h5 class="features-title fw-semibold mt-1">Bảo mật thông tin</h5>
                        <p class="text-secondary">
                            Cam kết bảo vệ dữ liệu sức khỏe của bạn tuyệt đối.
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </section>


    

    <!-- *Danh sách đặt lịch khám* -->
    <div class="container">
        <h1 class="h1" style="color:rgb(45, 111, 224); margin-bottom: 20px; margin-top: 20px;">Dịch vụ toàn diện</h1>
        <div class="row">
            <div class="col-12 col-sm-6 mb-4">
                <a href="./app/views/chuyenkhoa.php" class="service-card">
                    <img data-src="./assets/images/Icon/iconkham-chuyen-khoa.png" alt="Icon of a hospital building"
                        class="lazyload">
                    <span>Khám Chuyên khoa</span>
                </a>
            </div>
            <div class="col-12 col-sm-6 mb-4">
                <a href="./app/views/KhamTuXa.php" class="service-card">
                    <img data-src="./assets/images/Icon/iconkham-tu-xa.png"
                        alt="Icon of a mobile phone with a medical cross" class="lazyload">
                    <span>Khám từ xa</span>
                </a>
            </div>
            <div class="col-12 col-sm-6 mb-4">
                <a href="./app/views/KhamTongQuat.php" class="service-card">
                    <img data-src="./assets/images/Icon/iconkham-tong-quan.png"
                        alt="Icon of a clipboard with a medical cross" class="lazyload">
                    <span>Khám tổng quát</span>
                </a>
            </div>
            <div class="col-12 col-sm-6 mb-4">
                <a href="./app/views/XetNghiemYHoc.php" class="service-card">
                    <img data-src="./assets/images/Icon/iconxet-nghiem-y-hoc.png"
                        alt="Icon of a test tube with a drop of liquid" class="lazyload">
                    <span>Xét nghiệm y học</span>
                </a>
            </div>
            <div class="col-12 col-sm-6 mb-4">
                <a href="./app/views/SucKhoeTinhThan.php" class="service-card">
                    <img data-src="./assets/images/Icon/iconsuc-khoe-tinh-than.png"
                        alt="Icon of a head with a medical cross" class="lazyload">
                    <span>Sức khỏe tinh thần</span>
                </a>
            </div>
            <div class="col-12 col-sm-6 mb-4">
                <a href="./app/views/nhakhoa.php" class="service-card">
                    <img data-src="./assets/images/Icon/iconkham-nha-khoa.png"
                        alt="Icon of a tooth with a medical cross" class="lazyload">
                    <span>Khám nha khoa</span>
                </a>
            </div>
            <div class="col-12 col-sm-6 mb-4">
                <a href="./app/views/GoiPhauThuat.php" class="service-card">
                    <img data-src="./assets/images/Icon/icongoi-phau-thuat.png" alt="Icon of a microscope"
                        class="lazyload">
                    <span>Gói Phẫu thuật</span>
                </a>
            </div>
            <div class="col-12 col-sm-6 mb-4">
                <a href="./app/views/SongKhoeCungTieuDuong.php" class="service-card">
                    <img data-src="./assets/images/Icon/icons-tieu-duong.png" alt="Icon of a glucose meter"
                        class="lazyload">
                    <span>Sống khỏe Tiểu đường</span>
                </a>
            </div>
            <div class="col-12 col-sm-6 mb-4">
                <a href="app/views/test.php" class="service-card">
                    <img data-src="./assets/images/Icon/iconbai-test-suc-khoe2.png" alt="Icon of a health test"
                        class="lazyload">
                    <span>Bài Test Sức khỏe</span>
                </a>
            </div>
            <div class="col-12 col-sm-6 mb-4">
                <a href="" class="service-card">
                    <img data-src="./assets/images/Icon/near-home-01.png" alt="Icon of a shield with a medical cross"
                        class="lazyload">
                    <span>Y tế gần bạn</span>
                </a>
            </div>
        </div>
    </div>

    <!-- *Timeline-home* -->
    <section class="home__booking py-5 border-bottom">
        <div class="container">
            <div class="row">
                <div class="text-center mb-5 animate-on-scroll visible">
                    <h2
                        class="mb-3 text-primary position-relative section-title-underline animate-on-scroll fw-bold visible text-capitalize">
                        Quy Trình Đặt Lịch Khám
                    </h2>
                    <p class="text-muted">
                        Chỉ với 5 bước đơn giản để chăm sóc sức khỏe của bạn
                    </p>
                </div>
                <div class="timeline">
                    <div class="timeline__event timeline__event--type1">
                        <div class="timeline__event__icon">📝</div>
                        <div class="timeline__event__date">Bước 1</div>
                        <div class="timeline__event__content">
                            <div class="timeline__event__title">Tạo Tài Khoản</div>
                            <div class="timeline__event__description">
                                <p>
                                    Đăng ký trên DoctorHub bằng email và thông tin cơ bản để sử
                                    dụng dịch vụ.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="timeline__event timeline__event--type2">
                        <div class="timeline__event__icon">🔍</div>
                        <div class="timeline__event__date">Bước 2</div>
                        <div class="timeline__event__content">
                            <div class="timeline__event__title">Tìm Bác Sĩ</div>
                            <div class="timeline__event__description">
                                <p>
                                    Tìm kiếm bác sĩ dựa trên chuyên khoa, vị trí và thời gian có
                                    sẵn.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="timeline__event timeline__event--type3">
                        <div class="timeline__event__icon">📅</div>
                        <div class="timeline__event__date">Bước 3</div>
                        <div class="timeline__event__content">
                            <div class="timeline__event__title">Đặt Lịch Hẹn</div>
                            <div class="timeline__event__description">
                                <p>
                                    Chọn khung giờ thuận tiện và xác nhận lịch hẹn với bác sĩ.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="timeline__event timeline__event--type1">
                        <div class="timeline__event__icon">💳</div>
                        <div class="timeline__event__date">Bước 4</div>
                        <div class="timeline__event__content">
                            <div class="timeline__event__title">Thanh Toán</div>
                            <div class="timeline__event__description">
                                <p>
                                    Hoàn tất thanh toán một cách an toàn qua nền tảng của chúng
                                    tôi.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="timeline__event timeline__event--type2">
                        <div class="timeline__event__icon">👩⚕️</div>
                        <div class="timeline__event__date">Bước 5</div>
                        <div class="timeline__event__content">
                            <div class="timeline__event__title">Tham Gia Cuộc Hẹn</div>
                            <div class="timeline__event__description">
                                <p>
                                    Đến gặp bác sĩ vào thời gian đã đặt hoặc tham gia tư vấn
                                    trực tuyến.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="contact-sidebar">
  <a href="./app/views/appointment_form.php" class="contact-btn text-decoration-none" title="Đặt lịch" data-bs-toggle="tooltip"
   data-bs-placement="left" title="Đặt lịch">
   <i class="fa-solid fa-calendar-check"></i>
  </a>
  <a href="tel:035202375" class="contact-btn text-decoration-none" title="Gọi điện" data-bs-toggle="tooltip"
   data-bs-placement="left" title="Gọi điện">
   <i class="fa-solid fa-phone"></i>
  </a>
  <a href="./app/views/appointment_form.php" class="contact-btn text-decoration-none" title="Chat" data-bs-toggle="tooltip"
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

        <!-- *Services-home* -->
        <section class="services py-5">
        <div class="container">
            <div class="text-center mb-4 animate-on-scroll">
                <h2
                    class="mb-3 text-primary position-relative section-title-underline animate-on-scroll fw-bold visible text-capitalize">
                    Dịch Vụ Y Tế
                </h2>
                <p class="text-muted">
                    Đáp ứng mọi nhu cầu chăm sóc sức khỏe của bạn
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-3 text-center animate-on-scroll" style="transition-delay: 0.2s">
                    <i class="ri-hospital-line fs-1 text-success mb-2"></i>
                    <h6 class="fw-bold">Khám tổng quát</h6>
                    <p class="text-muted">Định kỳ kiểm tra sức khỏe toàn diện.</p>
                </div>
                <div class="col-md-3 text-center animate-on-scroll" style="transition-delay: 0.4s">
                    <i class="ri-mental-health-line fs-1 text-info mb-2"></i>
                    <h6 class="fw-bold">Khám chuyên khoa</h6>
                    <p class="text-muted">Gặp bác sĩ theo từng chuyên ngành cụ thể.</p>
                </div>
                <div class="col-md-3 text-center animate-on-scroll" style="transition-delay: 0.6s">
                    <i class="ri-heart-pulse-line fs-1 text-danger mb-2"></i>
                    <h6 class="fw-bold">Tư vấn tâm lý</h6>
                    <p class="text-muted">Hỗ trợ tinh thần, trị liệu tâm lý cá nhân.</p>
                </div>
                <div class="col-md-3 text-center animate-on-scroll" style="transition-delay: 0.8s">
                    <i class="ri-user-heart-line fs-1 text-warning mb-2"></i>
                    <h6 class="fw-bold">Khám từ xa</h6>
                    <p class="text-muted">
                        Tư vấn trực tuyến qua video, tiết kiệm thời gian.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- *Services-home* -->
    <section class="services py-5">
        <div class="container">
            <div class="text-center mb-4 animate-on-scroll">
                <h2
                    class="mb-3 text-primary position-relative section-title-underline animate-on-scroll fw-bold visible text-capitalize">
                    Dịch Vụ Y Tế
                </h2>
                <p class="text-muted">
                    Đáp ứng mọi nhu cầu chăm sóc sức khỏe của bạn
                </p>
            </div>
            <div class="row g-4">
                <div class="col-md-3 text-center animate-on-scroll" style="transition-delay: 0.2s">
                    <i class="ri-hospital-line fs-1 text-success mb-2"></i>
                    <h6 class="fw-bold">Khám tổng quát</h6>
                    <p class="text-muted">Định kỳ kiểm tra sức khỏe toàn diện.</p>
                </div>
                <div class="col-md-3 text-center animate-on-scroll" style="transition-delay: 0.4s">
                    <i class="ri-mental-health-line fs-1 text-info mb-2"></i>
                    <h6 class="fw-bold">Khám chuyên khoa</h6>
                    <p class="text-muted">Gặp bác sĩ theo từng chuyên ngành cụ thể.</p>
                </div>
                <div class="col-md-3 text-center animate-on-scroll" style="transition-delay: 0.6s">
                    <i class="ri-heart-pulse-line fs-1 text-danger mb-2"></i>
                    <h6 class="fw-bold">Tư vấn tâm lý</h6>
                    <p class="text-muted">Hỗ trợ tinh thần, trị liệu tâm lý cá nhân.</p>
                </div>
                <div class="col-md-3 text-center animate-on-scroll" style="transition-delay: 0.8s">
                    <i class="ri-user-heart-line fs-1 text-warning mb-2"></i>
                    <h6 class="fw-bold">Khám từ xa</h6>
                    <p class="text-muted">
                        Tư vấn trực tuyến qua video, tiết kiệm thời gian.
                    </p>
                </div>
            </div>
        </div>
    </section>



    <!-- *Bác sĩ tiêu biểu * -->
    <section class="featured-doctors py-5 border-bottom animate-on-scroll visible">
        <div class="container">
            <div class="col">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h3
                        class="mb-2 text-primary position-relative section-title-underline fw-bold text-capitalize text-center">
                        Bác sĩ nổi bật
                    </h3>
                    <a href="./app/views/Doctor/doctor.php
                    "
                        class="text-decoration-none btn rounded-pill px-4 fw-medium btn-more">Xem
                        thêm</a>
                </div>
            </div>

            <div class="col-md-12">
                <div class="splide home-splide-cotor">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <!-- *Bác sĩ 1* -->
                            <li class="splide__slide">
                                <a href="./app/views/Doctor/doctor.php" class="doctor-card text-decoration-none text-center">
                                    <div class="doctor-avatar">
                                        <img src="./assets/images/Doctors/032958-bac-si-da-lieu-hoang-hong-manh.jpg"
                                            alt="Bác sĩ Nguyễn Văn A" class="doctor-img" />
                                    </div>
                                    <div class="doctor-info">
                                        <h5 class="doctor-name">BS. Hoàng Hồng Mạnh</h5>
                                        <p class="doctor-department">Khoa da liễu</p>
                                        <span class="btn btn-outline-primary btn-sm rounded-2 text-white fw-bolder">Xem
                                            chi tiết</span>
                                    </div>
                                </a>
                            </li>

                            <!-- *Bác sĩ 2* -->
                            <li class="splide__slide">
                                <a href="./app/views/Doctor/doctor.php" class="doctor-card text-decoration-none text-center">
                                    <div class="doctor-avatar">
                                        <img src="./assets/images/Doctors/045850-bac-si-da-lieu-hoai-thu.jpg"
                                            alt="Bác sĩ Nguyễn Văn A" class="doctor-img" />
                                    </div>
                                    <div class="doctor-info">
                                        <h5 class="doctor-name">BS. Hoài Thu</h5>
                                        <p class="doctor-department">Khoa Nội tổng quát</p>
                                        <span class="btn btn-outline-primary btn-sm rounded-2 text-white fw-bolder">Xem
                                            chi tiết</span>
                                    </div>
                                </a>
                            </li>

                            <!-- *Bác sĩ 3* -->
                            <li class="splide__slide">
                                <a href="./app/views/Doctor/doctor.php" class="doctor-card text-decoration-none text-center">
                                    <div class="doctor-avatar">
                                        <img src="./assets/images/Doctors/avatar-Huynh-Quoc-Hieu.jpg"
                                            alt="Bác sĩ Nguyễn Văn A" class="doctor-img" />
                                    </div>
                                    <div class="doctor-info">
                                        <h5 class="doctor-name">BS. Huỳnh Quốc Hiêu</h5>
                                        <p class="doctor-department">Khoa Nội tổng quát</p>
                                        <span class="btn btn-outline-primary btn-sm rounded-2 text-white fw-bolder">Xem
                                            chi tiết</span>
                                    </div>
                                </a>
                            </li>

                            <!-- *Bác sĩ 4* -->
                            <li class="splide__slide">
                                <a href="./app/views/Doctor/doctor.php" class="doctor-card text-decoration-none text-center">
                                    <div class="doctor-avatar">
                                        <img src="./assets/images/Doctors/avatar-TS.BS_.Chu-Trong-Hiep.webp"
                                            alt="Bác sĩ Nguyễn Văn A" class="doctor-img" />
                                    </div>
                                    <div class="doctor-info">
                                        <h5 class="doctor-name">BS. Chu Trọng Hiệp</h5>
                                        <p class="doctor-department">Khoa Nội tổng quát</p>
                                        <span class="btn btn-outline-primary btn-sm rounded-2 text-white fw-bolder">Xem
                                            chi tiết</span>
                                    </div>
                                </a>
                            </li>

                            <!-- *Bác sĩ 5* -->
                            <li class="splide__slide">
                                <a href="./app/views/Doctor/doctor.php" class="doctor-card text-decoration-none text-center">
                                    <div class="doctor-avatar">
                                        <img src="./assets/images/Doctors/1536566238-bacsy.jpg"
                                            alt="Bác sĩ Nguyễn Văn A" class="doctor-img" />
                                    </div>
                                    <div class="doctor-info">
                                        <h5 class="doctor-name">BS. Lê Hoài Thương</h5>
                                        <p class="doctor-department">Khoa Nội tổng quát</p>
                                        <span class="btn btn-outline-primary btn-sm rounded-2 text-white fw-bolder">Xem
                                            chi tiết</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- *Show Consultation* -->
    <section class="health-consult-section py-5 border-bottom animate-on-scroll visible">
        <div class="container">
            <div class="col">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h3
                        class="mb-2 text-primary position-relative section-title-underline animate-on-scroll fw-bold visible text-capitalize text-center">
                        Tư vấn sức khỏe
                    </h3>
                    <a href="./app/views/blog.php"
                        class="text-decoration-none btn rounded-pill px-4 fw-medium btn-more">Xem
                        thêm</a>
                </div>
            </div>

            <div class="col-md-12">
                <div class="splide health-slider">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <!-- *Làm bài test* -->
                            <li class="splide__slide">
                                <a href="./app/views/test.php" class="health-card text-decoration-none">
                                    <div class="health-img-wrapper">
                                        <img src="./assets/images/Banner/baitest.jpg" alt="Làm bài test"
                                            class="health-img" />
                                    </div>
                                    <div class="health-info text-center">
                                        <h5 class="health-title">Làm bài test</h5>
                                        <p class="health-desc">
                                            Đánh giá nhanh tình trạng sức khỏe
                                        </p>
                                    </div>
                                </a>
                            </li>

                            <!-- *Hỏi đáp miễn phí* -->
                            <li class="splide__slide">
                                <a href="./app/views/blog.php" class="health-card text-decoration-none">
                                    <div class="health-img-wrapper">
                                        <img src="./assets/images/Banner/BS-tu-van-truc-tuyen-scaled.webp"
                                            alt="Cẩm nang sức khỏe" class="health-img" />
                                    </div>
                                    <div class="health-info text-center">
                                        <h5 class="health-title">Tin tức </h5>
                                        <p class="health-desc">
                                            Xem các bản tin mới nhất
                                        </p>
                                    </div>
                                </a>
                            </li>

                            <!-- *Liên hệ hỗ trợ* -->
                            <li class="splide__slide">
                                <a href="./app/views/contact.php" class="health-card text-decoration-none">
                                    <div class="health-img-wrapper">
                                    <img src="./assets/images/Banner/15286388737940828273262951986749102473157648n-1-16226320314851228811282-crop-1622632145661774901212.webp"
                                    alt="Hỏi đáp miễn phí" class="health-img" />
                                    </div>
                                    <div class="health-info text-center">
                                        <h5 class="health-title">Liên hệ hỗ trợ</h5>
                                        <p class="health-desc">
                                            Chăm sóc khách hàng 24/7
                                        </p>
                                    </div>
                                </a>
                            </li>

                            <!-- *Cẩm nang sức khỏe* -->
                            <li class="splide__slide">
                                <a href="./app/views/blog.php" class="health-card text-decoration-none">
                                    <div class="health-img-wrapper">
                                        <img src="./assets/images/Banner/A-120-1024x683.jpg"
                                            alt="Hỏi đáp miễn phí" class="health-img" />
                                    </div>
                                    <div class="health-info text-center">
                                        <h5 class="health-title">Cẩm nang sức khỏe</h5>
                                        <p class="health-desc">
                                            Kiến thức y tế, lời khuyên bác sĩ
                                        </p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- *Shop Deal Online * -->
    <section class="shop-deals py-5 border-bottom animate-on-scroll visible">
        <div class="container">
            <div class="col">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h3
                        class="mb-2 text-primary position-relative section-title-underline animate-on-scroll fw-bold visible text-capitalize text-center">
                        Thực phẩm bổ sung
                    </h3>
                    <a href="./app/views/shop.php"
                        class="text-decoration-none btn rounded-pill px-4 fw-medium btn-more">Xem
                        thêm</a>
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="splide home-splide-deals">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <!-- *Item 01* -->
                                <li class="splide__slide">
                                    <div class="card overflow-hidden">
                                        <div class="card-img position-relative card__img">
                                            <img data-src="./assets/images/Shop/Medical/medical11.avif" alt=""
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
                                                    class="card-price--old text-decoration-line-through opacity-50 text-primary">150.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">120.000đ</span>
                                            </p>
                                            <div class="progress mb-2" role="progressbar"
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
                                    <div class="card overflow-hidden">
                                        <div class="card-img position-relative card__img">
                                            <img data-src="./assets/images/Shop/Medical/medical12.avif" alt=""
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
                                                    class="card-price--old text-decoration-line-through opacity-50 text-primary">561.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">476.850đ</span>
                                            </p>
                                            <div class="progress mb-2" role="progressbar"
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
                                    <div class="card overflow-hidden">
                                        <div class="card-img position-relative card__img">
                                            <img data-src="./assets/images/Shop/Medical/medical14.avif" alt=""
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
                                                    class="card-price--old text-decoration-line-through opacity-50 text-primary">1.350.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">1.012.500đ</span>
                                            </p>
                                            <div class="progress mb-2" role="progressbar"
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
                                    <div class="card overflow-hidden">
                                        <div class="card-img position-relative card__img">
                                            <img data-src="./assets/images/Shop/Medical/medical15.avif" alt=""
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
                                                    class="card-price--old text-decoration-line-through opacity-50 text-primary">135.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">60.000đ</span>
                                            </p>
                                            <div class="progress mb-2" role="progressbar"
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
                                    <div class="card overflow-hidden">
                                        <div class="card-img position-relative card__img">
                                            <img data-src="./assets/images/Shop/Medical/medical16.avif" alt=""
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
                                                    class="card-price--old text-decoration-line-through opacity-50 text-primary">62.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">49.600đ</span>
                                            </p>
                                            <div class="progress mb-2" role="progressbar"
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
                                    <div class="card overflow-hidden">
                                        <div class="card-img position-relative card__img">
                                            <img data-src="./assets/images/Shop/Medical/medical18.avif" alt=""
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
                                                    class="card-price--old text-decoration-line-through opacity-50 text-primary">1.599.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">1.119.300đ</span>
                                            </p>
                                            <div class="progress mb-2" role="progressbar"
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
                                    <div class="card overflow-hidden">
                                        <div class="card-img position-relative card__img">
                                            <img data-src="./assets/images/Shop/Medical/medical07.avif" alt=""
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
                                                    class="card-price--old text-decoration-line-through opacity-50 text-primary">780.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">395.000đ</span>
                                            </p>
                                            <div class="progress mb-2" role="progressbar"
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
                                    <div class="card overflow-hidden">
                                        <div class="card-img position-relative card__img">
                                            <img data-src="./assets/images/Shop/Medical/medical08.avif" alt=""
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
                                                    class="card-price--old text-decoration-line-through opacity-50 text-primary">780.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">423.000đ</span>
                                            </p>
                                            <div class="progress mb-2" role="progressbar"
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
                                    <div class="card overflow-hidden">
                                        <div class="card-img position-relative card__img">
                                            <img data-src="./assets/images/Shop/Medical/medical09.avif" alt=""
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
                                                    class="card-price--old text-decoration-line-through opacity-50 text-primary">625.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">437.000đ</span>
                                            </p>
                                            <div class="progress mb-2" role="progressbar"
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
                                    <div class="card overflow-hidden">
                                        <div class="card-img position-relative card__img">
                                            <img data-src="./assets/images/Shop/Medical/medical10.avif" alt=""
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
                                                    class="card-price--old text-decoration-line-through opacity-50 text-primary">1480.000đ</span>
                                                <span class="card-price--new fw-semibold text-primary">785.000đ</span>
                                            </p>
                                            <div class="progress mb-2" role="progressbar"
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


     <!-- *Button trigger modal (Hidden by default)* -->
     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#doctorHubModal"
        style="display: none">
        Mở Modal
    </button>

    <!--* Modal* -->
    <div class="modal fade" id="doctorHubModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="doctorHubModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="doctorHubModalLabel">
                        Chào mừng đến với DoctorHub
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="./assets/images/Banner/bannerModal.png" class="img-fluid" alt="DoctorHub Image" />
                    <p>
                        DoctorHub là nơi cung cấp thông tin sức khỏe và kết nối với các
                        chuyên gia y tế. Hãy đăng ký ngay để nhận các lời khuyên hữu ích!
                    </p>
                    <p>
                        Chúng tôi cung cấp các dịch vụ tư vấn trực tuyến với các bác sĩ
                        chuyên khoa hàng đầu.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                    <a href="./app/views/appointment_form.php" type="button" class="btn btn-primary text-decoration-none">Đăng ký ngay</a>
                </div>
            </div>
        </div>
    </div>

    <!-- *Cẩm nang Sức khỏe* -->
    <section class="health-guide-section py-5 border-bottom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3
                    class="mb-2 text-primary position-relative section-title-underline fw-bold text-capitalize text-center">
                    Cẩm nang
                </h3>
                <a href="" class="btn rounded-pill px-4 fw-medium btn-more">Xem thêm</a>
            </div>

            <div class="splide health-guide-slider">
                <div class="splide__track">
                    <ul class="splide__list">
                        <!-- *Item 1* -->
                        <li class="splide__slide">
                            <a href="#" class="guide-card text-decoration-none">
                                <div class="guide-thumb">
                                    <img data-src="./assets/images/Banner/camnang5.png" alt="Guide 1"
                                        class="lazyload" />
                                    <div class="guide-overlay">
                                        <span>News</span>
                                    </div>
                                </div>
                                <div class="guide-title">
                                    Chọn bệnh viện thẩm mỹ nào thì uy tín?
                                </div>
                            </a>
                        </li>

                        <!-- *Item 2* -->
                        <li class="splide__slide">
                            <a href="https://www.vinmec.com/vie/bai-viet/nhung-dieu-phu-nu-sau-sinh-mo-can-biet-vi"
                                class="guide-card text-decoration-none">
                                <div class="guide-thumb">
                                    <img data-src="./assets/images/Banner/camnang1.png" alt="Guide 1"
                                        class="lazyload" />
                                    <div class="guide-overlay">
                                        <span>News</span>
                                    </div>
                                </div>
                                <div class="guide-title">
                                    Những điều phụ nữ sau sinh mổ cần biết
                                </div>
                            </a>
                        </li>

                        <!-- *Item 3* -->
                        <li class="splide__slide">
                            <a href="https://tamanhhospital.vn/suy-giam-tri-nho/"
                                class="guide-card text-decoration-none">
                                <div class="guide-thumb">
                                    <img data-src="./assets/images/Banner/camnang3.png" alt="Guide 1"
                                        class="lazyload" />
                                    <div class="guide-overlay">
                                        <span>News</span>
                                    </div>
                                </div>
                                <div class="guide-title">
                                    Suy giảm trí nhớ: Dấu hiệu, nguyên nhân, chẩn đoán và phòng
                                    ngừa
                                </div>
                            </a>
                        </li>

                        <!-- *Item 4* -->
                        <li class="splide__slide">
                            <a href="https://benhvienthucuc.vn/suy-giam-tri-nho-nen-an-gi-de-cai-thien-hieu-qua/"
                                class="guide-card text-decoration-none">
                                <div class="guide-thumb">
                                    <img data-src="./assets/images/Banner/camnang2.png" alt="Guide 1"
                                        class="lazyload" />
                                    <div class="guide-overlay">
                                        <span>News</span>
                                    </div>
                                </div>
                                <div class="guide-title">
                                    Suy giảm trí nhớ nên ăn gì để cải thiện hiệu quả?
                                </div>
                            </a>
                        </li>

                        <!-- *Item 5* -->
                        <li class="splide__slide">
                            <a href="https://benhvienthucuc.vn/man-duc-nam-lam-mat-ngu-co-che-va-cach-cai-thien/"
                                class="guide-card text-decoration-none">
                                <div class="guide-thumb">
                                    <img data-src="./assets/images/Banner/camnang4.png" alt="Guide 1"
                                        class="lazyload" />
                                    <div class="guide-overlay">
                                        <span>News</span>
                                    </div>
                                </div>
                                <div class="guide-title">
                                    Mãn dục nam làm mất ngủ: Cơ chế và cách cải thiện
                                </div>
                            </a>
                        </li>

                        <!-- *Item 6* -->
                        <li class="splide__slide">
                            <a href="https://benhvienthucuc.vn/benh-roi-loan-tien-dinh-nguyen-nhan-trieu-chung-dieu-tri/"
                                class="guide-card text-decoration-none">
                                <div class="guide-thumb">
                                    <img data-src="./assets/images/Banner/camnang6.png" alt="Guide 1"
                                        class="lazyload" />
                                    <div class="guide-overlay">
                                        <span>News</span>
                                    </div>
                                </div>
                                <div class="guide-title">
                                    Bệnh rối loạn tiền đình: Nguyên nhân, triệu chứng, điều trị
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

        <!-- *Blog-home* -->
        <section class="blog-home">
        <div class="container py-5 text-center">
            <h2
                class="mb-5 text-primary position-relative section-title-underline animate-on-scroll fw-bold visible text-capitalize">
                Tin tức
            </h2>

            <div class="splide animate-on-scroll" id="blog-slider">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <a href="#!" class="text-decoration-none">
                                <div class="card blog-card">
                                    <img alt="A person using a laptop with a stethoscope on the table"
                                        class="card-img-top lazyload" height="400"
                                        data-src="./assets/images/Blog/LBr7jLZR-Thuoc-Cum-tamiflu-768x403.jpg"
                                        width="600" />
                                    <div class="card-body card d-flex flex-column">
                                        <div class="d-flex flex-column" style="text-align: start;">
                                            <h5 class="card-title text-primary-emphasis">
                                                Có nên mua thuốc Tamiflu để điều trị cúm A tại nhà
                                                không?
                                            </h5>
                                            <p class="card-text text-secondary flex-grow-1 mb-2">
                                                Cúm A là một bệnh truyền nhiễm phổ biến, đặc biệt trong
                                                mùa lạnh. Nhiều người tự hỏi liệu có nên mua thuốc
                                                Tamiflu để điều trị cúm A tại nhà hay không.
                                            </p>
                                        </div>

                                        <a href="#" class="btn button learn-more text-decoration-none">
                                            <span class="circle" aria-hidden="true">
                                                <span class="icon arrow"></span>
                                            </span>
                                            <span class="button-text">Xem Thêm</span>
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="splide__slide">
                            <a href="#!" class="text-decoration-none">
                                <div class="card blog-card">
                                    <img alt="A doctor smiling in a park" class="card-img-top lazyload" height="400"
                                        data-src="./assets/images/Blog/cum-mua-768x456.jpg" width="600" />
                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex flex-column" style="text-align: start;">
                                            <h5 class="card-title text-primary-emphasis">
                                                Cúm mùa: Triệu chứng, cách phòng ngừa và điều trị hiệu
                                                quả
                                            </h5>
                                            <p class="card-text text-secondary flex-grow-1 mb-2">
                                                Cúm mùa (hay còn gọi là influenza) là một bệnh nhiễm
                                                trùng đường hô hấp cấp tính do virus cúm gây ra. Bệnh
                                                lây lan rất nhanh chóng và có thể gây ra các triệu chứng
                                                từ nhẹ đến nặng
                                            </p>
                                        </div>
                                        <a href="#" class="btn button learn-more text-decoration-none">
                                            <span class="circle" aria-hidden="true">
                                                <span class="icon arrow"></span>
                                            </span>
                                            <span class="button-text">Xem Thêm</span>
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="splide__slide">
                            <a href="#!" class="text-decoration-none">
                                <div class="card blog-card">
                                    <img alt="A laptop, coffee cup, and phone on a wooden table"
                                        class="card-img-top lazyload" height="400"
                                        data-src="./assets/images/Blog/20210318_030801_537597_che_do_an_uong_can_max_1800x1800_jpg_e73157190b-768x480.jpg"
                                        width="600" />
                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex flex-column" style="text-align: start;">
                                            <h5 class="card-title text-primary-emphasis">
                                                10 Bí Quyết Chăm Sóc Sức Khỏe Toàn Diện: Hành Trình Đến
                                                Sự Khỏe Mạnh
                                            </h5>
                                            <p class="card-text text-secondary flex-grow-1 mb-2">
                                                Sống khỏe không chỉ là ước mơ, mà là điều bạn có thể đạt
                                                được. Chăm sóc sức khỏe toàn diện giúp bạn tràn đầy năng
                                                lượng, tinh thần thoải mái và cơ thể bền bỉ.
                                            </p>
                                        </div>
                                        <a href="#" class="btn button learn-more text-decoration-none">
                                            <span class="circle" aria-hidden="true">
                                                <span class="icon arrow"></span>
                                            </span>
                                            <span class="button-text">Xem Thêm</span>
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include 'partials/footer.php'; ?>