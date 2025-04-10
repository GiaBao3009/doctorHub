-- Tạo database
CREATE DATABASE IF NOT EXISTS doctorhub CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE doctorhub;

-- Bảng người dùng
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Dữ liệu mẫu cho users
INSERT INTO users (name, email, password, role) VALUES
('Nguyễn Văn A', 'a@gmail.com', '123456', 'user'),
('Trần Thị B', 'b@gmail.com', '123456', 'user'),
('Admin', 'admin@doctorhub.com', 'admin123', 'admin');

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
('Khám tai mũi họng', 'Khám và điều trị các bệnh tai mũi họng', 300000);

-- Bảng đặt lịch khám
CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    service_id INT,
    appointment_date DATETIME,
    status ENUM('pending', 'confirmed', 'completed', 'canceled') DEFAULT 'pending',
    note TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (service_id) REFERENCES services(id)
);

-- Dữ liệu mẫu cho appointments
INSERT INTO appointments (user_id, service_id, appointment_date, status, note) VALUES
(1, 1, '2025-04-15 09:00:00', 'pending', 'Yêu cầu bác sĩ nữ'),
(2, 2, '2025-04-16 14:30:00', 'confirmed', 'Mang kết quả xét nghiệm');

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
