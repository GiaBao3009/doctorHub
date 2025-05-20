<?php
$blog = [
    'title' => 'Gan nhiễm mỡ: Nguyên nhân và triệu chứng? Khám gan nhiễm mỡ tại Trung tâm Y khoa Vạn Hạnh',
    'date' => '17/07/2023',
    'category' => 'Gan nhiễm mỡ',
    'image' => 'https://vcp.com.vn/hinhanh/tintuc/ban-da-hieu-dung-ve-gan-nhiem-mo-chua.jpg',
    'alt' => 'Gan nhiễm mỡ: Nguyên nhân và triệu chứng'
];

$relatedPosts = [
    [
        'title' => 'Top 7 bác sĩ chuyên khoa Gan mật giỏi tại Hà Nội',
        'date' => '2023',
        'image' => 'https://vcp.com.vn/hinhanh/tintuc/ban-da-hieu-dung-ve-gan-nhiem-mo-chua.jpg',
        'link' => '#'
    ],
    [
        'title' => '6 bệnh viện công lập khám chữa bệnh Gan uy tín tại Hà Nội',
        'date' => '2023',
        'image' => 'https://vcp.com.vn/hinhanh/tintuc/ban-da-hieu-dung-ve-gan-nhiem-mo-chua.jpg',
        'link' => '#'
    ]
];

$categories = [
    ['name' => 'Gan - Mật', 'link' => '#'],
    ['name' => 'Khám Tổng quát', 'link' => '#'],
    ['name' => 'Nội tiết', 'link' => '#'],
    ['name' => 'Dinh Dưỡng', 'link' => '#']
];

$tags = [
    ['name' => 'gan nhiễm mỡ', 'link' => '#'],
    ['name' => 'bệnh gan', 'link' => '#'],
    ['name' => 'khám sức khỏe', 'link' => '#'],
    ['name' => 'dinh dưỡng', 'link' => '#']
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
    <header class="header-doctorhub">
        <div class="container header-content">
            <a href="/"><img src="/assets/images/Logo/DoctorHub.png" alt="DoctorHub Logo" style="height:40px"></a>
            <!-- ... menu ... -->
        </div>
    </header>
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
                            <h2>Gan nhiễm mỡ là gì?</h2>
                            <p>Gan nhiễm mỡ là tình trạng gan tích tụ quá nhiều mỡ, dẫn đến suy giảm chức năng gan. Đây là bệnh phổ biến ở Việt Nam và thế giới, đặc biệt ở người trên 40 tuổi và người béo phì. Nếu không điều trị kịp thời, gan nhiễm mỡ có thể dẫn đến xơ gan, ung thư gan và suy gan.</p>
                        </div>
                        <div class="content-section">
                            <h2>Nguyên nhân gây ra gan nhiễm mỡ</h2>
                            <ul>
                                <li>Ăn quá nhiều đồ ăn chứa đường và chất béo</li>
                                <li>Ít ăn rau củ, thiếu chất xơ và vitamin</li>
                                <li>Lối sống ít vận động</li>
                                <li>Béo phì</li>
                                <li>Tiêu thụ nhiều đồ uống có ga, rượu</li>
                                <li>Hút thuốc lá</li>
                                <li>Sử dụng thuốc không đúng cách, đặc biệt là thuốc ảnh hưởng đến gan</li>
                            </ul>
                        </div>
                        <div class="content-section">
                            <h2>Triệu chứng cần lưu ý</h2>
                            <p>Gan nhiễm mỡ thường không có triệu chứng rõ ràng ở giai đoạn đầu. Khi bệnh tiến triển, người bệnh có thể cảm thấy mệt mỏi, khó tiêu, buồn nôn, chán ăn, chướng bụng, đau và khó chịu vùng bụng trên. Ngoài ra, có thể gặp rối loạn tiêu hóa, táo bón hoặc tiêu chảy, và các bệnh liên quan đến gan như viêm gan, xơ gan, ung thư gan.</p>
                        </div>
                        <div class="content-section">
                            <h2>Phương pháp chẩn đoán</h2>
                            <p>Chẩn đoán gan nhiễm mỡ thường dựa vào siêu âm, xét nghiệm máu, kiểm tra men gan, hoặc sinh thiết gan nếu cần thiết. Việc phát hiện sớm giúp điều trị hiệu quả và phòng ngừa biến chứng nguy hiểm.</p>
                        </div>
                        <div class="content-section">
                            <h2>Khám gan nhiễm mỡ tại Trung tâm Y khoa Vạn Hạnh</h2>
                            <p>Nếu bạn nghi ngờ mắc gan nhiễm mỡ, hãy đến các cơ sở y tế uy tín để được khám và tư vấn. Trung tâm Y khoa Vạn Hạnh là một trong những địa chỉ uy tín tại TP.HCM với đội ngũ bác sĩ giàu kinh nghiệm, trang thiết bị hiện đại.</p>
                            <ul>
                                <li>Địa chỉ: 781/B1-B3-B5 Lê Hồng Phong, Phường 12, Quận 10, TP.HCM</li>
                                <li>Điện thoại: 028 3863 2020</li>
                                <li>Website: <a href="https://ykhoavanhanh.vn/" target="_blank">ykhoavanhanh.vn</a></li>
                            </ul>
                        </div>
                        <div class="content-section">
                            <h2>Lưu ý</h2>
                            <p>Nội dung bài viết chỉ mang tính chất tham khảo, không thay thế cho việc chẩn đoán và điều trị y khoa.</p>
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
    <footer class="bg-light pt-5 pb-3 border-top">
        <div class="container">
            <div class="text-center border-top pt-3 mt-3 small text-muted">
                © Bản quyền thuộc về <strong>DoctorHub</strong>
            </div>
        </div>
    </footer>
</body>
</html> 