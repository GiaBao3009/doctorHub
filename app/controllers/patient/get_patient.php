<?php
    header('Content-Type: application/json');

    require_once '../../config/database.php';

    $database = new Database();
    $db = $database->getConnection();

    $response = ['success' => false, 'message' => '', 'data' => null];

    if (!isset($_GET['record_id'])) {
        $response['message'] = 'Thiếu record_id';
        echo json_encode($response);
        exit;
    }

    $record_id = (int)$_GET['record_id'];

    try {
        $stmt = $db->prepare("
            SELECT mr.*, p.name as patient_name, a.appointment_date
            FROM medical_records mr
            JOIN patients p ON mr.patient_id = p.id
            JOIN appointments a ON mr.appointment_id = a.id
            WHERE mr.id = ?
        ");
        $stmt->execute([$record_id]);
        $record = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($record) {
            $record['appointment_date'] = date('d/m/Y H:i', strtotime($record['appointment_date']));
            $response['success'] = true;
            $response['data'] = $record;
        } else {
            $response['message'] = 'Không tìm thấy bệnh án';
        }
    } catch (PDOException $e) {
        $response['message'] = 'Lỗi database: ' . $e->getMessage();
    }

    echo json_encode($response);
    ?>