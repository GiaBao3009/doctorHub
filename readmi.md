# DoctorHub - Đặt Lịch Khám và Tư Vấn Sức Khỏe

Author: **@Vinhdev04**<br>
**DoctorHub** là một nền tảng trực tuyến giúp người dùng dễ dàng đặt lịch khám bệnh và nhận tư vấn sức khỏe từ các bác sĩ uy tín, tiết kiệm thời gian và chăm sóc sức khỏe một cách hiệu quả. Người dùng có thể dễ dàng đặt lịch khám bệnh trực tuyến và nhận sự tư vấn từ các chuyên gia qua một giao diện thân thiện và dễ sử dụng.

# DoctorHub Project

## 📁 Cấu trúc thư mục

```
├── app/
│   ├── controllers/         # Chứa các controller xử lý logic cho từng phần của ứng dụng
│   ├── helper/              # Các hàm tiện ích (helpers) dùng chung trong toàn bộ dự án
│   ├── models/              # Tầng dữ liệu: xử lý truy vấn, kết nối database
│   └── views/               # Giao diện người dùng (UI), các file hiển thị
│
├── assets/                  # Tài nguyên tĩnh như hình ảnh, font, css, js ngoài
│
├── config/                  # Cấu hình hệ thống, kết nối CSDL, constant, v.v...
│
├── partials/                # Các phần giao diện được dùng lại (header, footer, sidebar...)
│
├── services/                # Chứa các script JS xử lý hành vi trên giao diện
│
├── vendor/                  # Thư viện được quản lý bởi Composer (autoload, packages, v.v...)
│
├── .htaccess                # Cấu hình rewrite URL (áp dụng với Apache)
├── composer.json            # File khai báo các package PHP sử dụng
├── composer.lock            # Ghi lại version cụ thể của các gói đã cài
├── index.php                # File gốc, entry point của ứng dụng
└── readmi.md                # Mô tả dự án (file này)
```
---
## Các Tính Năng Chính:

- **Đặt Lịch Khám**: Cho phép người dùng đặt lịch khám trực tuyến với các bác sĩ uy tín.
- **Tư Vấn Sức Khỏe Online**: Nhận tư vấn sức khỏe nhanh chóng và thuận tiện.
- **Dịch Vụ Y Tế**: Cung cấp các dịch vụ y tế online như tư vấn trực tuyến.
- **Blog & Bài Test**: Cung cấp các bài viết về sức khỏe và bài test kiểm tra sức khỏe.
- **Tìm kiếm thông tin**: Người dùng có thể tìm kiếm các bài viết và dịch vụ y tế thông qua chức năng tìm kiếm dễ sử dụng.
---
## Cấu Trúc Dự Án:

- **HTML**: Các trang web được xây dựng bằng HTML cho cấu trúc cơ bản.
- **CSS**: Định dạng giao diện người dùng, với các tệp `style.css`, `base.css`, và `responsive.css` để đảm bảo tính tương thích trên mọi thiết bị.
- **JavaScript**: Thêm các chức năng động cho trang web, bao gồm các tính năng của Bootstrap như Navbar, Modal, v.v.
- **Bootstrap**: Dự án sử dụng Bootstrap 5 để tạo ra giao diện responsive dễ sử dụng và thân thiện với người dùng.
- **Lazysizes**: Tự động lazy load ảnh cho website
---
## Cài Đặt:

1. Tải hoặc clone dự án về máy tính của bạn.
2. Mở file `index.html` trong trình duyệt web để xem dự án.

```bash
git clone https://github.com/Vinhdev04/DoctorHubs.git
cd DOCTORHUB
open index.php
```
---
## Tài Nguyên Và Công Nghệ Sư Dụng:

**API Vietnam Open Data** `để tự động tải tỉnh/thành, quận/huyện và phường/xã`
<br>
**Uiverse use UI** `https://uiverse.io/ ->  tận dụng một số components UI sẵn`
---
## Link Demo:
`https://doctorhubs.onrender.com/`