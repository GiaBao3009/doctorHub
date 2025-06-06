<?php
    header('Content-Type: application/json');
    session_start();

    require_once '../../config/database.php';
    require_once '../../vendor/autoload.php'; // Đảm bảo PHPMailer đã được cài đặt qua Composer

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $database = new Database();
    $db = $database->getConnection();

    $response = ['success' => false, 'message' => ''];

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $response['message'] = 'Phương thức không hợp lệ';
        echo json_encode($response);
        exit;
    }

    $appointment_id = $_POST['appointment_id'] ?? null;
    $patient_id = $_POST['patient_id'] ?? null;
    $doctor_id = $_POST['doctor_id'] ?? null;
    $medication_details = $_POST['medication_details'] ?? '';
    $instructions = $_POST['instructions'] ?? '';

    if (!$appointment_id || !$patient_id || !$doctor_id || !$medication_details) {
        $response['message'] = 'Thiếu thông tin bắt buộc';
        echo json_encode($response);
        exit;
    }

    try {
        // Lấy thông tin lịch hẹn và bệnh nhân
        $stmt = $db->prepare("
            SELECT a.*, p.name as patient_name, p.email, u.name as doctor_name
            FROM appointments a
            JOIN patients p ON p.id = ?
            JOIN users u ON u.id = ?
            WHERE a.id = ?
        ");
        $stmt->execute([$patient_id, $doctor_id, $appointment_id]);
        $appointment = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$appointment) {
            $response['message'] = 'Lịch hẹn hoặc bệnh nhân không tồn tại';
            echo json_encode($response);
            exit;
        }

        if ($appointment['status'] !== 'completed') {
            $response['message'] = 'Lịch hẹn chưa hoàn thành';
            echo json_encode($response);
            exit;
        }

        // Lưu đơn thuốc vào database
        $stmt = $db->prepare("
            INSERT INTO prescriptions (appointment_id, patient_id, doctor_id, medication_details, instructions)
            VALUES (?, ?, ?, ?, ?)
        ");
        $stmt->execute([$appointment_id, $patient_id, $doctor_id, $medication_details, $instructions]);

        // Gửi email thông báo đơn thuốc
        if (!empty($appointment['email'])) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'vaniizit@gmail.com';
                $mail->Password = 'abcd efgh ijkl mnop'; // App Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                $mail->setFrom('vaniizit@gmail.com', 'DoctorHub');
                $mail->addAddress($appointment['email']);

                $mail->isHTML(true);
                $mail->Subject = 'Đơn thuốc từ DoctorHub';
                $mail->Body = '
                    <h2>Đơn thuốc</h2>
                    <p>Dưới đây là thông tin đơn thuốc từ lịch khám của bạn:</p>
                    <ul>
                        <li><strong>Bác sĩ:</strong> ' . htmlspecialchars($appointment['doctor_name']) . '</li>
                        <li><strong>Ngày khám:</strong> ' . htmlspecialchars($appointment['appointment_date']) . '</li>
                        <li><strong>Tên bệnh nhân:</strong> ' . htmlspecialchars($appointment['patient_name']) . '</li>
                        <li><strong>Chi tiết đơn thuốc:</strong> ' . nl2br(htmlspecialchars($medication_details)) . '</li>
                        <li><strong>Hướng dẫn sử dụng:</strong> ' . nl2br(htmlspecialchars($instructions ?: 'Không có')) . '</li>
                    </ul>
                    <p>Vui lòng tuân thủ hướng dẫn của bác sĩ. Cảm ơn bạn!</p>';

                $mail->send();
                error_log("Email đơn thuốc đã được gửi đến {$appointment['email']}");
            } catch (Exception $e) {
                error_log("Lỗi gửi email đơn thuốc: {$mail->ErrorInfo} - Recipient: {$appointment['email']}");
            }
        }

        $response['success'] = true;
        $response['message'] = 'Tạo đơn thuốc thành công';
    } catch (PDOException $e) {
        $response['message'] = 'Lỗi database: ' . $e->getMessage();
    }

    echo json_encode($response);
    ?>