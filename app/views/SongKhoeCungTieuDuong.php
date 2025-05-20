<?php
session_start();
require_once '../../config/database.php';

// Kết nối database
$database = new Database();
$db = $database->getConnection();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlyFans||CanhGay</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <!-- *Splide CSS* -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js"
    />
    <!-- *Fontawesome* -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    />
    <!-- *LazySizes* -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js"
    />
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Reset và Base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(to right, #f8f9fa, #ffffff);
            font-family: 'Segoe UI', 'Roboto', sans-serif;
            color: #333;
            line-height: 1.6;
        }

        #additionalContent {
            transition: all 0.3s ease;
        }
        /* Menu styles - giữ nguyên như yêu cầu */
        .menu::-webkit-scrollbar {
            display: none;
        }

        .menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 85px;
            height: 100%;
            transition: .3s;
            scrollbar-width: none;
            overflow: hidden scroll;
            background: #0b5ada12;
            -ms-overflow-style: none;
            padding: 20px 20px 20px 0;
            backdrop-filter: blur(5px);
            box-shadow: 8px 0px 9px 0px #0b5ada12;
            z-index: 1000;
        }

        .menu:hover {
            width: 260px;
        }

        .menu:hover li span:nth-child(2) {
            display: block;
        }

        .menu-content li {
            list-style: none;
            border-radius: 0px 50px 50px 0;
            transition: .3s;
            margin-bottom: 20px;
            padding-left: 20px;
        }

        .menu-content li:hover {
            background: #3408c2;
        }

        .menu-content li span:nth-child(2) {
            display: none;
        }

        a {
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            font-family: 'calibri';
        }

        .material-symbols-outlined {
            padding: 10px;
            font-size: 25px;
            margin-right: 10px;
            border-radius: 50%;
            background: #3408c2;
        }

        /* Container style improvements */
        .container {
            margin-left: 100px;
            padding: 2rem;
            max-width: 1200px;
            transition: margin-left 0.3s;
        }

        /* Background image styles */
        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 550px;
            opacity: 0.5;
            z-index: -1;
            object-fit: cover;
        }

        /* Typography improvements */
        h1, h2, h3, h4, h5, h6 {
            font-weight: 600;
            margin-bottom: 1rem;
            color: #2c3e50;
        }

        h1 {
            font-size: 2rem;
            color: #3408c2;
            border-bottom: 2px solid #3408c20f;
            padding-bottom: 0.5rem;
        }

        h2 {
            font-size: 1.5rem;
            color: #1a237e;
        }

        .text-primary {
            color: #3408c2 !important;
        }

        /* Doctor card improvements */
        .bg-white {
            border-radius: 12px;
            transition: all 0.3s ease;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .bg-white:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }

        /* Doctor image styles */
        .rounded-circle {
            border: 3px solid #3408c2;
            transition: all 0.3s ease;
            object-fit: cover;
        }

        .rounded-circle:hover {
            transform: scale(1.05);
        }

        

        /* Button styling */
        .btn-secondary {
            background-color: #f0f2f5;
            color: #3408c2;
            border: none;
            transition: all 0.2s;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }
        

        .btn-secondary:hover {
            background-color: #3408c2;
            color: white;
        }

        .dropdown-toggle {
            background-color: #3408c2 !important;
            border: none;
            padding: 0.5rem 1.5rem;
        }

        /* Price and address section */
        .text-muted {
            color: #6c757d !important;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                margin-left: 50px;
                padding: 1rem;
            }
            
            .d-flex.flex-md-row {
                flex-direction: column !important;
            }
            
            .rounded-circle {
                width: 80px !important;
                height: 80px !important;
            }
        }

        .banner-container {
            background-color: #4ea5f5;
            padding: 50px 20px;
            border-radius: 15px;
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
        }
        .banner-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            z-index: 2;
        }
        .banner-image {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            border: 5px solid white;
            overflow: hidden;
        }
        .banner-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .banner-text {
            color: white;
            text-align: center;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .banner-text h1 {
            font-size: 3.5rem;
            margin-bottom: 0;
        }
        .banner-text .small-text {
            font-size: 1.8rem;
            font-weight: 500;
        }
        .banner-icons {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
        .heart-icon, .plus-icon {
            position: absolute;
            opacity: 0.3;
        }
        .doctor-section {
            margin-top: 50px;
            padding: 20px;
        }
        .doctor-section h2 {
            margin-bottom: 30px;
            font-weight: 600;
        }
        .doctor-card {
            text-align: center;
            margin-bottom: 30px;
        }
        .doctor-image {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 15px;
            border: 3px solid #4ea5f5;
        }
        .doctor-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .doctor-name {
            font-weight: 600;
            margin-bottom: 5px;
        }
        .doctor-title {
            color: #777;
            font-size: 0.9rem;
        }
        
        /* Menu styles */
        .menu::-webkit-scrollbar {
            display: none;
        }    
        .main-content {
            margin-left: 85px;
            transition: margin-left 0.3s;
            padding: 20px 0;
        }

        /* Banner section */
        .banner-container {
            background: linear-gradient(135deg, #4361ee 0%, #3a4fc4 100%);
            border-radius: 18px;
            padding: 40px 30px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.15);
        }

        .banner-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            position: relative;
            z-index: 2;
        }

        .banner-image {
            width: 280px;
            height: 280px;
            border-radius: 50%;
            border: 8px solid rgba(255, 255, 255, 0.2);
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .banner-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .banner-text {
            color: white;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .banner-text h1 {
            font-size: 3.2rem;
            font-weight: 700;
            margin-bottom: 0;
            color: white;
            line-height: 1.2;
        }

        .banner-text .small-text {
            font-size: 1.6rem;
            font-weight: 400;
            opacity: 0.9;
        }

        .banner-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            opacity: 0.2;
            pointer-events: none;
        }

        .shape {
            position: absolute;
            color: white;
        }

        /* Doctor section */
        .section-title {
            position: relative;
            margin-bottom: 40px;
            padding-bottom: 10px;
            font-weight: 700;
            color: #2d3748;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 3px;
            background: #3a4fc4;
        }

        .doctor-card {
            background-color: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            padding: 25px 20px;
            text-align: center;
            margin-bottom: 30px;
        }

        .doctor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }

        .doctor-image {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px;
            border: 5px solid #f0f4ff;
            position: relative;
        }

        .doctor-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .doctor-name {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 5px;
            color: #2d3748;
        }

        .doctor-title {
            color: #718096;
            font-size: 14px;
            margin-bottom: 15px;
        }

        /* Footer */
        .footer {
            background-color: #f8fafc;
            border-top: 1px solid #e2e8f0;
            padding-top: 50px;
            padding-bottom: 20px;
            margin-top: 50px;
        }

        .footer h5 {
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 16px;
            color: #2d3748;
        }

        .footer__item {
            padding: 6px 0;
        }

        .footer a {
            color: #4a5568;
            transition: color 0.2s;
        }

        .footer a:hover {
            color: #3a4fc4;
        }

        .footer-bottom {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            color: #718096;
        }

        .payment-icons img {
            height: 30px;
            margin-right: 8px;
            margin-bottom: 8px;
            filter: grayscale(1);
            opacity: 0.7;
            transition: all 0.2s;
        }

        .payment-icons img:hover {
            filter: grayscale(0);
            opacity: 1;
        }

        .social-icon {
            display: inline-flex;
            align-items: center;
            transition: transform 0.2s;
        }

        .social-icon:hover {
            transform: translateY(-2px);
        }

        .social-icon i {
            margin-right: 8px;
            font-size: 16px;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .banner-content {
                flex-direction: column;
                text-align: center;
            }
            
            .banner-text h1 {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 65px;
                padding: 15px;
            }
            
            .menu {
                width: 65px;
            }
            
            .banner-container {
                padding: 30px 20px;
            }
            
            .banner-image {
                width: 200px;
                height: 200px;
            }
            
            .section-title {
                margin-bottom: 25px;
            }
        }
        .btn-booking {
            background-color: #3408c2;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            width: 300px;
            border-radius: 30px;
            margin: 30px auto;
            display: block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(52, 8, 194, 0.3);
        }
        
        .btn-booking:hover {
            background-color: #2a06a1;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(52, 8, 194, 0.4);
        }
        
        .btn-booking a {
            color: white;
            text-decoration: none;
            display: block;
            width: 100%;
            text-align: center;
        }
        
        .booking {
            display: flex;
            justify-content: center;
            margin: 20px 0 40px;
        }

        /* Styles for content sections */
        .content-section {
            margin-bottom: 50px;
        }
        
        /* Card styles */
        .card {
            transition: all 0.2s ease;
            border: none;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            height: 100%;
        }
        
        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        
        /* Carousel controls */
        .carousel-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            background-color: white;
            border: none;
            border-radius: 50%;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .carousel-control:hover {
            background-color: #35bac1;
            color: white;
        }
        
        .prev {
            left: -20px;
        }
        
        .next {
            right: -20px;
        }
        
        .carousel-control-icon {
            font-size: 18px;
            font-weight: bold;
        }
        
        /* Mobile responsiveness for cards */
        @media (max-width: 768px) {
            .nutrition-card, .exercise-card {
                flex: 0 0 100%;
            }
        }

        /* Slider Container Styles */
        .nutrition-slider, .exercise-slider {
            position: relative;
            overflow: hidden;
        }
        
        .nutrition-cards, .exercise-cards {
            display: flex;
            transition: transform 0.4s ease;
        }
        
        .nutrition-card, .exercise-card {
            flex: 0 0 33.333%;
            padding: 0 10px;
            box-sizing: border-box;
        }

        .nutrition-card {
            display: none; /* Mặc định ẩn, JS sẽ show đúng 3 cái */
        }

        .exercise-card {
            display: none; /* Mặc định ẩn, JS sẽ show đúng 3 cái */
        }
    </style>
<body>
    <div class="menu">
        <ul class="menu-content" style="padding-left: 0rem;">
            <li><a href="/index.php"><span class="material-symbols-outlined">home</span><span style="color: black;">Home</span></a></li>
            <li><a href="#"><span class="material-symbols-outlined">dashboard</span><span style="color: black;">DashBoard</span></a></li>
            <li><a href="#"><span class="material-symbols-outlined">explore</span><span style="color: black;">Explore</span></a></li>
            <li><a href="#"><span class="material-symbols-outlined">analytics</span><span style="color: black;">Analytics</span></a></li>
            <li><a href="#"><span class="material-symbols-outlined">settings</span><span style="color: black;">Settings</span></a></li>
            <li><a href="#"><span class="material-symbols-outlined">person</span><span style="color: black;">Account</span></a></li>
            <li><a href="#"><span class="material-symbols-outlined">report</span><span style="color: black;">Report</span></a></li>
            <li><a href="#"><span class="material-symbols-outlined">email</span><span style="color: black;">Contact</span></a></li>
            <li><a href="#"><span class="material-symbols-outlined">logout</span><span style="color: black;">Logout</span></a></li>
        </ul>
    </div>
    
    
    <div class="main-content">
        <div class="container">
            <!-- Banner Section -->
            <div class="banner-container">
                <img src="../../assets/images/Icon/banner-song-khoe-tieu-duong.png" alt="Sống Khỏe Cùng Bệnh Tiểu Đường" class="img-fluid w-100" style="border-radius: 15px;">
            </div>

            <!-- Doctor Section -->
            <div class="doctor-section">
                <h2 class="section-title">Bác sĩ đồng hành</h2>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="doctor-card">
                            <div class="doctor-image">
                                <img src="../../assets/images/Doctors/doctor1.jpg" alt="Bác sĩ Nguyễn Thị Hải Dan">
                            </div>
                            <h4 class="doctor-name">Bác sĩ Nguyễn Thị Hải Dan</h4>
                            <div class="doctor-title">Chuyên khoa Nội tiết</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="doctor-card">
                            <div class="doctor-image">
                                <img src="../../assets/images/Doctors/doctor2.jpg" alt="Bác sĩ Chuyên khoa I Sơn Thiên Trang">
                            </div>
                            <h4 class="doctor-name">Bác sĩ Chuyên khoa I</h4>
                            <div class="doctor-title">Sơn Thiên Trang</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="doctor-card">
                            <div class="doctor-image">
                                <img src="../../assets/images/Doctors/doctor3.jpg" alt="Tiến sĩ, Bác sĩ Nguyễn Thị Thúy Hằng">
                            </div>
                            <h4 class="doctor-name">Tiến sĩ, Bác sĩ Nguyễn Thị Thúy Hằng</h4>
                            <div class="doctor-title">Chuyên gia dinh dưỡng</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="booking">
                <button class="btn-booking"><a href="./tieuduong.php">Đặt lịch khám</a></button>
            </div>

            <!-- Chế độ dinh dưỡng -->
            <div class="content-section mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="section-title">Chế độ dinh dưỡng</h2>
                </div>
                
                <div class="position-relative">
                    <div class="nutrition-slider">
                        <div class="row nutrition-cards">
                            <div class="col-md-4 nutrition-card">
                                <div class="card border-0 rounded-4 shadow-sm h-100">
                                    <img src="../../assets/images/Icon/ke-hoach-bua-an-cho-nguoi-bi-tieu-duong.png" class="card-img-top rounded-top-4" alt="Kế hoạch bữa ăn">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-bold">Lập kế hoạch bữa ăn cho người bệnh tiểu đường</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 nutrition-card">
                                <div class="card border-0 rounded-4 shadow-sm h-100">
                                    <img src="../../assets/images/Icon/tieu-duong-tuyp-2-nen-khong-nen-an-gi.png" class="card-img-top rounded-top-4" alt="Nên ăn gì, không nên ăn gì">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-bold">Người bệnh đái tháo đường tuýp 2 nên ăn gì, không nên ăn gì</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 nutrition-card">
                                <div class="card border-0 rounded-4 shadow-sm h-100">
                                    <img src="../../assets/images/Icon/hd-doc-nhan-sp-nguoi-bi-dai-thao-duong.png" class="card-img-top rounded-top-4" alt="Đọc nhãn thực phẩm">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-bold">Hướng dẫn cách đọc nhãn thực phẩm cho người bệnh tiểu đường</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 nutrition-card">
                                <div class="card border-0 rounded-4 shadow-sm h-100">
                                    <img src="../../assets/images/Icon/tieu-duong-kieng-an-j.png" class="card-img-top rounded-top-4" alt="Đọc nhãn thực phẩm">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-bold">Người bệnh tiểu đường nên ăn gì và kiêng ăn gì?</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 nutrition-card">
                                <div class="card border-0 rounded-4 shadow-sm h-100">
                                    <img src="../../assets/images/Icon/tieu-duong-nen-uong-sua-khong.png" class="card-img-top rounded-top-4" alt="Đọc nhãn thực phẩm">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-bold">Người bệnh tiểu đường có uống được sữa không?</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 nutrition-card">
                                <div class="card border-0 rounded-4 shadow-sm h-100">
                                    <img src="../../assets/images/Icon/bua-sang-cho-nguoi-bi-tieu-duong.png" class="card-img-top rounded-top-4" alt="Đọc nhãn thực phẩm">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-bold">Gợi ý bữa sáng cho người bệnh tiểu đường</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button class="carousel-control prev" type="button" id="nutrition-prev">
                        <span class="carousel-control-icon" aria-hidden="true">&#10094;</span>
                    </button>
                    <button class="carousel-control next" type="button" id="nutrition-next">
                        <span class="carousel-control-icon" aria-hidden="true">&#10095;</span>
                    </button>
                </div>
            </div>
            
            <!-- Tập Luyện -->
            <div class="content-section mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="section-title">Tập Luyện</h2>
                  
                </div>
                
                <div class="position-relative">
                    <div class="exercise-slider">
                        <div class="row exercise-cards">
                            <div class="col-md-4 exercise-card">
                                <div class="card border-0 rounded-4 shadow-sm h-100">
                                    <img src="../../assets/images/Icon/bai-tap-cho-nguoi-tieu-duong.png" class="card-img-top rounded-top-4" alt="Bài tập thể dục">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-bold">Các bài tập thể dục dành cho người đái tháo đường</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 exercise-card">
                                <div class="card border-0 rounded-4 shadow-sm h-100">
                                    <img src="../../assets/images/Icon/bien-phap-giam-cang-thang-o-nguoi-tieu-duong.png" class="card-img-top rounded-top-4" alt="Giảm căng thẳng">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-bold">Các biện pháp giúp giảm căng thẳng ở người bệnh tiểu đường</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 exercise-card">
                                <div class="card border-0 rounded-4 shadow-sm h-100">
                                    <img src="../../assets/images/Icon/tang-can-cho-nguoi-cao-huyet-ap.png" class="card-img-top rounded-top-4" alt="Tăng cân">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-bold">Biện pháp giúp tăng cân cho người tiểu đường bị sụt cân</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 exercise-card">
                                <div class="card border-0 rounded-4 shadow-sm h-100">
                                    <img src="../../assets/images/Icon/di-bo-ngan-ngua-kiem-soat-tieu-duong.png" class="card-img-top rounded-top-4" alt="Tăng cân">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-bold">Đi bộ giúp ngăn ngừa, kiểm soát bệnh tiểu đường</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button class="carousel-control prev" type="button" id="exercise-prev">
                        <span class="carousel-control-icon" aria-hidden="true">&#10094;</span>
                    </button>
                    <button class="carousel-control next" type="button" id="exercise-next">
                        <span class="carousel-control-icon" aria-hidden="true">&#10095;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <footer class="bg-light pt-5 pb-3 border-top">
        <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-6 mb-4">
              <h5 class="fw-bold mb-3">LIÊN KẾT WEB</h5>
              <ul class="list-unstyled text-muted">
                <li class="text-decoration-none footer__item">
                  <a href="" class="text-decoration-none text-secondary"
                    >Bộ y tế</a
                  >
                </li>
                <li class="text-decoration-none footer__item">
                  <a href="" class="text-decoration-none text-secondary"
                    >Tổ chức y tế thế giới</a
                  >
                </li>
                <li class="text-decoration-none footer__item">
                  <a href="" class="text-decoration-none text-secondary"
                    >Viện vệ sinh dịch tễ TW</a
                  >
                </li>
                <li class="text-decoration-none footer__item">
                  <a href="" class="text-decoration-none text-secondary"
                    >Hội nghị bệnh viện Châu Á</a
                  >
                </li>
                <li class="text-decoration-none footer__item">
                  <a href="" class="text-decoration-none text-secondary"
                    >Bảo hiểm y tế ở nước ngoài</a
                  >
                </li>
                <li class="text-decoration-none footer__item">
                  <a href="" class="text-decoration-none text-secondary"
                    >Bảo hiểm y tế quốc tế</a
                  >
                </li>
              </ul>
            </div>
  
            <div class="col-md-3 col-sm-6 mb-4">
              <h5 class="fw-bold mb-3">HỎI BÁC SĨ</h5>
              <ul class="list-unstyled text-muted">
                <li class="text-decoration-none footer__item">
                  <a href="" class="text-decoration-none text-secondary"
                    >Chuyên mục Hỏi bác sĩ</a
                  >
                </li>
                <li class="text-decoration-none footer__item">
                  <a href="" class="text-decoration-none text-secondary"
                    >Gửi câu hỏi</a
>
                </li>
                <li class="text-decoration-none footer__item">
                  <a href="" class="text-decoration-none text-secondary"
                    >Câu hỏi đã trả lời</a
                  >
                </li>
                <li class="text-decoration-none footer__item">
                  <a href="" class="text-decoration-none text-secondary"
                    >Câu hỏi đáng chú ý</a
                  >
                </li>
                <li class="text-decoration-none footer__item">
                  <a href="" class="text-decoration-none text-secondary"
                    >Tra cứu</a
                  >
                </li>
                <li class="text-decoration-none footer__item">
                  <a href="" class="text-decoration-none text-secondary"
                    >Tra cứu bệnh</a
                  >
                </li>
              </ul>
            </div>
  
            <div class="col-md-3 col-sm-6 mb-4">
              <h5 class="fw-bold mb-3">MEDICAL CARE</h5>
              <ul class="list-unstyled text-muted">
                <li class="text-decoration-none footer__item">
                  <a href="" class="text-decoration-none text-secondary"
                    >Về chúng tôi</a
                  >
                </li>
                <li class="text-decoration-none footer__item">
                  <a href="" class="text-decoration-none text-secondary"
                    >Tuyển dụng</a
                  >
                </li>
                <li class="text-decoration-none footer__item">
                  <a href="" class="text-decoration-none text-secondary"
                    >Liên hệ</a
                  >
                </li>
                <li class="text-decoration-none footer__item">
                  <a href="" class="text-decoration-none text-secondary"
                    >Quy trình giải quyết tranh chấp</a
                  >
                </li>
                <li class="text-decoration-none footer__item">
                  <a href="" class="text-decoration-none text-secondary"
                    >Chính sách bảo mật thông tin</a
                  >
                </li>
              </ul>
            </div>
  
            <div class="col-md-3 col-sm-6 mb-4">
              <h5 class="fw-bold mb-3">THEO DÕI CHÚNG TÔI TRÊN</h5>
              <ul class="list-unstyled">
                <a href="https://www.facebook.com/Baoldz30099" class="text-decoration-none text-secondary">
                    <li class="text-decoration-none footer__item">
                        <i class="fab fa-facebook-square me-2 text-primary"></i>
                        Facebook
                    </li>
                </a>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="text-decoration-none text-secondary">
                    <li class="text-decoration-none footer__item">
                        <i class="fab fa-youtube me-2 text-primary"></i> Youtube
                    </li>
                </a>
                
                <a href="https://www.instagram.com/baoldz3009/" class="text-decoration-none text-secondary">
                    <li class="text-decoration-none footer__item">
                        <i class="fab fa-instagram me-2 text-primary"></i> Instagram
                    </li>
                </a>
              </ul>
              <h5 class="fw-bold mt-4 mb-3">CHỨNG NHẬN BỞI</h5>
              <div class="d-flex align-items-center">
                <img
                  src="img/icons/BCT.png"
                  alt="Chứng nhận 1"
                  class="me-2 lazyload"
                  style="height: 30px"
                />
                <img
                    src="img/icons/DMCA.png"
                  alt="Chứng nhận 2"
                  style="height: 30px"
                  class="lazyload"
                />
              </div>
              <h5 class="fw-bold mt-4 mb-3">HỖ TRỢ THANH TOÁN</h5>
              <div class="d-flex flex-wrap">
                <img
                  src="/img/icons/COD-icons.png"
                  alt="COD"
                  class="me-2 mb-2 lazyload"
                  style="height: 30px"
                />
                <img
                  src="/img/icons/VISA.png"
                  alt="VISA"
                  class="me-2 mb-2 lazyload"
                  style="height: 30px"
                />
                <img
                  src="/img/icons/MasterCard.png"
                  alt="Mastercard"
                  class="me-2 mb-2 lazyload"
                  style="height: 30px"
                />
                <img
                  src="/img/icons/JCB.png"
                  alt="JCB"
                  class="me-2 mb-2 lazyload"
                  style="height: 30px"
                />
                <img
                  src="/img/icons/Momo.png"
                  alt="MoMo"
                  class="me-2 mb-2 lazyload"
                  style="height: 30px"
                />
                <img
                  src="/img/icons/ZaloPay.png"
                  alt="ZaloPay"
                  class="me-2 mb-2 lazyload"
                  style="height: 30px"
                />
                <img
                  src="img/icons/napas.png"
                  alt="Napas"
                  class="me-2 mb-2 lazyload"
                  style="height: 30px"
                />
                <img
                  src="img/icons/apple-pay.png"
                  alt="Apple Pay"
                  class="me-2 mb-2 lazyload"
                  style="height: 30px"
                />
              </div>
            </div>
          </div>
  
          <div class="col-12 d-flex align-items-center justify-content-center">
            © Bản quyền thuộc về <strong style="margin-left: 5px;">DoctorHub</strong> | Cung cấp bởi
            <a
              href="https://www.instagram.com/baoldz3009/"
              class="fw-semibold text-decoration-none"
              style="color: var(--primary-color); margin-left: 5px;"
              >OniiChan-Baka</a
            >
          </div>
        </div>
      </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Xử lý cho menu hover effect
            const menuItems = document.querySelectorAll('.menu-content li');
            menuItems.forEach(item => {
                const textSpan = item.querySelector('a span:nth-child(2)');
                const originalColor = textSpan.style.color;
                item.addEventListener('mouseover', function() {
                    textSpan.style.color = 'white';
                });
                item.addEventListener('mouseout', function() {
                    textSpan.style.color = originalColor;
                });
            });

            // Slider cho phần dinh dưỡng
            function setupSlider(container, prevBtn, nextBtn) {
                const slider = document.querySelector(container);
                const cards = slider.querySelectorAll('.col-md-4');
                const prevButton = document.getElementById(prevBtn);
                const nextButton = document.getElementById(nextBtn);
                if (!slider || !prevButton || !nextButton || cards.length === 0) return;
                let currentGroup = 0;
                const cardsPerGroup = 3;
                const totalGroups = Math.ceil(cards.length / cardsPerGroup);

                function showGroup(index) {
                    cards.forEach((card, i) => {
                        card.style.display = (i >= index * cardsPerGroup && i < (index + 1) * cardsPerGroup) ? 'block' : 'none';
                    });
                    prevButton.style.opacity = index === 0 ? '0.5' : '1';
                    nextButton.style.opacity = index === totalGroups - 1 ? '0.5' : '1';
                }

                prevButton.addEventListener('click', function() {
                    if (currentGroup > 0) {
                        currentGroup--;
                        showGroup(currentGroup);
                    }
                });
                nextButton.addEventListener('click', function() {
                    if (currentGroup < totalGroups - 1) {
                        currentGroup++;
                        showGroup(currentGroup);
                    }
                });
                showGroup(currentGroup);
            }

            setupSlider('.nutrition-cards', 'nutrition-prev', 'nutrition-next');
            setupSlider('.exercise-cards', 'exercise-prev', 'exercise-next');
        });
    </script>

</body>
</html>