<?php
// Include the initialization file
require_once '../../config/init.php';

// Blog data
$blog = [
    'title' => 'TOP 7 địa chỉ bắn laser tàn nhang uy tín tại TP.HCM',
    'date' => '30/10/2022',
    'category' => 'Da Liễu Thẩm Mỹ',
    'image' => 'https://blog.mintpear.com/wp-content/uploads/2022/09/cavitacion-2894851_1920-1536x1024.jpg',
    'alt' => 'Điều trị tàn nhang ở đâu uy tín TP.HCM'
];

// Clinic data
$clinics = [
    [
        'name' => 'Phòng khám Chuyên khoa Da Liễu Anh Mỹ (Anh Mỹ Clinic- AMC)',
        'address' => '247A Nguyễn Trọng Tuyển, Phường 8, quận Phú Nhuận, TP.HCM',
        'hours' => 'Thứ 2 - Chủ nhật: 8:00 - 20:00',
        'phone' => '028 3995 9999'
    ],
    [
        'name' => 'Bệnh viện Da liễu TP.HCM',
        'address' => '2 Nguyễn Thông, Phường 6, Quận 3, TP.HCM',
        'hours' => 'Thứ 2 - Thứ 6: 7:00 - 16:30',
        'phone' => '028 3930 8115'
    ],
    [
        'name' => 'Phòng khám Da liễu Sài Gòn',
        'address' => '87-89 Thành Thái, Phường 12, Quận 10, TP.HCM',
        'hours' => 'Thứ 2 - Chủ nhật: 8:00 - 20:00',
        'phone' => '028 3865 5666'
    ],
    [
        'name' => 'Phòng khám Da liễu Táo Đỏ',
        'address' => '36 Đường số 1, Phường Bình An, Quận 2, TP.HCM',
        'hours' => 'Thứ 2 - Chủ nhật: 8:00 - 20:00',
        'phone' => '028 3740 5888'
    ],
    [
        'name' => 'Phòng khám Da liễu Trần Thịnh',
        'address' => '5-7-9 Trần Xuân Soạn, Phường Tân Thuận Tây, Quận 7, TP.HCM',
        'hours' => 'Thứ 2 - Chủ nhật: 8:00 - 20:00',
        'phone' => '028 3775 5333'
    ],
    [
        'name' => 'Phòng khám Da liễu Quốc tế',
        'address' => '123 Lý Chính Thắng, Phường 7, Quận 3, TP.HCM',
        'hours' => 'Thứ 2 - Chủ nhật: 8:00 - 20:00',
        'phone' => '028 3930 9999'
    ],
    [
        'name' => 'Phòng khám Da liễu Hồng Đức',
        'address' => '14 Lý Tự Trọng, Phường Bến Nghé, Quận 1, TP.HCM',
        'hours' => 'Thứ 2 - Chủ nhật: 8:00 - 20:00',
        'phone' => '028 3822 9999'
    ]
];

// Related posts
$relatedPosts = [
    [
        'title' => 'Tiêm môi 1cc giá bao nhiêu? Cập nhật giá tiêm môi TPHCM',
        'date' => '30/10/2022',
        'image' => 'http://localhost/doctorHub/assets/images/Banner/BannerHome.png',
        'link' => '#' // Update with actual link if available
    ],
    [
        'title' => 'Căng da mặt bao nhiêu tiền? Chi phí căng da mặt tại top địa chỉ uy tín TP.HCM',
        'date' => '30/10/2022',
        'image' => 'http://localhost/doctorHub/assets/images/Banner/BannerHome.png',
        'link' => '#' // Update with actual link if available
    ]
];

// Categories
$categories = [
    ['name' => 'Da Liễu', 'link' => 'blog.php?category=dalieu'],
    ['name' => 'Thần Kinh', 'link' => 'blog.php?category=thankinh'],
    ['name' => 'Sức Khỏe', 'link' => 'blog.php?category=khamtongquat'],
    ['name' => 'Dinh Dưỡng', 'link' => 'blog.php?category=nhikhoa']
];

// Tags
$tags = [
    ['name' => 'suckhoe', 'link' => 'blog.php?tag=sức khỏe'],
    ['name' => 'dinhduong', 'link' => 'blog.php?tag=dinh dưỡng'],
    ['name' => 'dalieu', 'link' => 'blog.php?tag=da liễu'],
    ['name' => 'thankinh', 'link' => 'blog.php?tag=thần kinh'],
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
                            <p>Tàn nhang là vấn đề nhiều chị em gặp phải, ảnh hưởng đến thẩm mỹ da, khiến nhiều chị em tự ti với vẻ ngoài của mình. Có nhiều phương pháp trị tàn nhang như thuốc bôi, thuốc uống, laser,.. Tuy nhiên, bắn laser được đánh giá là phương pháp trị tàn nhang hiệu quả nhất hiện nay.</p>
                        </div>
                        
                        <div class="content-section">
                            <h2>Nên bắn laser tàn nhang ở đâu? Có nên lựa chọn spa, thẩm mỹ viện?</h2>
                            <p>Tàn nhang là một rối loạn sắc tố thuộc thể lành tính, không ảnh hưởng đến sức khỏe của mọi người. Tuy nhiên, về mặt thẩm mỹ, chị em mong muốn loại bỏ tàn nhang trên mặt để làn da đều màu hơn.</p>
                            <p>Mặc dù vậy, tàn nhang là bệnh lý khó chữa dứt điểm và dễ bị tái phát nếu như trị liệu không đúng cách. Đặc biệt, với phương pháp điều trị bắn laser tàn nhang cần yêu cầu thiết bị hiện đại và tay nghề kỹ thuật cao.</p>
                        </div>
                        
                        <div class="content-section">
                            <h2>7 địa chỉ điều trị tàn nhang uy tín tại TP.HCM</h2>
                            
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