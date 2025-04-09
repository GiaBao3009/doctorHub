<?php
if (!empty($_GET['q'])) {
    $query = htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8'); 

    switch ($query) {
        case 'info':
            phpinfo();
            exit;
        default:
            header("HTTP/1.0 404 Not Found");
            echo "Invalid query parameter.";
            exit;
    }
}
?>
<!-- *Sidebar* -->
<?php include_once 'partials/sidebar.php'; ?>

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
    <meta name="60552469035-27c42t2tcr98qbmp27b6r2tti6b8vvql.apps.googleusercontent.com"
        content="YOUR_GOOGLE_CLIENT_ID" />

    <!-- *Title* -->
    <title>DoctorHub - Đặt Lịch Khám và Tư Vấn Sức Khỏe</title>
    <!-- *Favicon* -->
    <link rel="icon" href="./assets/images/Logo/DoctorHub.png" type="image/x-icon" />
    <!-- *Liên kết Bootstrap CSS* -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- *Liên kết RemixIcon* -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" rel="stylesheet" />
    <!-- *Splide CSS* -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js" />
    <!-- *Fontawesome* -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <!-- *LazySizes* -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" />

    <!-- *Stylesheets* -->
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/base.css" />
    <link rel="stylesheet" href="./assets/css/responsive.css" />
    <link rel="stylesheet" href="./assets/css/animation.css" />
    <!-- *Mobile Optimization* -->
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="theme-color" content="#0d6efd" />
    <style>
    .user-profile {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    </style>
</head>

<body>

    <?php include_once 'partials/header.php'; ?>

    <!-- *Banner-home* -->
    <div class="banner__home py-5 border-bottom">
        <div class="container">
            <div class="row">
                <div
                    class="col-md-5 d-flex flex-column justify-content-center align-items-start order-last order-md-first">
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
                    <a class="text-decoration-none btn cssbuttons-io-button" href="/pages/book.html">
                        Đặt Lịch Ngay
                        <div class="icon">
                            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="col-md-7">
                    <a href="/pages/book.html" class="text-decoration-none banner__home--wrap mt-3 mt-md-0">
                        <img data-src="./assets/images/Banner/BannerHome.png" alt="Banner Image"
                            class="img-fluid w-100 shadow rounded-2 lazyload mb-md-0 mb-3" />
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- *about-home* -->
    <section class="about py-5 bg-light">
        <div class="container text-center">
            <div class="about__icon mb-3">
                <img data-src="./assets/images/Icon/doctornurse-svgrepo-com.svg" alt="" class="img-fluid lazyloaded"
                    style="width: 50px">
            </div>
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
                        <img data-src="./assets/images/Icon/security-shield-svgrepo-com.svg" alt=""
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

    <!-- *Category-home* -->
    <section class="py-5 border-bottom animate-on-scroll">
        <div class="container mt-4">
            <h1 class="mb-4">Danh mục nổi bật</h1>

            <div class="row">
                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Reproductive health icon" data-src="./assets/images/Icon/sinhsan.avif"
                            class="lazyload" />
                        <span>Sức khỏe sinh sản</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Eye health icon" data-src="./assets/images/Icon/mat.avif" class="lazyload" />
                        <span>Mắt</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Ear, nose, and throat health icon" data-src="./assets/images/Icon/taimuihong.avif"
                            class="lazyload" />
                        <span>Tai - Mũi - Họng</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Respiratory health icon" data-src="./assets/images/Icon/hohap.avif"
                            class="lazyload" />
                        <span>Hô hấp</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Parasitic treatment icon" data-src="./assets/images/Icon/kysinhtrung.avif"
                            class="lazyload" />
                        <span>Thuốc trị ký sinh trùng</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Mental health icon" data-src="./assets/images/Icon/tamthan.avif" class="lazyload" />
                        <span>Tâm thần</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Bone and joint health icon" data-src="./assets/images/Icon/coxuongkhop.avif"
                            class="lazyload" />
                        <span>Cơ - Xương - Khớp</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Cancer icon" data-src="./assets/images/Icon/ungthu.avif" class="lazyload" />
                        <span>Ung thư</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Infectious diseases icon" data-src="./assets/images/Icon/truyennhiem.avif"
                            class="lazyload" />
                        <span>Truyền nhiễm</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Endocrine and metabolic health icon"
                            data-src="./assets/images/Icon/noitiet-chuyenhoa.avif" class="lazyload" />
                        <span>Nội tiết - Chuyển hóa</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Kidney and urinary health icon" data-src="./assets/images/Icon/than.avif"
                            class="lazyload" />
                        <span>Thận - Tiết niệu</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Allergy icon" data-src="./assets/images/Icon/diung.avif" class="lazyload" />
                        <span>Dị ứng</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Skin, hair, and nail health icon" height="40"
                            data-src="./assets/images/Icon/da-toc-mong.avif" width="40" class="lazyload" />
                        <span>Da - Tóc - Móng</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Cardiovascular health icon" data-src="./assets/images/Icon/timmach.avif"
                            class="lazyload" />
                        <span>Tim mạch</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Blood health icon" data-src="./assets/images/Icon/mau.avif" class="lazyload" />
                        <span>Máu</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Vitamin and mineral supplements icon" data-src="./assets/images/Icon/vitamin.avif"
                            class="lazyload" />
                        <span>Vitamin - khoáng chất</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Diabetes icon" data-src="./assets/images/Icon/tieuduong.avif" class="lazyload" />
                        <span>Tiểu đường</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Dental health icon" data-src="./assets/images/Icon/rang-ham-mat.avif"
                            class="lazyload" />
                        <span>Răng - Hàm - Mặt</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Liver health icon" data-src="./assets/images/Icon/gan.avif" class="lazyload" />
                        <span>Gan</span>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-md-3 mb-3">
                    <div class="category-card animate-on-scroll">
                        <img alt="Digestive health icon" data-src="./assets/images/Icon/tieuhoa.avif"
                            class="lazyload" />
                        <span>Tiêu hóa</span>
                    </div>
                </div>
            </div>
        </div>
    </section>



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
                        <div class="timeline__event__icon">👩‍⚕️</div>
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

    <!-- *About-home* -->
    <section class="about py-5 bg-light animate-on-scroll">
        <div class="container text-center">
            <div class="about__icon mb-3">
                <img data-src="./assets/images/Icon/doctornurse-svgrepo-com.svg" alt="" class="img-fluid lazyload"
                    style="width: 50px" />
            </div>
            <h2 class="mb-3 text-primary position-relative section-title-underline animate-on-scroll fw-bold">
                Về DoctorHub
            </h2>
            <p class="text-muted animate-on-scroll about__desc">
                DoctorHub là nền tảng kết nối giữa bệnh nhân và bác sĩ uy tín trên
                toàn quốc. Với sứ mệnh nâng cao trải nghiệm chăm sóc sức khỏe hiện
                đại, tiện lợi và nhanh chóng.
            </p>
        </div>
    </section>

    <!-- ** -->
    <div class="container search-box bg-white shadow rounded p-4">
        <div class="row">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-map-marker-alt"
                                style="height: 23.3px"></i></span>
                    </div>
                    <input class="form-control" placeholder="Bệnh viện" type="text" />
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar-alt" style="height: 23.3px"></i></span>
                    </div>
                    <input class="form-control" placeholder="Ngày Khám Bệnh" type="text" />
                </div>
            </div>
            <div class="col-md-3 mb-3 mb-md-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user" style="height: 23.3px"></i></span>
                    </div>
                    <input class="form-control" placeholder="Bác sĩ" type="text" />
                </div>
            </div>
            <div class="col-md-1">
                <button class="btn btn-warning btn-block text-white" style="width: 70px">
                    Tìm
                </button>
            </div>
        </div>
    </div>

    <!-- *Show Doctor * -->
    <section class="featured-doctors py-5 border-bottom animate-on-scroll visible">
        <div class="container">
            <div class="col">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h3
                        class="mb-2 text-primary position-relative section-title-underline fw-bold text-capitalize text-center">
                        Bác sĩ nổi bật
                    </h3>
                    <a href="/pages/doctors.html"
                        class="text-decoration-none btn rounded-pill px-4 fw-medium btn-more">Xem thêm</a>
                </div>
            </div>

            <div class="col-md-12">
                <div class="splide home-splide-cotor">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <!-- *Bác sĩ 1* -->
                            <li class="splide__slide">
                                <a href="/pages/book.html" class="doctor-card text-decoration-none text-center">
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
                                <a href="/pages/book.html" class="doctor-card text-decoration-none text-center">
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
                                <a href="/pages/book.html" class="doctor-card text-decoration-none text-center">
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
                                <a href="/pages/book.html" class="doctor-card text-decoration-none text-center">
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
                                <a href="/pages/book.html" class="doctor-card text-decoration-none text-center">
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
                    <a href="/pages/consultation.html"
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
                                <a href="/pages/test.html" class="health-card text-decoration-none">
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
                                <a href="/pages/faq.html" class="health-card text-decoration-none">
                                    <div class="health-img-wrapper">
                                        <img src="./assets/images/Banner/BS-tu-van-truc-tuyen-scaled.webp"
                                            alt="Cẩm nang sức khỏe" class="health-img" />
                                    </div>
                                    <div class="health-info text-center">
                                        <h5 class="health-title">Hỏi đáp miễn phí</h5>
                                        <p class="health-desc">
                                            Đặt câu hỏi & được bác sĩ giải đáp
                                        </p>
                                    </div>
                                </a>
                            </li>

                            <!-- *Sức khỏe tinh thần* -->
                            <li class="splide__slide">
                                <a href="/pages/mental-health.html" class="health-card text-decoration-none">
                                    <div class="health-img-wrapper">
                                        <img src="./assets/images/Banner/A-120-1024x683.jpg" alt="Sức khỏe tinh thần"
                                            class="health-img w-100 img-fluid" />
                                    </div>
                                    <div class="health-info text-center">
                                        <h5 class="health-title">Sức khỏe tinh thần</h5>
                                        <p class="health-desc">
                                            Chăm sóc tâm lý, vượt qua căng thẳng
                                        </p>
                                    </div>
                                </a>
                            </li>

                            <!-- *Cẩm nang sức khỏe* -->
                            <li class="splide__slide">
                                <a href="/pages/handbook.html" class="health-card text-decoration-none">
                                    <div class="health-img-wrapper">
                                        <img src="./assets/images/Banner/15286388737940828273262951986749102473157648n-1-16226320314851228811282-crop-1622632145661774901212.webp"
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
                    <button type="button" class="btn btn-primary">Đăng ký ngay</button>
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
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title text-primary-emphasis">
                                            Có nên mua thuốc Tamiflu để điều trị cúm A tại nhà
                                            không?
                                        </h5>
                                        <p class="card-text text-secondary flex-grow-1 mb-2">
                                            Cúm A là một bệnh truyền nhiễm phổ biến, đặc biệt trong
                                            mùa lạnh. Nhiều người tự hỏi liệu có nên mua thuốc
                                            Tamiflu để điều trị cúm A tại nhà hay không.
                                        </p>

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
                                        <h5 class="card-title text-primary-emphasis">
                                            10 Bí Quyết Chăm Sóc Sức Khỏe Toàn Diện: Hành Trình Đến
                                            Sự Khỏe Mạnh
                                        </h5>
                                        <p class="card-text text-secondary flex-grow-1 mb-2">
                                            Sống khỏe không chỉ là ước mơ, mà là điều bạn có thể đạt
                                            được. Chăm sóc sức khỏe toàn diện giúp bạn tràn đầy năng
                                            lượng, tinh thần thoải mái và cơ thể bền bỉ.
                                        </p>
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

    <?php include_once 'partials/footer.php'; ?>
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
<script src="./assets/javascript/main.js" type="module"></script>
<script src="./services/handleModal.js"></script>
<script src="./services/handleSlider.js"></script>
<script src="./services/handleSlider.js"></script>
<!-- *Lazysizes* -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.0/lazysizes.min.js" async=""></script>
<!-- *Splide JS* -->

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script>
function onSignIn(googleUser) {
    // Lấy thông tin người dùng sau khi đăng nhập thành công
    var profile = googleUser.getBasicProfile();
    var user = {
        name: profile.getName(),
        avatar: profile.getImageUrl(),
        email: profile.getEmail(),
    };

    // Lưu thông tin người dùng vào localStorage
    localStorage.setItem("user", JSON.stringify(user));

    // Điều hướng về trang chủ (hoặc trang bạn muốn)
    window.location.href = "index.html";
}

document.addEventListener("DOMContentLoaded", function() {
    const loginBtn = document.querySelector(".topbar__home--login");
    const registerBtn = document.querySelector(".topbar__home--register");
    const userProfile = document.getElementById("user-profile");
    const userAvatar = document.getElementById("user-avatar");
    const userName = document.getElementById("user-name");
    const logoutBtn = document.getElementById("logout-btn");

    // Kiểm tra xem người dùng có đăng nhập không
    const user = JSON.parse(localStorage.getItem("user"));

    if (user) {
        // Nếu đã đăng nhập, ẩn nút Đăng nhập & Đăng ký, hiển thị Avatar
        loginBtn.style.display = "none";
        registerBtn.style.display = "none";
        userProfile.classList.remove("d-none");

        // Hiển thị thông tin người dùng
        userAvatar.src = user.avatar;
        userName.textContent = user.name;
    }

    // Xử lý khi người dùng đăng xuất
    logoutBtn.addEventListener("click", function() {
        localStorage.removeItem("user");
        window.location.reload(); // Reload lại trang
    });
});
</script>
<!-- * Google API* -->
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>

</html>