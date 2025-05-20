<?php
session_start();
require_once '../../config/database.php';

// Check if user is logged in as a doctor
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'doctor') {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Unauthorized access']);
    exit;
}

// Connect to database
$database = new Database();
$db = $database->getConnection();

// Get status filter
$status = isset($_GET['status']) ? $_GET['status'] : '';

try {
    // Build query based on status
    $query = "SELECT p.*, a.appointment_date 
              FROM prescriptions p 
              LEFT JOIN appointments a ON p.appointment_id = a.id 
              WHERE p.doctor_id = ?";
    
    $params = [$_SESSION['user_id']];
    
    if ($status === 'active') {
        $query .= " AND p.status IN ('draft', 'finalized')";
    } elseif ($status === 'completed') {
        $query .= " AND p.status IN ('dispensed', 'paid')";
    } elseif (!empty($status)) {
        $query .= " AND p.status = ?";
        $params[] = $status;
    }
    
    $query .= " ORDER BY p.created_at DESC";
    
    // Execute query
    $stmt = $db->prepare($query);
    $stmt->execute($params);
    $prescriptions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get additional data for each prescription if needed
    foreach ($prescriptions as &$prescription) {
        // Format date
        if (isset($prescription['appointment_date'])) {
            $date = new DateTime($prescription['appointment_date']);
            $prescription['formatted_date'] = $date->format('d/m/Y');
            $prescription['formatted_time'] = $date->format('H:i');
        }
        
        // Get total items
        $stmt = $db->prepare("SELECT COUNT(*) FROM prescription_items WHERE prescription_id = ?");
        $stmt->execute([$prescription['id']]);
        $prescription['item_count'] = $stmt->fetchColumn();
    }
    
    // Return as JSON
    header('Content-Type: application/json');
    echo json_encode([
        'success' => true,
        'data' => $prescriptions
    ]);
    
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ]);
} 