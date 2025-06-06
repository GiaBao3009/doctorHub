<?php
function randomVietnameseName() {
    $firstNames = ['Nguyễn', 'Trần', 'Lê', 'Phạm', 'Hoàng', 'Phan', 'Vũ', 'Đặng', 'Bùi', 'Đỗ'];
    $middleNames = ['Văn', 'Thị', 'Hữu', 'Đức', 'Ngọc', 'Minh', 'Thanh', 'Xuân', 'Hải', 'Quốc'];
    $lastNames = ['An', 'Bình', 'Cường', 'Dũng', 'Giang', 'Hà', 'Hùng', 'Linh', 'Phong', 'Thảo', 'Thắng', 'Trang'];

    return 'BS. ' . $firstNames[array_rand($firstNames)] . ' ' . $middleNames[array_rand($middleNames)] . ' ' . $lastNames[array_rand($lastNames)];
}

function randomSpecialty() {
    $specialties = ['Khoa Nội tổng quát', 'Khoa Da liễu', 'Khoa Tim mạch', 'Khoa Nhi', 'Khoa Sản', 'Khoa Thần kinh', 'Khoa Hô hấp'];
    return $specialties[array_rand($specialties)];
}

function randomPhone() {
    return '09' . rand(10000000, 99999999);
}

function randomAddress() {
    $streets = ['Nguyễn Trãi', 'Trường Chinh', 'Cách Mạng Tháng 8', 'Điện Biên Phủ', 'Lê Lợi', 'Phan Đình Phùng', 'Hai Bà Trưng'];
    $cities = ['Hà Nội', 'TP.HCM', 'Đà Nẵng', 'Huế', 'Cần Thơ', 'Hải Phòng', 'Biên Hòa'];
    return rand(1, 999) . ' ' . $streets[array_rand($streets)] . ', ' . $cities[array_rand($cities)];
}

function randomAvatar($i) {
    return "../../../assets/images/Doctors/avatar-$i.jpg";
}

$defaultPassword = '12345678';
$hashedPassword = password_hash($defaultPassword, PASSWORD_DEFAULT);

$sql = "INSERT INTO doctors (name, email, password, specialty, avatar, phone, address) VALUES\n";

for ($i = 1; $i <= 50; $i++) {
    $name = randomVietnameseName();
    $email = strtolower(str_replace(['BS. ', ' '], ['', ''], $name)) . "@doctorhub.com";
    $specialty = randomSpecialty();
    $avatar = randomAvatar($i);
    $phone = randomPhone();
    $address = randomAddress();

    $sql .= "('$name', '$email', '$hashedPassword', '$specialty', '$avatar', '$phone', '$address')";
    $sql .= $i < 50 ? ",\n" : ";\n";
}

echo "<pre>$sql</pre>";
?>
