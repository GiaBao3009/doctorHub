<?php
session_start();
require_once '../../config/database.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'doctor') {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Không có quyền truy cập']);
    exit;
}

$database = new Database();
$db = $database->getConnection();

try {
    // Lấy danh sách thuốc
    $stmt = $db->query("SELECT id, name, description, dosage, unit, price, stock FROM medications ORDER BY name");
    $medications = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($medications);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()]);
}
?>
