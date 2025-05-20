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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <link rel="stylesheet" href="../../assets/css/test.css" />
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
    <section class="psychology-test-section">
        <div class="container">
            <h1 class="psychology-test-title">Các bài Test Tâm Lý</h1>
            <p class="psychology-test-description">Chúng tôi cung cấp các bài test tư duy đánh giá để giúp bạn hiểu rõ
                hơn về tình trạng tâm lý của mình. Các bài test này được thiết kế bởi các chuyên gia và có thể cung cấp
                cho bạn những thông tin hữu ích về sức khỏe tâm thần của bạn. Hãy thử ngay hôm nay để bắt đầu hành trình
                khám phá bản thân. </p>
            <div class="row gap-3">
                <div class="col-md-12">
                    <div class="test-card-wrapper border"><img src="../../assets/images/Test/baitest1.png"
                            class="test-card-image img-fluid" alt="Beck Depression Test">
                        <div class="test-card-content">
                            <span class="test-card-label test-card-label--usually">BÀI TEST PHỔ BIẾN</span>
                            <h5 class="test-card-heading">Bài Test Trầm cảm BECK (BDI)</h5>
                            <div class="test-card-details-container">
                                <p class="test-card-details">
                                    Bài test BECK, hay còn gọi là BDI (Beck Depression Inventory), là một trong những
                                    công cụ đánh giá phổ biến nhất để đo lường mức độ trầm cảm của một người. Được phát
                                    triển bởi nhà tâm lý học Aaron T. Beck, bài test này giúp nhận diện các triệu chứng
                                    trầm cảm như buồn bã, mất hứng thú, hoặc mệt mỏi kéo dài, hỗ trợ người dùng tự đánh
                                    giá và tìm kiếm sự hỗ trợ tâm lý kịp thời. Nội dung bài test dựa trên các nghiên cứu
                                    đáng tin cậy về sức khỏe tâm thần.
                                </p>
                                <ul class="test-card-details-list">
                                    <li><strong>Câu hỏi:</strong> 21 câu hỏi.</li>
                                    <li><strong>Đối tượng:</strong> Người có các triệu chứng như buồn bã, mất hứng thú,
                                        mệt mỏi kéo dài, v.v.</li>
                                    <li><strong>Mục đích:</strong> Phát hiện sớm các dấu hiệu trầm cảm và khuyến khích
                                        tìm kiếm hỗ trợ tâm lý kịp thời.</li>
                                    <a href="./Test/beck_test.php" class="test-card-button btn">Làm bài test</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="test-card-wrapper border"><img src="../../assets/images/Test/baitest2.png"
                            class="test-card-image img-fluid" alt="Beck Depression Test">
                        <div class="test-card-content"><span class="test-card-label test-card-label--importance ">BÀI
                                TEST QUAN TRỌNG</span>
                            <h5 class="test-card-heading">Bài Test Lo âu – Trầm cảm – Stress (DASS 21)</h5>
                            <div class="test-card-details-container">
                                <p class="test-card-details">Bài test DASS 21 (Depression Anxiety Stress Scale) là một
                                    công cụ đánh giá chuyên sâu về mức độ trầm cảm,
                                    lo âu và căng thẳng. Đối tượng nên làm bài test DASS 21 là những người có dấu hiệu
                                    của trầm cảm,
                                    lo âu và căng thẳng,
                                    đặc biệt là những người đang trải qua những tình huống căng thẳng trong cuộc sống
                                    như công việc áp lực,
                                    gia đình,
                                    hay các sự kiện khủng hoảng. </p>
                                <ul class="test-card-details-list">
                                    <li><strong>Câu hỏi:</strong>21 câu hỏi.</li>
                                    <li><strong>Đối tượng:</strong>Người có triệu chứng lo âu,
                                        trầm cảm và căng thẳng. </li>
                                    <li><strong>Mục đích:</strong>Đánh giá và đề xuất phương pháp điều trị thích hợp.
                                    </li><a href="./Test/stress_test_42.php" class="test-card-button btn">Làm bài
                                        test</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="test-card-wrapper border"><img src="../../assets/images/Test/baitest3.png"
                            class="test-card-image img-fluid" alt="Beck Depression Test">
                        <div class="test-card-content"><span class="test-card-label test-card-label--importance ">BÀI
                                TEST QUAN TRỌNG</span>
                            <h5 class="test-card-heading">Bài Test Lo âu – Trầm cảm – Stress (DASS 42)</h5>
                            <div class="test-card-details-container">
                                <p class="test-card-details">Bài test DASS 42 là một công cụ đánh giá quan trọng để đo
                                    lường mức độ rối loạn lo âu,
                                    trầm cảm và căng thẳng. Được xây dựng dựa trên nghiên cứu khoa học,
                                    bài test này được công nhận về tính chính xác và độ tin cậy trong việc đánh giá tình
                                    trạng tâm lý của cá nhân. Đối tượng nên làm bài test DASS 42 bao gồm những người có
                                    dấu hiệu của rối loạn… </p>
                                <ul class="test-card-details-list">
                                    <li><strong>Câu hỏi:</strong>21 câu hỏi.</li>
                                    <li><strong>Đối tượng:</strong>Người có triệu chứng lo âu,
                                        trầm cảm và căng thẳng. </li>
                                    <li><strong>Mục đích:</strong>Kiểm tra,
                                        phát hiện và đưa ra phương pháp điều trị thích hợp.</li><a
                                        href="./Test/stress_test_42.php" class="test-card-button btn">Làm bài test</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="test-card-wrapper border"><img src="../../assets/images/Test/baitest4.png"
                            class="test-card-image img-fluid" alt="Beck Depression Test">
                        <div class="test-card-content"><span class="test-card-label test-card-label--loop">BÀI TEST ĐỊNH
                                KỲ </span>
                            <h5 class=" test-card-heading">Bài Test Trầm cảm vị thành niên (RADS)</h5>
                            <div class="test-card-details-container">
                                <p class="test-card-details">Bài test RADS (Reynolds Adolescent Depression Scale) là một
                                    công cụ đánh giá được sử dụng để phát hiện và đo lường mức độ trầm cảm ở thanh thiếu
                                    niên.Tính chính xác và độ tin cậy của bài test RADS đã được nhiều nghiên cứu xác
                                    nhận,
                                    làm cho nó trở thành một công cụ quan trọng cho các nhà nghiên cứu và các chuyên gia
                                    sức khỏe tâm… </p>
                                <ul class="test-card-details-list">
                                    <li><strong>Câu hỏi:</strong>30 câu hỏi.</li>
                                    <li><strong>Đối tượng:</strong>Thanh thiếu niên từ 10 đến 20 tuổi. </li>
                                    <li><strong>Mục đích:</strong>Kiểm tra,
                                        phát hiện và điều trị bằng phương pháp thích hợp.</li><a
                                        href="./Test/stress_rads.php" class="test-card-button btn">Làm bài test</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="test-card-wrapper border"><img src="../../assets/images/Test/baitest5.png"
                            class="test-card-image img-fluid" alt="Beck Depression Test">
                        <div class="test-card-content"><span class="test-card-label test-card-label--importance ">BÀI
                                TEST QUAN TRỌNG</span>
                            <h5 class="test-card-heading">Bài Test Trầm cảm sau sinh (EPDS)</h5>
                            <div class="test-card-details-container">
                                <p class="test-card-details">Bài test EPDS (Edinburgh Postnatal Depression Scale) là một
                                    công cụ quan trọng được sử dụng để đo lường mức độ trầm cảm sau sinh ở phụ nữ. Được
                                    phát triển dựa trên nghiên cứu khoa học và thực tiễn lâm sàng,
                                    EPDS đã được chứng minh là có độ tin cậy và tính khả thi cao trong việc sàng lọc và
                                    đánh giá các triệu chứng trầm cảm sau sinh. </p>
                                <ul class="test-card-details-list">
                                    <li><strong>Câu hỏi:</strong>10 câu hỏi.</li>
                                    <li><strong>Đối tượng:</strong>Phụ nữ sau sinh có các triệu chứng trầm cảm</li>
                                    <li><strong>Mục đích:</strong>Đánh giá và xác định mức độ trầm cảm sau sinh của phụ
                                        nữ.</li><a href="./Test/test_epds.php" class="test-card-button btn">Làm bài
                                        test</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="test-card-wrapper border"><img src="../../assets/images/Test/baitest6.png"
                            class="test-card-image img-fluid" alt="Beck Depression Test">
                        <div class="test-card-content"><span class="test-card-label test-card-label--loop">BÀI TEST ĐỊNH
                                KỲ</span>
                            <h5 class="test-card-heading">Bài Test Rối loạn lo âu ZUNG (SAS)</h5>
                            <div class="test-card-details-container">
                                <p class="test-card-details">Bài test ZUNG (Zung Self-Rating Depression Scale) là một
                                    công cụ đánh giá uy tín và phổ biến để đo lường mức độ trầm cảm ở cá nhân. Được phát
                                    triển bởi William WK Zung,
                                    bài test này được sử dụng rộng rãi trong lâm sàng và nghiên cứu về sức khỏe tâm
                                    thần. Bằng cách đánh giá các triệu chứng trầm cảm theo 4 nhóm: tâm trạng,
                                    tri giác,
                                    giảm chức năng và tình cảm,
                                    … </p>
                                <ul class="test-card-details-list">
                                    <li><strong>Câu hỏi:</strong>20 câu hỏi.</li>
                                    <li><strong>Đối tượng:</strong>Người có các triệu chứng rối loạn lo âu.</li>
                                    <li><strong>Mục đích:</strong>Đánh giá mức độ nghiêm trọng và tìm giải pháp điều
                                        trị.</li><a href="./Test/test_sas.php" class="test-card-button btn">Làm bài
                                        test</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="test-card-wrapper border"><img src="../../assets/images/Test/baitest7.png"
                            class="test-card-image img-fluid" alt="Beck Depression Test">
                        <div class="test-card-content"><span class="test-card-label test-card-label--importance">BÀI
                                TEST QUAN TRỌNG</span>
                            <h5 class="test-card-heading">Bài Test Triệu chứng của Sốt Xuất Huyết</h5>
                            <div class="test-card-details-container">
                                <p class="test-card-details">Bài test này được thiết kế để đánh giá các triệu chứng liên
                                    quan đến bệnh Sốt Xuất Huyết,
                                    một bệnh truyền nhiễm do virus Dengue gây ra. Bài test giúp nhận diện các dấu hiệu
                                    phổ biến của bệnh,
                                    hỗ trợ người dùng tự đánh giá và kịp thời tìm kiếm sự chăm sóc y tế nếu cần thiết.
                                    Nội dung bài test được xây dựng dựa trên các hướng dẫn y khoa và nghiên cứu đáng tin
                                    cậy. </p>
                                <ul class="test-card-details-list">
                                    <li><strong>Câu hỏi:</strong>15 câu hỏi.</li>
                                    <li><strong>Đối tượng:</strong>Người có các triệu chứng như sốt cao,
                                        đau cơ,
                                        phát ban,
                                        chảy máu nhẹ,
                                        v.v.</li>
                                    <li><strong>Mục đích:</strong>Phát hiện sớm các triệu chứng của Sốt Xuất Huyết và
                                        khuyến khích tìm kiếm hỗ trợ y tế kịp thời.</li><a
                                        href="./Test/test_sot_xuat_huyet.php" class="test-card-button btn">Làm bài
                                        test</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="test-card-wrapper border"><img src="../../assets/images/Test/baitest8.png"
                            class="test-card-image img-fluid" alt="Beck Depression Test">
                        <div class="test-card-content"><span class="test-card-label test-card-label--usually">BÀI TEST
                                PHỔ BIẾN</span>
                            <h5 class="test-card-heading">Bài Test Triệu chứng của bệnh Tiểu Đường</h5>
                            <div class="test-card-details-container">
                                <p class="test-card-details">Bài test này được thiết kế để đánh giá các triệu chứng liên
                                    quan đến bệnh Tiểu Đường (đái tháo đường),
                                    một rối loạn chuyển hóa đặc trưng bởi lượng đường trong máu cao. Bài test giúp nhận
                                    diện các dấu hiệu phổ biến như khát nước,
                                    tiểu nhiều,
                                    mệt mỏi hoặc sụt cân không rõ nguyên nhân,
                                    hỗ trợ người dùng tự đánh giá và tìm kiếm sự chăm sóc y tế kịp thời. Nội dung bài
                                    test dựa trên các hướng dẫn y khoa đáng tin cậy. </p>
                                <ul class="test-card-details-list">
                                    <li><strong>Câu hỏi:</strong>15 câu hỏi.</li>
                                    <li><strong>Đối tượng:</strong>Người có các triệu chứng như khát nước,
                                        tiểu nhiều,
                                        mệt mỏi,
                                        sụt cân,
                                        v.v.</li>
                                    <li><strong>Mục đích:</strong>Phát hiện sớm các triệu chứng của bệnh Tiểu Đường và
                                        khuyến khích tìm kiếm hỗ trợ y tế kịp thời.</li><a
                                        href="./Test/test_tieu_duong.php" class="test-card-button btn">Làm bài test</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="test-card-wrapper border"><img src="../../assets/images/Test/baitest9.png"
                            class="test-card-image img-fluid" alt="Beck Depression Test">
                        <div class="test-card-content"><span class="test-card-label test-card-label--usually">BÀI TEST
                                PHỔ BIẾN</span>
                            <h5 class="test-card-heading">Bài Test Dị ứng thời tiết</h5>
                            <div class="test-card-details-container">
                                <p class="test-card-details">Bài test này được thiết kế để đánh giá các triệu chứng liên
                                    quan đến dị ứng thời tiết,
                                    một tình trạng phổ biến xảy ra khi cơ thể phản ứng với các thay đổi của môi trường
                                    như nhiệt độ,
                                    độ ẩm hoặc các tác nhân như phấn hoa,
                                    bụi. Bài test giúp nhận diện các dấu hiệu như hắt hơi,
                                    ngứa mũi,
                                    chảy nước mắt hoặc phát ban,
                                    hỗ trợ người dùng tự đánh giá và tìm kiếm giải pháp y tế phù hợp. Nội dung bài test
                                    dựa trên các hướng dẫn y khoa đáng tin cậy. </p>
                                <ul class="test-card-details-list">
                                    <li><strong>Câu hỏi:</strong>12 câu hỏi.</li>
                                    <li><strong>Đối tượng:</strong>Người có các triệu chứng như hắt hơi,
                                        ngứa mũi,
                                        chảy nước mắt,
                                        phát ban,
                                        v.v.</li>
                                    <li><strong>Mục đích:</strong>Phát hiện sớm các triệu chứng của dị ứng thời tiết và
                                        khuyến khích tìm kiếm hỗ trợ y tế kịp thời.</li><a href="./Test/test_di_ung.php"
                                        class="test-card-button btn">Làm bài test</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="test-card-wrapper border"><img src="../../assets/images/Test/baitest10.png"
                            class="test-card-image img-fluid" alt="Beck Depression Test">
                        <div class="test-card-content"><span class="test-card-label test-card-label--usually">BÀI TEST
                                PHỔ BIẾN</span>
                            <h5 class="test-card-heading">Bài Test Sức khỏe răng miệng</h5>
                            <div class="test-card-details-container">
                                <p class="test-card-details">Bài test này được thiết kế để đánh giá tình trạng sức khỏe
                                    răng miệng,
                                    giúp nhận diện các vấn đề phổ biến liên quan đến răng và nướu. Bài test tập trung
                                    vào các triệu chứng như đau răng,
                                    chảy máu nướu,
                                    hôi miệng hoặc răng nhạy cảm,
                                    nhằm hỗ trợ người dùng tự đánh giá và tìm kiếm sự chăm sóc nha khoa kịp thời. Nội
                                    dung bài test dựa trên các hướng dẫn nha khoa đáng tin cậy. </p>
                                <ul class="test-card-details-list">
                                    <li><strong>Câu hỏi:</strong>10 câu hỏi.</li>
                                    <li><strong>Đối tượng:</strong>Người có các triệu chứng như đau răng,
                                        chảy máu nướu,
                                        hôi miệng,
                                        răng nhạy cảm,
                                        v.v.</li>
                                    <li><strong>Mục đích:</strong>Phát hiện sớm các vấn đề về sức khỏe răng miệng và
                                        khuyến khích tìm kiếm hỗ trợ nha khoa kịp thời.</li><a
                                        href="./Test/test_rang_mieng.php" class="test-card-button btn">Làm bài test</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="test-card-wrapper border"><img src="../../assets/images/Test/baitest11.png"
                            class="test-card-image img-fluid" alt="Beck Depression Test">
                        <div class="test-card-content"><span class="test-card-label test-card-label--importance">BÀI
                                TEST QUAN TRỌNG</span>
                            <h5 class="test-card-heading">Bài Test kiểm tra dấu hiệu Ung thư da</h5>
                            <div class="test-card-details-container">
                                <p class="test-card-details">Bài test này được thiết kế để đánh giá các dấu hiệu tiềm ẩn
                                    của ung thư da,
                                    một loại bệnh lý nguy hiểm liên quan đến sự phát triển bất thường của các tế bào da.
                                    Bài test giúp nhận diện các triệu chứng như sự thay đổi về màu sắc,
                                    kích thước của nốt ruồi,
                                    vết loét không lành hoặc các tổn thương da bất thường,
                                    nhằm hỗ trợ người dùng tự đánh giá và tìm kiếm sự chăm sóc y tế kịp thời. Nội dung
                                    bài test dựa trên các hướng dẫn y khoa đáng tin cậy. </p>
                                <ul class="test-card-details-list">
                                    <li><strong>Câu hỏi:</strong>20 câu hỏi.</li>
                                    <li><strong>Đối tượng:</strong>Người có các dấu hiệu như nốt ruồi thay đổi,
                                        vết loét không lành,
                                        tổn thương da bất thường,
                                        v.v.</li>
                                    <li><strong>Mục đích:</strong>Phát hiện sớm các dấu hiệu của ung thư da và khuyến
                                        khích tìm kiếm hỗ trợ y tế kịp thời.</li><a href="./Test/test_hieu_ung_da.php"
                                        class="test-card-button btn">Làm bài test</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="test-card-wrapper border"><img src="../../assets/images/Test/baitest12.png"
                            class="test-card-image img-fluid" alt="Beck Depression Test">
                        <div class="test-card-content"><span class="test-card-label test-card-label--loop">BÀI TEST ĐỊNH
                                KỲ</span>
                            <h5 class="test-card-heading">Bài Test kiểm tra dấu hiệu thiếu sắt</h5>
                            <div class="test-card-details-container">
                                <p class="test-card-details">Bài test này được thiết kế để đánh giá các dấu hiệu liên
                                    quan đến tình trạng thiếu sắt,
                                    một nguyên nhân phổ biến gây thiếu máu và ảnh hưởng đến sức khỏe tổng thể. Bài test
                                    giúp nhận diện các triệu chứng như mệt mỏi,
                                    da nhợt nhạt,
                                    khó thở,
                                    hoặc móng tay dễ gãy,
                                    hỗ trợ người dùng tự đánh giá và tìm kiếm sự chăm sóc y tế nếu cần thiết. Nội dung
                                    bài test dựa trên các hướng dẫn y khoa đáng tin cậy. </p>
                                <ul class="test-card-details-list">
                                    <li><strong>Câu hỏi:</strong>20 câu hỏi.</li>
                                    <li><strong>Đối tượng:</strong>Người có các triệu chứng như mệt mỏi,
                                        da nhợt nhạt,
                                        khó thở,
                                        móng tay dễ gãy,
                                        v.v.</li>
                                    <li><strong>Mục đích:</strong>Phát hiện sớm các dấu hiệu thiếu sắt và khuyến khích
                                        tìm kiếm hỗ trợ y tế kịp thời.</li><a href="./Test/test_thieu_sat.php"
                                        class="test-card-button btn">Làm
                                        bài test</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="test-card-wrapper border"><img src="../../assets/images/Test/baitest13.png"
                            class="test-card-image img-fluid" alt="Beck Depression Test">
                        <div class="test-card-content"><span class="test-card-label test-card-label--usually">BÀI TEST
                                PHỔ BIẾN</span>
                            <h5 class="test-card-heading">Bài Test dấu hiệu bệnh Parkinson</h5>
                            <div class="test-card-details-container">
                                <p class="test-card-details">Bài test này được thiết kế để đánh giá các dấu hiệu liên
                                    quan đến bệnh Parkinson,
                                    một rối loạn thần kinh tiến triển ảnh hưởng đến khả năng vận động và kiểm soát cơ
                                    thể. Bài test giúp nhận diện các triệu chứng như run tay,
                                    cứng cơ,
                                    chậm vận động hoặc mất thăng bằng,
                                    hỗ trợ người dùng tự đánh giá và tìm kiếm sự chăm sóc y tế kịp thời. Nội dung bài
                                    test dựa trên các hướng dẫn y khoa đáng tin cậy. </p>
                                <ul class="test-card-details-list">
                                    <li><strong>Câu hỏi:</strong>25 câu hỏi.</li>
                                    <li><strong>Đối tượng:</strong>Người có các triệu chứng như run tay,
                                        cứng cơ,
                                        chậm vận động,
                                        mất thăng bằng,
                                        v.v.</li>
                                    <li><strong>Mục đích:</strong>Phát hiện sớm các dấu hiệu của bệnh Parkinson và
                                        khuyến khích tìm kiếm hỗ trợ y tế kịp thời.</li><a
                                        href="./Test/test_parkinson.php" class="test-card-button btn">Làm bài test</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="test-card-wrapper border"><img src="../../assets/images/Test/baitest14.png"
                            class="test-card-image img-fluid" alt="Beck Depression Test">
                        <div class="test-card-content"><span class="test-card-label test-card-label--importance">BÀI
                                TEST QUAN TRỌNG</span>
                            <h5 class="test-card-heading">Bài Test về vấn đề Tim Mạch</h5>
                            <div class="test-card-details-container">
                                <p class="test-card-details">Bài test này được thiết kế để đánh giá các dấu hiệu liên
                                    quan đến các vấn đề tim mạch,
                                    bao gồm các bệnh lý như tăng huyết áp,
                                    bệnh mạch vành hoặc suy tim. Bài test giúp nhận diện các triệu chứng như đau ngực,
                                    khó thở,
                                    mệt mỏi bất thường hoặc phù nề,
                                    hỗ trợ người dùng tự đánh giá và tìm kiếm sự chăm sóc y tế kịp thời. Nội dung bài
                                    test dựa trên các hướng dẫn y khoa đáng tin cậy. </p>
                                <ul class="test-card-details-list">
                                    <li><strong>Câu hỏi:</strong>20 câu hỏi.</li>
                                    <li><strong>Đối tượng:</strong>Người có các triệu chứng như đau ngực,
                                        khó thở,
                                        mệt mỏi bất thường,
                                        phù nề,
                                        v.v.</li>
                                    <li><strong>Mục đích:</strong>Phát hiện sớm các dấu hiệu của vấn đề tim mạch và
                                        khuyến khích tìm kiếm hỗ trợ y tế kịp thời.</li><a
                                        href="./Test/test_tim_mach.php" class="test-card-button btn">Làm bài test</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="test-card-wrapper border"><img src="../../assets/images/Test/baitest15.png"
                            class="test-card-image img-fluid" alt="Beck Depression Test">
                        <div class="test-card-content"><span class="test-card-label test-card-label--importance">BÀI
                                TEST QUAN TRỌNG</span>
                            <h5 class="test-card-heading">Bài Test kiểm tra bệnh về Não</h5>
                            <div class="test-card-details-container">
                                <p class="test-card-details">Bài test này được thiết kế để đánh giá các dấu hiệu liên
                                    quan đến các bệnh lý về não,
                                    bao gồm các rối loạn như đột quỵ,
                                    sa sút trí tuệ hoặc động kinh. Bài test giúp nhận diện các triệu chứng như đau đầu
                                    kéo dài,
                                    mất trí nhớ,
                                    co giật,
                                    hoặc thay đổi hành vi,
                                    hỗ trợ người dùng tự đánh giá và tìm kiếm sự chăm sóc y tế kịp thời. Nội dung bài
                                    test dựa trên các hướng dẫn y khoa đáng tin cậy. </p>
                                <ul class="test-card-details-list">
                                    <li><strong>Câu hỏi:</strong>35 câu hỏi.</li>
                                    <li><strong>Đối tượng:</strong>Người có các triệu chứng như đau đầu kéo dài,
                                        mất trí nhớ,
                                        co giật,
                                        thay đổi hành vi,
                                        v.v.</li>
                                    <li><strong>Mục đích:</strong>Phát hiện sớm các dấu hiệu của bệnh lý về não và
                                        khuyến khích tìm kiếm hỗ trợ y tế kịp thời.</li><a
                                        href="./Test/test_benh_ve_nao.php" class="test-card-button btn">Làm bài test</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-light pt-5 pb-3 border-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 mb-4">
                    <h5 class="fw-bold mb-3">LIÊN KẾT WEB</h5>
                    <ul class="list-unstyled text-muted">
                        <li class="text-decoration-none footer__item"><a href=""
                                class="text-decoration-none text-secondary">Bộ y tế</a></li>
                        <li class="text-decoration-none footer__item"><a href=""
                                class="text-decoration-none text-secondary">Tổ chức y tế thế giới</a></li>
                        <li class="text-decoration-none footer__item"><a href=""
                                class="text-decoration-none text-secondary">Viện vệ sinh dịch tễ TW</a></li>
                        <li class="text-decoration-none footer__item"><a href=""
                                class="text-decoration-none text-secondary">Hội nghị bệnh viện Châu Á</a></li>
                        <li class="text-decoration-none footer__item"><a href=""
                                class="text-decoration-none text-secondary">Bảo hiểm y tế ở nước ngoài</a></li>
                        <li class="text-decoration-none footer__item"><a href=""
                                class="text-decoration-none text-secondary">Bảo hiểm y tế quốc tế</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <h5 class="fw-bold mb-3">HỎI BÁC SĨ</h5>
                    <ul class="list-unstyled text-muted">
                        <li class="text-decoration-none footer__item"><a href=""
                                class="text-decoration-none text-secondary">Chuyên mục Hỏi bác sĩ</a></li>
                        <li class="text-decoration-none footer__item"><a href=""
                                class="text-decoration-none text-secondary">Gửi câu hỏi</a></li>
                        <li class="text-decoration-none footer__item"><a href=""
                                class="text-decoration-none text-secondary">Câu hỏi đã trả lời</a></li>
                        <li class="text-decoration-none footer__item"><a href=""
                                class="text-decoration-none text-secondary">Câu hỏi đáng chú ý</a></li>
                        <li class="text-decoration-none footer__item"><a href=""
                                class="text-decoration-none text-secondary">Tra cứu</a></li>
                        <li class="text-decoration-none footer__item"><a href=""
                                class="text-decoration-none text-secondary">Tra cứu bệnh</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <h5 class="fw-bold mb-3">MEDICAL CARE</h5>
                    <ul class="list-unstyled text-muted">
                        <li class="text-decoration-none footer__item"><a href=""
                                class="text-decoration-none text-secondary">Về chúng tôi</a></li>
                        <li class="text-decoration-none footer__item"><a href=""
                                class="text-decoration-none text-secondary">Tuyển dụng</a></li>
                        <li class="text-decoration-none footer__item"><a href=""
                                class="text-decoration-none text-secondary">Liên hệ</a></li>
                        <li class="text-decoration-none footer__item"><a href=""
                                class="text-decoration-none text-secondary">Quy trình giải quyết tranh chấp</a></li>
                        <li class="text-decoration-none footer__item"><a href=""
                                class="text-decoration-none text-secondary">Chính sách bảo mật thông tin</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <h5 class="fw-bold mb-3">THEO DÕI CHÚNG TÔI TRÊN</h5>
                    <ul class="list-unstyled">
                        <li class="text-decoration-none footer__item"><i
                                class="fab fa-facebook-square me-2 text-primary"></i>Facebook </li>
                        <li class="text-decoration-none footer__item"><i
                                class="fab fa-youtube me-2 text-primary"></i>Youtube </li>
                        <li class="text-decoration-none footer__item"><i
                                class="fab fa-telegram-plane me-2 text-primary"></i>Zalo </li>
                    </ul>
                    <h5 class="fw-bold mt-4 mb-3">CHỨNG NHẬN BỞI</h5>
                    <div class="d-flex align-items-center"><img
                            data-src="../../assets/images/Icon/20240706162441-0-BCT.png" alt="Chứng nhận 1"
                            class="me-2 lazyload" style="height: 30px" /><img
                            data-src="../../assets/images/Icon/20240706162441-0-DMCA.png" alt="Chứng nhận 2"
                            style="height: 30px" class="lazyload" /></div>
                    <h5 class="fw-bold mt-4 mb-3">HỖ TRỢ THANH TOÁN</h5>
                    <div class="d-flex flex-wrap"><img data-src="../../assets/images/Icon/20240706162440-0-COD.png"
                            alt="COD" class="me-2 mb-2 lazyload" style="height: 30px" /><img
                            data-src="../../assets/images/Icon/20240706162441-0-Visa.png" alt="VISA"
                            class="me-2 mb-2 lazyload" style="height: 30px" /><img
                            data-src="../../assets/images/Icon/20240706162441-0-MasterCard.png" alt="Mastercard"
                            class="me-2 mb-2 lazyload" style="height: 30px" /><img
                            data-src="../../assets/images/Icon/20240706162441-0-JCB.png" alt="JCB"
                            class="me-2 mb-2 lazyload" style="height: 30px" /><img
                            data-src="../../assets/images/Icon/20240706162441-0-Momo.png" alt="MoMo"
                            class="me-2 mb-2 lazyload" style="height: 30px" /><img
                            data-src="../../assets/images/Icon/20240706162729-0-ZaloPay.png" alt="ZaloPay"
                            class="me-2 mb-2 lazyload" style="height: 30px" /><img
                            data-src="../../assets/images/Icon/20241122062454-0-napas.png" alt="Napas"
                            class="me-2 mb-2 lazyload" style="height: 30px" /><img
                            data-src="../../assets/images/Icon/20241122063240-0-apple-pay.png" alt="Apple Pay"
                            class="me-2 mb-2 lazyload" style="height: 30px" /></div>
                </div>
            </div>
            <div class="text-center border-top pt-3 mt-3 small text-muted"
                style="display: flex; justify-content: center; gap: 8px;">© Bản quyền thuộc về
                <strong>DoctorHub</strong>| Cung cấp bởi <a href="https://www.instagram.com/viinhneee/"
                    class="fw-semibold text-decoration-none" style="color: var(--primary-color)">VaniizIT</a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="../../assets/javascript/main.js" type="module"></script>
    <script src="../../services/handleModal.js"></script>
    <script src="../../services/handleSlider.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.0/lazysizes.min.js" async="">
    </script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js">
    </script>
</body>

</html>