<?php
namespace App\Models;

class Hike {
    public function getAllHikes() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM hikes");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getHikeById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM hikes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
