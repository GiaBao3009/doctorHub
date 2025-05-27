<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Y Học Cổ Truyền</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
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

        /* Breadcrumb styling */
        .text-muted a {
            color: #3408c2;
            font-weight: 500;
        }

        /* Schedule buttons */
        .btn-secondary {
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }

        /* Doctor info layout */
        .flex-1 {
            flex: 1;
        }

        /* Address and price sections */
        h4.text-primary {
            margin-top: 1.5rem;
            font-size: 1.1rem;
            font-weight: 600;
        }

        /* Footer area */
        .py-4 {
            padding-bottom: 3rem !important;
        }

        /* Price details section */
        .price-details {
            display: none;
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-top: 10px;
            border-left: 3px solid #3408c2;
        }

        .price-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .price-details td {
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .price-details tr:last-child td {
            border-bottom: none;
        }

        .price-details .price {
            text-align: right;
            font-weight: 500;
        }

        .price-details .service-name {
            color: #495057;
        }

        .price-details .note {
            font-style: italic;
            color: #6c757d;
            font-size: 0.9rem;
            margin-top: 8px;
        }

        /* //dialog styles */
        .promotion-dialog {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.4);
            z-index: 9999;
            overflow-y: auto;
        }
        .promotion-dialog-content {
            position: relative;
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 800px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .close-dialog {
            position: absolute;
            top: 10px;
            right: 15px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .close-dialog:hover {
            color: black;
        }
        .promotion-details {
            margin-top: 20px;
        }
        .promotion-details ol {
            padding-left: 20px;
        }
        .promotion-details ul {
            padding-left: 20px;
        }
        .promotion-details li {
            margin-bottom: 8px;
        }
        .promotion-details strong {
            color: #3408c2;
        }
        /* Style for the price details */
        .price-details {
            margin-top: 10px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
        }
        .price-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .price-details td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .price-details .service-name {
            width: 70%;
        }
        .price-details .price {
            width: 30%;
            text-align: right;
            font-weight: bold;
        }
        .price-details .note {
            font-size: 12px;
            color: #777;
            margin: 2px 0 0 0;
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
    
    
    <div class="hehe" style="margin-left: 70px;">
    <div class="container py-4 position-relative">
        <img alt="Background image" class="background-image" src="../../assets/images/Icon/y-hoc-co-truyen.png"/>
        <div class="text-muted mb-2">
            <a class="text-primary" href="./chuyenkhoa.php">Khám chuyên khoa</a> /
            <span>Y học Cổ truyền</span>
        </div>
        <h1 class="h4 font-weight-bold mb-2">Y học Cổ truyền</h1>
        <h2 class="h5 font-weight-semibold mb-2">Bác sĩ Thần Kinh giỏi</h2>
        <p class="mb-4">Danh sách các bác sĩ Y học Cổ truyền uy tín đầu ngành tại Việt Nam:</p>
        <ul class="list-unstyled mb-4">
            <li class="mb-2">Các chuyên gia có quá trình đào tạo bài bản, kinh nghiệm công tác tại các bệnh viện lớn về chuyên khoa Y học Cổ truyền</li>
            <li class="mb-2">Các bác sĩ đã, đang công tác tại chuyên Khoa Y học Cổ truyền - Bệnh viện Y học Cổ truyền Trung ương, Bệnh viện Bạch Mai, Thanh Nhàn..</li>
            <li class="mb-2">Được nhà nước công nhận các danh hiệu Thầy thuốc nhân dân, thầy thuốc ưu tú, bác sĩ cao cấp,..</li>
        </ul>
        <a class="text-primary" href="#">Xem thêm</a>
        <div id="additionalContent" style="display: none;">
            <h3 class="h5 font-weight-semibold mt-3">Tư vấn, khám và điều trị các vấn đề:</h3>
            <ul class="list-unstyled">
                <li>Bệnh lý thần kinh: đau đầu, mất ngủ, suy nhược thần kinh...</li>
                <li>Bệnh lý cơ xương khớp: đau mỏi tay chân, thoái hóa khớp, viêm khớp...</li>
                <li>Bệnh lý tim mạch: Tăng huyết áp, huyết áp thấp, đau thắt ngực...</li>
                <li>Bệnh lý đường tiêu hóa: đau bụng, rối loạn chức năng tiêu hóa...</li>
            </ul>
        </div>

            <div class="d-flex justify-content-between align-items-center mb-4" style="margin-top: 20px;">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                    Toàn quốc
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Đà Lạt</a>
                    <a class="dropdown-item" href="#">TP HCM</a>
                    <a class="dropdown-item" href="#">Hà Nội</a>
                    <a class="dropdown-item" href="#">Đà Nẵng</a>
                </div>
            </div>
        </div>

        <div class="bg-white shadow rounded-lg mt-4 p-4" data-doctor-id="19">
            <div class="d-flex flex-column flex-md-row">
                <div class="d-flex flex-1 align-items-start mb-4 mb-md-0">
                    <img alt="Doctor's image" class="rounded-circle mr-4" height="100" src="gay.jpg" width="100"/>
                    <div class="flex-1" style="margin-left: 10px;">
                        <div class="d-flex align-items-center mb-2">
                            <h3 class="h6 font-weight-bold">Khám theo yêu cầu tại Bệnh viện Y học Cổ truyền Trung ươngnh</h3>
                        </div>
                        
                        <p class="text-muted mb-2" style="font-size: 15px;">Được lựa chọn khám với các bác sĩ chuyên khoa giàu kinh nghiệm</p>
                        <p class="text-muted mb-2" style="font-size: 15px;">Hỗ trợ đặt khám trực tuyến trước khi đi khám (miễn phí đặt lịch)</p>
                        <p class="text-muted mb-2" style="font-size: 15px;">Khám theo khung giờ hẹn, giảm thiểu thời gian chờ đợi xếp hàng</p>
                        <p class="text-muted d-flex align-items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>. Hà Nội</p>
                    </div>
                </div>
                <div class="flex-1 mt-4 mt-md-0 ml-md-4" style="margin-left: 10px;">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4 class="text-primary font-weight-semibold" style="margin-top: 0rem;">Hôm nay - 10/5</h4>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-calendar-alt text-muted mr-2"></i>
                        <span class="text-muted" style="margin-left: 5px;">LỊCH KHÁM</span>
                    </div>
                    <div class="d-flex flex-wrap mb-4">
                        <button class="btn btn-secondary mb-2 time-slot" data-time="07:30 - 08:00" data-doctor-id="5" style="height: 40px; width: 126.06px;">07:30 - 08:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="08:30 - 09:00" data-doctor-id="5" style="height: 40px; width: 126.06px;">08:30 - 09:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="09:30 - 10:00" data-doctor-id="5" style="height: 40px; width: 126.06px;">09:30 - 10:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="10:30 - 11:00" data-doctor-id="5" style="height: 40px; width: 126.06px;">10:30 - 11:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="13:30 - 14:00" data-doctor-id="5" style="height: 40px; width: 126.06px;">13:30 - 14:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="14:30 - 15:00" data-doctor-id="5" style="height: 40px; width: 126.06px;">14:30 - 15:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="15:00 - 15:30" data-doctor-id="5" style="height: 40px; width: 126.06px;">15:00 - 15:30</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="15:30 - 16:00" data-doctor-id="5" style="height: 40px; width: 126.06px;">15:30 - 16:00</button>
                    </div>
                    <div class="text-muted mb-4">Chọn và đặt (Phí đặt lịch 0đ)</div>
                    <div class="text-muted mb-2">
                        <h4 class="text-primary font-weight-semibold">ĐỊA CHỈ KHÁM</h4>
                        
                        <div class="text-muted mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="text-primary font-weight-semibold mb-0" id="promotionHeading">CHƯƠNG TRÌNH KHUYẾN MẠI</h4>
                                <a class="text-primary" href="#" id="viewPromotionDetails" style="position: relative; top: 9.45px;">Xem chi tiết</a>
                            </div>
                        </div>
                        <p>Hệ thống Y tế Thu Cúc cơ sở Thụy Khuê</p>
                        <p>Số 29 Nguyễn Bỉnh Khiêm, Hai Bà Trưng, Hà Nội </p>
                    </div>
                    <div class="text-muted">
                        <h4 class="text-primary font-weight-semibold d-inline-block mb-0 mr-2" id="priceHeading1">GIÁ KHÁM: 250.000đ</h4>
                        <a class="text-primary d-inline-block" href="#" id="viewPriceDetails1" style="margin-left: 288px;">Xem chi tiết</a>
                        
                        <!-- Price details section (hidden by default) -->
                        <div class="price-details" id="priceDetailsSection1" style="display: none;">
                            <table>
                                <tr>
                                    <td class="service-name">Giá khám</td>
                                    <td class="price">250.000đ</td>
                                    <p class="note">Giá khám chưa bao gồm chi phí chụp chiếu, xét nghiệm</p>
                                </tr>
                            </table>
                           
                        </div>
                    </div>
                    <div class="text-muted mb-2">
                        <h4 class="text-primary font-weight-semibold d-inline-block mb-0 mr-2" id="priceHeading3">LOẠI BẢO HIỂM ÁP DỤNG</h4>     
                        <a class="text-primary d-inline-block" href="#" id="viewPriceDetails3" style="display: flex; justify-content: space-between;margin-left: 247px;">Xem chi tiết</a>
                            <div class="price-details" id="priceDetailsSection3" style="display: none;">
                                <table>
                                    <tr>
                                        <td class="service-name" colspan="2">
                                            <div>Bảo hiểm y tế nhà nước</div>
                                            <p class="note">Áp dụng cho bệnh nhân đăng ký khám chữa bệnh ban đầu tại bệnh viện hoặc có giấy chuyển viện từ đơn vị khác</p>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>    
        </div>

        <div class="bg-white shadow rounded-lg mt-4 p-4" data-doctor-id="20">
            <div class="d-flex flex-column flex-md-row">
                <div class="d-flex flex-1 align-items-start mb-4 mb-md-0">
                    <img alt="Doctor's image" class="rounded-circle mr-4" height="100" src="doctor2.jpg" width="100"/>
                    <div class="flex-1" style="margin-left: 10px;">
                        <div class="d-flex align-items-center mb-2">
                            <h3 class="h6 font-weight-bold">Thạc sĩ, Bác sĩ Võ Thị Trúc Phương</h3>
                        </div>
                        <p class="text-muted mb-2" style="font-size: 15px;">Bác sĩ có nhiều năm kinh nghiệm khám và điều trị về lĩnh vực Y học Cổ truyền</p>
                        <p class="text-muted mb-2" style="font-size: 15px;">Trưởng khoa Y học Cổ truyền, Bệnh viện Hồng Đức</p>
                        <p class="text-muted d-flex align-items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>. TH HCM</p>
                    </div>
                </div>
                <div class="flex-1 mt-4 mt-md-0 ml-md-4" style="margin-left: 10px;">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4 class="text-primary font-weight-semibold" style="margin-top: 0rem;">Hôm nay - 8/4</h4>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-calendar-alt text-muted mr-2"></i>
                        <span class="text-muted" style="margin-left: 5px;">LỊCH KHÁM</span>
                    </div>
                    <div class="d-flex flex-wrap mb-4">
                        <button class="btn btn-secondary mb-2 time-slot" data-time="07:30 - 08:00" data-doctor-id="6" style="height: 40px; width: 126.06px;">07:30 - 08:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="08:30 - 09:00" data-doctor-id="6" style="height: 40px; width: 126.06px;">08:30 - 09:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="09:30 - 10:00" data-doctor-id="6" style="height: 40px; width: 126.06px;">09:30 - 10:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="10:30 - 11:00" data-doctor-id="6" style="height: 40px; width: 126.06px;">10:30 - 11:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="13:30 - 14:00" data-doctor-id="6" style="height: 40px; width: 126.06px;">13:30 - 14:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="14:30 - 15:00" data-doctor-id="6" style="height: 40px; width: 126.06px;">14:30 - 15:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="15:00 - 15:30" data-doctor-id="6" style="height: 40px; width: 126.06px;">15:00 - 15:30</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="15:30 - 16:00" data-doctor-id="6" style="height: 40px; width: 126.06px;">15:30 - 16:00</button>
                    </div>
                    <div class="text-muted mb-4">Chọn và đặt (Phí đặt lịch 0đ)</div>
                    <div class="text-muted mb-2">
                        <h4 class="text-primary font-weight-semibold">ĐỊA CHỈ KHÁM</h4>
                        <p>Bệnh viện Đa khoa Hồng Đức III</p>
                        <p>32/2 Thống Nhất, Phường 10, Q. Gò Vấp, Tp Hồ Chí Minh</p>
                    </div>
                    <div class="text-muted">
                        <h4 class="text-primary font-weight-semibold d-inline-block mb-0 mr-2" id="priceHeading2">GIÁ KHÁM: 120.000đ</h4>
                        <a class="text-primary d-inline-block" href="#" id="viewPriceDetails2" style="margin-left: 288px;">Xem chi tiết</a>
                        
                        <!-- Price details section (hidden by default) -->
                        <div class="price-details" id="priceDetailsSection2" style="display: none;">
                            <table>
                                <h4 class="text-primary font-weight-semibold d-inline-block mb-0 mr-2" id="priceHeading2">GIÁ DỊCH VỤ LIÊN QUAN</h4>
                                <tr>
                                    <td class="service-name">Giá khám</td>
                                    <td class="price">120.000đ</td>
                                    <p class="note">Giá khám chưa bao gồm chi phí chụp chiếu xét nghiệm</p>
                                </tr>
                            </table>
                        </div>
                        
                    </div>

                    </div>
                </div> 
            </div>
        

        <div class="bg-white shadow rounded-lg mt-4 p-4" data-doctor-id="8">
            <div class="d-flex flex-column flex-md-row">
                <div class="d-flex flex-1 align-items-start mb-4 mb-md-0">
                    <img alt="Doctor's image" class="rounded-circle mr-4" height="100" src="/gay.jpg" width="100"/>
                    <div class="flex-1" style="margin-left: 10px;">
                    <div class="d-flex align-items-center mb-2">
                            <h3 class="h6 font-weight-bold">Bác sĩ Chuyên khoa I Diệc Khả Hân</h3>
                        </div>
                        <p class="text-muted mb-2" style="font-size: 15px;">Hơn 15 năm kinh nghiệm trong lĩnh vực Y học Cổ truyền</p>
                        <p class="text-muted mb-2" style="font-size: 15px;">Nguyên Phó Khoa Nội Thần Kinh, Bệnh Viện Y học cổ truyền TP. HCM</p>
                        <p class="text-muted mb-2" style="font-size: 15px;">Trưởng khoa Y học cổ truyền, Bệnh Viện FV</p>
                        <p class="text-muted d-flex align-items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>. TH HCM</p>
                    </div>
                </div>
                <div class="flex-1 mt-4 mt-md-0 ml-md-4" style="margin-left: 10px;">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4 class="text-primary font-weight-semibold" style="margin-top: 0rem;">Hôm nay - 8/4</h4>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-calendar-alt text-muted mr-2"></i>
                        <span class="text-muted" style="margin-left: 5px;">LỊCH KHÁM</span>
                    </div>
                    <div class="d-flex flex-wrap mb-4">
                        <button class="btn btn-secondary mb-2 time-slot" data-time="07:30 - 08:00" data-doctor-id="8"  style="height: 40px; width: 126.06px;">07:30 - 08:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="08:30 - 09:00" data-doctor-id="8" style="height: 40px; width: 126.06px;">08:30 - 09:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="09:30 - 10:00" data-doctor-id="8" style="height: 40px; width: 126.06px;">09:30 - 10:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="10:30 - 11:00" data-doctor-id="8" style="height: 40px; width: 126.06px;">10:30 - 11:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="13:30 - 14:00" data-doctor-id="8" style="height: 40px; width: 126.06px;">13:30 - 14:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="14:30 - 15:00" data-doctor-id="8" style="height: 40px; width: 126.06px;">14:30 - 15:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="15:00 - 15:30" data-doctor-id="8" style="height: 40px; width: 126.06px;">15:00 - 15:30</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="15:30 - 16:00" data-doctor-id="8" style="height: 40px; width: 126.06px;">15:30 - 16:00</button>
                    </div>
                    <div class="text-muted mb-4">Chọn và đặt (Phí đặt lịch 0đ)</div>
                    <div class="text-muted mb-2">
                        <h4 class="text-primary font-weight-semibold">ĐỊA CHỈ KHÁM</h4>
                        <p>Bệnh viện FV</p>
                        <p>6 Nguyễn Lương Bằng, Nam Sài Gòn (Phú Mỹ Hưng), Quận 7, TP. HCM</p>
                    </div>
                    <div class="text-muted">
                        <h4 class="text-primary font-weight-semibold d-inline-block mb-0 mr-2" id="priceHeading4" >GIÁ KHÁM: 675.000đ - 1.850.000đ</h4>
                        <a class="text-primary d-inline-block" href="#" id="viewPriceDetails4" style="margin-left: 186px;">Xem chi tiết</a>
                        
                        <!-- Price details section (hidden by default) -->
                        <div class="price-details" id="priceDetailsSection4" style="display: none;">
                            <table>
                                <tr>
                                    <td class="service-name">Giá khám</td>
                                    <td class="price">675.000đ - 1.850.000đ</td>
                                    <p class="note">Giá khám chưa bao gồm chi phí chụp chiếu xét nghiệm</p>
                                </tr>
                                <tr>
                                    <td class="service-name">Hình thức thanh toán: tiền mặt, quẹt thẻ, chuyển khoản</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="text-muted mb-2">
                        <h4 class="text-primary font-weight-semibold d-inline-block mb-0 mr-2" id="priceHeading5">LOẠI BẢO HIỂM ÁP DỤNG</h4>     
                        <a class="text-primary d-inline-block" href="#" id="viewPriceDetails5" style="display: flex; justify-content: space-between;margin-left: 247px;">Xem chi tiết</a>
                            <div class="price-details" id="priceDetailsSection5" style="display: none;">
                                <table>
                                    <tr>
                                        <td class="service-name" colspan="5">
                                            <div>Bảo hiểm y tế nhà nước</div>
                                            <p class="note">Phòng khám chưa áp dụng bảo hiểm nhà nước</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="service-name" colspan="5">
                                            <div>Bảo hiểm bảo lãnh</div>
                                            <p class="note">Áp dụng bảo lãnh thanh toán  theo hợp đồng của khách. Khi khách tới FV thăm khám sẽ có 1 phòng bảo hiểm hỗ trợ khách làm thanh toán</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="service-name" colspan="5">
                                            <div>Bảo hiểm tư nhân </div>
                                            <p class="note">Bệnh viện có xuất hóa đơn đỏ để bệnh nhân tự thanh toán bảo hiểm </p>
                                        </td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
    
        <div class="bg-white shadow rounded-lg mt-4 p-4" data-doctor-id="9">
            <div class="d-flex flex-column flex-md-row">
                <div class="d-flex flex-1 align-items-start mb-4 mb-md-0">
                    <img alt="Doctor's image" class="rounded-circle mr-4" height="100" src="/gay.jpg" width="100"/>
                    <div class="flex-1" style="margin-left: 10px;">
                        <div class="d-flex align-items-center mb-2">
                            <h3 class="h6 font-weight-bold">
                            Tiến sĩ, Bác sĩ Trần Minh Hiếu</h3>
                        </div>
                        <p class="text-muted mb-2" style="font-size: 15px;">Gần 30 năm kinh nghiệm trong lĩnh vực Y học Cổ truyền</p>
                        <p class="text-muted mb-2" style="font-size: 15px;">Phó Giám đốc Trung tâm Đào tạo và Chỉ đạo tuyến, Bệnh viện Y học Cổ truyền Trung ương</p>
                        <p class="text-muted mb-2" style="font-size: 15px;">Danh hiệu Thầy thuốc Ưu tú do Chủ tịch nước phong tặng</p>
                        <p class="text-muted d-flex align-items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>. Hà Nội</p>
                    </div>
                </div>
                <div class="flex-1 mt-4 mt-md-0 ml-md-4" style="margin-left: 10px;">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h4 class="text-primary font-weight-semibold" style="margin-top: 0rem;">Hôm nay - 8/4</h4>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-calendar-alt text-muted mr-2"></i>
                        <span class="text-muted" style="margin-left: 5px;">LỊCH KHÁM</span>
                    </div>
                    <div class="d-flex flex-wrap mb-4">
                        <button class="btn btn-secondary mb-2 time-slot" data-time="07:30 - 08:00" data-doctor-id="9" style="height: 40px; width: 126.06px;">07:30 - 08:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="08:30 - 09:00" data-doctor-id="9" style="height: 40px; width: 126.06px;">08:30 - 09:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="09:30 - 10:00" data-doctor-id="9" style="height: 40px; width: 126.06px;">09:30 - 10:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="10:30 - 11:00" data-doctor-id="9" style="height: 40px; width: 126.06px;">10:30 - 11:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="13:30 - 14:00" data-doctor-id="9" style="height: 40px; width: 126.06px;">13:30 - 14:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="14:30 - 15:00" data-doctor-id="9" style="height: 40px; width: 126.06px;">14:30 - 15:00</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="15:00 - 15:30" data-doctor-id="9" style="height: 40px; width: 126.06px;">15:00 - 15:30</button>
                        <button class="btn btn-secondary mb-2 time-slot" data-time="15:30 - 16:00" data-doctor-id="9" style="height: 40px; width: 126.06px;">15:30 - 16:00</button>
                    </div>
                    <div class="text-muted mb-4">Chọn và đặt (Phí đặt lịch 0đ)</div>
                    <div class="text-muted mb-2">
                        <h4 class="text-primary font-weight-semibold">ĐỊA CHỈ KHÁM</h4>
                        <p>Bệnh viện Y học cổ truyền Trung ương</p>
                        <p>Số 29 Nguyễn Bỉnh Khiêm, Hai Bà Trưng, Hà Nội </p>
                    </div>
                    <div class="text-muted mb-2">
                        <h4 class="text-primary font-weight-semibold d-inline-block mb-0 mr-2" id="priceHeading6">GIÁ KHÁM: 300.000đ</h4>
                        <a class="text-primary d-inline-block" href="#" id="viewPriceDetails6" style="margin-left: 198px;">Xem chi tiết</a>
                        <div class="price-details" id="priceDetailsSection6" style="display: none;">
                            <table>
                                <tr>
                                    <td class="service-name" colspan="2"><strong>Giá khám</strong></td>
                                </tr>
                                <tr>
                                    <td class="service-name">
                                        <div>Giá khám</div>
                                        <p class="note">Giá khám chưa bao gồm chi phí chụp chiếu, xét nghiệm</p>
                                    </td>
                                    <td class="price">300.000đ</td>

                                </tr>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
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
        document.querySelector('.text-primary[href="#"]').addEventListener('click', function(e) {
            e.preventDefault();
            const additionalContent = document.getElementById('additionalContent');
            if (additionalContent.style.display === 'none') {
                additionalContent.style.display = 'block';
                this.textContent = 'Ẩn bớt';
            } else {
                additionalContent.style.display = 'none';
                this.textContent = 'Xem thêm';
            }
        });
                document.addEventListener('DOMContentLoaded', function() {
        // Xử lý cho bác sĩ thứ nhất
        const viewDetailsLink1 = document.getElementById('viewPriceDetails1');
        const priceDetailsSection1 = document.getElementById('priceDetailsSection1');
        const priceHeading1 = document.getElementById('priceHeading1');
        
        viewDetailsLink1.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (priceDetailsSection1.style.display === 'block') {
                priceDetailsSection1.style.display = 'none';
                priceHeading1.style.display = 'block';
                viewDetailsLink1.textContent = 'Xem chi tiết';
            } else {
                priceDetailsSection1.style.display = 'block';
                priceHeading1.style.display = 'none';
                viewDetailsLink1.textContent = 'Ẩn chi tiết';
            }
        });

        //Xử lý bảo hiển bs1
        // Xử lý dialog danh sách công ty bảo lãnh
        const insuranceCompanyDialog = document.getElementById('insuranceCompanyDialog');
        const closeInsuranceCompanyDialog = document.getElementById('closeInsuranceCompanyDialog');

        // Mở dialog khi click vào "Xem chi tiết" bảo hiểm bảo lãnh
        document.querySelector('.viewPromotionDetails').addEventListener('click', function(e) {
            e.preventDefault();
            insuranceCompanyDialog.style.display = 'block';
        });

        // Đóng dialog khi click nút đóng
        closeInsuranceCompanyDialog.addEventListener('click', function() {
            insuranceCompanyDialog.style.display = 'none';
        });

        // Đóng dialog khi click bên ngoài
        window.addEventListener('click', function(e) {
            if (e.target === insuranceCompanyDialog) {
                insuranceCompanyDialog.style.display = 'none';
            }
        });
        
        // Xử lý cho bác sĩ thứ hai
        const viewDetailsLink2 = document.getElementById('viewPriceDetails2');
        const priceDetailsSection2 = document.getElementById('priceDetailsSection2');
        const priceHeading2 = document.getElementById('priceHeading2');
        
        viewDetailsLink2.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (priceDetailsSection2.style.display === 'block') {
                priceDetailsSection2.style.display = 'none';
                priceHeading2.style.display = 'block';
                viewDetailsLink2.textContent = 'Xem chi tiết';
            } else {
                priceDetailsSection2.style.display = 'block';
                priceHeading2.style.display = 'none';
                viewDetailsLink2.textContent = 'Ẩn chi tiết';
            }
        });
        });

        
        // Xử lý cho phần Bảo hiểm
        const viewDetailsLink3 = document.getElementById('viewPriceDetails3');
        const priceDetailsSection3 = document.getElementById('priceDetailsSection3');
       

        viewDetailsLink3.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (priceDetailsSection3.style.display === 'block') {
                priceDetailsSection3.style.display = 'none';
               
                viewDetailsLink3.textContent = 'Xem chi tiết';
            } else {
                priceDetailsSection3.style.display = 'block';
                
                viewDetailsLink3.textContent = 'Thu gọn';
            }
        });

        // Xử lý cho bác sĩ thứ ba
        const viewDetailsLink4 = document.getElementById('viewPriceDetails4');
        const priceDetailsSection4 = document.getElementById('priceDetailsSection4');
        const priceHeading4 = document.getElementById('priceHeading4');
        
        viewDetailsLink4.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (priceDetailsSection4.style.display === 'block') {
                priceDetailsSection4.style.display = 'none';
                priceHeading4.style.display = 'block';
                viewDetailsLink4.textContent = 'Xem chi tiết';
            } else {
                priceDetailsSection4.style.display = 'block';
                priceHeading4.style.display = 'none';
                viewDetailsLink4.textContent = 'Ẩn chi tiết';
            }
        });
        
        // Xử lý cho phần Bảo hiểm
        const viewDetailsLink5 = document.getElementById('viewPriceDetails5');
        const priceDetailsSection5 = document.getElementById('priceDetailsSection5');
       

        viewDetailsLink5.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (priceDetailsSection5.style.display === 'block') {
                priceDetailsSection5.style.display = 'none';
               
                viewDetailsLink5.textContent = 'Xem chi tiết';
            } else {
                priceDetailsSection5.style.display = 'block';
                
                viewDetailsLink5.textContent = 'Thu gọn';
            }
        });


        // Xử lý cho bác sĩ thứ tư
        const viewDetailsLink6 = document.getElementById('viewPriceDetails6');
        const priceDetailsSection6 = document.getElementById('priceDetailsSection6');
        const priceHeading6 = document.getElementById('priceHeading6');

        viewDetailsLink6.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (priceDetailsSection6.style.display === 'block') {
                priceDetailsSection6.style.display = 'none';
                priceHeading6.style.display = 'block';
                viewDetailsLink6.textContent = 'Xem chi tiết';
            } else {
                priceDetailsSection6.style.display = 'block';
                priceHeading6.style.display = 'none';
                viewDetailsLink6.textContent = 'Ẩn chi tiết';
            }
        });


        // Xử lý cho bác sĩ thứ năm
        document.addEventListener('DOMContentLoaded', function() {
        // Xử lý cho phần khuyến mại
        const viewPromotionLink = document.getElementById('viewPromotionDetails');
        const promotionDialog = document.getElementById('promotionDialog');
        const closeDialog = document.querySelector('.close-dialog');
        
        // Mở dialog khi nhấp vào "Xem chi tiết"
        viewPromotionLink.addEventListener('click', function(e) {
            e.preventDefault();
            promotionDialog.style.display = 'block';
            
            // Ngăn cuộn trang khi dialog mở
            document.body.style.overflow = 'hidden';
        });
        
        // Đóng dialog khi nhấp vào dấu X
        closeDialog.addEventListener('click', function() {
            promotionDialog.style.display = 'none';
            
            // Cho phép cuộn trang khi dialog đóng
            document.body.style.overflow = 'auto';
        });
        
        // Đóng dialog khi nhấp vào bên ngoài
        window.addEventListener('click', function(event) {
            if (event.target == promotionDialog) {
                promotionDialog.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });
        
     
        const viewPriceDetailsLink = document.getElementById('viewPriceDetails7');
        const priceDetailsSection = document.getElementById('priceDetailsSection7');
        
        if (viewPriceDetailsLink && priceDetailsSection) {
            viewPriceDetailsLink.addEventListener('click', function(e) {
                e.preventDefault();
                if (priceDetailsSection.style.display === 'none') {
                    priceDetailsSection.style.display = 'block';
                } else {
                    priceDetailsSection.style.display = 'none';
                }
            });
        }
        });


        // Xử lý cho menu hover effect
        document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.menu-content li');
    
        menuItems.forEach(item => {
            const textSpan = item.querySelector('a span:nth-child(2)');
            
            // Lưu màu ban đầu
            const originalColor = textSpan.style.color;
            
            item.addEventListener('mouseover', function() {
                textSpan.style.color = 'white';
            });
            
            item.addEventListener('mouseout', function() {
                textSpan.style.color = originalColor;
            });
        });
        });
    </script>

    <!-- Add this script at the end of the file -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all time slot buttons
        const timeSlots = document.querySelectorAll('.btn-secondary.mb-2.time-slot');
        
        // Add click event to each button
        timeSlots.forEach(button => {
            button.addEventListener('click', function() {
                const selectedTime = this.getAttribute('data-time');
                const doctorId = this.getAttribute('data-doctor-id');
                
                const today = new Date();
                const year = today.getFullYear();
                window.location.href = `appointment_form.php?doctorId=${doctorId}&doctorName=Bác sĩ&time=${encodeURIComponent(selectedTime)}&date=10/5/${year}`;
            });
        });
    });
    </script>

    <!-- Thêm modal form đơn giản đã hoạt động -->
    <div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="appointmentModalLabel">Đặt lịch khám</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="appointmentForm" method="POST" action="debug_process.php">
              <input type="hidden" name="appointment_time" id="modal-time" value="">
              <input type="hidden" name="appointment_date" value="08/4/2023">
              
              <div class="mb-3">
                <label class="form-label">Họ tên bệnh nhân</label>
                <input type="text" name="info_name" class="form-control" required>
              </div>
              
              <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" name="info_phone" class="form-control" required>
              </div>
              
              <div class="mb-3">
                <label class="form-label">Lý do khám</label>
                <textarea name="info_reason" class="form-control"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary" id="submit-appointment">Xác nhận đặt lịch</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Sửa đổi JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lấy tất cả các nút thời gian
        const timeSlots = document.querySelectorAll('.btn-secondary.mb-2.time-slot');
        
        // Thêm sự kiện click cho từng nút
        timeSlots.forEach(button => {
            button.addEventListener('click', function() {
                const selectedTime = this.getAttribute('data-time');
                
                // Đặt giá trị thời gian vào form
                document.getElementById('modal-time').value = selectedTime;
                
                // Hiển thị modal
                const modal = new bootstrap.Modal(document.getElementById('bookingModal'));
                modal.show();
            });
        });
        
        // Xử lý nút đặt lịch
        document.getElementById('submit-appointment').addEventListener('click', function() {
            const form = document.getElementById('appointmentForm');
            if(form.checkValidity()) {
                form.submit(); // Gửi form đến debug_process.php đã hoạt động
            } else {
                form.reportValidity();
            }
        });
    });
    </script>

    <!-- Thêm vào trước thẻ đóng body -->


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Thêm sự kiện click cho các nút thời gian
        document.querySelectorAll('.btn-secondary.mb-2.time-slot').forEach(button => {
            button.addEventListener('click', function() {
                const timeSlot = this.getAttribute('data-time');
                
                // Kiểm tra xem phần tử selected-time có tồn tại không
                const selectedTimeElement = document.getElementById('selected-time');
                if (selectedTimeElement) {
                    selectedTimeElement.textContent = timeSlot;
                }
                
                // Kiểm tra xem phần tử appointment-time-input có tồn tại không
                const appointmentTimeInput = document.getElementById('appointment-time-input');
                if (appointmentTimeInput) {
                    appointmentTimeInput.value = timeSlot;
                }
            });
        });
        
        // Xử lý nút đặt lịch
        document.getElementById('submit-appointment').addEventListener('click', function() {
            const form = document.getElementById('appointmentForm');
            if (form.checkValidity()) {
                // Lưu thông tin vào cơ sở dữ liệu
                const formData = new FormData(form);
                
                fetch('process_appointment.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Đặt lịch khám thành công!');
                        window.location.reload();
                    } else {
                        alert('Đặt lịch thất bại: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Đã xảy ra lỗi khi đặt lịch. Vui lòng thử lại!');
                });
            } else {
                form.reportValidity();
            }
        });
    });
    </script>
</body>
</html>