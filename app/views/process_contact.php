<?php
require_once '../../config/database.php';
require_once '../../config/init.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = filter_input(INPUT_POST, 'fullName', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

    // Xác thực phía server
    $errors = [];
    if (empty($fullName) || strlen($fullName) < 2) {
        $errors[] = 'Họ và tên phải có ít nhất 2 ký tự.';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email không hợp lệ.';
    }
    if (!empty($phone) && !preg_match('/^0[0-9]{9,10}$/', $phone)) {
        $errors[] = 'Số điện thoại không hợp lệ.';
    }
    if (empty($message) || strlen(trim($message)) < 10) {
        $errors[] = 'Nội dung phải có ít nhất 10 ký tự.';
    }

    if (!empty($errors)) {
        echo json_encode(['success' => false, 'message' => implode(' ', $errors)]);
        exit;
    }

    // Lưu vào cơ sở dữ liệu
    try {
        $conn = new PDO("mysql:host=localhost;dbname=doctorhub", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("INSERT INTO contacts (full_name, email, phone, message, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->execute([$fullName, $email, $phone, $message]);
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Lỗi cơ sở dữ liệu: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Phương thức không hợp lệ.']);
}
?>