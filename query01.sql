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
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO doctors (name, email, password, specialty, avatar, phone, address) VALUES
('BS. Hoàng Hồng Mạnh', 'hoanghongmanh@doctorhub.com', 'hashed_password', 'Khoa da liễu', '../../../assets/images/Doctors/032958-bac-si-da-lieu-hoang-hong-manh.jpg', '0123456789', '123 Đường Láng, Hà Nội'),
('BS. Hoài Thu', 'hoaithu@doctorhub.com', 'hashed_password', 'Khoa Nội tổng quát', '../../../assets/images/Doctors/045850-bac-si-da-lieu-hoai-thu.jpg', '0987654321', '456 Nguyễn Trãi, TP.HCM'),
('BS. Huỳnh Quốc Hiêu', 'huynhquochieu@doctorhub.com', 'hashed_password', 'Khoa Nội tổng quát', '../../../assets/images/Doctors/avatar-Huynh-Quoc-Hieu.jpg', '0912345678', '789 Lê Lợi, Đà Nẵng'),
('BS. Chu Trọng Hiệp', 'chutronghiep@doctorhub.com', 'hashed_password', 'Khoa Nội tổng quát', '../../../assets/images/Doctors/avatar-TS.BS_.Chu-Trong-Hiep.webp', '0932145678', '101 Trần Phú, Huế'),
('BS. Lê Hoài Thương', 'lehoaithuong@doctorhub.com', 'hashed_password', 'Khoa Nội tổng quát', '../../../assets/images/Doctors/1536566238-bacsy.jpg', '0941234567', '321 Phạm Văn Đồng, Cần Thơ');

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

