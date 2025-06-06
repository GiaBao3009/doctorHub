<?php
session_start();
// Turn off output buffering to prevent any output before JSON response
ob_start();
// Disable error display to prevent HTML errors in JSON response
error_reporting(E_ALL);
ini_set('display_errors', 0);

// Đảm bảo tất cả lỗi được bắt và trả về dưới dạng JSON
function shutdown_handler() {
    $error = error_get_last();
    if ($error !== null) {
        // Clear any output that might have been generated
        ob_clean();
        
        // Set correct header
        header('Content-Type: application/json');
        
        echo json_encode([
            'success' => false,
            'message' => 'PHP Error: ' . $error['message'],
            'file' => $error['file'],
            'line' => $error['line']
        ]);
        exit;
    }
}
register_shutdown_function('shutdown_handler');

// Custom error handler để bắt lỗi PHP và trả về JSON
function json_error_handler($errno, $errstr, $errfile, $errline) {
    ob_clean();
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'message' => 'PHP Error: ' . $errstr,
        'file' => $errfile,
        'line' => $errline
    ]);
    exit;
}
set_error_handler('json_error_handler', E_ERROR | E_PARSE | E_CORE_ERROR | E_COMPILE_ERROR);

// Đảm bảo header luôn được đặt đúng
header('Content-Type: application/json');

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
    $logFile = "$logDir/appointment_$date.log";
    $logMessage = "[$time][$type] $message" . PHP_EOL;
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

// Ghi log thông tin request
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];
$getParams = json_encode($_GET);
$postData = file_get_contents('php://input');

writeLog("Request: $requestMethod $requestUri", 'request');
writeLog("GET params: $getParams", 'request');
writeLog("Raw POST data: $postData", 'request');

// Xử lý CORS nếu cần
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Định nghĩa $logFile để dùng cho code bên dưới
$logFile = "$logDir/appointment_" . date('Y-m-d') . ".log";

try {
    // Kết nối database
    require_once __DIR__ . '/../../config/database.php';
    $db = new Database();
    $conn = $db->getConnection();

    if (!$conn) {
        writeLog("Không thể kết nối đến database", 'error');
        echo json_encode(['success' => false, 'message' => 'Không thể kết nối đến cơ sở dữ liệu']);
        exit;
    }

    // Kiểm tra bảng appointments tồn tại không
    $checkTableSql = "SHOW TABLES LIKE 'appointments'";
    $stmt = $conn->query($checkTableSql);
    $tableExists = ($stmt && $stmt->rowCount() > 0);

    if (!$tableExists) {
        writeLog("Bảng appointments không tồn tại", 'error');
        
        // Lấy danh sách bảng hiện có
        $showTablesSql = "SHOW TABLES";
        $tablesResult = $conn->query($showTablesSql);
        $tables = [];
        
        if ($tablesResult) {
            while ($row = $tablesResult->fetch(PDO::FETCH_COLUMN, 0)) {
                $tables[] = $row;
            }
        }
        
        writeLog("Các bảng có sẵn: " . implode(", ", $tables), 'error');
        echo json_encode(['success' => false, 'message' => 'Bảng appointments không tồn tại trong cơ sở dữ liệu']);
        exit;
    }

    // Kiểm tra cấu trúc bảng appointments
    $checkColumnsSql = "DESCRIBE appointments";
    $columnsResult = $conn->query($checkColumnsSql);
    $columns = [];

    if ($columnsResult) {
        while ($row = $columnsResult->fetch(PDO::FETCH_ASSOC)) {
            $columns[$row['Field']] = $row['Type'];
        }
        writeLog("Cấu trúc bảng appointments: " . json_encode($columns), 'info');
    } else {
        writeLog("Không thể lấy cấu trúc bảng appointments", 'error');
    }

    // Xử lý lấy chi tiết lịch hẹn
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['appointment_id'])) {
        $appointmentId = intval($_GET['appointment_id']);
        writeLog("Xử lý yêu cầu lấy chi tiết lịch hẹn ID: $appointmentId", 'info');
        
        // Xây dựng câu query dựa trên cấu trúc bảng thực tế
        $sql = "SELECT a.* ";
        
        // Kiểm tra xem có bảng users không
        $userCheck = $conn->query("SHOW TABLES LIKE 'users'");
        $hasUsersTable = ($userCheck && $userCheck->rowCount() > 0);
        if ($hasUsersTable) {
            $sql .= ", u.name as doctor_name ";
        }
        
        // Kiểm tra xem có bảng services không
        $serviceCheck = $conn->query("SHOW TABLES LIKE 'services'");
        $hasServicesTable = ($serviceCheck && $serviceCheck->rowCount() > 0);
        if ($hasServicesTable) {
            $sql .= ", s.name as service_name, s.price ";
        }
        
        $sql .= " FROM appointments a ";
        
        if ($hasUsersTable) {
            $sql .= " LEFT JOIN users u ON a.user_id = u.id ";
        }
        
        if ($hasServicesTable && isset($columns['service_id'])) {
            $sql .= " LEFT JOIN services s ON a.service_id = s.id ";
        }
        
        $sql .= " WHERE a.id = :appointment_id LIMIT 1";
        
        writeLog("SQL query: $sql", 'info');
        
        try {
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                throw new Exception("Lỗi chuẩn bị truy vấn: " . implode(" ", $conn->errorInfo()));
            }
            
            $stmt->bindParam(':appointment_id', $appointmentId, PDO::PARAM_INT);
            if (!$stmt->execute()) {
                throw new Exception("Lỗi thực thi truy vấn: " . implode(" ", $stmt->errorInfo()));
            }
            
            $appointment = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$appointment) {
                writeLog("Không tìm thấy lịch hẹn ID: $appointmentId", 'warning');
                echo json_encode(['success' => false, 'message' => 'Không tìm thấy lịch hẹn']);
                exit;
            }
            
            // Xử lý và định dạng dữ liệu
            if (isset($appointment['appointment_date'])) {
                $date = new DateTime($appointment['appointment_date']);
                $appointment['formatted_date'] = $date->format('d/m/Y');
            } elseif (isset($appointment['date'])) {
                $date = new DateTime($appointment['date']);
                $appointment['formatted_date'] = $date->format('d/m/Y');
            }
            
            if (isset($appointment['appointment_time'])) {
                $appointment['formatted_time'] = $appointment['appointment_time'];
            } elseif (isset($appointment['time'])) {
                $appointment['formatted_time'] = $appointment['time'];
            }
            
            // Xử lý patient_name nếu không có trong bảng
            if (!isset($appointment['patient_name']) && isset($appointment['notes'])) {
                // Thử trích xuất từ trường notes bằng regex
                if (preg_match('/Tên: ([^\n]+)/', $appointment['notes'], $matches)) {
                    $appointment['patient_name'] = $matches[1];
                }
            }
            
            // Đảm bảo trường status có giá trị
            if (!isset($appointment['status'])) {
                $appointment['status'] = 'pending';
            } else {
                // Chuẩn hóa giá trị status
                $validStatuses = ['pending', 'confirmed', 'completed', 'canceled', 'cancelled'];
                if (!in_array($appointment['status'], $validStatuses)) {
                    if (stripos($appointment['status'], 'confirm') !== false) {
                        $appointment['status'] = 'confirmed';
                    } elseif (stripos($appointment['status'], 'complet') !== false) {
                        $appointment['status'] = 'completed';
                    } elseif (stripos($appointment['status'], 'cancel') !== false) {
                        $appointment['status'] = 'canceled';
                    } else {
                        $appointment['status'] = 'pending';
                    }
                }
                
                // Normalize 'cancelled' to 'canceled' for consistency
                if ($appointment['status'] === 'cancelled') {
                    $appointment['status'] = 'canceled';
                }
            }
            
            writeLog("Lấy dữ liệu lịch hẹn thành công: " . json_encode($appointment), 'info');
            echo json_encode(['success' => true, 'data' => $appointment]);
            
        } catch (Exception $e) {
            writeLog("Lỗi khi lấy chi tiết lịch hẹn: " . $e->getMessage(), 'error');
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
        
        exit;
    }

    // Check if it's a POST request (update appointment status)
    else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get JSON data from request body
        $inputData = file_get_contents('php://input');
        writeLog("Raw input data: " . $inputData, 'info');
        
        $data = json_decode($inputData, true);
        
        // Log the received data
        writeLog("POST data parsed: " . json_encode($data, JSON_UNESCAPED_UNICODE), 'info');
        
        if (isset($data['appointment_id']) && isset($data['status'])) {
            $appointmentId = intval($data['appointment_id']);
            $status = $data['status'];
            
            // Validate status
            $validStatuses = ['pending', 'confirmed', 'completed', 'canceled', 'cancelled'];
            if (!in_array($status, $validStatuses)) {
                writeLog("Invalid status: $status", 'error');
                
                echo json_encode([
                    'success' => false,
                    'message' => 'Trạng thái không hợp lệ'
                ]);
                exit;
            }
            
            // We won't normalize here - we'll let the database enum check handle it
            
            try {
                // Check if table has status column
                if (!array_key_exists('status', $columns)) {
                    throw new Exception('status column does not exist in appointments table');
                }
                
                // Check valid values of status column
                $validValuesQuery = "SHOW COLUMNS FROM appointments LIKE 'status'";
                $validValuesResult = $conn->query($validValuesQuery);
                $validValuesRow = $validValuesResult->fetch(PDO::FETCH_ASSOC);
                
                if ($validValuesRow && strpos(strtolower($validValuesRow['Type']), 'enum') === 0) {
                    // Extract enum values
                    preg_match('/enum\((.*)\)/', $validValuesRow['Type'], $matches);
                    if (!empty($matches[1])) {
                        $enumValues = str_getcsv($matches[1], ',', "'");
                        writeLog("Valid enum values for status: " . implode(", ", $enumValues), 'info');
                        
                        // Check if status needs to be normalized according to enum values
                        if (!in_array($status, $enumValues)) {
                            $possibleMapping = [
                                'canceled' => ['cancelled', 'cancel'],
                                'completed' => ['complete'],
                                'confirmed' => ['confirm'],
                                'pending' => ['wait']
                            ];
                            
                            foreach ($possibleMapping as $actualStatus => $variants) {
                                if (in_array($status, $variants) && in_array($actualStatus, $enumValues)) {
                                    $originalStatus = $status;
                                    $status = $actualStatus;
                                    writeLog("Normalized status from '$originalStatus' to '$actualStatus'", 'info');
                                    break;
                                }
                            }
                            
                            // Check if status is valid after normalization attempt
                            if (!in_array($status, $enumValues)) {
                                throw new Exception("Status '$status' is not accepted in the database. Valid values: " . implode(", ", $enumValues));
                            }
                        }
                    }
                }
                
                // Update appointment status
                $query = "UPDATE appointments SET status = ? WHERE id = ?";
                $stmt = $conn->prepare($query);
                if (!$stmt) {
                    throw new Exception("Lỗi chuẩn bị truy vấn: " . implode(" ", $conn->errorInfo()));
                }
                
                $stmt->bindParam(1, $status, PDO::PARAM_STR);
                $stmt->bindParam(2, $appointmentId, PDO::PARAM_INT);
                $result = $stmt->execute();
                
                if ($result) {
                    // Log successful update
                    writeLog("Successfully updated appointment $appointmentId to status: $status", 'info');
                    
                    // Get status text for the response
                    $statusText = '';
                    switch ($status) {
                        case 'confirmed':
                            $statusText = 'xác nhận';
                            break;
                        case 'completed':
                            $statusText = 'hoàn thành';
                            break;
                        case 'canceled':
                            $statusText = 'hủy';
                            break;
                        default:
                            $statusText = 'cập nhật';
                    }
                    
                    echo json_encode([
                        'success' => true,
                        'message' => 'Đã ' . $statusText . ' lịch hẹn thành công!'
                    ]);
                } else {
                    // Log update failure
                    $errorInfo = $stmt->errorInfo();
                    $errorMsg = isset($errorInfo[2]) ? $errorInfo[2] : 'Unknown error';
                    writeLog("Failed to update appointment status. Error: $errorMsg", 'error');
                    
                    echo json_encode([
                        'success' => false,
                        'message' => 'Không thể cập nhật trạng thái lịch hẹn: ' . $errorMsg
                    ]);
                }
            } catch (Exception $e) {
                // Log error
                writeLog("Error updating appointment: " . $e->getMessage(), 'error');
                
                echo json_encode([
                    'success' => false,
                    'message' => 'Đã xảy ra lỗi khi cập nhật lịch hẹn: ' . $e->getMessage()
                ]);
            }
        } else {
            // Log missing data
            writeLog("Missing appointment_id or status in POST request", 'error');
            
            echo json_encode([
                'success' => false,
                'message' => 'Thiếu thông tin ID lịch hẹn hoặc trạng thái'
            ]);
        }
    } else {
        // Log unsupported method
        writeLog("Unsupported request method: " . $_SERVER['REQUEST_METHOD'], 'error');
        
        echo json_encode([
            'success' => false,
            'message' => 'Phương thức không được hỗ trợ'
        ]);
    }
} catch (Exception $e) {
    // Bắt tất cả các lỗi và trả về dưới dạng JSON
    writeLog("Critical error: " . $e->getMessage(), 'error');
    echo json_encode([
        'success' => false,
        'message' => 'Lỗi hệ thống: ' . $e->getMessage()
    ]);
} finally {
    // Đảm bảo đóng kết nối
    if (isset($conn)) {
        $conn = null;
    }
    
    // Xóa buffer và gửi phản hồi
    ob_end_flush();
} 