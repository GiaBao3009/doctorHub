<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gói xét nghiệm tầm soát dấu ấn ung thư nam (DIAG15M)</title>
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
        .package-detail-list ul li:before {
            content: none;
        }
        .package-detail-list ul li {
            padding-left: 0;
        }
    </style>
</head>
<body>
<div class="container py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white px-0 mb-3">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Xét nghiệm y học</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">NIPT - Xét nghiệm y học</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Sàng lọc trước sinh không xâm lấn (NIPT-Plus) thường</li>
        </ol>
    </nav>
    
    <!-- Header -->
    <div class="package-header">
        <img src="../../assets/images/Icon/nipt2.png" alt="Khám sức khỏe cơ bản nam" class="package-img">
        <div>
           
            <h1 class="package-title">Sàng lọc trước sinh không xâm lấn (NIPT-Plus) thường </h1>
            <ul class="package-info-list">
                <li>Phát hiện 3 nhiễm sắc thể phổ biến:  Down, Patau, Edward, 4 hội chứng: Tuner (XO), hội chứng tam nhiễm (XXX), Klinefelter (XXY), Jacobs (XYY). Phát hiện bất thường các nhiễm sắc thể còn lại, Phát hiện 86 hội chứng mất/lặp đoạn nhỏ NST.</li>
                <li>Công nghệ giải trình tự gen thế hệ mới</li>
                <li>Thời gian trả kết quả 4 - 5 ngày</li>
            </ul>
            <div class="location-badge"><i class="fas fa-map-marker-alt"></i>Hà Nội</div>
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
            <div class="package-detail-title">Sàng lọc trước sinh không xâm lấn (NIPT-Plus) thường</div>
            <div class="mb-3 fw-medium">Tại sao bạn nên chọn gói xét nghiệm NIPT - Plus </div>
            <ul class="package-detail-list">
                <li>
                    <div class="mb-3">Gói xét nghiệm sàng lọc:</div>
                    <ul>
                        <li>Gói xét nghiệm giúp phát hiện lệch bội trên 3 nhiễm sắc thể phổ biến: Down, Patau, Edward</li>
                        <li>4 hội chứng: Tuner (XO), hội chứng tam nhiễm (XXX), Klinefelter (XXY), Jacobs (XYY)</li>
                        <li>Phát hiện bất thường các nhiễm sắc thể còn lại</li>
                        <li>Phát hiện 86 hội chứng mất/lặp đoạn nhỏ NST</li>
                    </ul>
                </li>
                <li>Công nghệ giải trình tự gen thế hệ mới</li>
                <li>Thời gian trả kết quả 4 - 5 ngày</li>
            </ul>
            <div class="mb-3 fw-medium">Đối tượng thực hiện xét nghiệm:</div>
            <ul class="package-detail-list">
                <li>Các mẹ bầu mang thai đơn có nhu cầu sàng lọc dị tật thai nhi trước sinh</li>
                <li>Mẹ bầu đã từng sinh con dị tật</li>
                <li>Có kết quả bất thường khi thực hiện các phương pháp sàng lọc trước đó(siêu âm, Double test, Triple test)</li>
                <li>Mẹ bầu lớn tuổi (>35 tuổi)</li>
                <li>Mẹ đã từng bị sảy thai m</li>
                <li>Mang thai nhờ phương pháp IVF,…</li>
            </ul>
            <div class="mb-3 fw-medium">6 lý do bạn nên chọn xét nghiệm NIPT tại trung tâm xét nghiệm Medlatec:</div>
            <ul class="package-detail-list">
                <li>Quy tụ đội ngũ chuyên gia Sản khoa, Di truyền hàng đầu Việt Nam</li>
                <li>Trung tâm xét nghiệm Medlatec được kiểm duyệt nghiêm ngặt theo hai tiêu chuẩn quốc tế ISO 15189:2012 và CAP, đảm bảo kết quả xét nghiệm chính xác.</li>
                <li>Thời gian trả kết quả nhanh chóng, 3-5 ngày kể từ khi nhận mẫu (không tính Thứ 7, Chủ nhật).</li>
                <li>Cam kết bảo mật tuyệt đối thông tin của khách hàng.</li>
                <li> Hỗ trợ tư vấn biện pháp can thiệp khi có bất kỳ bất thường nào về kết quả xét nghiệm.</li>
                <li>Trong trường hợp kết quả dương tính giả với Down, Edwards, Patau hoặc không ra kết quả, MEDLATEC cam kết hoàn trả 100% chi phí xét nghiệm; trường hợp kết quả âm tính giả, khách hàng được bồi thường bởi mức bảo hiểm lên đến 200 triệu đồng</li>
            </ul>
        </div>
       
        <div class="col-lg-4">
            <div class="info-card">
                <div class="info-card-title">Địa chỉ Xét nghiệm</div>
                <div><a class="address-link" href="#">Hệ thống y tế MEDLATEC</a></div>
                <div class="mt-2">42 Nghĩa Dũng, Phúc Xá, Ba Đình, Hà Nội</div>
            </div>
            
            <div class="info-card">
                <div style="display: flex; align-items: baseline;">
                    <span class="info-card-title mb-0" style="color: #757575; font-size: 14px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px;">GIÁ GÓI:</span>
                    <span class="fs-5 price-tag" style="margin-left: 10px;">7.500.000đ</span>
                    <a href="#" class="detail-link" id="viewPriceDetails" style="margin-left: auto; white-space: nowrap;">Xem chi tiết</a>
                </div>
                <!-- Price details section (hidden by default) -->
                <div class="price-details" id="priceDetailsSection" style="display: none; background: #f8fafd; border-radius: 8px; margin-top: 12px; padding: 16px 18px; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                    <table style="width:100%; font-size: 15px; margin-bottom: 10px;">
                        <tr>
                            <td class="service-name" style="padding: 3px 8px; color: #0277bd; font-weight: 500; margin-right: 1cm">Giá gói khám</td>
                            <td class="price" style="padding: 6px 8px; text-align: right; font-weight: 600; color: #222;">7.500.000đ</td>
                        </tr>
                    </table>
                    <p class="note" style="font-size: 13px; color: #888; margin: 0; margin-left: 10px;">Phòng khám có thanh toán bằng hình thức tiền mặt và quẹt thẻ</p>
                </div>
            </div>
            
            <div class="info-card">
                <div style="display: flex; align-items: baseline; justify-content: space-between;">
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
