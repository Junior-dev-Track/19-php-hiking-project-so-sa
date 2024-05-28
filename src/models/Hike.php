<?php
namespace Models;

use PDO;
use Config\Database;

class Hike {
    public static function getAllHikes() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT hikes.id, hikes.name, hikes.distance, hikes.duration, hikes.elevation_gain, hikes.created_at, tags.name as tag
                            FROM hikes
                            LEFT JOIN tags ON hikes.tag_id = tags.id");
        $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($hikes as &$hike) {
            $hike['tags'] = $hike['tag'] ? [$hike['tag']] : [];
        }

        return $hikes;
    }

    public static function getHikeById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT hikes.*, tags.name as tag
                              FROM hikes
                              LEFT JOIN tags ON hikes.tag_id = tags.id
                              WHERE hikes.id = ?");
        $stmt->execute([$id]);
        $hike = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($hike) {
            $hike['tags'] = $hike['tag'] ? [$hike['tag']] : [];
        }

        return $hike;
    }

    public static function getHikesByTag($tag) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT hikes.id, hikes.name, hikes.distance, hikes.duration, hikes.elevation_gain, hikes.created_at, tags.name as tag
                              FROM hikes
                              LEFT JOIN tags ON hikes.tag_id = tags.id
                              WHERE tags.name = ?");
        $stmt->execute([$tag]);
        $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($hikes as &$hike) {
            $hike['tags'] = $hike['tag'] ? [$hike['tag']] : [];
        }

        return $hikes;
    }
}
?>
