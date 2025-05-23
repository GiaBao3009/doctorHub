<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit;
}

// Kết nối database
$conn = new mysqli('localhost', 'root', '', 'doctorhub');
$conn->set_charset('utf8mb4');
if ($conn->connect_error) {
    die('Kết nối thất bại: ' . $conn->connect_error);
}

// Kiểm tra và thêm cột status nếu chưa có
$check_column = "SHOW COLUMNS FROM users LIKE 'status'";
$result = $conn->query($check_column);
if ($result->num_rows == 0) {
    $add_column = "ALTER TABLE users ADD COLUMN status ENUM('active', 'locked') DEFAULT 'active'";
    $conn->query($add_column);
}

// Kiểm tra và tạo bảng admin_logs nếu chưa có
$check_table = "SHOW TABLES LIKE 'admin_logs'";
$result = $conn->query($check_table);
if ($result->num_rows == 0) {
    $create_table = "CREATE TABLE admin_logs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        admin_id INT NOT NULL,
        action VARCHAR(255) NOT NULL,
        user_id INT NOT NULL,
        timestamp DATETIME NOT NULL,
        FOREIGN KEY (admin_id) REFERENCES users(id),
        FOREIGN KEY (user_id) REFERENCES users(id)
    )";
    $conn->query($create_table);
}

// Kiểm tra quyền admin
$sql = "SELECT role FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($role);
$stmt->fetch();
$stmt->close();
if ($role !== 'admin') {
    echo '<div class="alert alert-danger">Bạn không có quyền truy cập trang này!</div>';
    exit;
}

// Xử lý thêm tài khoản mới
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $status = 'active';
    $sql = "INSERT INTO users (name, email, password, role, status) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $name, $email, $password, $role, $status);
    if ($stmt->execute()) {
        $log_sql = "INSERT INTO admin_logs (admin_id, action, user_id, timestamp) VALUES (?, 'Thêm tài khoản mới', ?, NOW())";
        $log_stmt = $conn->prepare($log_sql);
        $log_stmt->bind_param('ii', $_SESSION['user_id'], $conn->insert_id);
        $log_stmt->execute();
        $log_stmt->close();
    }
    $stmt->close();
    header('Location: admin_dashboard.php');
    exit;
}

// Xử lý chỉnh sửa thông tin tài khoản
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_user'])) {
    $edit_id = intval($_POST['edit_id']);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $sql = "UPDATE users SET name = ?, email = ?, role = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $name, $email, $role, $edit_id);
    if ($stmt->execute()) {
        $log_sql = "INSERT INTO admin_logs (admin_id, action, user_id, timestamp) VALUES (?, 'Chỉnh sửa thông tin tài khoản', ?, NOW())";
        $log_stmt = $conn->prepare($log_sql);
        $log_stmt->bind_param('ii', $_SESSION['user_id'], $edit_id);
        $log_stmt->execute();
        $log_stmt->close();
    }
    $stmt->close();
    header('Location: admin_dashboard.php');
    exit;
}

// Xử lý reset mật khẩu
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reset_password'])) {
    $reset_id = intval($_POST['reset_id']);
    $new_password = password_hash('123456', PASSWORD_DEFAULT); // Mật khẩu mặc định
    $sql = "UPDATE users SET password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $new_password, $reset_id);
    if ($stmt->execute()) {
        $log_sql = "INSERT INTO admin_logs (admin_id, action, user_id, timestamp) VALUES (?, 'Reset mật khẩu', ?, NOW())";
        $log_stmt = $conn->prepare($log_sql);
        $log_stmt->bind_param('ii', $_SESSION['user_id'], $reset_id);
        $log_stmt->execute();
        $log_stmt->close();
    }
    $stmt->close();
    header('Location: admin_dashboard.php');
    exit;
}

// Xử lý khóa/mở khóa tài khoản
if (isset($_GET['toggle_status']) && is_numeric($_GET['toggle_status'])) {
    $toggle_id = intval($_GET['toggle_status']);
    $sql = "SELECT status FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $toggle_id);
    $stmt->execute();
    $stmt->bind_result($current_status);
    $stmt->fetch();
    $stmt->close();
    $new_status = $current_status === 'active' ? 'locked' : 'active';
    $sql = "UPDATE users SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $new_status, $toggle_id);
    if ($stmt->execute()) {
        $log_sql = "INSERT INTO admin_logs (admin_id, action, user_id, timestamp) VALUES (?, ?, ?, NOW())";
        $log_stmt = $conn->prepare($log_sql);
        $action = $new_status === 'active' ? 'Mở khóa tài khoản' : 'Khóa tài khoản';
        $log_stmt->bind_param('isi', $_SESSION['user_id'], $action, $toggle_id);
        $log_stmt->execute();
        $log_stmt->close();
    }
    $stmt->close();
    header('Location: admin_dashboard.php');
    exit;
}

// Xử lý xóa user
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $delete_id = intval($_GET['delete']);
    // Không cho xóa admin
    $sql = "SELECT role FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $delete_id);
    $stmt->execute();
    $stmt->bind_result($del_role);
    $stmt->fetch();
    $stmt->close();
    if ($del_role !== 'admin') {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $delete_id);
        if ($stmt->execute()) {
            $log_sql = "INSERT INTO admin_logs (admin_id, action, user_id, timestamp) VALUES (?, 'Xóa tài khoản', ?, NOW())";
            $log_stmt = $conn->prepare($log_sql);
            $log_stmt->bind_param('ii', $_SESSION['user_id'], $delete_id);
            $log_stmt->execute();
            $log_stmt->close();
        }
        $stmt->close();
        header('Location: admin_dashboard.php');
        exit;
    }
}

// Xử lý đổi vai trò
if (isset($_GET['toggle_role']) && is_numeric($_GET['toggle_role'])) {
    $toggle_id = intval($_GET['toggle_role']);
    $sql = "SELECT role FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $toggle_id);
    $stmt->execute();
    $stmt->bind_result($current_role);
    $stmt->fetch();
    $stmt->close();
    if ($current_role === 'user') {
        $new_role = 'doctor';
    } elseif ($current_role === 'doctor') {
        $new_role = 'user';
    } else {
        $new_role = $current_role;
    }
    if ($current_role !== 'admin') {
        $sql = "UPDATE users SET role = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $new_role, $toggle_id);
        if ($stmt->execute()) {
            $log_sql = "INSERT INTO admin_logs (admin_id, action, user_id, timestamp) VALUES (?, ?, ?, NOW())";
            $log_stmt = $conn->prepare($log_sql);
            $action = "Chuyển vai trò từ $current_role sang $new_role";
            $log_stmt->bind_param('isi', $_SESSION['user_id'], $action, $toggle_id);
            $log_stmt->execute();
            $log_stmt->close();
        }
        $stmt->close();
        header('Location: admin_dashboard.php');
        exit;
    }
}

// Xử lý tìm kiếm và lọc
$search = isset($_GET['search']) ? $_GET['search'] : '';
$role_filter = isset($_GET['role_filter']) ? $_GET['role_filter'] : '';
$where_clause = '';
if (!empty($search)) {
    $where_clause .= " AND (name LIKE '%$search%' OR email LIKE '%$search%')";
}
if (!empty($role_filter)) {
    $where_clause .= " AND role = '$role_filter'";
}

// Phân trang
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$per_page = 10;
$offset = ($page - 1) * $per_page;
$sql = "SELECT COUNT(*) as total FROM users WHERE 1=1 $where_clause";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_users = $row['total'];
$total_pages = ceil($total_users / $per_page);

// Lấy danh sách user
$sql = "SELECT id, name, email, role, status, created_at FROM users WHERE 1=1 $where_clause ORDER BY id DESC LIMIT $offset, $per_page";
$result = $conn->query($sql);
$users = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản người dùng - Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0066cc;
            --secondary-color: #00a8cc;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --light-blue: #f0f8ff;
            --soft-gray: #f8f9fa;
            --border-color: #e9ecef;
            --text-primary: #2c3e50;
            --text-secondary: #6c757d;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            color: var(--text-primary);
        }

        .container {
            max-width: 1400px;
            padding: 2rem;
        }

        .page-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .page-header h2 {
            margin: 0;
            font-size: 2rem;
            font-weight: 600;
        }

        .search-filter-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .form-control, .form-select {
            border: 2px solid var(--border-color);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(0, 102, 204, 0.15);
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            box-shadow: 0 4px 15px rgba(0, 102, 204, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 102, 204, 0.3);
        }

        .add-user-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 1.5rem;
        }

        .card-header h5 {
            margin: 0;
            font-weight: 600;
        }

        .table-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .table {
            margin: 0;
        }

        .table thead th {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border: none;
            padding: 1rem;
            font-weight: 600;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: var(--light-blue);
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-active {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
        }

        .status-locked {
            background: linear-gradient(135deg, #f8d7da 0%, #f1b0b7 100%);
            color: #721c24;
        }

        .btn-sm {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
            border-radius: 8px;
        }

        .btn-info {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            border: none;
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, var(--warning-color) 0%, #e0a800 100%);
            border: none;
            color: #212529;
        }

        .btn-danger {
            background: linear-gradient(135deg, var(--danger-color) 0%, #c82333 100%);
            border: none;
            color: white;
        }

        .btn-outline-secondary {
            border: 2px solid var(--text-secondary);
            color: var(--text-secondary);
            background: transparent;
        }

        .btn-outline-secondary:hover {
            background: var(--text-secondary);
            color: white;
        }

        .btn-outline-warning {
            border: 2px solid var(--warning-color);
            color: var(--warning-color);
            background: transparent;
        }

        .btn-outline-warning:hover {
            background: var(--warning-color);
            color: #212529;
        }

        .pagination {
            margin-top: 2rem;
        }

        .page-link {
            border: 2px solid var(--border-color);
            color: var(--primary-color);
            border-radius: 10px !important;
            margin: 0 0.2rem;
            padding: 0.7rem 1rem;
            font-weight: 500;
        }

        .page-link:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border-color: var(--primary-color);
        }

        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            border-radius: 15px 15px 0 0;
        }

        .back-button {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .back-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .page-header {
                padding: 1.5rem;
            }
            
            .page-header h2 {
                font-size: 1.5rem;
            }
            
            .table-responsive {
                border-radius: 15px;
            }
        }

        .add-user-form .btn-success {
            background: linear-gradient(135deg, var(--success-color) 0%, #20c997 100%);
            border: none;
            color: white;
            white-space: nowrap;
            min-width: 80px;
            padding: 0.75rem 1rem;
        }

        .add-user-form .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }

        .add-user-form .form-control {
            height: 45px;
        }

        .add-user-form .form-select {
            height: 45px;
        }
    </style>

</head>
<body>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="/index.php" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>Quay lại trang chủ
            </a>
            <h2 class="mb-0"><i class="fas fa-users-cog me-2"></i>Quản lý tài khoản người dùng</h2>
            <div style="width: 120px;"></div> <!-- Spacer để cân bằng layout -->
        </div>
        
        <!-- Form tìm kiếm và lọc -->
        <form method="get" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo tên hoặc email" value="<?php echo htmlspecialchars($search); ?>">
                </div>
                <div class="col-md-4">
                    <select name="role_filter" class="form-control">
                        <option value="">Tất cả vai trò</option>
                        <option value="user" <?php echo $role_filter === 'user' ? 'selected' : ''; ?>>User</option>
                        <option value="doctor" <?php echo $role_filter === 'doctor' ? 'selected' : ''; ?>>Doctor</option>
                        <option value="admin" <?php echo $role_filter === 'admin' ? 'selected' : ''; ?>>Admin</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                </div>
            </div>
        </form>
        
        <!-- Form thêm tài khoản mới -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Thêm tài khoản mới</h5>
            </div>
            <div class="card-body">
                <form method="post" class="add-user-form">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                            <input type="text" name="name" class="form-control" placeholder="Họ tên" required>
                        </div>
                        <div class="col-md-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="col-md-3">
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                        </div>
                        <div class="col-md-2">
                            <select name="role" class="form-select">
                                <option value="user">User</option>
                                <option value="doctor">Doctor</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" name="add_user" class="btn btn-success w-100">Thêm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Bảng danh sách user -->
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): ?>
                    <tr>
                        <td><?php echo $u['id']; ?></td>
                        <td><?php echo htmlspecialchars($u['name']); ?></td>
                        <td><?php echo htmlspecialchars($u['email']); ?></td>
                        <td>
                            <span class="badge bg-<?php 
                                echo $u['role'] === 'admin' ? 'danger' : 
                                    ($u['role'] === 'doctor' ? 'primary' : 'secondary'); 
                            ?>">
                                <?php 
                                    echo $u['role'] === 'admin' ? 'Quản trị viên' : 
                                        ($u['role'] === 'doctor' ? 'Bác sĩ' : 'Người dùng'); 
                                ?>
                            </span>
                            <?php if ($u['role'] !== 'admin'): ?>
                                <a href="?toggle_role=<?php echo $u['id']; ?>" class="btn btn-sm btn-outline-secondary ms-2">
                                    Chuyển <?php echo $u['role'] === 'user' ? 'Bác sĩ' : 'Người dùng'; ?>
                                </a>
                            <?php endif; ?>
                        </td>
                        <td>
                            <span class="status-badge status-<?php echo $u['status']; ?>">
                                <?php echo $u['status'] === 'active' ? 'Đang hoạt động' : 'Đã khóa'; ?>
                            </span>
                            <?php if ($u['role'] !== 'admin'): ?>
                                <a href="?toggle_status=<?php echo $u['id']; ?>" class="btn btn-sm btn-outline-warning ms-2">
                                    <?php echo $u['status'] === 'active' ? 'Khóa' : 'Mở khóa'; ?>
                                </a>
                            <?php endif; ?>
                        </td>
                        <td><?php echo date('d/m/Y', strtotime($u['created_at'])); ?></td>
                        <td>
                            <button class="btn btn-sm btn-info" onclick="alert('Chi tiết tài khoản: <?php echo htmlspecialchars($u['name']); ?>')">Chi tiết</button>
                            <?php if ($u['role'] !== 'admin'): ?>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $u['id']; ?>">Sửa</button>
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="reset_id" value="<?php echo $u['id']; ?>">
                                    <button type="submit" name="reset_password" class="btn btn-sm btn-secondary" onclick="return confirm('Reset mật khẩu về 123456?');">Reset MK</button>
                                </form>
                                <a href="?delete=<?php echo $u['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?');"><i class="fas fa-trash"></i> Xóa</a>
                            <?php else: ?>
                                <span class="text-muted">Không thể xóa</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    
                    <!-- Modal chỉnh sửa thông tin -->
                    <div class="modal fade" id="editModal<?php echo $u['id']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Chỉnh sửa thông tin tài khoản</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $u['id']; ?>">
                                        <div class="mb-3">
                                            <label class="form-label">Họ tên</label>
                                            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($u['name']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($u['email']); ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Vai trò</label>
                                            <select name="role" class="form-control">
                                                <option value="user" <?php echo $u['role'] === 'user' ? 'selected' : ''; ?>>User</option>
                                                <option value="doctor" <?php echo $u['role'] === 'doctor' ? 'selected' : ''; ?>>Doctor</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="edit_user" class="btn btn-primary">Lưu thay đổi</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <!-- Phân trang -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php if ($page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $page - 1; ?>&search=<?php echo urlencode($search); ?>&role_filter=<?php echo urlencode($role_filter); ?>">Previous</a>
                    </li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php echo $i === $page ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>&role_filter=<?php echo urlencode($role_filter); ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <?php if ($page < $total_pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $page + 1; ?>&search=<?php echo urlencode($search); ?>&role_filter=<?php echo urlencode($role_filter); ?>">Next</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html> 