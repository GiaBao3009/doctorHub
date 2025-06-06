<?php
session_start();
require_once '../../config/database.php';
require_once '../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Tạo thư mục logs
$logDir = __DIR__ . '/../../logs';
if (!file_exists($logDir)) {
    mkdir($logDir, 0755, true);
}

// Hàm ghi log
function writeLog($message, $type = 'info') {
    global $logDir;
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $logFile = "$logDir/prescription_$date.log";
    $logMessage = "[$time][$type] $message" . PHP_EOL;
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

// Hàm gửi dữ liệu đến json-server
function sendToApi($data) {
    $apiUrl = 'http://localhost:3000/prescriptions';
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    writeLog("API Response: HTTP $httpCode - $response");
    return $httpCode === 201;
}

// Hàm gửi email đơn thuốc
function sendPrescriptionEmail($recipient, $prescription_details, $appointment_info, $doctor_name) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'vaniizit@gmail.com';
        $mail->Password = '123456@Vinh'; // Thay bằng App Password vừa tạo
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Sử dụng SSL vì đang dùng cổng 465
        $mail->Port = 465;

        $mail->setFrom('vaniizit@gmail.com', 'DoctorHub');
        $mail->addAddress($recipient);

        $mail->isHTML(true);
        $mail->Subject = 'Đơn thuốc từ DoctorHub';
        $mail->Body = '
            <h2>Đơn thuốc</h2>
            <p>Dưới đây là thông tin đơn thuốc từ lịch khám của bạn:</p>
            <ul>
                <li><strong>Bác sĩ:</strong> ' . htmlspecialchars($doctor_name) . '</li>
                <li><strong>Ngày khám:</strong> ' . htmlspecialchars($appointment_info['appointment_date']) . '</li>
                <li><strong>Tên bệnh nhân:</strong> ' . htmlspecialchars($appointment_info['patient_name']) . '</li>
                <li><strong>Chi tiết đơn thuốc:</strong> ' . nl2br(htmlspecialchars($prescription_details['medication_details'])) . '</li>
                <li><strong>Hướng dẫn sử dụng:</strong> ' . nl2br(htmlspecialchars($prescription_details['instructions'] ?: 'Không có')) . '</li>
            </ul>
            <p>Vui lòng tuân thủ hướng dẫn của bác sĩ. Cảm ơn bạn!</p>';

        $mail->send();
        writeLog("Email đơn thuốc đã được gửi đến $recipient");
    } catch (Exception $e) {
        writeLog("Lỗi gửi email đơn thuốc: {$mail->ErrorInfo} - Recipient: $recipient", 'error');
    }
}

// Kiểm tra quyền truy cập
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'doctor') {
    $_SESSION['error_message'] = 'Bạn không có quyền thực hiện hành động này';
    header('Location: /app/views/doctor_dashboard.php');
    exit;
}

// Kiểm tra phương thức request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['error_message'] = 'Phương thức không được hỗ trợ';
    header('Location: /app/views/doctor_dashboard.php');
    exit;
}

// Kiểm tra dữ liệu đầu vào
if (!isset($_POST['appointment_id']) || !isset($_POST['medication_details'])) {
    $_SESSION['error_message'] = 'Thiếu thông tin cần thiết';
    header('Location: /app/views/doctor_dashboard.php');
    exit;
}

$appointment_id = (int)$_POST['appointment_id'];
$medication_details = $_POST['medication_details'];
$instructions = $_POST['instructions'] ?? '';
$return_url = $_POST['return_url'] ?? '/app/views/doctor_dashboard.php';

try {
    // Kết nối database
    $database = new Database();
    $db = $database->getConnection();

    // Kiểm tra trạng thái lịch hẹn
    $stmt = $db->prepare("SELECT a.*, u.email, u.name as patient_name, d.name as doctor_name 
                         FROM appointments a 
                         LEFT JOIN users u ON a.user_id = u.id 
                         LEFT JOIN users d ON a.doctor_user_id = d.id 
                         WHERE a.id = ?");
    $stmt->execute([$appointment_id]);
    $appointment = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$appointment || $appointment['status'] !== 'completed') {
        $_SESSION['error_message'] = 'Lịch hẹn không tồn tại hoặc chưa hoàn thành';
        header('Location: ' . $return_url);
        exit;
    }

    // Lưu đơn thuốc vào database
    $stmt = $db->prepare("INSERT INTO prescriptions (appointment_id, patient_id, doctor_id, medication_details, instructions) 
                         VALUES (?, ?, ?, ?, ?)");
    $result = $stmt->execute([$appointment_id, $appointment['user_id'], $appointment['doctor_user_id'], 
                            $medication_details, $instructions]);

    if ($result) {
        writeLog("Đã lưu đơn thuốc cho lịch hẹn ID: $appointment_id");
        
        // Gửi dữ liệu đến json-server
        $api_data = [
            'id' => $db->lastInsertId(),
            'appointment_id' => $appointment_id,
            'patient_id' => $appointment['user_id'],
            'doctor_id' => $appointment['doctor_user_id'],
            'medication_details' => $medication_details,
            'instructions' => $instructions,
            'prescribed_at' => date('Y-m-d H:i:s')
        ];
        
        if (!sendToApi($api_data)) {
            writeLog("Gửi dữ liệu đơn thuốc đến json-server thất bại", 'error');
            $_SESSION['warning_message'] = 'Kê đơn thuốc thành công nhưng gửi dữ liệu đến API thất bại!';
        }
        
        $_SESSION['success_message'] = 'Kê đơn thuốc thành công!';

        // Gửi email đơn thuốc
        if (!empty($appointment['email'])) {
            sendPrescriptionEmail($appointment['email'], [
                'medication_details' => $medication_details,
                'instructions' => $instructions
            ], $appointment, $appointment['doctor_name']);
        } else {
            writeLog("Không gửi email đơn thuốc vì email trống cho appointment ID: $appointment_id", 'warning');
        }
    } else {
        writeLog("Không thể lưu đơn thuốc cho lịch hẹn ID: $appointment_id", 'error');
        $_SESSION['error_message'] = 'Không thể lưu đơn thuốc';
    }

} catch (Exception $e) {
    writeLog("Lỗi khi kê đơn thuốc: " . $e->getMessage(), 'error');
    $_SESSION['error_message'] = 'Lỗi: ' . $e->getMessage();
}

header('Location: ' . $return_url);
exit;