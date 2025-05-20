<?php
// Include the initialization file
require_once '../../config/init.php';

// Blog data
$blog = [
    'title' => '6 địa chỉ khám dinh dưỡng nhi TP. HCM uy tín, nổi tiếng',
    'date' => '01/11/2022',
    'category' => 'Nhi Khoa',
    'image' => 'https://danangaz.com/wp-content/uploads/2021/08/bsm.jpg',
    'alt' => 'Khám dinh dưỡng nhi',
    'readTime' => '5 phút đọc'
];

// Clinic data
$clinics = [
    [
        'name' => 'Bệnh viện Nhi Đồng 1',
        'address' => '341 Sư Vạn Hạnh, Phường 10, Quận 10, TP.HCM',
        'hours' => 'Thứ 2 - Thứ 6: 7:00 - 16:30',
        'phone' => '028 3927 1119'
    ],
    [
        'name' => 'Bệnh viện Nhi Đồng 2',
        'address' => '14 Lý Tự Trọng, Phường Bến Nghé, Quận 1, TP.HCM',
        'hours' => 'Thứ 2 - Thứ 6: 7:00 - 16:30',
        'phone' => '028 3829 5723'
    ],
    [
        'name' => 'Bệnh viện Đại học Y Dược TP.HCM',
        'address' => '215 Hồng Bàng, Phường 11, Quận 5, TP.HCM',
        'hours' => 'Thứ 2 - Thứ 6: 7:00 - 16:30',
        'phone' => '028 3855 4269'
    ],
    [
        'name' => 'Bệnh viện Nhi Đồng Thành Phố',
        'address' => '15 Võ Trần Chí, Phường Tân Kiểng, Quận 7, TP.HCM',
        'hours' => 'Thứ 2 - Thứ 6: 7:00 - 16:30',
        'phone' => '028 5413 3333'
    ],
    [
        'name' => 'Bệnh viện Quốc tế City',
        'address' => '3 Đường số 17A, Phường Bình Trị Đông B, Quận Bình Tân, TP.HCM',
        'hours' => 'Thứ 2 - Thứ 6: 7:00 - 16:30',
        'phone' => '028 6280 3333'
    ],
    [
        'name' => 'Bệnh viện Đa khoa Quốc tế Vinmec Central Park',
        'address' => '720A Điện Biên Phủ, Phường 22, Quận Bình Thạnh, TP.HCM',
        'hours' => 'Thứ 2 - Thứ 6: 8:00 - 17:00',
        'phone' => '028 3622 1666'
    ]
];

// Related posts
$relatedPosts = [
    [
        'title' => '6 địa chỉ khám sức khỏe tổng quát toàn diện uy tín tại TP.HCM',
        'date' => '01/11/2022',
        'image' => 'http://localhost/doctorHub/assets/images/Banner/BannerHome.png',
        'link' => 'blog-detail3.php'
    ],
    [
        'title' => 'Dinh dưỡng cho trẻ: Những điều cha mẹ cần biết',
        'date' => '01/11/2022',
        'image' => 'http://localhost/doctorHub/assets/images/Banner/BannerHome.png',
        'link' => '#' // Update with actual link if available
    ]
];

// Categories
$categories = [
    ['name' => 'Nhi Khoa', 'link' => 'blog.php?category=nhikhoa'],
    ['name' => 'Dinh Dưỡng', 'link' => 'blog.php?category=nhikhoa'],
    ['name' => 'Sức Khỏe', 'link' => 'blog.php?category=khamtongquat'],
    ['name' => 'Khám Tổng Quát', 'link' => 'blog.php?category=khamtongquat']
];

// Tags
$tags = [
    ['name' => 'nhi', 'link' => 'blog.php?tag=nhi'],
    ['name' => 'dinhduong', 'link' => 'blog.php?tag=dinh dưỡng'],
    ['name' => 'khamnhi', 'link' => 'blog.php?tag=khám nhi'],
    ['name' => 'suckhoe', 'link' => 'blog.php?tag=sức khỏe'],
    ['name' => 'tamly', 'link' => 'blog.php?tag=tâm lý'],
    ['name' => 'khamsuckhoe', 'link' => 'blog.php?tag=khám sức khỏe']
];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?php echo htmlspecialchars($blog['title']); ?> - DoctorHub</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="../../assets/css/styles.css" rel="stylesheet"/>
    <link href="../../assets/css/blog-detail.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"/>
</head>

<body>
    <!-- Include header -->
    <?php include '../../partials/header.php'; ?>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" id="mainNav">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Trang Chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Đặt Lịch Khám</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Dịch Vụ Y Tế</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Liên Hệ</a></li>
                    <li class="nav-item"><a class="nav-link active" href="blog.php">Tin Tức</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Bài Test</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="blog-hero">
        <div class="container">
            <h1><?php echo htmlspecialchars($blog['title']); ?></h1>
            <div class="blog-meta">
                <span><i class="far fa-calendar-alt"></i> <?php echo htmlspecialchars($blog['date']); ?></span>
                <span><i class="far fa-folder"></i> <?php echo htmlspecialchars($blog['category']); ?></span>
                <span><i class="far fa-clock"></i> <?php echo htmlspecialchars($blog['readTime']); ?></span>
            </div>
        </div>
    </div>
    
    <main class="container my-5">
        <div class="row">
            <div class="col-lg-8">
                <article class="blog-detail">
                    <div class="blog-content">
                        <img src="<?php echo htmlspecialchars($blog['image']); ?>" alt="<?php echo htmlspecialchars($blog['alt']); ?>" class="featured-image"/>
                        
                        <div class="content-section">
                            <p>Khám dinh dưỡng nhi là việc làm cần thiết để đảm bảo sự phát triển toàn diện của trẻ. Bài viết này sẽ giới thiệu 6 địa chỉ khám dinh dưỡng nhi uy tín tại TP.HCM, giúp các bậc phụ huynh có thêm thông tin để lựa chọn địa chỉ khám phù hợp cho con em mình.</p>
                        </div>
                        
                        <div class="content-section">
                            <h2>Vì sao nên khám dinh dưỡng nhi định kỳ?</h2>
                            <p>Khám dinh dưỡng nhi định kỳ mang lại nhiều lợi ích quan trọng cho sự phát triển của trẻ:</p>
                            <ul>
                                <li>Đánh giá chính xác tình trạng dinh dưỡng của trẻ</li>
                                <li>Phát hiện sớm các vấn đề về dinh dưỡng và tăng trưởng</li>
                                <li>Được tư vấn về chế độ ăn phù hợp với độ tuổi và thể trạng</li>
                                <li>Hướng dẫn cách chăm sóc dinh dưỡng cho trẻ</li>
                                <li>Ngăn ngừa các bệnh lý liên quan đến dinh dưỡng</li>
                            </ul>
                        </div>
                        
                        <div class="content-section">
                            <h2>6 địa chỉ khám dinh dưỡng nhi uy tín tại TP.HCM</h2>
                            
                            <?php foreach ($clinics as $clinic): ?>
                                <div class="clinic-card">
                                    <h3><?php echo htmlspecialchars($clinic['name']); ?></h3>
                                    <div class="clinic-info">
                                        <p><i class="fas fa-map-marker-alt"></i> Địa chỉ: <?php echo htmlspecialchars($clinic['address']); ?></p>
                                        <p><i class="far fa-clock"></i> Thời gian làm việc: <?php echo htmlspecialchars($clinic['hours']); ?></p>
                                        <p><i class="fas fa-phone"></i> Điện thoại: <?php echo htmlspecialchars($clinic['phone']); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </article>
                
                <section class="related-posts">
                    <h2 class="related-title">Bài viết liên quan</h2>
                    <div class="related-grid">
                        <?php foreach ($relatedPosts as $post): ?>
                            <article class="blog-card">
                                <a href="<?php echo htmlspecialchars($post['link']); ?>" class="blog-image-link">
                                    <img src="<?php echo htmlspecialchars($post['image']); ?>" class="blog-image" alt="Image"/>
                                </a>
                                <div class="blog-content">
                                    <h3 class="blog-title">
                                        <a href="<?php echo htmlspecialchars($post['link']); ?>" class="text-decoration-none"><?php echo htmlspecialchars($post['title']); ?></a>
                                    </h3>
                                    <div class="blog-meta">
                                        <span><i class="far fa-calendar-alt"></i> <?php echo htmlspecialchars($post['date']); ?></span>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
            
            <div class="col-lg-4">
                <aside class="sidebar">
                    <h3 class="sidebar-title">Danh mục</h3>
                    <ul class="category-list">
                        <?php foreach ($categories as $category): ?>
                            <li class="category-item">
                                <a href="<?php echo htmlspecialchars($category['link']); ?>" class="category-link">
                                    <i class="fas fa-folder"></i>
                                    <?php echo htmlspecialchars($category['name']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </aside>
                
                <aside class="sidebar mt-4">
                    <h3 class="sidebar-title">Tags phổ biến</h3>
                    <div class="tag-cloud">
                        <?php foreach ($tags as $tag): ?>
                            <a href="<?php echo htmlspecialchars($tag['link']); ?>" class="tag">#<?php echo htmlspecialchars($tag['name']); ?></a>
                        <?php endforeach; ?>
                    </div>
                </aside>
            </div>
        </div>
    </main>

    <!-- Include footer -->
    <?php include '../../partials/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>