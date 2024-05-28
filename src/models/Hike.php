<?php
namespace Models;

use PDO;
use Config\Database;

class Hike {
    public static function getAllHikes() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT id, name, distance, duration, elevation_gain, created_at FROM hikes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getHikeById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM hikes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getHikesByTag($tag) {
        $db = Database::getInstance();
        $stmt = $db->prepare("
            SELECT hikes.id, hikes.name, hikes.distance, hikes.duration, hikes.elevation_gain, hikes.created_at
            FROM hikes
            JOIN hikes_tag ON hikes.id = hikes_tag.hike_id
            JOIN tags ON hikes_tag.tag_id = tags.id
            WHERE tags.name = ?
        ");
        $stmt->execute([$tag]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
