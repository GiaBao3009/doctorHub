-- Tạo database
CREATE DATABASE IF NOT EXISTS doctorhub CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE doctorhub;

-- Bảng người dùng
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('user', 'admin', 'doctor') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Dữ liệu mẫu cho users
INSERT INTO users (name, email, password, role) VALUES
('Nguyễn Văn A', 'a@gmail.com', '123456', 'user'),
('Trần Thị B', 'b@gmail.com', '123456', 'user'),
('Admin', 'admin@doctorhub.com', 'admin123', 'admin'),
('Nguyễn Đức Gia Bảo', 'baoldz3009@gamil.com', '1', 'doctor');



INSERT INTO users (name, email, password, role) VALUES
('User 1', 'user1@example.com', '$2y$10$Wtbk2HHcMRp3/OSDncPhou.6FzLJ7tN6tkFSwxYeWVPic8ezyPas.', 'user'),
('User 2', 'user2@example.com', '$2y$10$VGWQBI32l3ESDEG/ucyaCuNOVr29DcMpAaSSKPF5kbWLafliC6V.G', 'user'),
('User 3', 'user3@example.com', '$2y$10$xNOXI3knyf4KpyTzrKDDu.f1kF01gGpBoCZtCiRjvEivW9bVwxnLm', 'user'),
('User 4', 'user4@example.com', '$2y$10$q5RhiPQt6MAUL5Gq0wG9we1J9OtpUH5XycojXOtswxyt8gXiuOeN.', 'user'),
('User 5', 'user5@example.com', '$2y$10$Dl6YJUjdH0woMS86OgyW7eCEyojIS./OXJIwOzdaBGOQhnYM.9EZ.', 'user'),
('User 6', 'user6@example.com', '$2y$10$Q3qcPYU74uwipDSZMiUUPONq5QdwwW79lpB5cHe.0kf3Rxy9hNqVq', 'user'),
('User 7', 'user7@example.com', '$2y$10$x5bLkVz3MQy/PmIcNk7cR..Ky7JwJslaaap1Lp4M71QbsnvGfNl4q', 'user'),
('User 8', 'user8@example.com', '$2y$10$SXVa78gxRAGX1oINmy4xt.0JbfLf1VP9GmtI6jAAnzd/FT58r6v/6', 'user'),
('User 9', 'user9@example.com', '$2y$10$SAeuaBC7PSdy9XxCkiJ6depPcB.voGR9cXWiC67UrzVONkreYUrbm', 'user'),
('User 10', 'user10@example.com', '$2y$10$ghraFCLGMjZg63A/nR5VO.UvXcw63bDxecwD8ihd6fVd9cOrGKPL6', 'user'),
('User 11', 'user11@example.com', '$2y$10$nRICTTlxq0swcgOTJv8uPePGj66nKjYiHDybTvoLJro.pIGmfA6YK', 'user'),
('User 12', 'user12@example.com', '$2y$10$z/Tc3MF.8PrjBKSRZcAOOufyzcKx6okU.pWD0wymN90UdIsvmp/CG', 'user'),
('User 13', 'user13@example.com', '$2y$10$ZrDOkNgbkKU.JIgbMLi3o.MZroklBxzCSssk9B4Q6H38DyxJN0fZO', 'user'),
('User 14', 'user14@example.com', '$2y$10$pfZyMDs12T4PuirXxJNYHeQLU37SJGrYyg.6.oUYPyUjKErnZ5P5S', 'user'),
('User 15', 'user15@example.com', '$2y$10$WvPbJp3wA7xmdwiJ6Xlw7.d2ZOdVo5VMbhdIm08tBjBNBu38Kk7si', 'user'),
('User 16', 'user16@example.com', '$2y$10$vOKHPRx9zt018nyo7umGI..NySEGBE9XtzOledAgtlmXzGkLg5EX6', 'user'),
('User 17', 'user17@example.com', '$2y$10$ENCkkDrLOvYNCnnndtMOPuu15YDp.4XX.gcCeqs2ZnYZwEUxk1k6q', 'user'),
('User 18', 'user18@example.com', '$2y$10$RTMDLpDRYomXKkSLx00IfuCaYtfOIUDuwxofjRSd/cRtZdIwpc5Mq', 'user'),
('User 19', 'user19@example.com', '$2y$10$4NwQ0bxImwSM6gId9N6PmerPd1ZO3NOPSuw3ndw4T5GSqDsCtqdGe', 'user'),
('User 20', 'user20@example.com', '$2y$10$WswXuuzHYx6ODDVqsc8ol.mG5OQDWwQ.feJN4vKpbTrfHNhi6.OeW', 'user'),
('User 21', 'user21@example.com', '$2y$10$6NHx/orrpnCfiPsZdrN5jOOtzWfjQdZ0jCT0U0OFM07HTG.e8Y7KW', 'user'),
('User 22', 'user22@example.com', '$2y$10$BsWgmVoyYsnD5bumzK3xVOs6Em3FApIgRWxwVbzDT0V5WpoOgp7fe', 'user'),
('User 23', 'user23@example.com', '$2y$10$PTwzFC4tPiM5jwYTMElGYeVDk0biW5XjRxtxn75OBl5PyxIGyErGa', 'user'),
('User 24', 'user24@example.com', '$2y$10$4qWOfYCSNtB/KO.o4t2S0OjDld4WMMjBUkgC.093Dv2t3.wp2zMWS', 'user'),
('User 25', 'user25@example.com', '$2y$10$qIrwZ5vZ81pkwdDnPFVOZO9iIfBZu9cyEMLNhhTA.aK5tB9IQz3FG', 'user'),
('User 26', 'user26@example.com', '$2y$10$o2HmTRFcNT1Fjq9a5wfyceauNshUbVl2T6m19RCvSl80O.U77R6T.', 'user'),
('User 27', 'user27@example.com', '$2y$10$xtQzsSuKb9O5InFutmKfp.SzuzS3KkkbvUXU4PDMKo0263dY.2sEu', 'user'),
('User 28', 'user28@example.com', '$2y$10$qi92QdaCu0m5tzEDKOF9NeshyPL0PBoLLvyY9LyJNCB8FPH8Mz.9u', 'user'),
('User 29', 'user29@example.com', '$2y$10$RkAHvyNE4aMXkxhK/CYQiuMoudRbI8CPdKD6/zNaI4Gy5yv0yJyHK', 'user'),
('User 30', 'user30@example.com', '$2y$10$Q237tg0aTkHzywagYgO52OB5Yy6LtIHe2kHIbTH7GIGV9vgMVUqam', 'user'),
('User 31', 'user31@example.com', '$2y$10$mnV2eUIarP1Iv8DWB7ooWeXx4l8Mylb/LaYJKtjAFuFa/wQeCktRG', 'user'),
('User 32', 'user32@example.com', '$2y$10$y3vQaAfFL1GlhhGvT3QM0.Pm9LtVHy7PL09p92maCrOkOiRgH0NWe', 'user'),
('User 33', 'user33@example.com', '$2y$10$6f2mOMx7dBF4.P/6P8Y8X.kV/akCSQHw5MAYoJZtN/6UlFHwdBLU6', 'user'),
('User 34', 'user34@example.com', '$2y$10$.tF3xvnyLLSLlsM6GjiLTu6R6xMzA/AFIzDYp895JqUSulH3TBKAu', 'user'),
('User 35', 'user35@example.com', '$2y$10$6ZUgAaga4P..SoEctCEc9.HpQUx8FGgYUY7KMxOUbfcUmRFHvemJu', 'user'),
('User 36', 'user36@example.com', '$2y$10$DuwQNhEL7XnrMxubPJkg4eJpp9u/iZbAhPQ8pNYfCBEgpCWyjga1a', 'user'),
('User 37', 'user37@example.com', '$2y$10$8ZSdVquby/sowzve9HFGiuBA36/z4QDjbTg4HUhvZ99vnPMNmX1ru', 'user'),
('User 38', 'user38@example.com', '$2y$10$3xwpdW7PogiujbTERSYB1O3SNdFz.p3islXFiYUBoFZU9laeFORRS', 'user'),
('User 39', 'user39@example.com', '$2y$10$iu/dLVD1vRjgqzTt47DdaOPAcUrCn1cPsK5Mk92xq1JMajGls1dES', 'user'),
('User 40', 'user40@example.com', '$2y$10$cHZpJodojw2YKwGBc29lyucDYVWvVWGSRYEzURp8upzOOqznItCQ.', 'user'),
('User 41', 'user41@example.com', '$2y$10$Opg69mZTiq1HrGvtVFKez.MBFob6JlEM2D6LG2.iP7r0dcYVUCWAG', 'user'),
('User 42', 'user42@example.com', '$2y$10$gEGMWBCF8ieRMwvmDZqEsuNgG4ZCSSDXWFLwMAu/i7Vwjy3.Kd8KG', 'user'),
('User 43', 'user43@example.com', '$2y$10$6ffB.r9Cty2TS6kt1TREtOxP.uzSw.HtwylJnm6uqO9Kpr9x3lW3.', 'user'),
('User 44', 'user44@example.com', '$2y$10$5oaR2VZfxNWVVyzf4E2Jsui3QvymnndfrlTYxU.q0QaJVhtQXuki2', 'user'),
('User 45', 'user45@example.com', '$2y$10$G7Yhn2FTw.XnLlTITrohdeZAJjysA1unmVw1aCfPJutcm3tDXezzq', 'user'),
('User 46', 'user46@example.com', '$2y$10$lURzfbcAjBxT9Tq6vEFH5uAO75Kh3F7Syzz4TsbdQ/hYmqm6oP.Ry', 'user'),
('User 47', 'user47@example.com', '$2y$10$ZegjOLpxWXV2fvVA0ThvEe2ucyDwImjGoVbJf4QLzH7l4Rpsf7Q3W', 'user'),
('User 48', 'user48@example.com', '$2y$10$Glnbn7rR56rydgMSKJu8JemRE0qvZPj91hybErDA4J5stEfhEnkHm', 'user'),
('User 49', 'user49@example.com', '$2y$10$vvBGuMHHQBNNwSI9rwlBmOhJoOJghBfl0rx9kmcMOdt4VseoBEEJi', 'user'),
('User 50', 'user50@example.com', '$2y$10$kFNShQkUTt..YC3dKybD9emnsy65BLn4A6B3rE77qwAb6UEOiMYMC', 'user');








-- Bảng dịch vụ y tế
CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT,
    price DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Dữ liệu mẫu cho services
INSERT INTO services (name, description, price) VALUES
('Khám tổng quát', 'Dịch vụ khám sức khỏe toàn diện', 500000),
('Khám tim mạch', 'Tư vấn và kiểm tra tim mạch', 600000),
('Khám tai mũi họng', 'Khám và điều trị các bệnh tai mũi họng', 300000),
('Khám cơ xương khớp', 'Dịch vụ khám và tư vấn bệnh cơ xương khớp', 500000);

-- Bảng bệnh nhân
CREATE TABLE IF NOT EXISTS patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO patients (id, name, email, phone, address) VALUES
(8, 'Bùi Văn H', 'buivanh8@gmail.com', '0901234008', '67 Nguyễn Đình Chiểu, Nha Trang, Khánh Hòa'),
(9, 'Ngô Thị I', 'ngothii9@gmail.com', '0901234009', '90 CMT8, Quận 10, TP. Hồ Chí Minh'),
(10, 'Lý Văn K', 'lyvank10@gmail.com', '0901234010', '23 Lý Thường Kiệt, Hải Phòng'),
(11, 'Nguyễn Thị Lan', 'nguyenthilan11@gmail.com', '0901234011', '45 Nguyễn Văn Cừ, Cần Thơ'),
(12, 'Trần Văn Minh', 'tranvanminh12@gmail.com', '0901234012', '78 Lê Văn Sỹ, Quận Tân Bình, TP. Hồ Chí Minh'),
(13, 'Lê Thị Ngọc', 'lethingoc13@gmail.com', '0901234013', '12 Trường Chinh, Đà Nẵng'),
(14, 'Phạm Văn Oanh', 'phamvanoanh14@gmail.com', '0901234014', '56 Nguyễn Thị Minh Khai, Vũng Tàu'),
(15, 'Hoàng Văn Phúc', 'hoangvanphuc15@gmail.com', '0901234015', '89 Pasteur, Quận 1, TP. Hồ Chí Minh'),
(16, 'Vũ Thị Quyên', 'vuthiquyen16@gmail.com', '0901234016', '34 Hùng Vương, Huế'),
(17, 'Đặng Văn R', 'dangvanr17@gmail.com', '0901234017', '67 Lê Thánh Tôn, Quy Nhơn, Bình Định'),
(18, 'Bùi Thị S', 'buithis18@gmail.com', '0901234018', '90 Trần Phú, Hải Châu, Đà Nẵng'),
(19, 'Ngô Văn T', 'ngovant19@gmail.com', '0901234019', '23 Võ Thị Sáu, Quận 7, TP. Hồ Chí Minh'),
(20, 'Lý Thị U', 'lythiu20@gmail.com', '0901234020', '45 Nguyễn Công Trứ, Vinh, Nghệ An'),
(21, 'Nguyễn Văn V', 'nguyenvanv21@gmail.com', '0901234021', '78 Điện Biên Phủ, Thanh Hóa'),
(22, 'Trần Thị X', 'tranthix22@gmail.com', '0901234022', '12 Lê Duẩn, Quận 1, TP. Hồ Chí Minh'),
(23, 'Lê Văn Y', 'levany23@gmail.com', '0901234023', '56 Nguyễn Văn Trỗi, Phú Nhuận, TP. Hồ Chí Minh'),
(24, 'Phạm Thị Z', 'phamthiz24@gmail.com', '0901234024', '89 Trần Quốc Toản, Đà Lạt'),
(25, 'Hoàng Văn A1', 'hoangvana1@gmail.com', '0901234025', '34 Lý Tự Trọng, Cần Thơ'),
(26, 'Vũ Thị B1', 'vuthib1@gmail.com', '0901234026', '67 Nguyễn Thị Định, Quận 2, TP. Hồ Chí Minh'),
(27, 'Đặng Văn C1', 'dangvanc1@gmail.com', '0901234027', '90 Hoàng Diệu, Hải Phòng'),
(28, 'Bùi Thị D1', 'buithid1@gmail.com', '0901234028', '23 Lê Hồng Phong, Nha Trang'),
(29, 'Ngô Văn E1', 'ngovane1@gmail.com', '0901234029', '45 Phạm Văn Đồng, Thủ Đức, TP. Hồ Chí Minh'),
(30, 'Lý Thị F1', 'lythif1@gmail.com', '0901234030', '78 Nguyễn Văn Linh, Đà Nẵng'),
(31, 'Nguyễn Văn G1', 'nguyenvang1@gmail.com', '0901234031', '12 Lê Lai, Huế'),
(32, 'Trần Thị H1', 'tranthih1@gmail.com', '0901234032', '56 Nguyễn Thái Học, Hà Nội'),
(33, 'Lê Văn I1', 'levani1@gmail.com', '0901234033', '89 Bùi Thị Xuân, Quận 1, TP. Hồ Chí Minh'),
(34, 'Phạm Thị K1', 'phamthik1@gmail.com', '0901234034', '34 Trần Nhật Duật, Đà Lạt'),
(35, 'Hoàng Văn L1', 'hoangvanl1@gmail.com', '0901234035', '67 Lý Nam Đế, Hà Nội'),
(36, 'Vũ Thị M1', 'vuthim1@gmail.com', '0901234036', '90 Nguyễn Hữu Cảnh, Quận Bình Thạnh, TP. Hồ Chí Minh'),
(37, 'Đặng Văn N1', 'dangvann1@gmail.com', '0901234037', '23 Lê Văn Tám, Cần Thơ'),
(38, 'Bùi Thị O1', 'buithio1@gmail.com', '0901234038', '45 Nguyễn Đình Chính, Phú Nhuận, TP. Hồ Chí Minh'),
(39, 'Ngô Văn P1', 'ngovanp1@gmail.com', '0901234039', '78 Trần Hưng Đạo, Vũng Tàu'),
(40, 'Lý Thị Q1', 'lythiq1@gmail.com', '0901234040', '12 Hùng Vương, Quy Nhơn'),
(41, 'Nguyễn Văn R1', 'nguyenvanr1@gmail.com', '0901234041', '56 Lê Đại Hành, Quận 5, TP. Hồ Chí Minh'),
(42, 'Trần Thị S1', 'trouthis1@gmail.com', '0901234042', '89 Nguyễn Trãi, Thanh Hóa'),
(43, 'Lê Văn T1', 'levant1@gmail.com', '0901234043', '34 Lê Văn Sỹ, Đà Nẵng'),
(44, 'Phạm Thị U1', 'phamthiu1@gmail.com', '0901234044', '67 Nguyễn Văn Cừ, Hà Nội'),
(45, 'Hoàng Văn V1', 'hoangvanv1@gmail.com', '0901234045', '90 Phạm Ngũ Lão, Quận 1, TP. Hồ Chí Minh'),
(46, 'Vũ Thị X1', 'vuthix1@gmail.com', '0901234046', '23 Hai Bà Trưng, Huế'),
(47, 'Đặng Văn Y1', 'dangvany1@gmail.com', '0901234047', '45 Lý Thường Kiệt, Hải Phòng'),
(48, 'Bùi Thị Z1', 'buithiz1@gmail.com', '0901234048', '78 Nguyễn Huệ, Đà Lạt'),
(49, 'Ngô Văn A2', 'ngovana2@gmail.com', '0901234049', '12 Trần Phú, Nha Trang'),
(50, 'Lý Thị B2', 'lythib2@gmail.com', '0901234050', '56 Lê Lợi, Quận 3, TP. Hồ Chí Minh');

-- Bảng đặt lịch khám (cập nhật cấu trúc)
CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    service_id INT,
    doctor_user_id INT,
    patient_name VARCHAR(100),
    appointment_date DATETIME,
    status ENUM('pending', 'confirmed', 'completed', 'canceled') DEFAULT 'pending',
    note TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (service_id) REFERENCES services(id),
    FOREIGN KEY (doctor_user_id) REFERENCES users(id)
);

-- Dữ liệu mẫu cho appointments
INSERT INTO appointments (user_id, service_id, doctor_user_id, patient_name, appointment_date, status, note) VALUES
(1, 1, 4, 'Nguyễn Văn A', '2025-04-15 09:00:00', 'pending', 'Yêu cầu bác sĩ nữ'),
(2, 2, 4, 'Trần Thị B', '2025-04-16 14:30:00', 'confirmed', 'Mang kết quả xét nghiệm');

-- Bảng bài viết blog
CREATE TABLE IF NOT EXISTS blogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200),
    content TEXT,
    author_id INT,
    published_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users(id)
);

-- Dữ liệu mẫu cho blogs
INSERT INTO blogs (title, content, author_id, published_at) VALUES
('Cách chăm sóc sức khỏe mùa hè', 'Nội dung bài viết về giữ gìn sức khỏe trong mùa hè...', 3, '2025-04-01 10:00:00'),
('Dinh dưỡng hợp lý cho người lớn tuổi', 'Nội dung bài viết về chế độ ăn uống cho người cao tuổi...', 3, '2025-04-05 08:30:00');

-- Bảng sản phẩm trong shop
CREATE TABLE IF NOT EXISTS shop_products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT,
    price DECIMAL(10,2),
    stock INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Dữ liệu mẫu cho shop_products
INSERT INTO shop_products (name, description, price, stock) VALUES
('Vitamin C 500mg', 'Tăng sức đề kháng, phòng cảm cúm', 150000, 50),
('Máy đo huyết áp điện tử', 'Máy đo chính xác, dễ sử dụng tại nhà', 650000, 20),
('Khẩu trang y tế 4 lớp', 'Bảo vệ sức khỏe, lọc bụi và vi khuẩn', 60000, 200);

CREATE TABLE doctor_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    clinic_name VARCHAR(255),
    address TEXT,
    specialty VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Thêm dữ liệu cho bác sĩ
INSERT INTO doctor_details (user_id, clinic_name, address, specialty) VALUES
(4, 'Phòng khám 115', '115 Nguyễn Thị Minh Khai, Quận 1, TP HCM', 'Cơ Xương Khớp');

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    message TEXT NOT NULL,
    created_at DATETIME NOT NULL
);


CREATE TABLE doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255),
    specialty VARCHAR(100),
    avatar VARCHAR(255),
    phone VARCHAR(20),patients
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO doctors (name, email, password, specialty, avatar, phone, address) VALUES
('BS. Hoàng Hồng Mạnh', 'hoanghongmanh@doctorhub.com', 'hashed_password', 'Khoa da liễu', '../../../assets/images/Doctors/032958-bac-si-da-lieu-hoang-hong-manh.jpg', '0123456789', '123 Đường Láng, Hà Nội'),
('BS. Hoài Thu', 'hoaithu@doctorhub.com', 'hashed_password', 'Khoa Nội tổng quát', '../../../assets/images/Doctors/045850-bac-si-da-lieu-hoai-thu.jpg', '0987654321', '456 Nguyễn Trãi, TP.HCM'),
('BS. Huỳnh Quốc Hiêu', 'huynhquochieu@doctorhub.com', 'hashed_password', 'Khoa Nội tổng quát', '../../../assets/images/Doctors/avatar-Huynh-Quoc-Hieu.jpg', '0912345678', '789 Lê Lợi, Đà Nẵng'),
('BS. Chu Trọng Hiệp', 'chutronghiep@doctorhub.com', 'hashed_password', 'Khoa Nội tổng quát', '../../../assets/images/Doctors/avatar-TS.BS_.Chu-Trong-Hiep.webp', '0932145678', '101 Trần Phú, Huế'),
('BS. Lê Hoài Thương', 'lehoaithuong@doctorhub.com', 'hashed_password', 'Khoa Nội tổng quát', '../../../assets/images/Doctors/1536566238-bacsy.jpg', '0941234567', '321 Phạm Văn Đồng, Cần Thơ');

INSERT INTO doctors (name, email, password, specialty, avatar, phone, address) VALUES
('BS. Nguyễn Hải Bình', 'nguyễnhảibình@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Sản', '../../../assets/images/Doctors/avatar-1.jpg', '0956271851', '458 Nguyễn Trãi, TP.HCM'),
('BS. Bùi Hữu Dũng', 'bùihữudũng@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Tim mạch', '../../../assets/images/Doctors/avatar-2.jpg', '0911851402', '636 Lê Lợi, Huế'),
('BS. Lê Văn Hà', 'lêvănhà@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nhi', '../../../assets/images/Doctors/avatar-3.jpg', '0989898963', '448 Điện Biên Phủ, Biên Hòa'),
('BS. Phạm Minh Giang', 'phạmminhgiang@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nội tổng quát', '../../../assets/images/Doctors/avatar-4.jpg', '0976981154', '793 Cách Mạng Tháng 8, Biên Hòa'),
('BS. Đỗ Minh Giang', 'Đỗminhgiang@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Sản', '../../../assets/images/Doctors/avatar-5.jpg', '0941513167', '62 Điện Biên Phủ, Hà Nội'),
('BS. Đỗ Đức Thắng', 'ĐỗĐứcthắng@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nội tổng quát', '../../../assets/images/Doctors/avatar-6.jpg', '0958896073', '3 Nguyễn Trãi, Hải Phòng'),
('BS. Trần Hải Thắng', 'trầnhảithắng@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Tim mạch', '../../../assets/images/Doctors/avatar-7.jpg', '0978843019', '930 Lê Lợi, Cần Thơ'),
('BS. Phan Hữu Hùng', 'phanhữuhùng@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Hô hấp', '../../../assets/images/Doctors/avatar-8.jpg', '0962034283', '93 Lê Lợi, Huế'),
('BS. Đặng Xuân Cường', 'Đặngxuâncường@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Da liễu', '../../../assets/images/Doctors/avatar-9.jpg', '0950500674', '366 Cách Mạng Tháng 8, Biên Hòa'),
('BS. Hoàng Thị Thắng', 'hoàngthịthắng@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Thần kinh', '../../../assets/images/Doctors/avatar-10.jpg', '0947332062', '565 Trường Chinh, TP.HCM'),
('BS. Hoàng Hải Bình', 'hoànghảibình@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nội tổng quát', '../../../assets/images/Doctors/avatar-11.jpg', '0932556451', '473 Cách Mạng Tháng 8, TP.HCM'),
('BS. Lê Xuân Hà', 'lêxuânhà@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Da liễu', '../../../assets/images/Doctors/avatar-12.jpg', '0939911393', '375 Nguyễn Trãi, Hải Phòng'),
('BS. Đặng Đức Linh', 'ĐặngĐứclinh@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Da liễu', '../../../assets/images/Doctors/avatar-13.jpg', '0974941086', '573 Trường Chinh, Cần Thơ'),
('BS. Phan Minh Phong', 'phanminhphong@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Sản', '../../../assets/images/Doctors/avatar-14.jpg', '0923524192', '700 Điện Biên Phủ, Hải Phòng'),
('BS. Hoàng Văn Cường', 'hoàngvăncường@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Thần kinh', '../../../assets/images/Doctors/avatar-15.jpg', '0930252196', '292 Nguyễn Trãi, TP.HCM'),
('BS. Nguyễn Thị Cường', 'nguyễnthịcường@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Thần kinh', '../../../assets/images/Doctors/avatar-16.jpg', '0926551120', '404 Cách Mạng Tháng 8, Huế'),
('BS. Vũ Thanh Hùng', 'vũthanhhùng@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Sản', '../../../assets/images/Doctors/avatar-17.jpg', '0922384812', '554 Hai Bà Trưng, Đà Nẵng'),
('BS. Đặng Quốc Trang', 'Đặngquốctrang@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Tim mạch', '../../../assets/images/Doctors/avatar-18.jpg', '0957550256', '818 Trường Chinh, Đà Nẵng'),
('BS. Đỗ Quốc Hà', 'Đỗquốchà@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nhi', '../../../assets/images/Doctors/avatar-19.jpg', '0997149391', '540 Lê Lợi, Biên Hòa'),
('BS. Vũ Hải Giang', 'vũhảigiang@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Hô hấp', '../../../assets/images/Doctors/avatar-20.jpg', '0984137732', '59 Điện Biên Phủ, Huế'),
('BS. Vũ Hải Cường', 'vũhảicường@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nhi', '../../../assets/images/Doctors/avatar-21.jpg', '0955937825', '556 Nguyễn Trãi, Huế'),
('BS. Phạm Thanh Cường', 'phạmthanhcường@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Sản', '../../../assets/images/Doctors/avatar-22.jpg', '0990664347', '916 Cách Mạng Tháng 8, TP.HCM'),
('BS. Phạm Văn Cường', 'phạmvăncường@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Thần kinh', '../../../assets/images/Doctors/avatar-23.jpg', '0942095468', '499 Cách Mạng Tháng 8, Cần Thơ'),
('BS. Đỗ Văn Bình', 'Đỗvănbình@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Hô hấp', '../../../assets/images/Doctors/avatar-24.jpg', '0931577379', '311 Cách Mạng Tháng 8, Đà Nẵng'),
('BS. Nguyễn Quốc Thảo', 'nguyễnquốcthảo@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nhi', '../../../assets/images/Doctors/avatar-25.jpg', '0986099603', '507 Nguyễn Trãi, Cần Thơ'),
('BS. Trần Thị Cường', 'trầnthịcường@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nội tổng quát', '../../../assets/images/Doctors/avatar-26.jpg', '0930766115', '218 Phan Đình Phùng, Huế'),
('BS. Đỗ Thanh Cường', 'Đỗthanhcường@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Sản', '../../../assets/images/Doctors/avatar-27.jpg', '0956901666', '253 Trường Chinh, Đà Nẵng'),
('BS. Hoàng Hữu Bình', 'hoànghữubình@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nội tổng quát', '../../../assets/images/Doctors/avatar-28.jpg', '0935021655', '821 Phan Đình Phùng, Đà Nẵng'),
('BS. Đỗ Hải Linh', 'Đỗhảilinh@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nhi', '../../../assets/images/Doctors/avatar-29.jpg', '0959736310', '112 Trường Chinh, TP.HCM'),
('BS. Lê Minh An', 'lêminhan@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Thần kinh', '../../../assets/images/Doctors/avatar-30.jpg', '0986785081', '181 Hai Bà Trưng, Hà Nội'),
('BS. Lê Quốc Thắng', 'lêquốcthắng@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Sản', '../../../assets/images/Doctors/avatar-31.jpg', '0950606566', '319 Nguyễn Trãi, Đà Nẵng'),
('BS. Phan Hải Bình', 'phanhảibình@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Sản', '../../../assets/images/Doctors/avatar-32.jpg', '0922230142', '594 Điện Biên Phủ, Biên Hòa'),
('BS. Nguyễn Đức Thắng', 'nguyễnĐứcthắng@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nội tổng quát', '../../../assets/images/Doctors/avatar-33.jpg', '0971647700', '289 Nguyễn Trãi, Cần Thơ'),
('BS. Hoàng Hải Linh', 'hoànghảilinh@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nhi', '../../../assets/images/Doctors/avatar-34.jpg', '0998344922', '178 Cách Mạng Tháng 8, Hải Phòng'),
('BS. Phạm Đức Bình', 'phạmĐứcbình@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nội tổng quát', '../../../assets/images/Doctors/avatar-35.jpg', '0965507966', '677 Lê Lợi, Biên Hòa'),
('BS. Trần Hải Thắng', 'trầnhảithắng@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Thần kinh', '../../../assets/images/Doctors/avatar-36.jpg', '0987727394', '362 Hai Bà Trưng, TP.HCM'),
('BS. Trần Hữu Thảo', 'trầnhữuthảo@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nội tổng quát', '../../../assets/images/Doctors/avatar-37.jpg', '0969679265', '299 Hai Bà Trưng, Cần Thơ'),
('BS. Nguyễn Thị Dũng', 'nguyễnthịdũng@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Da liễu', '../../../assets/images/Doctors/avatar-38.jpg', '0982882751', '812 Lê Lợi, Huế'),
('BS. Phan Văn Bình', 'phanvănbình@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Hô hấp', '../../../assets/images/Doctors/avatar-39.jpg', '0934723153', '640 Phan Đình Phùng, Hà Nội'),
('BS. Đặng Minh Linh', 'Đặngminhlinh@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Sản', '../../../assets/images/Doctors/avatar-40.jpg', '0915107439', '764 Cách Mạng Tháng 8, Hà Nội'),
('BS. Vũ Xuân Cường', 'vũxuâncường@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Thần kinh', '../../../assets/images/Doctors/avatar-41.jpg', '0962862746', '171 Phan Đình Phùng, Huế'),
('BS. Phan Thanh An', 'phanthanhan@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Tim mạch', '../../../assets/images/Doctors/avatar-42.jpg', '0967036430', '328 Nguyễn Trãi, Huế'),
('BS. Hoàng Quốc Giang', 'hoàngquốcgiang@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nhi', '../../../assets/images/Doctors/avatar-43.jpg', '0944002214', '680 Nguyễn Trãi, Hà Nội'),
('BS. Nguyễn Đức Thắng', 'nguyễnĐứcthắng@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nhi', '../../../assets/images/Doctors/avatar-44.jpg', '0977223656', '875 Cách Mạng Tháng 8, TP.HCM'),
('BS. Đỗ Hải Cường', 'Đỗhảicường@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Da liễu', '../../../assets/images/Doctors/avatar-45.jpg', '0916323734', '48 Trường Chinh, Đà Nẵng'),
('BS. Bùi Quốc Bình', 'bùiquốcbình@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Da liễu', '../../../assets/images/Doctors/avatar-46.jpg', '0912272522', '500 Hai Bà Trưng, Hà Nội'),
('BS. Hoàng Ngọc Linh', 'hoàngngọclinh@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nhi', '../../../assets/images/Doctors/avatar-47.jpg', '0932322442', '668 Cách Mạng Tháng 8, Biên Hòa'),
('BS. Lê Thị An', 'lêthịan@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Nội tổng quát', '../../../assets/images/Doctors/avatar-48.jpg', '0927381874', '664 Cách Mạng Tháng 8, Đà Nẵng'),
('BS. Lê Hải Linh', 'lêhảilinh@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Hô hấp', '../../../assets/images/Doctors/avatar-49.jpg', '0919865129', '950 Điện Biên Phủ, Đà Nẵng'),
('BS. Nguyễn Hải Giang', 'nguyễnhảigiang@doctorhub.com', '$2y$10$lXQbw.rj9srBWuwADbJz4.FzLx6.X1CCUl5c6OsXqaNLz832PxB.6', 'Khoa Hô hấp', '../../../assets/images/Doctors/avatar-50.jpg', '0976598877', '1 Trường Chinh, Đà Nẵng');



ALTER TABLE doctors
ADD education TEXT,
ADD qualification VARCHAR(255),
ADD experience TEXT;

UPDATE doctors SET
    education = 'Cử nhân Y khoa, Đại học Y Hà Nội (2005-2011)',
    qualification = 'Thạc sĩ Da liễu',
    experience = '10 năm kinh nghiệm tại Bệnh viện Da liễu Trung ương'
WHERE id = 1;

UPDATE doctors SET
    education = 'Cử nhân Y khoa, Đại học Y Dược TP.HCM (2006-2012)',
    qualification = 'Bác sĩ Chuyên khoa I Nội tổng quát',
    experience = '8 năm kinh nghiệm tại Bệnh viện Chợ Rẫy'
WHERE id = 2;

UPDATE doctors SET
    education = 'Cử nhân Y khoa, Đại học Y Dược Huế (2004-2010)',
    qualification = 'Bác sĩ Chuyên khoa II Nội tổng quát',
    experience = '12 năm kinh nghiệm tại Bệnh viện Trung ương Huế'
WHERE id = 3;

UPDATE doctors SET
    education = 'Cử nhân Y khoa, Đại học Y Dược Cần Thơ (2003-2009)',
    qualification = 'Thạc sĩ Nội khoa',
    experience = '15 năm kinh nghiệm tại Bệnh viện Đa khoa Cần Thơ'
WHERE id = 4;

UPDATE doctors SETappointments
    education = 'Cử nhân Y khoa, Đại học Y Hà Nội (2007-2013)',
    qualification = 'Bác sĩ Chuyên khoa I Nội tổng quát',
    experience = '7 năm kinh nghiệm tại Bệnh viện Bạch Mai'
WHERE id = 5;

CREATE TABLE IF NOT EXISTS prescriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    appointment_id INT,
    patient_id INT,
    doctor_id INT,
    medication_details TEXT,
    instructions TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (appointment_id) REFERENCES appointments(id),
    FOREIGN KEY (patient_id) REFERENCES patients(id),
    FOREIGN KEY (doctor_id) REFERENCES users(id)
);

INSERT INTO patients (id, name, email, phone, address) VALUES
(1, 'vinh', 'vinhnam04012004@gmail.com', '0352032375', 'TP.HCM, Quận 1, TP. Hồ Chí Minh'),
(2, 'Hoang An Tesst', 'vinhnam04012004@gmail.com', '0352032375', 'TP.HCM, Ba Đình, Hà Nội'),
(3, 'Demo Email', 'vinhnam04012004@gmail.com', '0352032375', 'TP.HCM, Đức Trọng, Đà Lạt');



-- Bảng thuốc
CREATE TABLE IF NOT EXISTS medications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    dosage VARCHAR(100),
    unit VARCHAR(50),
    price DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Thêm dữ liệu mẫu cho bảng thuốc
INSERT INTO medications (name, description, dosage, unit, price, stock) VALUES
('Paracetamol', 'Giảm đau, hạ sốt', '500mg', 'Viên', 5000, 1000),
('Amoxicillin', 'Kháng sinh', '500mg', 'Viên', 8000, 800),
('Omeprazole', 'Giảm acid dạ dày', '20mg', 'Viên', 6000, 500),
('Loratadine', 'Thuốc kháng histamine', '10mg', 'Viên', 7000, 700),
('Vitamin C', 'Bổ sung vitamin C', '1000mg', 'Viên', 3000, 1500),
('Aspirin', 'Giảm đau, chống viêm', '81mg', 'Viên', 4000, 900),
('Ibuprofen', 'Giảm đau, chống viêm', '400mg', 'Viên', 5500, 850),
('Lisinopril', 'Điều trị cao huyết áp', '10mg', 'Viên', 9000, 400),
('Simvastatin', 'Giảm cholesterol', '20mg', 'Viên', 10000, 350),
('Metformin', 'Điều trị tiểu đường', '500mg', 'Viên', 8500, 600);

-- Bảng đơn thuốc
CREATE TABLE IF NOT EXISTS prescriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    appointment_id INT NOT NULL,
    doctor_id INT NOT NULL,
    patient_name VARCHAR(100) NOT NULL,
    diagnosis TEXT,
    instructions TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('draft', 'finalized', 'dispensed', 'paid') DEFAULT 'draft',
    total_amount DECIMAL(10,2) DEFAULT 0,
    FOREIGN KEY (appointment_id) REFERENCES appointments(id),
    FOREIGN KEY (doctor_id) REFERENCES users(id)
);

-- Bảng chi tiết đơn thuốc
CREATE TABLE IF NOT EXISTS prescription_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prescription_id INT NOT NULL,
    medication_id INT NOT NULL,
    quantity INT NOT NULL,
    instructions TEXT,
    days INT DEFAULT 0,
    times_per_day INT DEFAULT 0,
    subtotal DECIMAL(10,2),
    FOREIGN KEY (prescription_id) REFERENCES prescriptions(id),
    FOREIGN KEY (medication_id) REFERENCES medications(id)
);


-- Create medical_records table
CREATE TABLE IF NOT EXISTS medical_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL,
    appointment_id INT,
    visit_date DATE NOT NULL,
    diagnosis TEXT NOT NULL,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patients(id),
    FOREIGN KEY (doctor_id) REFERENCES users(id),
    FOREIGN KEY (appointment_id) REFERENCES appointments(id)
);

-- Insert additional appointments to support prescriptions
INSERT INTO appointments (user_id, service_id, doctor_user_id, patient_name, appointment_date, status, note) VALUES
(8, 1, 4, 'Bùi Văn H', '2025-05-01 08:00:00', 'confirmed', 'Kiểm tra sức khỏe định kỳ'),
(9, 2, 4, 'Ngô Thị I', '2025-05-02 09:30:00', 'completed', 'Đau ngực'),
(10, 3, 4, 'Lý Văn K', '2025-05-03 10:00:00', 'confirmed', 'Ho kéo dài'),
(11, 4, 4, 'Nguyễn Thị Lan', '2025-05-04 11:00:00', 'completed', 'Đau khớp'),
(12, 1, 4, 'Trần Văn Minh', '2025-05-05 13:00:00', 'confirmed', 'Kiểm tra tổng quát'),
(13, 2, 4, 'Lê Thị Ngọc', '2025-05-06 14:30:00', 'completed', 'Tăng huyết áp'),
(14, 3, 4, 'Phạm Văn Oanh', '2025-05-07 15:00:00', 'confirmed', 'Viêm họng'),
(15, 4, 4, 'Hoàng Văn Phúc', '2025-05-08 08:30:00', 'completed', 'Đau lưng'),
(16, 1, 4, 'Vũ Thị Quyên', '2025-05-09 09:00:00', 'confirmed', 'Kiểm tra sức khỏe'),
(17, 2, 4, 'Đặng Văn R', '2025-05-10 10:30:00', 'completed', 'Đau bụng'),
(18, 3, 4, 'Bùi Thị S', '2025-05-11 11:30:00', 'confirmed', 'Ho mãn tính'),
(19, 4, 4, 'Ngô Văn T', '2025-05-12 13:30:00', 'completed', 'Đau vai'),
(20, 1, 4, 'Lý Thị U', '2025-05-13 14:00:00', 'confirmed', 'Kiểm tra tổng quát'),
(21, 2, 4, 'Nguyễn Văn V', '2025-05-14 15:30:00', 'completed', 'Tăng huyết áp'),
(22, 3, 4, 'Trần Thị X', '2025-05-15 08:00:00', 'confirmed', 'Viêm họng'),
(23, 4, 4, 'Lê Văn Y', '2025-05-16 09:30:00', 'completed', 'Đau khớp'),
(24, 1, 4, 'Phạm Thị Z', '2025-05-17 10:00:00', 'confirmed', 'Kiểm tra sức khỏe'),
(25, 2, 4, 'Hoàng Văn A1', '2025-05-18 11:00:00', 'completed', 'Đau ngực'),
(26, 3, 4, 'Vũ Thị B1', '2025-05-19 13:00:00', 'confirmed', 'Ho kéo dài'),
(27, 4, 4, 'Đặng Văn C1', '2025-05-20 14:30:00', 'completed', 'Đau lưng'),
(28, 1, 4, 'Bùi Thị D1', '2025-05-21 15:00:00', 'confirmed', 'Kiểm tra tổng quát'),
(29, 2, 4, 'Ngô Văn E1', '2025-05-22 08:30:00', 'completed', 'Tăng huyết áp'),
(30, 3, 4, 'Lý Thị F1', '2025-05-23 09:00:00', 'confirmed', 'Viêm họng'),
(31, 4, 4, 'Nguyễn Văn G1', '2025-05-24 10:30:00', 'completed', 'Đau vai'),
(32, 1, 4, 'Trần Thị H1', '2025-05-25 11:30:00', 'confirmed', 'Kiểm tra sức khỏe'),
(33, 2, 4, 'Lê Văn I1', '2025-05-26 13:30:00', 'completed', 'Đau bụng'),
(34, 3, 4, 'Phạm Thị K1', '2025-05-27 14:00:00', 'confirmed', 'Ho mãn tính'),
(35, 4, 4, 'Hoàng Văn L1', '2025-05-28 15:30:00', 'completed', 'Đau khớp'),
(36, 1, 4, 'Vũ Thị M1', '2025-05-29 08:00:00', 'confirmed', 'Kiểm tra tổng quát'),
(37, 2, 4, 'Đặng Văn N1', '2025-05-30 09:30:00', 'completed', 'Tăng huyết áp'),
(38, 3, 4, 'Bùi Thị O1', '2025-05-31 10:00:00', 'confirmed', 'Viêm họng'),
(39, 4, 4, 'Ngô Văn P1', '2025-06-01 11:00:00', 'completed', 'Đau lưng'),
(40, 1, 4, 'Lý Thị Q1', '2025-06-02 13:00:00', 'confirmed', 'Kiểm tra sức khỏe'),
(41, 2, 4, 'Nguyễn Văn R1', '2025-06-03 14:30:00', 'completed', 'Đau ngực'),
(42, 3, 4, 'Trần Thị S1', '2025-06-04 15:00:00', 'confirmed', 'Ho kéo dài'),
(43, 4, 4, 'Lê Văn T1', '2025-06-05 08:30:00', 'completed', 'Đau vai'),
(44, 1, 4, 'Phạm Thị U1', '2025-06-06 09:00:00', 'confirmed', 'Kiểm tra tổng quát'),
(45, 2, 4, 'Hoàng Văn V1', '2025-06-07 10:30:00', 'completed', 'Tăng huyết áp'),
(46, 3, 4, 'Vũ Thị X1', '2025-06-08 11:30:00', 'confirmed', 'Viêm họng'),
(47, 4, 4, 'Đặng Văn Y1', '2025-06-09 13:30:00', 'completed', 'Đau khớp'),
(48, 1, 4, 'Bùi Thị Z1', '2025-06-10 14:00:00', 'confirmed', 'Kiểm tra sức khỏe'),
(49, 2, 4, 'Ngô Văn A2', '2025-06-11 15:30:00', 'completed', 'Đau bụng'),
(50, 3, 4, 'Lý Thị B2', '2025-06-12 08:00:00', 'confirmed', 'Ho mãn tính');

-- Insert test data for prescriptions
INSERT INTO prescriptions (appointment_id, doctor_id, patient_name, diagnosis, instructions, status, total_amount) VALUES

(8, 4, 'Lê Thị Ngọc', 'Tăng huyết áp', 'Giảm muối, tập thể dục', 'finalized', 27000),
(9, 4, 'Phạm Văn Oanh', 'Viêm họng', 'Uống nhiều nước, nghỉ ngơi', 'finalized', 16000),
(10, 4, 'Hoàng Văn Phúc', 'Đau lưng', 'Tập yoga, tránh nâng nặng', 'finalized', 11000),
(11, 4, 'Vũ Thị Quyên', 'Sức khỏe bình thường', 'Duy trì lối sống lành mạnh', 'draft', 0),
(12, 4, 'Đặng Văn R', 'Đau dạ dày', 'Ăn nhẹ, tránh đồ chua', 'finalized', 18000),
(13, 4, 'Bùi Thị S', 'Ho mãn tính', 'Dùng máy tạo ẩm, tránh khói', 'finalized', 21000),
(14, 4, 'Ngô Văn T', 'Đau vai gáy', 'Massage, tập vật lý trị liệu', 'finalized', 9000),
(15, 4, 'Lý Thị U', 'Sức khỏe ổn định', 'Tiếp tục kiểm tra định kỳ', 'draft', 0),
(16, 4, 'Nguyễn Văn V', 'Tăng huyết áp', 'Theo dõi huyết áp hàng ngày', 'finalized', 27000),
(17, 4, 'Trần Thị X', 'Viêm họng', 'Súc miệng nước muối, nghỉ ngơi', 'finalized', 16000),
(18, 4, 'Lê Văn Y', 'Viêm khớp', 'Giữ ấm, tập thể dục nhẹ', 'finalized', 18000),
(19, 4, 'Phạm Thị Z', 'Sức khỏe bình thường', 'Duy trì chế độ ăn uống', 'draft', 0),
(20, 4, 'Hoàng Văn A1', 'Đau ngực', 'Nghỉ ngơi, theo dõi tim mạch', 'finalized', 24000),
(21, 4, 'Vũ Thị B1', 'Ho kéo dài', 'Uống nước ấm, tránh lạnh', 'finalized', 14000),
(22, 4, 'Đặng Văn C1', 'Đau lưng', 'Tập yoga, tránh ngồi lâu', 'finalized', 11000),
(23, 4, 'Bùi Thị D1', 'Sức khỏe ổn định', 'Tiếp tục theo dõi', 'draft', 0),
(24, 4, 'Ngô Văn E1', 'Tăng huyết áp', 'Giảm muối, tập thể dục', 'finalized', 27000),
(25, 4, 'Lý Thị F1', 'Viêm họng', 'Uống nhiều nước, nghỉ ngơi', 'finalized', 16000),
(26, 4, 'Nguyễn Văn G1', 'Đau vai', 'Massage, tập vật lý trị liệu', 'finalized', 9000),
(27, 4, 'Trần Thị H1', 'Sức khỏe bình thường', 'Duy trì lối sống lành mạnh', 'draft', 0),
(28, 4, 'Lê Văn I1', 'Đau dạ dày', 'Ăn nhẹ, tránh đồ chua', 'finalized', 18000),
(29, 4, 'Phạm Thị K1', 'Ho mãn tính', 'Dùng máy tạo ẩm, tránh khói', 'finalized', 21000),
(30, 4, 'Hoàng Văn L1', 'Viêm khớp', 'Tập vật lý trị liệu, giữ ấm', 'finalized', 18000),
(31, 4, 'Vũ Thị M1', 'Sức khỏe ổn định', 'Tiếp tục kiểm tra định kỳ', 'draft', 0),
(32, 4, 'Đặng Văn N1', 'Tăng huyết áp', 'Theo dõi huyết áp hàng ngày', 'finalized', 27000),
(33, 4, 'Bùi Thị O1', 'Viêm họng', 'Súc miệng nước muối, nghỉ ngơi', 'finalized', 16000),
(34, 4, 'Ngô Văn P1', 'Đau lưng', 'Tập yoga, tránh nâng nặng', 'finalized', 11000),
(35, 4, 'Lý Thị Q1', 'Sức khỏe bình thường', 'Duy trì chế độ ăn uống', 'draft', 0),
(36, 4, 'Nguyễn Văn R1', 'Đau ngực', 'Nghỉ ngơi, theo dõi tim mạch', 'finalized', 24000),
(37, 4, 'Trần Thị S1', 'Ho kéo dài', 'Uống nước ấm, tránh lạnh', 'finalized', 14000),
(38, 4, 'Lê Văn T1', 'Đau vai', 'Massage, tập vật lý trị liệu', 'finalized', 9000),
(39, 4, 'Phạm Thị U1', 'Sức khỏe ổn định', 'Tiếp tục theo dõi', 'draft', 0),
(40, 4, 'Hoàng Văn V1', 'Tăng huyết áp', 'Giảm muối, tập thể dục', 'finalized', 27000),
(41, 4, 'Vũ Thị X1', 'Viêm họng', 'Uống nhiều nước, nghỉ ngơi', 'finalized', 16000),
(42, 4, 'Đặng Văn Y1', 'Viêm khớp', 'Giữ ấm, tập thể dục nhẹ', 'finalized', 18000),
(43, 4, 'Bùi Thị Z1', 'Sức khỏe bình thường', 'Duy trì lối sống lành mạnh', 'draft', 0),
(44, 4, 'Ngô Văn A2', 'Đau dạ dày', 'Ăn nhẹ, tránh đồ chua', 'finalized', 18000),
(45, 4, 'Lý Thị B2', 'Ho mãn tính', 'Dùng máy tạo ẩm, tránh khói', 'finalized', 21000),
(46, 4, 'Bùi Văn H', 'Cảm cúm thông thường', 'Nghỉ ngơi, uống nhiều nước', 'finalized', 15000),
(47, 4, 'Ngô Thị I', 'Viêm họng cấp', 'Tránh đồ lạnh, súc miệng nước muối', 'finalized', 24000),
(48, 4, 'Lý Văn K', 'Ho mãn tính', 'Tránh khói bụi, uống nước ấm', 'finalized', 14000),
(49, 4, 'Nguyễn Thị Lan', 'Viêm khớp', 'Tập vật lý trị liệu, giữ ấm', 'finalized', 18000),
(50, 4, 'Trần Văn Minh', 'Sức khỏe ổn định', 'Tiếp tục theo dõi định kỳ', 'draft', 0);

-- Insert test data for prescription_items
INSERT INTO prescription_items (prescription_id, medication_id, quantity, instructions, days, times_per_day, subtotal) VALUES
(1, 1, 10, 'Uống 1 viên sau ăn', 5, 2, 5000),
(1, 5, 10, 'Uống 1 viên buổi sáng', 10, 1, 3000),
(2, 2, 15, 'Uống 1 viên mỗi 8 giờ', 5, 3, 12000),
(3, 4, 10, 'Uống 1 viên buổi tối', 10, 1, 7000),
(4, 7, 10, 'Uống 1 viên sau ăn', 5, 2, 5500),
(5, 1, 10, 'Uống 1 viên khi cần', 5, 2, 5000),
(6, 8, 10, 'Uống 1 viên buổi sáng', 10, 1, 9000),
(7, 2, 15, 'Uống 1 viên mỗi 8 giờ', 5, 3, 12000),
(8, 1, 10, 'Uống 1 viên sau ăn', 5, 2, 5000),
(9, 5, 10, 'Uống 1 viên buổi sáng', 10, 1, 3000),
(10, 3, 10, 'Uống 1 viên trước ăn', 10, 1, 6000),
(11, 4, 10, 'Uống 1 viên buổi tối', 10, 1, 7000),
(12, 7, 10, 'Uống 1 viên sau ăn', 5, 2, 5500),
(13, 8, 10, 'Uống 1 viên buổi sáng', 10, 1, 9000),
(14, 1, 10, 'Uống 1 viên khi cần', 5, 2, 5000),
(15, 2, 15, 'Uống 1 viên mỗi 8 giờ', 5, 3, 12000),
(16, 4, 10, 'Uống 1 viên buổi tối', 10, 1, 7000),
(17, 7, 10, 'Uống 1 viên sau ăn', 5, 2, 5500),
(18, 1, 10, 'Uống 1 viên sau ăn', 5, 2, 5000),
(19, 5, 10, 'Uống 1 viên buổi sáng', 10, 1, 3000),
(20, 3, 10, 'Uống 1 viên trước ăn', 10, 1, 6000),
(21, 4, 10, 'Uống 1 viên buổi tối', 10, 1, 7000),
(22, 7, 10, 'Uống 1 viên sau ăn', 5, 2, 5500),
(23, 8, 10, 'Uống 1 viên buổi sáng', 10, 1, 9000),
(24, 1, 10, 'Uống 1 viên khi cần', 5, 2, 5000),
(25, 2, 15, 'Uống 1 viên mỗi 8 giờ', 5, 3, 12000),
(26, 4, 10, 'Uống 1 viên buổi tối', 10, 1, 7000),
(27, 7, 10, 'Uống 1 viên sau ăn', 5, 2, 5500),
(28, 1, 10, 'Uống 1 viên sau ăn', 5, 2, 5000),
(29, 5, 10, 'Uống 1 viên buổi sáng', 10, 1, 3000),
(30, 3, 10, 'Uống 1 viên trước ăn', 10, 1, 6000),
(31, 4, 10, 'Uống 1 viên buổi tối', 10, 1, 7000),
(32, 7, 10, 'Uống 1 viên sau ăn', 5, 2, 5500),
(33, 8, 10, 'Uống 1 viên buổi sáng', 10, 1, 9000),
(34, 1, 10, 'Uống 1 viên khi cần', 5, 2, 5000),
(35, 2, 15, 'Uống 1 viên mỗi 8 giờ', 5, 3, 12000),
(36, 4, 10, 'Uống 1 viên buổi tối', 10, 1, 7000),
(37, 7, 10, 'Uống 1 viên sau ăn', 5, 2, 5500),
(38, 1, 10, 'Uống 1 viên sau ăn', 5, 2, 5000),
(39, 5, 10, 'Uống 1 viên buổi sáng', 10, 1, 3000),
(40, 3, 10, 'Uống 1 viên trước ăn', 10, 1, 6000),
(41, 4, 10, 'Uống 1 viên buổi tối', 10, 1, 7000),
(42, 7, 10, 'Uống 1 viên sau ăn', 5, 2, 5500),
(43, 8, 10, 'Uống 1 viên buổi sáng', 10, 1, 9000),
(44, 1, 10, 'Uống 1 viên khi cần', 5, 2, 5000),
(45, 2, 15, 'Uống 1 viên mỗi 8 giờ', 5, 3, 12000),
(46, 4, 10, 'Uống 1 viên buổi tối', 10, 1, 7000),
(47, 7, 10, 'Uống 1 viên sau ăn', 5, 2, 5500),
(48, 1, 10, 'Uống 1 viên sau ăn', 5, 2, 5000),
(49, 5, 10, 'Uống 1 viên buổi sáng', 10, 1, 3000),
(50, 3, 10, 'Uống 1 viên trước ăn', 10, 1, 6000);

-- Insert test data for medical_records
INSERT INTO medical_records (patient_id, doctor_id, appointment_id, visit_date, diagnosis, notes) VALUES
(8, 4, 3, '2025-05-01', 'Cảm cúm thông thường', 'Bệnh nhân cần nghỉ ngơi, uống nhiều nước'),
(9, 4, 4, '2025-05-02', 'Viêm họng cấp', 'Súc miệng nước muối, tránh đồ lạnh'),
(10, 4, 5, '2025-05-03', 'Ho mãn tính', 'Tránh khói bụi, dùng máy tạo ẩm'),
(11, 4, 6, '2025-05-04', 'Viêm khớp', 'Tập vật lý trị liệu, giữ ấm khớp'),
(12, 4, 7, '2025-05-05', 'Sức khỏe ổn định', 'Tiếp tục theo dõi định kỳ'),
(13, 4, 8, '2025-05-06', 'Tăng huyết áp', 'Giảm muối, tập thể dục nhẹ'),
(14, 4, 9, '2025-05-07', 'Viêm họng', 'Nghỉ ngơi, uống nhiều nước'),
(15, 4, 10, '2025-05-08', 'Đau lưng', 'Tập yoga, tránh nâng vật nặng'),
(16, 4, 11, '2025-05-09', 'Sức khỏe bình thường', 'Duy trì lối sống lành mạnh'),
(17, 4, 12, '2025-05-10', 'Đau dạ dày', 'Ăn nhẹ, tránh thực phẩm chua'),
(18, 4, 13, '2025-05-11', 'Ho mãn tính', 'Dùng máy tạo ẩm, tránh khói'),
(19, 4, 14, '2025-05-12', 'Đau vai gáy', 'Massage, tập vật lý trị liệu'),
(20, 4, 15, '2025-05-13', 'Sức khỏe ổn định', 'Tiếp tục kiểm tra định kỳ'),
(21, 4, 16, '2025-05-14', 'Tăng huyết áp', 'Theo dõi huyết áp hàng ngày'),
(22, 4, 17, '2025-05-15', 'Viêm họng', 'Súc miệng nước muối, nghỉ ngơi'),
(23, 4, 18, '2025-05-16', 'Viêm khớp', 'Giữ ấm, tập thể dục nhẹ'),
(24, 4, 19, '2025-05-17', 'Sức khỏe bình thường', 'Duy trì chế độ ăn uống'),
(25, 4, 20, '2025-05-18', 'Đau ngực', 'Nghỉ ngơi, theo dõi tim mạch'),
(26, 4, 21, '2025-05-19', 'Ho kéo dài', 'Uống nước ấm, tránh lạnh'),
(27, 4, 22, '2025-05-20', 'Đau lưng', 'Tập yoga, tránh ngồi lâu'),
(28, 4, 23, '2025-05-21', 'Sức khỏe ổn định', 'Tiếp tục theo dõi'),
(29, 4, 24, '2025-05-22', 'Tăng huyết áp', 'Giảm muối, tập thể dục'),
(30, 4, 25, '2025-05-23', 'Viêm họng', 'Uống nhiều nước, nghỉ ngơi'),
(31, 4, 26, '2025-05-24', 'Đau vai', 'Massage, tập vật lý trị liệu'),
(32, 4, 27, '2025-05-25', 'Sức khỏe bình thường', 'Duy trì lối sống lành mạnh'),
(33, 4, 28, '2025-05-26', 'Đau dạ dày', 'Ăn nhẹ, tránh đồ chua'),
(34, 4, 29, '2025-05-27', 'Ho mãn tính', 'Dùng máy tạo ẩm, tránh khói'),
(35, 4, 30, '2025-05-28', 'Viêm khớp', 'Tập vật lý trị liệu, giữ ấm'),
(36, 4, 31, '2025-05-29', 'Sức khỏe ổn định', 'Tiếp tục kiểm tra định kỳ'),
(37, 4, 32, '2025-05-30', 'Tăng huyết áp', 'Theo dõi huyết áp hàng ngày'),
(38, 4, 33, '2025-05-31', 'Viêm họng', 'Súc miệng nước muối, nghỉ ngơi'),
(39, 4, 34, '2025-06-01', 'Đau lưng', 'Tập yoga, tránh nâng nặng'),
(40, 4, 35, '2025-06-02', 'Sức khỏe bình thường', 'Duy trì chế độ ăn uống'),
(41, 4, 36, '2025-06-03', 'Đau ngực', 'Nghỉ ngơi, theo dõi tim mạch'),
(42, 4, 37, '2025-06-04', 'Ho kéo dài', 'Uống nước ấm, tránh lạnh'),
(43, 4, 38, '2025-06-05', 'Đau vai', 'Massage, tập vật lý trị liệu'),
(44, 4, 39, '2025-06-06', 'Sức khỏe ổn định', 'Tiếp tục theo dõi'),
(45, 4, 40, '2025-06-07', 'Tăng huyết áp', 'Giảm muối, tập thể dục'),
(46, 4, 41, '2025-06-08', 'Viêm họng', 'Uống nhiều nước, nghỉ ngơi'),
(47, 4, 42, '2025-06-09', 'Viêm khớp', 'Giữ ấm, tập thể dục nhẹ'),
(48, 4, 43, '2025-06-10', 'Sức khỏe bình thường', 'Duy trì lối sống lành mạnh'),
(49, 4, 44, '2025-06-11', 'Đau dạ dày', 'Ăn nhẹ, tránh đồ chua'),
(50, 4, 45, '2025-06-12', 'Ho mãn tính', 'Dùng máy tạo ẩm, tránh khói');

