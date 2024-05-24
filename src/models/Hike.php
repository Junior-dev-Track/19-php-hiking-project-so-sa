<?php
namespace App\Models;

require_once 'config/database.php';

class Hike {
    public function getAllHikes() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM hikes");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
