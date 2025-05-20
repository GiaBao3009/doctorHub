<?php
class Database {
private $host = "localhost";
private $db_name = "doctorhub";
private $username = "root";
private $password = "";  // Mật khẩu mặc định của Laragon là trống
public $conn;
public function getConnection() {
$this->conn = null;
try {
$this->conn = new PDO(
"mysql:host=" . $this->host . ";dbname=" . $this->db_name,
$this->username,
$this->password,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $exception) {
echo "Lỗi kết nối: " . $exception->getMessage();
}
return $this->conn;
}
}