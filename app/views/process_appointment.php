<?php
session_start();
require_once '../../config/database.php';
header('Content-Type: application/json');

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập để đặt lịch!']);
    exit;
}

try {
    // Kết nối database
    $database = new Database();
    $db = $database->getConnection();
    
    // Lấy thông tin từ form
    $date = $_POST['appointment_date'] ?? '';
    $time = $_POST['appointment_time'] ?? '';
    $name = $_POST['info_name'] ?? '';
    $gender = $_POST['info_gender'] ?? '';
    $phone = $_POST['info_phone'] ?? '';
    $email = $_POST['info_email'] ?? '';
    $reason = $_POST['info_reason'] ?? '';
    
    // Xử lý ngày giờ
    $date_parts = explode('/', $date);
    $time_parts = explode(' - ', $time);
    $start_time = trim($time_parts[0]);
    
    // Định dạng: YYYY-MM-DD HH:MM:SS
    $appointment_datetime = "2023-" . $date_parts[1] . "-" . $date_parts[0] . " " . $start_time . ":00";
    
    // Tìm ID của bác sĩ Nguyễn Đức Gia Bảo
    $stmt = $db->prepare("SELECT id FROM users WHERE name LIKE ? AND role = 'doctor'");
    $stmt->execute(['%Nguyễn Đức Gia Bảo%']);
    $doctor = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$doctor) {
        // Nếu không tìm thấy bác sĩ trong database, báo lỗi
        echo json_encode(['success' => false, 'message' => 'Không tìm thấy thông tin bác sĩ!']);
        exit;
    }
    
    $doctor_id = $doctor['id'];
    $user_id = $_SESSION['user_id'];
    
    // Tạo ghi chú chi tiết
    $note = "Tên: $name\n";
    $note .= "Giới tính: $gender\n";
    $note .= "Điện thoại: $phone\n";
    $note .= "Email: $email\n";
    $note .= "Lý do khám: $reason\n";
    
    // Kiểm tra xem đã có cột patient_name chưa
    $has_patient_name = false;
    $columns_check = $db->query("SHOW COLUMNS FROM appointments LIKE 'patient_name'");
    $has_patient_name = $columns_check->rowCount() > 0;
    
    if ($has_patient_name) {
        // Nếu có cột patient_name, sử dụng nó
        $stmt = $db->prepare("INSERT INTO appointments (user_id, service_id, appointment_date, status, note, patient_name) 
                             VALUES (?, ?, ?, 'pending', ?, ?)");
        $stmt->execute([$doctor_id, $user_id, $appointment_datetime, $note, $name]);
    } else {
        // Nếu không có cột patient_name, lưu tất cả thông tin vào note
        $stmt = $db->prepare("INSERT INTO appointments (user_id, service_id, appointment_date, status, note) 
                             VALUES (?, ?, ?, 'pending', ?)");
        $stmt->execute([$doctor_id, $user_id, $appointment_datetime, $note]);
    }
    
    echo json_encode(['success' => true, 'message' => 'Đặt lịch thành công!']);
    
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()]);
}
?> 