<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gói khám sức khỏe tổng quát cơ bản cho nữ (PKYD1M)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { 
            background: #f8fdfc; 
            font-family: 'Segoe UI', 'Roboto', sans-serif;
            color: #333;
        }
        .container {
            max-width: 1140px;
            padding: 20px 15px;
        }
        .package-header {
            display: flex;
            align-items: center;
            gap: 24px;
            margin-bottom: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }
        .package-img {
            width: 110px; 
            height: 110px;
            border-radius: 12px;
            object-fit: cover;
            border: none;
            box-shadow: 0 3px 10px rgba(0, 188, 212, 0.2);
        }
        
        .package-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 10px 0;
            color: #0277bd;
        }
        .package-info-list {
            margin: 10px 0; 
            padding: 0; 
            list-style: none;
        }
        .package-info-list li {
            margin-bottom: 8px;
            color: #555;
            display: flex;
            align-items: flex-start;
            line-height: 1.5;
        }
        .package-info-list li:before {
            content: "•";
            color: #00bcd4;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-right: 5px;
        }
        .location-badge {
            display: inline-flex;
            align-items: center;
            background-color: #f1f8fb;
            padding: 8px 12px;
            border-radius: 8px;
            color: #0277bd;
            font-weight: 500;
            margin-top: 8px;
        }
        .location-badge i {
            margin-right: 8px;
        }
        .address-link { 
            color: #0277bd; 
            text-decoration: none; 
            font-weight: 600; 
            transition: color 0.2s;
        }
        .address-link:hover { 
            color: #00bcd4; 
        }
        .schedule-btn {
            background: linear-gradient(135deg, #00bcd4, #0097a7);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            font-size: 16px;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 3px 8px rgba(0, 188, 212, 0.3);
        }
        .schedule-btn:hover { 
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(0, 188, 212, 0.4);
        }
        .schedule-btn:disabled {
            background: linear-gradient(135deg, #b6b6b6, #9e9e9e);
            transform: none;
            box-shadow: none;
        }
        .time-slot {
            background: #fff;
            border-radius: 8px;
            padding: 12px 0;
            text-align: center;
            font-weight: 500;
            cursor: pointer;
            margin-bottom: 8px;
            border: 1px solid #e0e0e0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            transition: box-shadow 0.2s;
        }
        .time-slot.selected {
            border: 2px solid #00bcd4;
            background: #e0f7fa;
            color: #00838f;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(0, 188, 212, 0.2);
        }
        .package-detail-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-top: 32px;
            margin-bottom: 16px;
            color: #0277bd;
            padding-bottom: 8px;
            border-bottom: 2px solid #e0f7fa;
        }
        .package-detail-list {
            list-style: none;
            padding-left: 5px;
        }
        .package-detail-list li {
            margin-bottom: 10px;
            color: #555;
            position: relative;
            padding-left: 25px;
        }
        .package-detail-list li:before {
            content: "✓";
            color: #00bcd4;
            font-weight: bold;
            position: absolute;
            left: 0;
        }
        .date-selector {
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }
        .date-selector-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 12px;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 15px;
        }
        .info-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }
        .info-card-title {
            color: #757575;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .price-tag {
            color: #00838f;
            font-weight: 700;
        }
        .detail-link {
            color: #0277bd;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            margin-left: 8px;
        }
        .detail-link:hover {
            text-decoration: underline;
        }
        .booking-note {
            display: flex;
            align-items: center;
            color: #757575;
            font-size: 14px;
            margin-top: 10px;
        }
        .booking-note i {
            margin-right: 5px;
        }
        @media (max-width: 768px) {
            .package-header { 
                flex-direction: column; 
                align-items: flex-start; 
                padding: 15px;
            }
            .package-title {
                font-size: 1.5rem;
            }
            .package-img {
                margin-bottom: 10px;
            }
        }
        .promotion-dialog {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.35);
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .promotion-dialog-content {
            background: #fff;
            border-radius: 10px;
            padding: 28px 28px 20px 28px;
            max-width: 420px;
            width: 95vw;
            box-shadow: 0 8px 32px rgba(0,0,0,0.18);
            position: relative;
            animation: fadeInModal 0.2s;
        }
        .promotion-dialog-content h4 {
            font-size: 20px;
            color: #0277bd;
            margin-bottom: 18px;
            text-align: center;
        }
        .promotion-details ol {
            padding-left: 18px;
            color: #333;
            font-size: 15px;
        }
        .close-dialog {
            position: absolute;
            top: 12px;
            right: 18px;
            font-size: 22px;
            color: #888;
            cursor: pointer;
            font-weight: bold;
        }
        @keyframes fadeInModal {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
<div class="container py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white px-0 mb-3">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Khám tổng quát</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Cơ bản</a></li>
            <li class="breadcrumb-item active" aria-current="page">Nu</li>
        </ol>
    </nav>
    
    <!-- Header -->
    <div class="package-header">
        <img src="../../assets/images/Icon/goi-kham-suc-khoe-co-ban.png" alt="Khám sức khỏe cơ bản nam" class="package-img">
        <div>
           
            <h1 class="package-title">Gói khám sức khỏe tổng quát cơ bản cho nữ (PKYD1F)</h1>
            <ul class="package-info-list">
                <li>Khám lâm sàng, Xét nghiệm máu, xét nghiệm chức năng gan, thận, chức năng chuyển hóa, chụp Xquang, siêu âm bụng, điện tim.</li>
                <li>Gói khám tại Phòng khám Bệnh viện Đại học Y dược 1</li>
                <li>Gói khám dành cho đối tượng trên 15 tuổi.</li>
            </ul>
            <div class="location-badge"><i class="fas fa-map-marker-alt"></i> Thành phố Hồ Chí Minh</div>
        </div>
    </div>
    
    <div class="row g-4">
        <div class="col-lg-8">
            <!-- Lịch chọn ngày/giờ -->
            <div class="date-selector">
                <div class="date-selector-header">
                    <span class="fw-bold">Thứ 4 - 14/5</span>
                    <i class="fas fa-chevron-down text-muted"></i>
                </div>
                <div class="mb-3"><i class="fas fa-calendar-alt me-2 text-primary"></i><b>LỊCH GÓI</b></div>
                <div class="row row-cols-3 row-cols-md-5 g-2 mb-3">
                    <div class="col"><div class="time-slot" data-time="08:00 - 08:30">08:00 - 08:30</div></div>
                    <div class="col"><div class="time-slot" data-time="08:30 - 09:00">08:30 - 09:00</div></div>
                    <div class="col"><div class="time-slot" data-time="09:00 - 09:30">09:00 - 09:30</div></div>
                    <div class="col"><div class="time-slot" data-time="09:30 - 10:00">09:30 - 10:00</div></div>
                    <div class="col"><div class="time-slot" data-time="10:00 - 10:30">10:00 - 10:30</div></div>
                    <div class="col"><div class="time-slot" data-time="10:30 - 11:00">10:30 - 11:00</div></div>
                    <div class="col"><div class="time-slot" data-time="13:30 - 14:00">13:30 - 14:00</div></div>
                    <div class="col"><div class="time-slot" data-time="14:00 - 14:30">14:00 - 14:30</div></div>
                    <div class="col"><div class="time-slot" data-time="14:30 - 15:00">14:30 - 15:00</div></div>
                </div>
                <div class="booking-note">
                    <i class="far fa-hand-pointer"></i> Chọn và đặt (Phí đặt lịch 0đ)
                </div>
            </div>
            
            <!-- Thông tin chi tiết -->
            <div class="package-detail-title">Gói khám sức khỏe tổng quát cơ bản cho nữ (PKYD1F)</div>
            <div class="mb-3 fw-medium">Gói khám bao gồm:</div>
            <ul class="package-detail-list">
                <li>Khám lâm sàng</li>
                <li>Xét nghiệm máu</li>
                <li>Xét nghiệm chức năng gan, thận, chức năng chuyển hóa</li>
                <li>Chụp Xquang, siêu âm bụng, điện tim</li>
                <li>Gói khám tại Phòng khám Bệnh viện Đại học Y dược 1</li>
                <li>Gói khám dành cho đối tượng trên 15 tuổi.</li>
            </ul>

            <div class="mb-3 fw-medium">Gói khám tại Phòng khám Bệnh viện Đại học Y dược 1. Gói khám được chia thành các danh mục cho nữ giới đã lập gia đình và nữ giới độc thân.</div>
        </div>
       
        <div class="col-lg-4">
            <div class="info-card">
                <div class="info-card-title">ĐỊA CHỈ GÓI</div>
                <div><a class="address-link" href="#">Phòng khám Bệnh viện Đại học Y Dược 1</a></div>
                <div class="mt-2">20-22 Dương Quang Trung, Phường 12, Quận 10, Tp. HCM</div>
            </div>
            
            <div class="info-card">
                <div style="display: flex; align-items: baseline;">
                    <span class="info-card-title mb-0" style="color: #757575; font-size: 14px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">GIÁ GÓI:</span>
                    <span class="fs-5 price-tag" style="margin-left: 10px;">2.000.000đ</span>
                    <a href="#" class="detail-link" id="viewPriceDetails" style="margin-left: auto; white-space: nowrap;">Xem chi tiết</a>
                </div>
                <!-- Price details section (hidden by default) -->
                <div class="price-details" id="priceDetailsSection" style="display: none; background: #f8fafd; border-radius: 8px; margin-top: 12px; padding: 16px 18px; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                    <table style="width:100%; font-size: 15px; margin-bottom: 10px;">
                        <tr>
                            <td class="service-name" style="padding: 3px 8px; color: #0277bd; font-weight: 500; margin-right: 1cm">Khám cho nữ độc thân</td>
                            <td class="price" style="padding: 6px 8px; text-align: right; font-weight: 600; color: #222;">2.000.000đ</td>
                        </tr>
                        <tr>
                            <td class="service-name" style="padding: 3px 8px; color: #0277bd; font-weight: 500; margin-right: 1cm">Khám cho nữ có gia đình</td>
                            <td class="price" style="padding: 6px 8px; text-align: right; font-weight: 600; color: #222;">2.700.000đ</td>
                        </tr>
                    </table>
                    <p class="note" style="font-size: 13px; color: #888; margin: 0; margin-left: 10px;">Phòng khám có thanh toán bằng hình thức tiền mặt và quẹt thẻ</p>
                </div>
            </div>
            
            <div class="info-card">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h4 class="info-card-title mb-0" style="color: #757575; font-size: 16px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0;">LOẠI BẢO HIỂM ÁP DỤNG</h4>
                    <a href="#" class="detail-link" id="viewPriceDetails3" style="margin-left: 24px; white-space: nowrap;">Xem chi tiết</a>
                </div>
                <div class="price-details" id="priceDetailsSection3" style="display: none; background: #f8fafd; border-radius: 8px; margin-top: 12px; padding: 16px 18px; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                    <table style="width:100%; font-size: 15px; margin-bottom: 10px;">
                        <tr>
                            <td class="service-name" colspan="2">
                                <div style="padding: 3px 8px; color: #0277bd; font-weight: 500; margin-right: 1cm">Bảo hiểm y tế nhà nước</div>
                                <p class="note" style="font-size: 13px; color: #888; margin: 0; margin-left: 10px;">Hiện chưa áp dụng bảo hiểm y tế nhà nước cho dịch vụ khám chuyên gia.</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="service-name" colspan="2">
                                <div style="padding: 3px 8px; color: #0277bd; font-weight: 500; margin-right: 1cm">Bảo hiểm bảo lãnh</div>
                                <p class="note" style="font-size: 13px; color: #888; margin: 0; margin-left: 10px;">Đối với các đơn vị bảo hiểm không bảo lãnh trực tiếp, phòng khám xuất hoá đơn tài chính (hoá đơn đỏ) và hỗ trợ bệnh nhân hoàn thiện hồ sơ</p>
                                <p class="note" style="font-size: 13px; color: #888; margin: 0; margin-left: 10px;"><a href="#" class="viewPromotionDetails"> Xem danh sách</a></p>
                                <!-- Modal danh sách công ty bảo lãnh -->
                                <div id="insuranceCompanyDialog" class="promotion-dialog" style="display: none;">
                                    <div class="promotion-dialog-content">
                                        <span class="close-dialog" id="closeInsuranceCompanyDialog">&times;</span>
                                        <h4>DANH SÁCH CÔNG TY BẢO LÃNH</h4>
                                        <div class="promotion-details">
                                            <ol>
                                                <li>Công ty Bảo hiểm Bảo Việt</li>
                                                <li>Tổng công ty Cổ phần Bảo Minh</li>
                                                <li>Tổng công ty Bảo hiểm Dầu khí Việt Nam (PVI)</li>
                                                <li>Bảo hiểm quân đội MIC</li>
                                                <li>Công ty TNHH INSMART</li>
                                                <li>Bảo hiểm Bưu điện (PTI)</li>
                                                <li>Tổng Công ty Bảo hiểm BIDV (Bic)</li>
                                                <li>Tổng Công ty Bảo hiểm toàn cầu (GIC)</li>
                                                <li>Bảo hiểm viền đóng (VASS)</li>
                                                <li>Bảo hiểm Liberty</li>
                                                <li>Bảo hiểm PJICO</li>
                                                <li>Bảo hiểm Pacific Cross</li>
                                                <li>Công ty Bảo hiểm nhân thọ GENERAL!</li>
                                                <li>Công ty Bảo hiểm Nhân thọ DaiIchi </li>
                                                <li>Bảo hiểm AIA</li>
                                                <li>Bảo hiểm BAKCO</li>
                                                <li>Bảo hiểm UIC's</li>
                                                <li>Công ty Bảo hiểm VBI (ngân hàng Viettinbank)</li>
                                                <li>Bảo hiểm JLT</li>
                                                <li>Bảo hiểm ATACC </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <form id="bookingForm" method="get" action="appointment_form.php">
                <input type="hidden" name="doctorId" value="13">
                <input type="hidden" name="doctorName" value="Bệnh viện Đại học Y dược 1">
                <input type="hidden" name="date" value="14/05/2025">
                <input type="hidden" name="time" id="selectedTime" value="">
                <button type="submit" class="schedule-btn w-100 mt-3" disabled id="bookBtn">Đặt lịch</button>
            </form>
        </div>

        <!-- Danh mục Gói -->
        <div class="mb-4">
                <div style="background: #36c3d6; color: #fff; border-radius: 8px 8px 0 0; padding: 14px 20px; display: flex; justify-content: space-between; align-items: center; font-weight: 600; font-size: 18px; position: relative;">
                    <span>Danh mục Gói</span>
                    <div style="position: relative;">
                        <a href="#" id="showDeviceBtn" style="color: #fff; font-size: 14px; text-decoration: underline;">Xem thiết bị</a>
                        <!-- Popup thiết bị ngay dưới link -->
                        <div id="devicePopup" style="display:none; position: absolute; left: -6.3cm; top: 110%; z-index: 1000; background: #fff; box-shadow: 0 4px 24px rgba(0,0,0,0.15); width: 340px; max-width: 95vw; min-width: 260px;">
                            <div style="padding: 18px 18px 10px 18px; border-bottom: 1px solid #e0e0e0; display: flex; justify-content: space-between; align-items: flex-start;">
                                <div style="color: #607d8b; font-size: 16px; font-weight: 500; line-height: 1.4; max-width: 220px;">
                                    Máy xét nghiệm sinh hóa tự động hoàn toàn Cobas C311 (Roche/Hitachi - Nhật Bản)
                                </div>
                                <button id="closeDeviceBtn" style="background: none; border: none; font-size: 22px; color: #888; cursor: pointer; margin-left: 8px;">&times;</button>
                            </div>
                            <div style="padding: 16px 18px 18px 18px; text-align: center;">
                                <img src="../../assets/images/Icon/may-xet-nghiem-sinh-hoa.png" alt="Cobas C311" style="max-width: 90%; max-height: 120px; margin-bottom: 10px; border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.07);">
                                <div style="font-size: 14px; color: #607d8b; margin-top: 8px;">Danh sách xét nghiệm rộng với hơn 100 xét nghiệm hóa sinh</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="background: #fff; border-radius: 0 0 8px 8px; overflow: hidden;">
                    <!-- Khám lâm sàng -->
                    <div style="background: #f7fafd; font-weight: 600; padding: 10px 20px; border-bottom: 1px solid #e0e0e0;">Khám lâm sàng</div>
                    <div style="padding: 0;">
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">1</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">Khám nội</div>
                            </div>
                        </div>
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">2</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">Đo huyết áp, nhịp tim, chỉ số BMI</div>
                                <div style="font-size: 13px; color: #666;">Kiểm tra mạch, huyết áp, cân nặng, chiều cao, tính chỉ số BMI nhằm phát hiện tăng huyết áp, rối loạn nhịp tim, thừa cân, béo phì</div>
                            </div>
                        </div>
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">3</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">Khám mắt</div>
                            </div>
                        </div>
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">4</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">Khám Răng</div>
                                <div style="font-size: 13px; color: #666;">Bác sĩ khám, kiểm tra và tư vấn các vấn đề về răng</div>
                            </div>
                        </div>
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">5</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">Khám Tai Mũi Họng</div>
                                <div style="font-size: 13px; color: #666;">Bác sĩ khám, kiểm tra các vấn đề về Tai-mũi-họng và nội soi tai-mũi-họng</div>
                            </div>
                        </div>
                    </div>
                    <!-- Xét nghiệm -->
                    <div style="background: #e0f7fa; font-weight: 600; padding: 10px 20px; border-bottom: 1px solid #e0e0e0;">Xét nghiệm</div>
                    <div style="padding: 0;">
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">1</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">Tổng phân tích tế bào máu ngoại vi 22 thông số</div>
                                <div style="font-size: 13px; color: #666;">Phát hiện bất thường về các loại tế bào máu, đánh giá tình trạng thiếu máu, nhiễm trùng và rối loạn đường máu liên quan đến tiểu cầu</div>
                            </div>
                        </div>
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">2</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">Định lượng glucose máu</div>
                                <div style="font-size: 13px; color: #666;">Tầm soát đái tháo đường, rối loạn dung nạp đường</div>
                            </div>
                        </div>
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">3</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">Định lượng Creatinin</div>
                            </div>
                        </div>
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">4</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">Đo hoạt độ ALT (GPT), AST (GOT), GGT</div>
                                <div style="font-size: 13px; color: #666;">Kiểm tra men gan, đánh giá tình trạng tổn thương của tế bào gan trong một số bệnh gan mật</div>
                            </div>
                        </div>
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">5</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">Định lượng cholesterol toàn phần, HDL-C, LDL-C, Triglycerid (máu)</div>
                                <div style="font-size: 13px; color: #666;">Phát hiện tình trạng rối loạn chuyển hóa mỡ máu</div>
                            </div>
                        </div>
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">6</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">Định lượng acid uric (máu)</div>
                                <div style="font-size: 13px; color: #666;">Đánh giá nguy cơ mắc bệnh gout</div>
                            </div>
                        </div>
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">7</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">HBsAg miễn dịch tự động</div>
                                <div style="font-size: 13px; color: #666;">Phát hiện bệnh viêm gan siêu vi B, hoặc người mang virus viêm gan B</div>
                            </div>
                        </div>
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">8</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">HBsAb định lượng</div>
                                <div style="font-size: 13px; color: #666;">Kiểm tra kháng thể bảo vệ tiếp xúc với virus viêm gan B, xác định tiêm vaccin có hiệu quả hay không...</div>
                            </div>
                        </div>
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">9</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">HCV Ab miễn dịch tự động</div>
                                <div style="font-size: 13px; color: #666;">Phát hiện nhiễm virus viêm gan C</div>
                            </div>
                        </div>
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">10</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">Định lượng PSA toàn phần</div>
                                <div style="font-size: 13px; color: #666;">Tầm soát ung thư tuyến tiền liệt</div>
                            </div>
                        </div>
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">11</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">Tổng phân tích nước tiểu</div>
                                <div style="font-size: 13px; color: #666;">Phát hiện một số bệnh lý của thận và đường tiết niệu </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tham do chuc nang -->
                    <div style="background: #e0f7fa; font-weight: 600; padding: 10px 20px; border-bottom: 1px solid #e0e0e0;">Thăm dò chức năng và chẩn đoán hình ảnh</div>
                    <div style="padding: 0;">
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">1</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">Điện tim thường</div>
                            </div>
                        </div>
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">2</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">Chụp X-quang ngực thẳng số hóa 1 phim</div>
                                <div style="font-size: 13px; color: #666;">Phát hiện một số hình ảnh bất thường về tim, phổi</div>
                            </div>
                        </div>
                        <div style="display: flex; border-bottom: 1px solid #f0f0f0;">
                            <div style="width: 40px; padding: 10px 0 10px 20px; color: #36c3d6; font-weight: 600;">3</div>
                            <div style="flex: 1; padding: 10px 20px 10px 0;">
                                <div style="font-weight: 500;">Siêu âm bụng tổng quát                                </div>
                                <div style="font-size: 13px; color: #666;">Phát hiện một số hình ảnh bất thường của các tạng trong ổ bụng như gan, mật, tụy, lách, thận, tử cung, buồng trứng, tiền liệt tuyến</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Chọn khung giờ
    const timeSlots = document.querySelectorAll('.time-slot');
    const selectedTimeInput = document.getElementById('selectedTime');
    const bookBtn = document.getElementById('bookBtn');
    
    timeSlots.forEach(slot => {
        slot.addEventListener('click', function() {
            timeSlots.forEach(s => s.classList.remove('selected'));
            this.classList.add('selected');
            selectedTimeInput.value = this.dataset.time;
            bookBtn.disabled = false;
        });
    });

    // Hiển thị popup thiết bị
    document.getElementById('showDeviceBtn').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('devicePopup').style.display = 'block';
    });

    // Đóng popup thiết bị
    document.getElementById('closeDeviceBtn').addEventListener('click', function() {
        document.getElementById('devicePopup').style.display = 'none';
    });

    document.getElementById('viewPriceDetails').addEventListener('click', function(e) {
        e.preventDefault();
        var section = document.getElementById('priceDetailsSection');
        section.style.display = (section.style.display === 'none' || section.style.display === '') ? 'block' : 'none';
    });

    // Toggle bảng chi tiết bảo hiểm
    document.getElementById('viewPriceDetails3').addEventListener('click', function(e) {
        e.preventDefault();
        var section = document.getElementById('priceDetailsSection3');
        if (section.style.display === 'block') {
            section.style.display = 'none';
            this.textContent = 'Xem chi tiết';
        } else {
            section.style.display = 'block';
            this.textContent = 'Thu gọn';
        }
    });

    // Hiển thị modal danh sách công ty bảo lãnh
    document.querySelectorAll('.viewPromotionDetails').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('insuranceCompanyDialog').style.display = 'flex';
        });
    });
    // Đóng modal khi click dấu X
    document.getElementById('closeInsuranceCompanyDialog').addEventListener('click', function() {
        document.getElementById('insuranceCompanyDialog').style.display = 'none';
    });
    // Đóng modal khi click ra ngoài
    document.getElementById('insuranceCompanyDialog').addEventListener('click', function(e) {
        if (e.target === this) {
            this.style.display = 'none';
        }
    });

</script>
</body>
</html>




