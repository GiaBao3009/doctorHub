<?php
// Include initialization file
require_once '../../../config/init.php';

// Database connection
try {
    $pdo = new PDO("mysql:host=localhost;dbname=doctorhub;charset=utf8mb4", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Fetch doctor details
$doctor_id = isset($_GET['doctor_id']) ? intval($_GET['doctor_id']) : 0;
$doctor = null;

if ($doctor_id > 0) {
    $stmt = $pdo->prepare("SELECT * FROM doctors WHERE id = :id");
    $stmt->execute(['id' => $doctor_id]);
    $doctor = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<?php include '../../../partials/sidebar.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Details | DoctorHub</title>
    <link rel="icon" href="../../../assets/images/Logo/DoctorHub.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/css/splide.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/base.css">    
    <link rel="stylesheet" href="../../../assets/css/responsive.css" />
    <link rel="stylesheet" href="../../../assets/css/animation.css" />
<style>
    
.doctor-detail-card {
  background: #ffffff;
  border-radius: 15px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  padding: 2rem;
  max-width: 800px;
  margin: 0 auto;
}
.doctor-avatar {
  text-align: center;
  margin-bottom: 1.5rem;
}
.doctor-avatar img {
  width: 200px;
  height: 200px;
  object-fit: cover;
  border-radius: 50%;
  border: 4px solid #0d6efd;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.doctor-avatar-text .doctor-avatar-name {
  font-size: 1.75rem;
  font-weight: 700;
  color: #0d6efd;
  margin-bottom: 0.5rem;
}
.doctor-avatar-text .doctor-avatar-desc {
  font-size: 1rem;
  color: #6c757d;
  margin-bottom: 1rem;
}
.doctor-info-item {
  margin-bottom: 1rem;
  padding: 0.75rem 1rem;
  background: #f8f9fa;
  border-radius: 8px;
}
.doctor-info-item strong {
  color: #0d6efd;
  margin-right: 0.5rem;
}
.book-btn {
  background-color: #0d6efd;
  color: white;
  padding: 0.75rem 1.5rem;
  border-radius: 25px;
  font-weight: 600;
  transition: all 0.3s ease;
}
.book-btn:hover {
  background-color: #0b5ed7;
  transform: translateY(-2px);
}

.section-details {
  background: aliceblue;
}

</style>
    
</head>
<body> 
     <header class="header">
        <div class="container">
            <!-- Top Bar -->
            <div class="py-3 bg-white topbar border-bottom">
                <div class="container d-flex justify-content-between align-items-center">
                    <!-- Contact Info -->
                    <div class="contact-info small text-muted d-flex">
                        <strong>Email:</strong>
                        <a href="mailto:vaniizit.work@gmail.com"
                            class="topbar__mail text-primary">doctorhub.work@gmail.com</a>
                        |
                        <strong class="ms-1 d-none d-md-flex">
                            Hotline: <a href="tel:+84252032375" class="text-decoration-none text-dark fw-bold">+84 252
                                032 375</a>
                        </strong>
                    </div>

                    <!-- User Actions -->
                    <div class="gap-3 user-actions d-flex align-items-center">
                        <?php if (isLoggedIn()): ?>
                        <?php $user = getCurrentUser(); ?>
                        <div class="user-profile">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                    id="dropdownUser" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-user me-1"></i>
                                    <span><?php echo htmlspecialchars($user['email']); ?></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/app/views/profile.php">Tài khoản</a></li>

                                    <?php if ($user['role'] === 'doctor'): ?>
                                    <li><a class="dropdown-item" href="/app/views/doctor_dashboard.php">Bảng điều
                                            khiển</a></li>
                                    <?php elseif ($user['role'] === 'admin'): ?>
                                    <li><a class="dropdown-item" href="/app/views/admin_dashboard.php">Quản trị</a></li>
                                    <?php endif; ?>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="controllers/auth/logout.php">Đăng xuất</a></li>
                                </ul>
                            </div>
                        </div>
                        <?php else: ?>
                        <a href="../signIn.php"
                            class="topbar__home--login text-dark small d-none d-md-block">Đăng nhập</a>
                        <a href="../signUp.php"
                            class="topbar__home--register text-dark small d-none d-md-block">Đăng ký</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand navbar__link d-flex align-items-center text-primary fw-semibold"
                    href="../../../index.php">
                    <img src="../../../assets/images/Logo/DoctorHub.png" alt="Logo" width="40px" height="40px"
                        class="align-text-top d-inline-block me-2" style="border-radius: 50%;">
                    DoctorHub
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav" style="justify-content: end">
                    <ul class="ml-auto navbar-nav">
                        <li class="nav-item <?php echo isActiveMenu('index.php'); ?>">
                            <a class="nav-link" href="../../../index.php">Trang Chủ</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('book.php'); ?>">
                            <a class="nav-link" href="../book.php">Đặt Lịch Khám</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('consultation.php'); ?>">
                            <a class="nav-link" href="../consultation.php">Tư Vấn Sức Khỏe</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('services.php'); ?>">
                            <a class="nav-link" href="../services.php">Dịch Vụ Y Tế</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('contact.php'); ?>">
                            <a class="nav-link" href="../contact.php">Liên Hệ</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('blog.php'); ?>">
                            <a class="nav-link" href="../blog.php">Blog</a>
                        </li>
                        <li class="nav-item <?php echo isActiveMenu('shop.php'); ?>">
                            <a class="nav-link" href="../shop.php">Shop</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <section class="py-5 section-details">
        <div class="container">
            <?php if ($doctor): ?>
                <div class="doctor-detail-card">
                    <div class="doctor-avatar">
                        <img src="<?php echo htmlspecialchars($doctor['avatar']); ?>" alt="<?php echo htmlspecialchars($doctor['name']); ?>" class="img-fluid">
                        <div class="doctor-avatar-text">
                            <div class="doctor-avatar-name"><?php echo htmlspecialchars($doctor['name']); ?></div>
                            <div class="doctor-avatar-desc"><?php echo htmlspecialchars($doctor['specialty']); ?> - <?php echo htmlspecialchars($doctor['qualification']); ?></div>
                        </div>
                    </div>
                    <div class="doctor-info-item">
                        <strong>Học vấn:</strong> <?php echo htmlspecialchars($doctor['education']); ?>
                    </div>
                    <div class="doctor-info-item">
                        <strong>Trình độ:</strong> <?php echo htmlspecialchars($doctor['qualification']); ?>
                    </div>
                    <div class="doctor-info-item">
                        <strong>Kinh nghiệm:</strong> <?php echo htmlspecialchars($doctor['experience']); ?>
                    </div>
                    <div class="doctor-info-item">
                        <strong>Email:</strong> <?php echo htmlspecialchars($doctor['email']); ?>
                    </div>
                    <div class="doctor-info-item">
                        <strong>Số điện thoại:</strong> <?php echo htmlspecialchars($doctor['phone']); ?>
                    </div>
                    <div class="doctor-info-item">
                        <strong>Địa chỉ:</strong> <?php echo htmlspecialchars($doctor['address']); ?>
                    </div>
                    <div class="mt-4 text-center">
                        <!-- <a href="/pages/book.html?doctor_id=<?php echo $doctor_id; ?>" class="w-50 book-btn d-inline-flex justify-content-center align-items-center fs-4">Đặt lịch khám</a> -->
                        <a href="../chuyenkhoa.php" class="w-50 book-btn d-inline-flex justify-content-center align-items-center fs-4">Đặt lịch khám</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center alert alert-warning">
                    Không tìm thấy thông tin bác sĩ.
                </div>
            <?php endif; ?>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-JGLZOLoMCs5hQdIb2Rlp+vgbp7NjPR8tW3mv4TqRfj7sG04O1LYljX29lvH9acX7" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../../../services/handleCountDown.js" type="module"></script>
    <script src="../../../assets/javascript/main.js" type="module"></script>
    <script src="../../../services/handleModal.js"></script>
</body>
</html>