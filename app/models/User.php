class User {
private $db;

public function __construct() {
$this->db = Database::getInstance();
}

public function findByProviderId($provider_id) {
$stmt = $this->db->prepare("SELECT * FROM users WHERE provider_id = ?");
$stmt->execute([$provider_id]);
return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function create($data) {
$stmt = $this->db->prepare("INSERT INTO users (email, name, avatar, provider, provider_id) VALUES (?, ?, ?, ?, ?)");
return $stmt->execute([
$data['email'],
$data['name'],
$data['avatar'],
$data['provider'],
$data['provider_id'],
]);
}
}