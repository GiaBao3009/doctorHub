<?php
// Include the initialization file
require_once '../../config/init.php';
?>
<?php include '../../partials/sidebar.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- *SEO Meta Tags* -->
    <meta name="description"
        content="Liên hệ DoctorHub để được hỗ trợ chăm sóc sức khỏe trực tuyến. Gửi thông tin hoặc gọi ngay +84 28 3912 3456." />
    <meta name="keywords"
        content="DoctorHub, liên hệ, chăm sóc sức khỏe, tư vấn y tế, đặt lịch khám" />
    <meta name="robots" content="index, follow" />
    <!-- *Open Graph Meta Tags for Social Media* -->
    <meta property="og:title" content="Liên hệ - DoctorHub" />
    <meta property="og:description"
        content="Liên hệ với DoctorHub để được hỗ trợ chăm sóc sức khỏe trực tuyến." />
    <meta property="og:image" content="../../assets/images/Logo/DoctorHub.png" />
    <meta property="og:url" content="https://www.doctorhub.com/pages/contact.php" />
    <meta property="og:type" content="website" />
    <!-- *Twitter Card Meta Tags* -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Liên hệ - DoctorHub" />
    <meta name="twitter:description"
        content="Liên hệ DoctorHub để được hỗ trợ chăm sóc sức khỏe trực tuyến." />
    <meta name="twitter:image" content="../../assets/images/Logo/DoctorHub.png" />
    <!-- *Title* -->
    <title>DoctorHub | Liên Hệ</title>
    <!-- *Favicon* -->
    <link rel="icon" href="../../assets/images/Logo/DoctorHub.png" type="image/x-icon" />
    <!-- *Liên kết Bootstrap CSS* -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- *Liên kết RemixIcon* -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" rel="stylesheet" /> 
    <!-- *SweetAlert2 CSS* -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet" />
    <!-- *Fontawesome* -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <!-- *AOS CSS* -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- *SweetAlert2 CSS* -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet" />
    <!-- *Stylesheets* -->
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/base.css" />
    <link rel="stylesheet" href="../../assets/css/responsive.css" />
    <!-- *Mobile Optimization* -->
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="theme-color" content="#0d6efd" />
    <style>
        /* Contact Section */
        .contact-section {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 15px;
            padding: 3rem 0;
        }

        .contact-form .form-control {
            border-radius: 10px;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
            padding: 12px;
        }

        .contact-form .form-control:focus {
            border-color: #2d6fe0;
            box-shadow: 0 0 10px rgba(45, 111, 224, 0.3);
        }

        .contact-form .form-label {
            font-weight: 500;
            color: #333;
        }

        .contact-form .is-invalid {
            border-color: #dc3545;
        }

        .contact-info li {
            font-size: 1.1rem;
            line-height: 1.8;
            transition: transform 0.3s ease;
        }

        .contact-info li:hover {
            transform: translateX(10px);
        }

        .contact-info i {
            color: #2d6fe0;
            transition: color 0.3s ease;
        }

        .contact-info li:hover i {
            color: #1a5bc8;
        }

        .section-title-underline::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 5px;
            background: linear-gradient(to right, #2d6fe0, #6a93ff);
            border-radius: 3px;
        }

        .map-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .contact-section {
                padding: 2rem 0;
            }

            .contact-form .form-control {
                padding: 10px;
            }

            .cssbuttons-io-button {
                font-size: 1rem;
                padding: 0.4em 1.2em;
            }

            .contact-info li {
                font-size: 1rem;
            }

            .map-container iframe {
                height: 250px;
            }
        }

        @media (max-width: 576px) {
            .section-title-underline::after {
                width: 40px;
                height: 4px;
            }

            .contact-form .form-label {
                font-size: 0.9rem;
            }
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
                            <a class="nav-link" href="./blog.php">Blog</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('shop.php'); ?>">
                            <a class="nav-link" href="./shop.php">Shop</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <!-- Banner -->
        <section class="py-5 banner__contact border-bottom" data-aos="fade-up" data-aos-duration="1000">
            <div class="container text-center">
                <h1 class="mb-3 text-primary fw-bold section-title-underline position-relative">Liên hệ với DoctorHub</h1>
                <p class="text-muted lead">
                    Chúng tôi luôn sẵn sàng hỗ trợ bạn. Hãy điền thông tin dưới đây hoặc liên hệ trực tiếp qua email, điện thoại.
                </p>
            </div>
        </section>

        <!-- Form liên hệ và thông tin liên hệ -->
        <section class="py-5 contact-section">
            <div class="container">
                <div class="row g-4">
                    <!-- Form liên hệ -->
                    <div class="col-lg-6" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                        <h3 class="mb-4 text-primary">Gửi thông tin cho chúng tôi</h3>
                        <form id="contactForm" action="process_contact.php" method="POST" class="contact-form">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Họ và tên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="fullName" name="fullName" required>
                                <div class="invalid-feedback">Vui lòng nhập họ và tên.</div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div class="invalid-feedback">Vui lòng nhập email hợp lệ.</div>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                                <div class="invalid-feedback">Số điện thoại không hợp lệ.</div>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Nội dung <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                <div class="invalid-feedback">Vui lòng nhập nội dung.</div>
                            </div>
                            <button type="submit" class=" cssbuttons-io-button">
                                Gửi thông tin
                                <div class="icon">
                                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            </button>
                        </form>
                    </div>

                    <!-- Thông tin liên hệ -->
                    <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                        <h3 class="mb-4 text-primary">Thông tin liên hệ</h3>
                        <ul class="list-unstyled contact-info">
                            <li class="mb-3 d-flex align-items-center">
                                <i class="ri-map-pin-line fs-3 text-primary me-3"></i>
                                <span>123 Đường Sức Khỏe, Quận 1, TP. Hồ Chí Minh, Việt Nam</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="ri-phone-line fs-3 text-primary me-3"></i>
                                <a href="tel:+842839123456" class="text-decoration-none text-muted">+84 28 3912 3456</a>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class="ri-mail-line fs-3 text-primary me-3"></i>
                                <a href="mailto:support@doctorhub.com" class="text-decoration-none text-muted">support@doctorhub.com</a>
                            </li>
                        </ul>
                        <!-- Bản đồ Google Maps -->
                        <div class="mt-4 map-container">
                            <iframe class="w-100 lazyload" height="300"
                                data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.304411516293!2d106.7431147761687!3d10.864435489289768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527ce050eb2df%3A0x7eb924fa994fb4e5!2zQuG7h25oIFZp4buHbiBUaMOgbmggUGjhu5EgVGjhu6cgxJDhu6lj!5e0!3m2!1svi!2s!4v1746846382691!5m2!1svi!2s"
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
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
    <!-- Footer -->
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
                © Bản quyền thuộc về <strong>DoctorHub</strong> | Cung by
                <a href="https://www.instagram.com/viinhneee/" class="fw-semibold text-decoration-none"
                    style="color: var(--primary-color)">VaniizIT</a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    <script src="/assets/javascript/main.js" type="module"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Khởi tạo AOS
            AOS.init({
                duration: 1000,
                once: true,
                offset: 100
            });

            // Lazy load images
            const lazyImages = document.querySelectorAll("img.lazyload, iframe.lazyload");
            if ("IntersectionObserver" in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const element = entry.target;
                            element.src = element.dataset.src;
                            element.classList.remove("lazyload");
                            observer.unobserve(element);
                        }
                    });
                });
                lazyImages.forEach(element => imageObserver.observe(element));
            } else {
                lazyImages.forEach(element => {
                    element.src = element.dataset.src;
                    element.classList.remove("lazyload");
                });
            }

            // Xác thực form
            const contactForm = document.getElementById('contactForm');
            contactForm.addEventListener('submit', function (event) {
                event.preventDefault();
                let isValid = true;

                // Reset trạng thái invalid
                const inputs = contactForm.querySelectorAll('input, textarea');
                inputs.forEach(input => {
                    input.classList.remove('is-invalid');
                    input.nextElementSibling.style.display = 'none';
                });

                // Validate Họ và tên
                const fullName = document.getElementById('fullName');
                if (!fullName.value.trim() || fullName.value.length < 2) {
                    fullName.classList.add('is-invalid');
                    fullName.nextElementSibling.style.display = 'block';
                    isValid = false;
                }

                // Validate Email
                const email = document.getElementById('email');
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email.value)) {
                    email.classList.add('is-invalid');
                    email.nextElementSibling.style.display = 'block';
                    isValid = false;
                }

                // Validate Số điện thoại (nếu có)
                const phone = document.getElementById('phone');
                const phoneRegex = /^[0-9]{10,11}$/;
                if (phone.value && !phoneRegex.test(phone.value)) {
                    phone.classList.add('is-invalid');
                    phone.nextElementSibling.style.display = 'block';
                    isValid = false;
                }

                // Validate Nội dung
                const message = document.getElementById('message');
                if (!message.value.trim() || message.value.length < 10) {
                    message.classList.add('is-invalid');
                    message.nextElementSibling.style.display = 'block';
                    isValid = false;
                }

                if (isValid) {
                    // Gửi form qua AJAX
                    const formData = new FormData(contactForm);
                    fetch('process_contact.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Gửi thành công!',
                                text: 'Chúng tôi sẽ liên hệ với bạn sớm.',
                                confirmButtonColor: '#2d6fe0'
                            }).then(() => {
                                contactForm.reset();
                                window.location.href = '../../index.php';
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi!',
                                text: data.message,
                                confirmButtonColor: '#2d6fe0'
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi!',
                            text: 'Đã có lỗi xảy ra. Vui lòng thử lại.',
                            confirmButtonColor: '#2d6fe0'
                        });
                    });
                }
            });
        });
    </script>
</body>
</html>