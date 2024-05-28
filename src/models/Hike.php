<?php
namespace Models;

use PDO;
use Config\Database;

class Hike {
    public static function getAllHikes() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT id, name, distance, duration, elevation_gain, created_at FROM hikes");
        $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // On ajoute des tags factices pour l'exemple
        foreach ($hikes as &$hike) {
            $hike['tags'] = ['Mountain', 'Forest']; // Ajouter des tags en dur pour chaque randonnée
        }

        return $hikes;
    }

    public static function getHikeById($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM hikes WHERE id = ?");
        $stmt->execute([$id]);
        $hike = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($hike) {
            $hike['tags'] = ['Mountain', 'Forest']; // Ajouter des tags en dur pour l'exemple
        }

        return $hike;
    }

    public static function getHikesByTag($tag) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT id, name, distance, duration, elevation_gain, created_at FROM hikes");
        $stmt->execute();
        $hikes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Filtrer les randonnées par tag
        $hikes = array_filter($hikes, function($hike) use ($tag) {
            return in_array($tag, ['Mountain', 'Forest']); // Vérifier si le tag est présent dans la liste de tags factices
        });

        // Ajouter les tags en dur pour chaque randonnée filtrée
        foreach ($hikes as &$hike) {
            $hike['tags'] = ['Mountain', 'Forest']; // Ajouter des tags en dur pour chaque randonnée
        }

        return $hikes;
    }
}
?>
