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
    <title>Chi tiết sản phẩm</title>
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

                        <a href="./signIn.php" class="topbar__home--login text-dark small d-none d-md-block">Đăng
                            nhập</a>
                        <a href="./signUp.php" class="topbar__home--register text-dark small d-none d-md-block">Đăng
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
    <div class="container mt-4">
        <div class="row">
            <!-- Cột Hình ảnh sản phẩm -->
            <div class="col-md-5">
                <div class="card">
                    <img src="/assets/images/Shop/Medical/medical01.avif" class="card-img-top" alt="Sản phẩm" />
                </div>
                <div class="d-flex mt-3">
                    <img src="/assets/images/Shop/Medical/medical01.01.avif" class="img-thumbnail me-2" width="70" />
                    <img src="/assets/images/Shop/Medical/medical01.02.avif" class="img-thumbnail me-2" width="70" />
                    <img src="/assets/images/Shop/Medical/medical01.03.avif" class="img-thumbnail me-2" width="70" />
                </div>
            </div>

            <!-- Cột Thông tin sản phẩm -->
            <div class="col-md-4">
                <h4 class="fw-bold">
                    Viên đông trùng hạ thảo Wellness Nutrition (Hộp 90 viên)
                </h4>
                <p class="text-muted">
                    Mã sản phẩm: P16618 • Thương hiệu: Nature Gift
                </p>
                <h3 class="text-danger">785.000 đ/Hộp</h3>
                <p class="text-success">Tích lũy từ 7.850 P-Xu vàng</p>
                <p>
                    <strong>56.9k</strong> lượt thích • <strong>10.5k</strong> đã bán
                </p>

                <div class="mb-3">
                    <span class="badge bg-success">Khuyến mãi</span>
                    <span>Mua 1 Tặng 1 (01-31/3)</span>
                </div>

                <div class="mb-3">
                    <h6>Phân loại sản phẩm</h6>
                    <button class="btn btn-outline-primary">Hộp</button>
                </div>

                <!-- Số lượng -->
                <div class="d-flex align-items-center mb-3">
                    <h6 class="me-3">Số lượng:</h6>
                    <button class="btn btn-outline-secondary btn-sm">-</button>
                    <input type="text" value="1" class="form-control mx-2 text-center" style="width: 50px" />
                    <button class="btn btn-outline-secondary btn-sm">+</button>
                </div>

                <!-- Nút thao tác -->
                <div class="d-flex">
                    <button class="btn buy-now me-2">
                        <i class="bi bi-cart"></i> Mua ngay
                    </button>

                    <button class="btn btn-addCart">
                        <div class="svg-wrapper-1">
                            <div class="svg-wrapper">
                                <i class="bi bi-bag"></i>
                            </div>
                        </div>
                        <span>Thêm vào giỏ</span>
                    </button>
                </div>
            </div>

            <!-- Cột Phương thức thanh toán -->
            <div class="col-md-3">
                <div class="card p-3">
                    <h6>Phương thức thanh toán</h6>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-credit-card"></i> Thanh toán bằng thẻ</li>
                        <li><i class="bi bi-wallet2"></i> Ví điện tử (Momo, ZaloPay)</li>
                        <li><i class="bi bi-cash"></i> Thanh toán khi nhận hàng (COD)</li>
                        <li><i class="bi bi-bank"></i> Chuyển khoản ngân hàng</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Mô tả sản phẩm -->
        <div class="row mt-4">
            <div class="col-md-12">
                <h5>Thông tin sản phẩm</h5>
                <table class="table">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <td>Thực phẩm bảo vệ sức khỏe Wellness Nutrition</td>
                    </tr>
                    <tr>
                        <th>Danh mục</th>
                        <td>Vitamin và khoáng chất</td>
                    </tr>
                    <tr>
                        <th>Công dụng</th>
                        <td>Hỗ trợ tăng cường sức khỏe, bồi bổ cơ thể</td>
                    </tr>
                </table>
            </div>
        </div>
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
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
<script src="/services/handlePlacePayment.js"></script>
<script src="/services/hanleTabPayment.js"></script>

</html>