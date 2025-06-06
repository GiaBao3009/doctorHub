<?php
header('Content-Type: application/json');
session_start();

require_once '../../config/database.php';

$database = new Database();
$db = $database->getConnection();

$response = ['success' => false, 'message' => '', 'data' => null];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response['message'] = 'Phương thức không hợp lệ';
    echo json_encode($response);
    exit;
}

$patient_id = $_POST['patient_id'] ?? null;
$doctor_id = $_POST['doctor_id'] ?? null;
$appointment_date = $_POST['appointment_date'] ?? null;
$notes = $_POST['notes'] ?? '';

if (!$patient_id || !$doctor_id || !$appointment_date) {
    $response['message'] = 'Thiếu thông tin bắt buộc';
    echo json_encode($response);
    exit;
}

try {
    // Kiểm tra thông tin bệnh nhân và bác sĩ
    $stmt = $db->prepare("
        SELECT p.name as patient_name, p.email, u.name as doctor_name
        FROM patients p
        JOIN users u ON u.id = ?
        WHERE p.id = ?
    ");
    $stmt->execute([$doctor_id, $patient_id]);
    $info = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$info) {
        $response['message'] = 'Bệnh nhân hoặc bác sĩ không tồn tại';
        echo json_encode($response);
        exit;
    }

    // Lưu lịch khám
    $stmt = $db->prepare("
        INSERT INTO appointments (patient_id, doctor_id, appointment_date, notes, status)
        VALUES (?, ?, ?, ?, 'scheduled')
    ");
    $stmt->execute([$patient_id, $doctor_id, $appointment_date, $notes]);
    $appointment_id = $db->lastInsertId();

    // Trả về thông tin để gửi email
    $response['success'] = true;
    $response['message'] = 'Đặt lịch thành công';
    $response['data'] = [
        'appointment_id' => $appointment_id,
        'patient_name' => $info['patient_name'],
        'doctor_name' => $info['doctor_name'],
        'appointment_date' => date('d/m/Y H:i', strtotime($appointment_date)),
        'email' => $info['email'],
        'notes' => $notes
    ];
} catch (PDOException $e) {
    $response['message'] = 'Lỗi database: ' . $e->getMessage();
}

echo json_encode($response);
?><!DOCTYPE html>
<html>
<head>
    <title>Đặt lịch khám</title>
    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
</head>
<body>
    <form id="appointmentForm">
        <input type="number" name="patient_id" placeholder="ID bệnh nhân" required>
        <input type="number" name="doctor_id" placeholder="ID bác sĩ" required>
        <input type="datetime-local" name="appointment_date" required>
        <textarea name="notes" placeholder="Ghi chú"></textarea>
        <button type="submit">Đặt lịch</button>
    </form>

    <script>
        // Khởi tạo EmailJS với public key
        emailjs.init("C5QzUOmYFxqS06nXo"); // Thay bằng User ID từ EmailJS

        document.getElementById('appointmentForm').addEventListener('submit', async function(event) {
            event.preventDefault();

            const formData = new FormData(this);
            try {
                // Gửi yêu cầu đến API lưu lịch khám
                const response = await fetch('/path/to/process_appointment.php', {
                    method: 'POST',
                    body: formData
                });
                const result = await response.json();

                if (result.success) {
                    // Gửi email xác nhận bằng EmailJS
                    const emailParams = {
                        patient_name: result.data.patient_name,
                        doctor_name: result.data.doctor_name,
                        appointment_date: result.data.appointment_date,
                        notes: result.data.notes || 'Không có'
                    };

                    await emailjs.send('service_eied1q8', 'template_nc4abtv', emailParams)
                        .then(() => {
                            alert('Đặt lịch thành công! Email xác nhận đã được gửi.');
                        }, (error) => {
                            console.error('Lỗi gửi email:', error);
                            alert('Đặt lịch thành công nhưng lỗi khi gửi email xác nhận.');
                        });
                } else {
                    alert('Lỗi: ' + result.message);
                }
            } catch (error) {
                console.error('Lỗi:', error);
                alert('Có lỗi xảy ra khi đặt lịch.');
            }
        });
    </script>
</body>
</html>