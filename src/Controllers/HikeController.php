<?php
require_once __DIR__ . '/../Model/db.php';

class HikeController {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function list() {
        $query = "SELECT id, name, distance, duration, elevation_gain, tags, image FROM hikes";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once __DIR__ . '/../View/hikes.php';
    }
}
?>
