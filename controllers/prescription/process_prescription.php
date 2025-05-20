<?php
session_start();
require_once '../../config/database.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'doctor') {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Unauthorized access']);
    exit;
}

// Kết nối database
$database = new Database();
$db = $database->getConnection();

// Lấy dữ liệu từ request
$data = json_decode(file_get_contents('php://input'), true) ?? [];
$action = isset($_POST['action']) ? $_POST['action'] : (isset($data['action']) ? $data['action'] : '');

// Xử lý các hành động
switch ($action) {
    case 'create_prescription':
        createPrescription($db, $_POST, $data);
        break;
        
    case 'add_medication':
        addMedication($db, $_POST, $data);
        break;
        
    case 'finalize_prescription':
        finalizePrescription($db, $_POST, $data);
        break;
        
    case 'get_medications':
        getMedications($db);
        break;
        
    default:
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
        break;
}

// Hàm tạo đơn thuốc mới
function createPrescription($db, $post, $data) {
    try {
        $doctor_id = $_SESSION['user_id'];
        $appointment_id = isset($post['appointment_id']) ? $post['appointment_id'] : $data['appointment_id'] ?? '';
        $patient_name = isset($post['patient_name']) ? $post['patient_name'] : $data['patient_name'] ?? '';
        $diagnosis = isset($post['diagnosis']) ? $post['diagnosis'] : $data['diagnosis'] ?? '';
        $instructions = isset($post['instructions']) ? $post['instructions'] : $data['instructions'] ?? '';
        
        // Validate data
        if (empty($appointment_id) || empty($patient_name) || empty($diagnosis)) {
            throw new Exception('Missing required fields');
        }
        
        // Bắt đầu transaction
        $db->beginTransaction();
        
        // Tạo đơn thuốc mới
        $stmt = $db->prepare("INSERT INTO prescriptions (appointment_id, doctor_id, patient_name, diagnosis, instructions, status) 
                              VALUES (?, ?, ?, ?, ?, 'draft')");
        $stmt->execute([$appointment_id, $doctor_id, $patient_name, $diagnosis, $instructions]);
        
        $prescription_id = $db->lastInsertId();
        
        // Commit transaction
        $db->commit();
        
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true, 
            'message' => 'Đơn thuốc đã được tạo thành công', 
            'prescription_id' => $prescription_id
        ]);
        
    } catch (Exception $e) {
        // Rollback transaction nếu có lỗi
        if ($db->inTransaction()) {
            $db->rollBack();
        }
        
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
}

// Hàm thêm thuốc vào đơn
function addMedication($db, $post, $data) {
    try {
        $prescription_id = isset($post['prescription_id']) ? $post['prescription_id'] : $data['prescription_id'] ?? '';
        $medication_id = isset($post['medication_id']) ? $post['medication_id'] : $data['medication_id'] ?? '';
        $quantity = isset($post['quantity']) ? $post['quantity'] : $data['quantity'] ?? '';
        $instructions = isset($post['instructions']) ? $post['instructions'] : $data['instructions'] ?? '';
        $days = isset($post['days']) ? $post['days'] : $data['days'] ?? '';
        $times_per_day = isset($post['times_per_day']) ? $post['times_per_day'] : $data['times_per_day'] ?? '';
        
        // Validate data
        if (empty($prescription_id) || empty($medication_id) || empty($quantity)) {
            throw new Exception('Missing required fields');
        }
        
        // Lấy giá của thuốc
        $stmt = $db->prepare("SELECT price FROM medications WHERE id = ?");
        $stmt->execute([$medication_id]);
        $medication = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$medication) {
            throw new Exception('Medication not found');
        }
        
        $subtotal = $medication['price'] * $quantity;
        
        // Bắt đầu transaction
        $db->beginTransaction();
        
        // Thêm thuốc vào đơn
        $stmt = $db->prepare("INSERT INTO prescription_items (prescription_id, medication_id, quantity, instructions, days, times_per_day, subtotal) 
                              VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$prescription_id, $medication_id, $quantity, $instructions, $days, $times_per_day, $subtotal]);
        
        // Cập nhật tổng tiền trong đơn thuốc
        $stmt = $db->prepare("UPDATE prescriptions SET total_amount = total_amount + ? WHERE id = ?");
        $stmt->execute([$subtotal, $prescription_id]);
        
        // Commit transaction
        $db->commit();
        
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true, 
            'message' => 'Đã thêm thuốc vào đơn',
            'subtotal' => $subtotal
        ]);
        
    } catch (Exception $e) {
        // Rollback transaction nếu có lỗi
        if ($db->inTransaction()) {
            $db->rollBack();
        }
        
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
}

// Hàm hoàn tất đơn thuốc
function finalizePrescription($db, $post, $data) {
    try {
        $prescription_id = isset($post['prescription_id']) ? $post['prescription_id'] : $data['prescription_id'] ?? '';
        
        // Validate data
        if (empty($prescription_id)) {
            throw new Exception('Missing prescription ID');
        }
        
        // Kiểm tra xem đơn thuốc có thuộc về bác sĩ hiện tại không
        $stmt = $db->prepare("SELECT * FROM prescriptions WHERE id = ? AND doctor_id = ?");
        $stmt->execute([$prescription_id, $_SESSION['user_id']]);
        $prescription = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$prescription) {
            throw new Exception('Prescription not found or not authorized');
        }
        
        // Cập nhật trạng thái đơn thuốc
        $stmt = $db->prepare("UPDATE prescriptions SET status = 'finalized' WHERE id = ?");
        $stmt->execute([$prescription_id]);
        
        // Cập nhật trạng thái cuộc hẹn nếu cần
        $stmt = $db->prepare("UPDATE appointments SET status = 'completed' WHERE id = ?");
        $stmt->execute([$prescription['appointment_id']]);
        
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true, 
            'message' => 'Đơn thuốc đã được hoàn tất',
            'prescription_id' => $prescription_id
        ]);
        
    } catch (Exception $e) {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
}

// Hàm lấy danh sách thuốc
function getMedications($db) {
    try {
        $stmt = $db->prepare("SELECT id, name, description, dosage, unit, price, stock FROM medications ORDER BY name");
        $stmt->execute();
        $medications = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'data' => $medications]);
        
    } catch (Exception $e) {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
    }
} 