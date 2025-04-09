<!DOCTYPE html>
<html lang="vi">

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
    <title>Giỏ Hàng</title>
    <!-- *Favicon* -->
    <link rel="icon" href="/assets/images//Logo/DoctorHub.png" type="image/x-icon" />
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
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/base.css" />
    <link rel="stylesheet" href="../../assets/css/responsive.css" />
    <link rel="stylesheet" href="../../assets/css/animation.css" />
    <!-- *Mobile Optimization* -->
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="theme-color" content="#0d6efd" />
    <style>
    .support {
        position: fixed;
        left: 70px;
        bottom: 80px;
        z-index: 999;
    }

    .tooltip-container {
        background: rgb(3, 169, 244);
        background: linear-gradient(138deg,
                rgb(0, 0, 0) 15%,
                rgb(0, 31, 46) 65%);
        position: relative;
        cursor: pointer;
        font-size: 17px;
        padding: 0.7em 0.7em;
        border-radius: 50px;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }

    .tooltip-container:hover {
        background: #fff;
        transition: all 0.9s;
    }

    .tooltip-container .text {
        display: flex;
        align-items: center;
        justify-content: center;
        fill: #fff;
        transition: all 0.2s;
    }

    .tooltip-container:hover .text {
        fill: rgb(0, 0, 0);
        transition: all 0.9s;
    }

    /* Inicio do tooltip twitter */
    .tooltip1 {
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        opacity: 0;
        visibility: hidden;
        background: #000000;
        fill: #001722;
        padding: 10px;
        border-radius: 50px;
        transition: opacity 0.3s, visibility 0.3s, top 0.3s, background 0.3s;
        z-index: 1;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .tooltip-container:hover .tooltip1 {
        top: 150%;
        opacity: 1;
        visibility: visible;
        background: #fff;
        border-radius: 50px;
        transform: translate(-50%, -5px);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tooltip-container:hover .tooltip1:hover {
        background: #03a9f4;
        fill: #fff;
    }

    /* Fim do tooltip twitter */

    /* Inicio do tooltip facebook */
    .tooltip2 {
        position: absolute;
        top: 100%;
        left: 50%;
        transform: translateX(-50%);
        opacity: 0;
        visibility: hidden;
        background: #fff;
        fill: #001722;
        padding: 10px;
        border-radius: 50px;
        transition: opacity 0.3s, visibility 0.3s, top 0.3s, background 0.3s;
        z-index: 1;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .tooltip-container:hover .tooltip2 {
        top: -120%;
        opacity: 1;
        visibility: visible;
        background: #fff;
        transform: translate(-50%, -5px);
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tooltip-container:hover .tooltip2:hover {
        background: #001722;
        fill: #fff;
    }

    /* Fim do tooltip facebook */

    /* Inicio do tooltip whatsApp */
    .tooltip3 {
        position: absolute;
        top: 100%;
        left: 60%;
        transform: translateX(80%);
        opacity: 0;
        visibility: hidden;
        background: #fff;
        fill: #001722;
        padding: 10px;
        border-radius: 50px;
        transition: opacity 0.3s, visibility 0.3s, top 0.3s, background 0.3s;
        z-index: 1;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .tooltip-container:hover .tooltip3 {
        top: 10%;
        opacity: 1;
        visibility: visible;
        background: #fff;
        transform: translate(85%, -5px);
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tooltip-container:hover .tooltip3:hover {
        background: #1db954;
        fill: #000000;
    }

    /* Fim do tooltip whatsApp */

    /* Inicio do tooltip Discord */
    .tooltip4 {
        position: absolute;
        top: 100%;
        left: -190%;
        transform: translateX(70%);
        opacity: 0;
        visibility: hidden;
        background: #fff;
        fill: #001722;
        padding: 10px;
        border-radius: 50px;
        transition: opacity 0.3s, visibility 0.3s, top 0.3s, background 0.3s;
        z-index: 1;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .tooltip-container:hover .tooltip4 {
        top: 10%;
        opacity: 1;
        visibility: visible;
        background: #fff;
        transform: translate(70%, -5px);
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tooltip-container:hover .tooltip4:hover {
        background: #8c9eff;
        fill: #fff;
    }

    /* Fim do tooltip Discord */

    /* Inicio do tooltip pinterest */
    .tooltip5 {
        position: absolute;
        top: 100%;
        left: -145%;
        transform: translateX(70%);
        opacity: 0;
        visibility: hidden;
        background: #fff;
        fill: #001722;
        padding: 10px;
        border-radius: 50px;
        transition: opacity 0.3s, visibility 0.3s, top 0.3s, background 0.3s;
        z-index: 1;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .tooltip-container:hover .tooltip5 {
        top: -78%;
        opacity: 1;
        visibility: visible;
        background: #fff;
        transform: translate(70%, -5px);
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tooltip-container:hover .tooltip5:hover {
        background: #bd081c;
        fill: #fff;
    }

    /* Fim do tooltip pinterest */

    /* Inicio do tooltip dribbble */
    .tooltip6 {
        position: absolute;
        top: 100%;
        left: 35%;
        transform: translateX(70%);
        opacity: 0;
        visibility: hidden;
        background: #fff;
        fill: #001722;
        padding: 10px;
        border-radius: 50px;
        transition: opacity 0.3s, visibility 0.3s, top 0.3s, background 0.3s;
        z-index: 1;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .tooltip-container:hover .tooltip6 {
        top: -79%;
        opacity: 1;
        visibility: visible;
        background: #fff;
        transform: translate(70%, -5px);
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tooltip-container:hover .tooltip6:hover {
        background: #ea4c89;
        fill: #fff;
    }

    /* Fim do tooltip dribbble */

    /* Inicio do tooltip github */
    .tooltip7 {
        position: absolute;
        top: 100%;
        left: 39%;
        transform: translateX(70%);
        opacity: 0;
        visibility: hidden;
        background: #fff;
        fill: #001722;
        padding: 10px;
        border-radius: 50px;
        transition: opacity 0.3s, visibility 0.3s, top 0.3s, background 0.3s;
        z-index: 1;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .tooltip-container:hover .tooltip7 {
        top: 104%;
        opacity: 1;
        visibility: visible;
        background: #fff;
        transform: translate(70%, -5px);
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tooltip-container:hover .tooltip7:hover {
        background: #000;
        fill: #fff;
    }

    /* Fim do tooltip github */

    /* Inicio do tooltip reddit */
    .tooltip8 {
        position: absolute;
        top: 100%;
        left: -150%;
        transform: translateX(70%);
        opacity: 0;
        visibility: hidden;
        background: #fff;
        fill: #001722;
        padding: 10px;
        border-radius: 50px;
        transition: opacity 0.3s, visibility 0.3s, top 0.3s, background 0.3s;
        z-index: 1;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .tooltip-container:hover .tooltip8 {
        top: 101%;
        opacity: 1;
        visibility: visible;
        background: #fff;
        transform: translate(70%, -5px);
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .tooltip-container:hover .tooltip8:hover {
        background: #ff4500;
        fill: #fff;
    }

    /* Fim do tooltip reddit */

    /* Inicio do tooltip fixo */
    .tooltip9 {
        position: absolute;
        top: 0;
        left: -115%;
        opacity: 0;
        visibility: hidden;
        width: 150px;
        height: 150px;
        z-index: -1;
    }

    .tooltip-container:hover .tooltip9 {
        top: -110%;
        opacity: 1;
        visibility: visible;
        border-radius: 50%;
        z-index: -1;
    }
    </style>
</head>

<body style="background: #f7f8fc">
    <!-- *Navbar* -->
    <header class="header">
        <div class="container">
            <div class="topbar py-3 border-bottom bg-white">
                <div class="container d-flex justify-content-between align-items-center">
                    <div class="contact-info small text-muted d-flex">
                        <strong>Email:</strong>
                        <a href="mailto:vaniizit.work@gmail.com?subject=Yêu%20cầu%20được%20hỗ%20trợ%20từ%20website%20DoctorHub"
                            class="topbar__mail">vaniizit.work@gmail.com</a>
                        |
                        <strong class="ms-1 d-none d-md-flex">Hotline:
                            <a href="tel:+84 252 032 375"
                                class="text-decoration-none cart__home--phone text-dark fw-bold">+84 252 032
                                375</a>
                        </strong>
                    </div>
                    <div class="user-actions d-flex align-items-center gap-3">
                        <div class="g-signin2" data-onsuccess="onSignIn"></div>

                        <a href="./signUp.php" class="topbar__home--login text-dark small d-none d-md-block">Đăng
                            nhập</a>
                        <a href="./signIn.php" class="topbar__home--register text-dark small d-none d-md-block">Đăng
                            ký</a>

                        <div id="user-profile" class="user-profile d-none">
                            <img id="user-avatar" src="" alt="User Avatar" class="rounded-circle" width="40"
                                height="40" />
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownUser"
                                    data-bs-toggle="dropdown">
                                    <span id="user-name">User</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#" id="logout-btn">Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand navbar__link d-flex align-items-center" href="../../index.php">
                    <img data-src="../../assets/images/Logo/DoctorHub.png" alt="Logo" width="30" height="24"
                        class="d-inline-block align-text-top img-fluid navbar__logo lazyload" />
                    DoctorHub
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: end">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="../../index.php">Trang Chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./book.php">Đặt Lịch Khám</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./consultation.php">Tư Vấn Sức Khỏe</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./services.php">Dịch Vụ Y Tế</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./contact.php">Liên Hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./blog.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./shop.php">Shop</a>
                        </li>
                        <!-- Search Form -->
                        <form class="d-flex ms-md-3 ms-0" role="search">
                            <div class="me-2">
                                <input class="form-control me-2 w-100" type="search" placeholder="Search"
                                    aria-label="Search" />
                            </div>
                            <button class="btn btn-outline-success" type="submit">
                                Search
                            </button>
                        </form>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="container mt-5">
        <div class="row">
            <!-- Danh sách sản phẩm -->
            <div class="col-lg-8">
                <div class="d-flex align-items-center">
                    <h4 class="fw-bold me-2">Giỏ Hàng</h4>
                    <i class="ri-shopping-cart-line fs-3"></i>
                </div>
                <p class="text-muted">2 sản phẩm trong giỏ hàng của bạn.</p>

                <div class="card p-3 mb-3">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="/assets/images/Shop/Medical/medical02.avif" class="img-fluid rounded"
                                alt="Sản phẩm" />
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold">Đầm Hoa Xanh</h6>
                            <p class="text-muted mb-1">Màu sắc: Xanh</p>
                            <p class="text-muted">Kích thước: 42</p>
                        </div>
                        <div class="col-md-2">
                            <p class="fw-bold">20.50 đ</p>
                        </div>
                        <div class="col-md-2 d-flex align-items-center">
                            <button class="btn btn-light btn-sm">-</button>
                            <input type="text" class="form-control text-center mx-1" value="2" style="width: 40px" />
                            <button class="btn btn-light btn-sm">+</button>
                        </div>
                    </div>
                </div>
                <div class="card p-3 mb-3">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="/assets/images/Shop/Medical/medical01.avif" class="img-fluid rounded"
                                alt="Sản phẩm" />
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold">Đầm Hoa Đỏ</h6>
                            <p class="text-muted mb-1">Màu sắc: Đỏ</p>
                            <p class="text-muted">Kích thước: 42</p>
                        </div>
                        <div class="col-md-2">
                            <p class="fw-bold">30.50 đ</p>
                        </div>
                        <div class="col-md-2 d-flex align-items-center">
                            <button class="btn btn-light btn-sm">-</button>
                            <input type="text" class="form-control text-center mx-1" value="1" style="width: 40px" />
                            <button class="btn btn-light btn-sm">+</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Phần thanh toán -->
            <div class="col-lg-4">
                <div class="card p-3 mb-3">
                    <h6 class="fw-bold">Tính phí vận chuyển</h6>
                    <select id="province" class="form-select mb-2">
                        <option selected>Chọn tỉnh / thành phố</option>
                    </select>
                    <select id="district" class="form-select mb-2">
                        <option selected>Chọn quận / huyện</option>
                    </select>
                    <input type="text" class="form-control mb-2" placeholder="Mã bưu điện" />
                    <button class="continue-application">
                        <div>
                            <div class="pencil"></div>
                            <div class="folder">
                                <div class="top">
                                    <svg viewBox="0 0 24 27">
                                        <path
                                            d="M1,0 L23,0 C23.5522847,-1.01453063e-16 24,0.44771525 24,1 L24,8.17157288 C24,8.70200585 23.7892863,9.21071368 23.4142136,9.58578644 L20.5857864,12.4142136 C20.2107137,12.7892863 20,13.2979941 20,13.8284271 L20,26 C20,26.5522847 19.5522847,27 19,27 L1,27 C0.44771525,27 6.76353751e-17,26.5522847 0,26 L0,1 C-6.76353751e-17,0.44771525 0.44771525,1.01453063e-16 1,0 Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="paper"></div>
                            </div>
                        </div>
                        Cập nhật
                    </button>
                </div>

                <div class="card p-3 mb-3">
                    <h6 class="fw-bold">Mã giảm giá</h6>
                    <p class="text-muted">Nhập mã để nhận ưu đãi.</p>
                    <input type="text" class="form-control mb-2" placeholder="Nhập mã giảm giá" />

                    <button class="btn-discount btn w-100">
                        <span class="box"> Áp dụng </span>
                    </button>
                </div>

                <div class="card p-3">
                    <h6 class="fw-bold">Tổng đơn hàng</h6>
                    <p class="d-flex justify-content-between">
                        <span>Tạm tính</span>
                        <span>71.50 đ</span>
                    </p>
                    <p class="d-flex justify-content-between">
                        <span>Giảm giá</span>
                        <span class="text-danger">- 4.00 đ</span>
                    </p>
                    <h5 class="fw-bold d-flex justify-content-between">
                        <span>Tổng cộng</span>
                        <span class="text-success">67.50 đ</span>
                    </h5>
                    <button class="btn btn-warning w-100">Thanh toán</button>
                </div>
            </div>
        </div>
    </div>

    <div class="support">
        <div class="container">
            <div class="row">
                <div class="tooltip-container">
                    <span class="text">
                        <svg viewBox="0 0 16 16" class="bi bi-send-fill" height="22" width="22"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z">
                            </path>
                        </svg>
                    </span>
                    <span class="tooltip1">
                        <svg viewBox="0 0 16 16" class="bi bi-twitter" height="20" width="20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15">
                            </path>
                        </svg>
                    </span>
                    <span class="tooltip2">
                        <svg viewBox="0 0 16 16" class="bi bi-facebook" height="20" width="20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951">
                            </path>
                        </svg>
                    </span>
                    <span class="tooltip3">
                        <svg viewBox="0 0 16 16" class="bi bi-whatsapp" height="20" width="20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232">
                            </path>
                        </svg>
                    </span>
                    <span class="tooltip4">
                        <svg viewBox="0 0 16 16" class="bi bi-discord" height="20" width="20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.545 2.907a13.2 13.2 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.2 12.2 0 0 0-3.658 0 8 8 0 0 0-.412-.833.05.05 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.04.04 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032q.003.022.021.037a13.3 13.3 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019q.463-.63.818-1.329a.05.05 0 0 0-.01-.059l-.018-.011a9 9 0 0 1-1.248-.595.05.05 0 0 1-.02-.066l.015-.019q.127-.095.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.05.05 0 0 1 .053.007q.121.1.248.195a.05.05 0 0 1-.004.085 8 8 0 0 1-1.249.594.05.05 0 0 0-.03.03.05.05 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.2 13.2 0 0 0 4.001-2.02.05.05 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.03.03 0 0 0-.02-.019m-8.198 7.307c-.789 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612m5.316 0c-.788 0-1.438-.724-1.438-1.612s.637-1.613 1.438-1.613c.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612">
                            </path>
                        </svg>
                    </span>
                    <span class="tooltip5">
                        <svg viewBox="0 0 16 16" class="bi bi-pinterest" height="20" width="20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0">
                            </path>
                        </svg>
                    </span>
                    <span class="tooltip6">
                        <svg viewBox="0 0 16 16" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 0C3.584 0 0 3.584 0 8s3.584 8 8 8c4.408 0 8-3.584 8-8s-3.592-8-8-8m5.284 3.688a6.8 6.8 0 0 1 1.545 4.251c-.226-.043-2.482-.503-4.755-.217-.052-.112-.096-.234-.148-.355-.139-.33-.295-.668-.451-.99 2.516-1.023 3.662-2.498 3.81-2.69zM8 1.18c1.735 0 3.323.65 4.53 1.718-.122.174-1.155 1.553-3.584 2.464-1.12-2.056-2.36-3.74-2.551-4A7 7 0 0 1 8 1.18m-2.907.642A43 43 0 0 1 7.627 5.77c-3.193.85-6.013.833-6.317.833a6.87 6.87 0 0 1 3.783-4.78zM1.163 8.01V7.8c.295.01 3.61.053 7.02-.971.199.381.381.772.555 1.162l-.27.078c-3.522 1.137-5.396 4.243-5.553 4.504a6.82 6.82 0 0 1-1.752-4.564zM8 14.837a6.8 6.8 0 0 1-4.19-1.44c.12-.252 1.509-2.924 5.361-4.269.018-.009.026-.009.044-.017a28.3 28.3 0 0 1 1.457 5.18A6.7 6.7 0 0 1 8 14.837m3.81-1.171c-.07-.417-.435-2.412-1.328-4.868 2.143-.338 4.017.217 4.251.295a6.77 6.77 0 0 1-2.924 4.573z"
                                fill-rule="evenodd"></path>
                        </svg>
                    </span>
                    <span class="tooltip7">
                        <svg viewBox="0 0 16 16" class="bi bi-github" height="20" width="20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8">
                            </path>
                        </svg>
                    </span>
                    <span class="tooltip8">
                        <svg viewBox="0 0 16 16" class="bi bi-reddit" height="20" width="20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.167 8a.83.83 0 0 0-.83.83c0 .459.372.84.83.831a.831.831 0 0 0 0-1.661m1.843 3.647c.315 0 1.403-.038 1.976-.611a.23.23 0 0 0 0-.306.213.213 0 0 0-.306 0c-.353.363-1.126.487-1.67.487-.545 0-1.308-.124-1.671-.487a.213.213 0 0 0-.306 0 .213.213 0 0 0 0 .306c.564.563 1.652.61 1.977.61zm.992-2.807c0 .458.373.83.831.83s.83-.381.83-.83a.831.831 0 0 0-1.66 0z">
                            </path>
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.828-1.165c-.315 0-.602.124-.812.325-.801-.573-1.9-.945-3.121-.993l.534-2.501 1.738.372a.83.83 0 1 0 .83-.869.83.83 0 0 0-.744.468l-1.938-.41a.2.2 0 0 0-.153.028.2.2 0 0 0-.086.134l-.592 2.788c-1.24.038-2.358.41-3.17.992-.21-.2-.496-.324-.81-.324a1.163 1.163 0 0 0-.478 2.224q-.03.17-.029.353c0 1.795 2.091 3.256 4.669 3.256s4.668-1.451 4.668-3.256c0-.114-.01-.238-.029-.353.401-.181.688-.592.688-1.069 0-.65-.525-1.165-1.165-1.165">
                            </path>
                        </svg>
                    </span>
                    <span class="tooltip9"> </span>
                </div>
            </div>
        </div>
    </div> <!-- ** -->
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

</html>