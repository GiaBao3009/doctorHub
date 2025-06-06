<?php
    header('Content-Type: application/json');

    require_once '../../config/database.php';

    $database = new Database();
    $db = $database->getConnection();

    $response = ['success' => false, 'message' => '', 'data' => null];

    if (!isset($_GET['prescription_id'])) {
        $response['message'] = 'Thiếu prescription_id';
        echo json_encode($response);
        exit;
    }

    $prescription_id = (int)$_GET['prescription_id'];

    try {
        $stmt = $db->prepare("
            SELECT pr.*, p.name as patient_name, a.appointment_date
            FROM prescriptions pr
            JOIN patients p ON pr.patient_id = p.id
            JOIN appointments a ON pr.appointment_id = a.id
            WHERE pr.id = ?
        ");
        $stmt->execute([$prescription_id]);
        $prescription = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($prescription) {
            $prescription['created_at'] = date('d/m/Y H:i', strtotime($prescription['created_at']));
            $response['success'] = true;
            $response['data'] = $prescription;
        } else {
            $response['message'] = 'Không tìm thấy đơn thuốc';
        }
    } catch (PDOException $e) {
        $response['message'] = 'Lỗi database: ' . $e->getMessage();
    }

    echo json_encode($response);
    ?>