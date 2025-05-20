<?php
session_start();

// Tạo thư mục logs nếu chưa tồn tại
$logDir = __DIR__ . '/../../logs';
if (!file_exists($logDir)) {
    mkdir($logDir, 0755, true);
}

// Hàm ghi log
function writeLog($message, $type = 'info') {
    global $logDir;
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $logFile = "$logDir/process_status_$date.log";
    $logMessage = "[$time][$type] $message" . PHP_EOL;
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

// Ghi log thông tin request
writeLog("Nhận request: " . $_SERVER['REQUEST_METHOD'] . " " . $_SERVER['REQUEST_URI'], 'request');
writeLog("POST data: " . json_encode($_POST, JSON_UNESCAPED_UNICODE), 'request');

// Kiểm tra phương thức request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['error_message'] = 'Phương thức không được hỗ trợ';
    header('Location: ' . ($_POST['return_url'] ?? '/app/views/doctor_dashboard.php'));
    exit;
}

// Kiểm tra dữ liệu đầu vào
if (!isset($_POST['appointment_id']) || !isset($_POST['status'])) {
    $_SESSION['error_message'] = 'Thiếu thông tin cần thiết (appointment_id hoặc status)';
    header('Location: ' . ($_POST['return_url'] ?? '/app/views/doctor_dashboard.php'));
    exit;
}

$appointment_id = (int)$_POST['appointment_id'];
$status = $_POST['status'];

// URL để quay lại sau khi xử lý
$return_url = $_POST['return_url'] ?? '/app/views/doctor_dashboard.php';

// Kiểm tra status hợp lệ
$valid_statuses = ['pending', 'confirmed', 'completed', 'canceled'];
if (!in_array($status, $valid_statuses)) {
    $_SESSION['error_message'] = "Trạng thái '$status' không hợp lệ";
    header('Location: ' . $return_url);
    exit;
}

try {
    // Kết nối database
    require_once '../../config/database.php';
    $database = new Database();
    $db = $database->getConnection();

    if (!$db) {
        throw new Exception('Không thể kết nối đến cơ sở dữ liệu');
    }

    // Cập nhật trạng thái
    $stmt = $db->prepare("UPDATE appointments SET status = ? WHERE id = ?");
    if (!$stmt) {
        throw new Exception('Lỗi chuẩn bị truy vấn: ' . implode(" ", $db->errorInfo()));
    }
    
    $result = $stmt->execute([$status, $appointment_id]);

    if (!$result) {
        throw new Exception('Không thể cập nhật trạng thái: ' . implode(" ", $stmt->errorInfo()));
    }

    $rowsAffected = $stmt->rowCount();
    if ($rowsAffected === 0) {
        writeLog("Không tìm thấy lịch hẹn ID: $appointment_id", 'warning');
        $_SESSION['warning_message'] = "Không tìm thấy lịch hẹn ID: $appointment_id";
    } else {
        writeLog("Đã cập nhật trạng thái thành công cho lịch hẹn ID: $appointment_id", 'info');
        
        // Lấy text trạng thái tương ứng
        $status_text = '';
        switch ($status) {
            case 'confirmed':
                $status_text = 'xác nhận';
                break;
            case 'completed':
                $status_text = 'hoàn thành';
                break;
            case 'canceled':
                $status_text = 'hủy';
                break;
            default:
                $status_text = 'cập nhật';
        }
        
        $_SESSION['success_message'] = 'Đã ' . $status_text . ' lịch hẹn thành công!';
    }

    // Thêm appointment_id vào URL để có thể highlight appointment đã cập nhật
    $separator = (strpos($return_url, '?') !== false) ? '&' : '?';
    $return_url .= $separator . 'appointment_id=' . $appointment_id;

    // Lấy thông tin lịch hẹn sau khi cập nhật
    $stmt = $db->prepare("SELECT a.*, u.name as patient_user_name 
                         FROM appointments a 
                         LEFT JOIN users u ON a.user_id = u.id 
                         WHERE a.id = ?");
    if (!$stmt) {
        throw new Exception('Lỗi chuẩn bị truy vấn: ' . implode(" ", $db->errorInfo()));
    }
    
    $stmt->execute([$appointment_id]);
    $appointment = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    // Ghi log lỗi
    writeLog("Lỗi: " . $e->getMessage(), 'error');
    $_SESSION['error_message'] = 'Lỗi: ' . $e->getMessage();
}

// Chuyển hướng trở lại trang ban đầu
header('Location: ' . $return_url);
exit; 