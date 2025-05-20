<?php
// Include the initialization file
require_once '../../config/init.php';

// Blog data
$blog = [
    'title' => 'Đau dây thần kinh số V (số 5): triệu chứng, nguyên nhân và cách điều trị',
    'date' => '03/04/2024',
    'category' => 'Thần Kinh',
    'image' => 'https://www.drsamrobbins.com/wp-content/uploads/2016/12/blood-pressure-patient.jpg',
    'alt' => 'Đau dây thần kinh số V'
];

// Treatment methods data
$treatments = [
    [
        'name' => 'Điều trị nội khoa',
        'description' => 'Sử dụng các loại thuốc giảm đau, thuốc chống co giật để kiểm soát cơn đau.'
    ],
    [
        'name' => 'Điều trị ngoại khoa',
        'description' => 'Phẫu thuật giải phóng chèn ép hoặc phá hủy một phần dây thần kinh.'
    ],
    [
        'name' => 'Điều trị bằng tia xạ',
        'description' => 'Sử dụng tia xạ để phá hủy một phần dây thần kinh gây đau.'
    ]
];

// Related posts
$relatedPosts = [
    [
        'title' => 'Đau đầu: Nguyên nhân và cách điều trị',
        'date' => '03/04/2024',
        'image' => 'http://localhost/doctorHub/assets/images/Banner/BannerHome.png',
        'link' => '#' // Update with actual link if available
    ],
    [
        'title' => 'Thoái hóa đốt sống cổ: Dấu hiệu và cách phòng ngừa',
        'date' => '03/04/2024',
        'image' => 'http://localhost/doctorHub/assets/images/Banner/BannerHome.png',
        'link' => '#' // Update with actual link if available
    ]
];

// Categories
$categories = [
    ['name' => 'Thần Kinh', 'link' => 'blog.php?category=thankinh'],
    ['name' => 'Da Liễu', 'link' => 'blog.php?category=dalieu'],
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
                            <p>Đau dây thần kinh số V (hay còn gọi là đau dây thần kinh sinh ba) là một trong những bệnh lý thần kinh phổ biến, gây đau đớn và ảnh hưởng đến chất lượng cuộc sống của người bệnh. Bài viết này sẽ cung cấp thông tin chi tiết về triệu chứng, nguyên nhân và cách điều trị bệnh.</p>
                        </div>
                        
                        <div class="content-section">
                            <h2>Triệu chứng đau dây thần kinh số V</h2>
                            <p>Đau dây thần kinh số V thường có các triệu chứng đặc trưng sau:</p>
                            <ul>
                                <li>Cơn đau đột ngột, dữ dội ở một bên mặt</li>
                                <li>Đau như điện giật, dao đâm</li>
                                <li>Đau thường xuất hiện ở vùng hàm, má, môi hoặc trán</li>
                                <li>Cơn đau có thể kéo dài từ vài giây đến vài phút</li>
                                <li>Đau có thể tái phát nhiều lần trong ngày</li>
                            </ul>
                        </div>
                        
                        <div class="content-section">
                            <h2>Nguyên nhân gây đau dây thần kinh số V</h2>
                            <p>Một số nguyên nhân chính gây đau dây thần kinh số V bao gồm:</p>
                            <ul>
                                <li>Mạch máu chèn ép vào dây thần kinh</li>
                                <li>Khối u chèn ép</li>
                                <li>Chấn thương vùng mặt</li>
                                <li>Bệnh đa xơ cứng</li>
                                <li>Nhiễm trùng</li>
                            </ul>
                        </div>
                        
                        <div class="content-section">
                            <h2>Điều trị đau dây thần kinh số V</h2>
                            <p>Việc điều trị đau dây thần kinh số V cần được thực hiện bởi các bác sĩ chuyên khoa thần kinh. Các phương pháp điều trị bao gồm:</p>
                            
                            <?php foreach ($treatments as $treatment): ?>
                                <div class="clinic-card">
                                    <h3><?php echo htmlspecialchars($treatment['name']); ?></h3>
                                    <div class="clinic-info">
                                        <p><?php echo htmlspecialchars($treatment['description']); ?></p>
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