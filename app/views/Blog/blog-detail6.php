<?php
$blog = [
    'title' => 'Điều trị thoái hóa đốt sống cổ bằng phương pháp vật lý trị liệu',
    'date' => '20/12/2024',
    'category' => 'Cột sống',
    'image' => 'https://leelajani.com/wp-content/uploads/2022/07/neck-pain.jpg',
    'alt' => 'Điều trị thoái hóa đốt sống cổ bằng vật lý trị liệu'
];

$relatedPosts = [
    [
        'title' => '7 bác sĩ khám chữa Thoát vị đĩa đệm giỏi tại Hà Nội',
        'date' => '2023',
        'image' => 'https://leelajani.com/wp-content/uploads/2022/07/neck-pain.jpg',
        'link' => '#'
    ],
    [
        'title' => '6 bệnh viện, phòng khám chữa đau thắt lưng uy tín tại Hà Nội',
        'date' => '2023',
        'image' => 'https://leelajani.com/wp-content/uploads/2022/07/neck-pain.jpg',
        'link' => '#'
    ]
];

$categories = [
    ['name' => 'Cột sống', 'link' => '#'],
    ['name' => 'Thần kinh', 'link' => '#'],
    ['name' => 'Khám Tổng quát', 'link' => '#'],
    ['name' => 'Phục hồi chức năng', 'link' => '#']
];

$tags = [
    ['name' => 'thoái hóa đốt sống cổ', 'link' => '#'],
    ['name' => 'vật lý trị liệu', 'link' => '#'],
    ['name' => 'cột sống', 'link' => '#'],
    ['name' => 'đau cổ', 'link' => '#']
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
                            <h2>Thoái hóa đốt sống cổ là gì?</h2>
                            <p>Thoái hóa đốt sống cổ là bệnh lý xương khớp phổ biến, xảy ra khi các đĩa đệm và dây chằng ở vùng cổ bị lão hóa, xơ cứng, gây đau và hạn chế vận động. Bệnh thường gặp ở người lớn tuổi, người làm việc văn phòng, hoặc những người phải cúi, ngửa cổ nhiều.</p>
                        </div>
                        <div class="content-section">
                            <h2>Nguyên nhân dẫn tới thoái hóa đốt sống cổ</h2>
                            <ul>
                                <li>Lão hóa tự nhiên theo tuổi tác</li>
                                <li>Ngồi làm việc sai tư thế, cúi hoặc ngửa cổ nhiều</li>
                                <li>Ít vận động, ăn uống thiếu chất</li>
                                <li>Chấn thương vùng cổ</li>
                                <li>Mang vác vật nặng trên đầu hoặc vai</li>
                            </ul>
                        </div>
                        <div class="content-section">
                            <h2>Triệu chứng thường gặp</h2>
                            <ul>
                                <li>Đau cổ, đau lan ra vai, gáy, cánh tay</li>
                                <li>Hạn chế vận động cổ, cứng cổ</li>
                                <li>Đau tăng khi vận động, giảm khi nghỉ ngơi</li>
                                <li>Có thể kèm theo tê bì, yếu cơ ở tay</li>
                            </ul>
                        </div>
                        <div class="content-section">
                            <h2>Điều trị thoái hóa đốt sống cổ bằng vật lý trị liệu</h2>
                            <p>Vật lý trị liệu là phương pháp điều trị không dùng thuốc, không phẫu thuật, giúp giảm đau, phục hồi chức năng vận động cổ. Một số phương pháp vật lý trị liệu phổ biến:</p>
                            <ul>
                                <li>Chườm nóng/lạnh vùng cổ</li>
                                <li>Điện trị liệu, sóng ngắn, siêu âm trị liệu</li>
                                <li>Kéo giãn cột sống cổ</li>
                                <li>Bài tập phục hồi chức năng, tăng cường cơ cổ</li>
                                <li>Xoa bóp, massage vùng cổ, vai gáy</li>
                            </ul>
                            <p>Người bệnh nên tập luyện đều đặn, tuân thủ hướng dẫn của chuyên gia vật lý trị liệu để đạt hiệu quả tốt nhất.</p>
                        </div>
                        <div class="content-section">
                            <h2>Lưu ý khi điều trị</h2>
                            <ul>
                                <li>Không tự ý vận động mạnh hoặc bẻ cổ khi đau</li>
                                <li>Tham khảo ý kiến bác sĩ trước khi tập luyện</li>
                                <li>Khám chuyên khoa Cột sống nếu đau kéo dài hoặc có dấu hiệu bất thường</li>
                            </ul>
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