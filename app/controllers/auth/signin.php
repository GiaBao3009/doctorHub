<?php
require_once '../../../config/database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new Database();
    $db = $database->getConnection();
    
    // Validate input
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $_SESSION['error'] = 'Email và mật khẩu không được để trống';
        header('Location: ../../views/signIn.php');
        exit;
    }

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    try {
        // Get user by email
        $stmt = $db->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Store user data in session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_name'] = $user['name'];
                
                header('Location: ../../../index.php');
                exit;
            } else {
                $_SESSION['error'] = 'Mật khẩu không chính xác';
                header('Location: ../../views/signIn.php');
                exit;
            }
        } else {
            $_SESSION['error'] = 'Email không tồn tại trong hệ thống';
            header('Location: ../../views/signIn.php');
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Lỗi kết nối database: ' . $e->getMessage();
        header('Location: ../../views/signIn.php');
        exit;
    }
} else {
    header('Location: ../../views/signIn.php');
    exit;
} 