<?php
session_start();
require_once '../../config/database.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'doctor') {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Không có quyền truy cập']);
    exit;
}

$doctor_id = $_SESSION['user_id'];
$database = new Database();
$db = $database->getConnection();

try {
    // Lấy danh sách bệnh nhân đã được khám bởi bác sĩ
    $stmt = $db->prepare("SELECT a.id, a.patient_name, a.appointment_date, a.status, a.note, 
                          u.name as patient_user_name, u.id as patient_id
                          FROM appointments a
                          LEFT JOIN users u ON a.user_id = u.id
                          WHERE a.doctor_user_id = ? 
                          AND a.status = 'completed'
                          ORDER BY a.appointment_date DESC");
    $stmt->execute([$doctor_id]);
    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($patients);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()]);
}
?>
