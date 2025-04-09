FROM php:8.2-apache

# Copy toàn bộ project vào thư mục gốc web của Apache
COPY . /var/www/html/

# Kích hoạt mod_rewrite cho .htaccess nếu có
RUN a2enmod rewrite

# Cấp quyền cần thiết cho Apache
RUN chown -R www-data:www-data /var/www/html

# Mặc định Apache sẽ chạy file index.php
