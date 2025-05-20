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

try {
    // Get all medications
    $stmt = $db->prepare("SELECT id, name, description, dosage, unit, price, stock FROM medications ORDER BY name");
    $stmt->execute();
    $medications = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Return as JSON
    header('Content-Type: application/json');
    echo json_encode([
        'success' => true,
        'data' => $medications
    ]);
    
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'Error: ' . $e->getMessage()
    ]);
} 