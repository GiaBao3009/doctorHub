<?php
// Include the initialization file
require_once '../../config/init.php';

// Blog data
$blogData = [
    [
        'id' => 1,
        'title' => "TOP 7 địa chỉ bắn laser tàn nhang uy tín tại TP.HCM",
        'image' => "https://blog.mintpear.com/wp-content/uploads/2022/09/cavitacion-2894851_1920-1536x1024.jpg",
        'date' => "30/10/2022",
        'category' => "dalieu",
        'link' => "blog-detail.php", 
        'excerpt' => "Tàn nhang là vấn đề nhiều chị em gặp phải, ảnh hưởng đến thẩm mỹ da. Bắn laser được đánh giá là phương pháp trị tàn nhang hiệu quả nhất hiện nay.",
        'readTime' => "5 phút đọc",
        'author' => "Bác sĩ Nguyễn Văn A",
        'tags' => ["da liễu", "thẩm mỹ", "laser", "tàn nhang"]
    ],
    [
        'id' => 2,
        'title' => "Đau dây thần kinh số V (số 5): triệu chứng, nguyên nhân và cách điều trị",
        'image' => "https://www.10faq.com/assets/img/causes-of-itchy-ears-02.jpg",
        'date' => "03/04/2024",
        'category' => "thankinh",
        'link' => "blog-detail2.php",
        'excerpt' => "Đau dây thần kinh số V là một trong những bệnh lý thần kinh phổ biến, gây đau đớn và ảnh hưởng đến chất lượng cuộc sống của người bệnh.",
        'readTime' => "7 phút đọc",
        'author' => "Bác sĩ Trần Thị B",
        'tags' => ["thần kinh", "đau dây thần kinh", "điều trị"]
    ],
    [
        'id' => 3,
        'title' => "6 địa chỉ khám sức khỏe tổng quát toàn diện uy tín tại TP.HCM",
        'image' => "https://www.drsamrobbins.com/wp-content/uploads/2016/12/blood-pressure-patient.jpg",
        'date' => "01/11/2022",
        'category' => "khamtongquat",
        'link' => "blog-detail3.php", 
        'excerpt' => "Khám sức khỏe tổng quát định kỳ giúp phát hiện sớm các vấn đề sức khỏe và có biện pháp điều trị kịp thời.",
        'readTime' => "6 phút đọc",
        'author' => "Bác sĩ Lê Văn C",
        'tags' => ["khám tổng quát", "sức khỏe", "phòng bệnh"]
    ],
    [
        'id' => 4,
        'title' => "6 địa chỉ khám dinh dưỡng nhi TP. HCM uy tín, nổi tiếng",
        'image' => "https://danangaz.com/wp-content/uploads/2021/08/bsm.jpg",
        'date' => "23/06/2023",
        'category' => "nhikhoa",
        'link' => "blog-detail4.php", 
        'excerpt' => "Khám dinh dưỡng nhi là việc làm cần thiết để đảm bảo sự phát triển toàn diện của trẻ. Bài viết giới thiệu 6 địa chỉ khám dinh dưỡng nhi uy tín tại TP.HCM.",
        'readTime' => "8 phút đọc",
        'author' => "Bác sĩ Phạm Thị D",
        'tags' => ["nhi khoa", "dinh dưỡng", "phát triển trẻ em"]
    ],
    [
        'id' => 5,
        'title' => "Gan nhiễm mỡ: Nguyên nhân và triệu chứng? Khám gan nhiễm mỡ tại Trung tâm Y khoa Vạn Hạnh",
        'image' => "https://vcp.com.vn/hinhanh/tintuc/ban-da-hieu-dung-ve-gan-nhiem-mo-chua.jpg",
        'date' => "17/07/2023",
        'category' => "Gan nhiễm mỡ",
        'link' => "blog-detail5.php",
        'excerpt' => "Tìm hiểu về bệnh gan nhiễm mỡ: nguyên nhân, triệu chứng, phương pháp chẩn đoán và địa chỉ khám uy tín.",
        'readTime' => "6 phút đọc",
        'author' => "Kiều Oanh",
        'tags' => ["gan nhiễm mỡ", "bệnh gan", "khám sức khỏe"]
    ],
    [
        'id' => 6,
        'title' => "Điều trị thoái hóa đốt sống cổ bằng phương pháp vật lý trị liệu",
        'image' => "https://leelajani.com/wp-content/uploads/2022/07/neck-pain.jpg",
        'date' => "20/12/2024",
        'category' => "Cột sống",
        'link' => "blog-detail6.php",
        'excerpt' => "Tìm hiểu các phương pháp vật lý trị liệu giúp điều trị thoái hóa đốt sống cổ hiệu quả, an toàn, không dùng thuốc.",
        'readTime' => "7 phút đọc",
        'author' => "Thảo Hoàng",
        'tags' => ["thoái hóa đốt sống cổ", "vật lý trị liệu", "cột sống"]
    ]
];

// Categories data
$categories = [
    [
        'id' => "dalieu",
        'name' => "Da Liễu",
        'icon' => "fas fa-spa",
        'count' => 1
    ],
    [
        'id' => "thankinh",
        'name' => "Thần Kinh",
        'icon' => "fas fa-brain",
        'count' => 1
    ],
    [
        'id' => "khamtongquat",
        'name' => "Khám Tổng Quát",
        'icon' => "fas fa-stethoscope",
        'count' => 1
    ],
    [
        'id' => "nhikhoa",
        'name' => "Nhi Khoa",
        'icon' => "fas fa-baby",
        'count' => 1
    ]
];

// Popular tags
$popularTags = [
    ['name' => "sức khỏe", 'count' => 2],
    ['name' => "dinh dưỡng", 'count' => 1],
    ['name' => "da liễu", 'count' => 1],
    ['name' => "thần kinh", 'count' => 1],
    ['name' => "tâm lý", 'count' => 1],
    ['name' => "khám sức khỏe", 'count' => 1],
    ['name' => "nhi khoa", 'count' => 1],
    ['name' => "thẩm mỹ", 'count' => 1]
];

// Handle search and filtering
$searchTerm = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : '';
$tagFilter = isset($_GET['tag']) ? strtolower(trim($_GET['tag'])) : '';

$filteredBlogs = $blogData;

if (!empty($searchTerm)) {
    $filteredBlogs = array_filter($blogData, function($post) use ($searchTerm) {
        return stripos($post['title'], $searchTerm) !== false ||
               stripos($post['excerpt'], $searchTerm) !== false ||
               array_reduce($post['tags'], function($carry, $tag) use ($searchTerm) {
                   return $carry || stripos($tag, $searchTerm) !== false;
               }, false);
    });
} elseif (!empty($categoryFilter)) {
    $filteredBlogs = array_filter($blogData, function($post) use ($categoryFilter) {
        return $post['category'] === $categoryFilter;
    });
} elseif (!empty($tagFilter)) {
    $filteredBlogs = array_filter($blogData, function($post) use ($tagFilter) {
        return in_array($tagFilter, array_map('strtolower', $post['tags']));
    });
}

$filteredBlogs = array_values($filteredBlogs); // Reindex array

// PHÂN TRANG
$postsPerPage = 4;
$totalPosts = count($filteredBlogs);
$totalPages = ceil($totalPosts / $postsPerPage);
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
if ($page > $totalPages) $page = $totalPages;

// Lấy các bài viết cho trang hiện tại
$start = ($page - 1) * $postsPerPage;
$blogsToShow = array_slice($filteredBlogs, $start, $postsPerPage);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- *SEO Meta Tags* -->
    <meta name="description" content="DoctorHub - Blog sức khỏe, cập nhật thông tin y tế mới nhất và lời khuyên từ chuyên gia." />
    <meta name="keywords" content="blog sức khỏe, thông tin y tế, tư vấn sức khỏe, bác sĩ trực tuyến, chăm sóc sức khỏe" />
    <meta name="robots" content="index, follow" />
    <!-- *Open Graph Meta Tags for Social Media* -->
    <meta property="og:title" content="DoctorHub - Blog Sức Khỏe" />
    <meta property="og:description" content="Khám phá các bài viết y tế, mẹo chăm sóc sức khỏe và tư vấn từ chuyên gia tại DoctorHub." />
    <meta property="og:image" content="URL_of_image_for_social_sharing" />
    <meta property="og:url" content="https://www.doctorhub.com/blog" />
    <meta property="og:type" content="website" />
    <!-- *Twitter Card Meta Tags* -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="DoctorHub - Blog Sức Khỏe" />
    <meta name="twitter:description" content="Cập nhật thông tin y tế mới nhất và lời khuyên từ chuyên gia tại blog DoctorHub." />
    <meta name="twitter:image" content="URL_of_image_for_twitter_card" />
    <!-- *Title* -->
    <title>DoctorHub - Blog Sức Khỏe</title>
    <!-- *Favicon* -->
    <link rel="icon" href="../../assets/images/Logo/DoctorHub.png" type="image/x-icon" />
    <!-- *Liên kết Bootstrap CSS* -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- *Liên kết RemixIcon* -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" rel="stylesheet" />
    <!-- *Fontawesome* -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <!-- *Google Fonts* -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
    <!-- *Stylesheets* -->
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/base.css" />
    <link rel="stylesheet" href="../../assets/css/responsive.css" />
    <!-- *Custom Blog Styles* -->
    <link href="../../assets/css/styles.css" rel="stylesheet"/>
    <link href="../../assets/css/blog-detail.css" rel="stylesheet"/>
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
                            <a class="nav-link" href="./book.php">Đặt Lịch Khám</a>
                        </li>
                      
                        <li class="nav-item <?php echo isActiveMenu('services.php'); ?>">
                            <a class="nav-link" href="./services.php">Dịch Vụ Y Tế</a>
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
    
    <!-- Include sidebar -->
    <?php include '../../partials/sidebar.php'; ?>

    <div class="blog-hero">
        <div class="container">
            <h1>Cẩm nang sức khỏe</h1>
            <p>Cập nhật thông tin y tế mới nhất và lời khuyên từ chuyên gia</p>
        </div>
    </div>

    <div class="search-container">
        <div class="container">
            <form class="search-form" role="search" method="get" action="">
                <input class="search-input" type="search" name="search" placeholder="Tìm kiếm bài viết..." aria-label="Search" value="<?php echo htmlspecialchars($searchTerm); ?>" />
                <button class="btn-search" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>

    <main class="container">
        <div class="row">
            <div class="col-lg-8">
                <section class="blog-section">
                    <h2 class="section-title">Bài viết mới nhất</h2>
                    <div class="blog-grid">
                        <?php if (empty($blogsToShow)): ?>
                            <div class="no-results">
                                <i class="fas fa-search fa-3x mb-3"></i>
                                <p>Không tìm thấy bài viết phù hợp</p>
                            </div>
                        <?php else: ?>
                            <?php foreach ($blogsToShow as $blog): ?>
                                <article class="blog-card">
                                    <a href="<?php echo htmlspecialchars($blog['link']); ?>" class="blog-image-link">
                                        <img src="<?php echo htmlspecialchars($blog['image']); ?>" class="blog-image" alt="<?php echo htmlspecialchars($blog['title']); ?>"/>
                                    </a>
                                    <div class="blog-content">
                                        <h3 class="blog-title">
                                            <a href="<?php echo htmlspecialchars($blog['link']); ?>"><?php echo htmlspecialchars($blog['title']); ?></a>
                                        </h3>
                                        <p class="blog-excerpt"><?php echo htmlspecialchars($blog['excerpt']); ?></p>
                                        <div class="blog-meta">
                                            <span><i class="far fa-calendar-alt"></i> <?php echo htmlspecialchars($blog['date']); ?></span>
                                            <span><i class="far fa-clock"></i> <?php echo htmlspecialchars($blog['readTime']); ?></span>
                                        </div>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <!-- PHÂN TRANG -->
                    <?php if ($totalPages > 1): ?>
                    <nav aria-label="Page navigation" class="mt-4">
                        <ul class="pagination justify-content-center">
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item<?php if ($i == $page) echo ' active'; ?>">
                                    <a class="page-link" href="?<?php
                                        // Giữ lại các tham số search, category, tag khi chuyển trang
                                        $params = $_GET;
                                        $params['page'] = $i;
                                        echo http_build_query($params);
                                    ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                    <?php endif; ?>
                </section>
            </div>

            <div class="col-lg-4">
                <aside class="sidebar">
                    <h3 class="sidebar-title">Danh mục</h3>
                    <ul class="category-list">
                        <?php foreach ($categories as $category): ?>
                            <li class="category-item">
                                <a href="?category=<?php echo urlencode($category['id']); ?>" class="category-link<?php echo $categoryFilter === $category['id'] ? ' active' : ''; ?>">
                                    <i class="<?php echo htmlspecialchars($category['icon']); ?>"></i>
                                    <?php echo htmlspecialchars($category['name']); ?>
                                    <span class="category-count">(<?php echo htmlspecialchars($category['count']); ?>)</span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </aside>

                <aside class="sidebar mt-4">
                    <h3 class="sidebar-title">Tags phổ biến</h3>
                    <div class="tag-cloud">
                        <?php foreach ($popularTags as $tag): ?>
                            <a href="?tag=<?php echo urlencode($tag['name']); ?>" class="tag<?php echo strtolower($tagFilter) === strtolower($tag['name']) ? ' active' : ''; ?>">
                                #<?php echo htmlspecialchars($tag['name']); ?>
                                <span class="tag-count">(<?php echo htmlspecialchars($tag['count']); ?>)</span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </aside>
            </div>
        </div>
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
                        <img src="../../assets/images/Icon/20240706162441-0-BCT.png" alt="Chứng nhận 1" class="me-2" style="height: 30px" />
                        <img src="../../assets/images/Icon/20240706162441-0-DMCA.png" alt="Chứng nhận 2" style="height: 30px" />
                    </div>
                    <h5 class="fw-bold mt-4 mb-3">HỖ TRỢ THANH TOÁN</h5>
                    <div class="d-flex flex-wrap">
                        <img src="../../assets/images/Icon/20240706162440-0-COD.png" alt="COD" class="me-2 mb-2" style="height: 30px" />
                        <img src="../../assets/images/Icon/20240706162441-0-Visa.png" alt="VISA" class="me-2 mb-2" style="height: 30px" />
                        <img src="../../assets/images/Icon/20240706162441-0-MasterCard.png" alt="Mastercard" class="me-2 mb-2" style="height: 30px" />
                        <img src="../../assets/images/Icon/20240706162441-0-JCB.png" alt="JCB" class="me-2 mb-2" style="height: 30px" />
                        <img src="../../assets/images/Icon/20240706162441-0-Momo.png" alt="MoMo" class="me-2 mb-2" style="height: 30px" />
                        <img src="../../assets/images/Icon/20240706162729-0-ZaloPay.png" alt="ZaloPay" class="me-2 mb-2" style="height: 30px" />
                        <img src="../../assets/images/Icon/20241122062454-0-napas.png" alt="Napas" class="me-2 mb-2" style="height: 30px" />
                        <img src="../../assets/images/Icon/20240706162729-0-ZaloPay.png" alt="Apple Pay" class="me-2 mb-2" style="height: 30px" />
                    </div>
                </div>
            </div>

            <div class="text-center border-top pt-3 mt-3 small text-muted">
                © Bản quyền thuộc về <strong>DoctorHub</strong> | Cung cấp bởi
                <a href="https://www.instagram.com/viinhneee/" class="fw-semibold text-decoration-none" style="color: var(--primary-color)">VaniizIT</a>
            </div>
        </div>
    </footer>

    <!-- *Popper* -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-JGLZOLoMCs5hQdIb2Rlp+vgbp7NjPR8tW3mv4TqRfj7sG04O1LYljX29lvH9acX7" crossorigin="anonymous"></script>
    <!-- *Bootstrap* -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>