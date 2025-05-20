<?php
session_start();
require_once '../../config/database.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'doctor') {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Không có quyền truy cập']);
    exit;
}

// Đảm bảo dữ liệu được gửi qua POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Phương thức không được phép']);
    exit;
}

// Lấy dữ liệu JSON từ request
$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
    exit;
}

$doctor_id = $_SESSION['user_id'];
$database = new Database();
$db = $database->getConnection();

try {
    // Bắt đầu transaction
    $db->beginTransaction();
    
    // Tạo đơn thuốc mới
    $stmt = $db->prepare("INSERT INTO prescriptions (appointment_id, doctor_id, patient_name, diagnosis, instructions, status, total_amount) 
                          VALUES (?, ?, ?, ?, ?, 'draft', 0)");
    $stmt->execute([
        $data['appointment_id'],
        $doctor_id,
        $data['patient_name'],
        $data['diagnosis'],
        $data['instructions']
    ]);
    
    $prescription_id = $db->lastInsertId();
    $total_amount = 0;
    
    // Thêm các loại thuốc vào đơn
    foreach ($data['medications'] as $med) {
        // Lấy thông tin thuốc từ database
        $stmt = $db->prepare("SELECT price FROM medications WHERE id = ?");
        $stmt->execute([$med['medication_id']]);
        $medication = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$medication) {
            throw new Exception("Không tìm thấy thuốc với ID: " . $med['medication_id']);
        }
        
        $subtotal = $medication['price'] * $med['quantity'];
        $total_amount += $subtotal;
        
        // Thêm chi tiết thuốc vào đơn
        $stmt = $db->prepare("INSERT INTO prescription_items (prescription_id, medication_id, quantity, instructions, days, times_per_day, subtotal) 
                              VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $prescription_id,
            $med['medication_id'],
            $med['quantity'],
            $med['instructions'],
            $med['days'],
            $med['times_per_day'],
            $subtotal
        ]);
    }
    
    // Cập nhật tổng tiền cho đơn thuốc
    $stmt = $db->prepare("UPDATE prescriptions SET total_amount = ? WHERE id = ?");
    $stmt->execute([$total_amount, $prescription_id]);
    
    // Commit transaction
    $db->commit();
    
    echo json_encode([
        'success' => true, 
        'message' => 'Đơn thuốc được lưu thành công', 
        'prescription_id' => $prescription_id
    ]);
    
} catch (Exception $e) {
    // Rollback nếu có lỗi
    $db->rollBack();
    
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()]);
}
?>
