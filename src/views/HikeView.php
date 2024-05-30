<?php
namespace Views;

require_once __DIR__ . '/../../config/database.php';  // Inclure le fichier de configuration global

class HikeView {
    public static function getHikes() {
        $pdo = \Config\Database::getInstance();
        $sql = "SELECT * FROM hikes";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function displayHikes($hikes) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Inclusion unique du header
        if (isset($_SESSION['user_id'])) {
            include_once __DIR__ . '/headerAccount.php';
        } else {
            include_once __DIR__ . '/header.php';
        }

        // Affichage de la liste des hikes
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>List of Hikes</title>
            <link rel="stylesheet" href="/public/css/hikeView.css">
        </head>
        <body>
            <h1>List of Hikes</h1>
            <ul>
                <?php foreach ($hikes as $hike): ?>
                    <li>
                        <a href="/hike/<?= htmlspecialchars($hike['id']) ?>"><?= htmlspecialchars($hike['name']) ?></a> - 
                        Distance: <?= htmlspecialchars($hike['distance']) ?> km, 
                        Duration: <?= htmlspecialchars($hike['duration']) ?> hours, 
                        Elevation Gain: <?= htmlspecialchars($hike['elevation_gain']) ?> m
                        <?php if (isset($hike['tags']) && is_array($hike['tags'])): ?>
                            - Tags: 
                            <?php foreach ($hike['tags'] as $tag): ?>
                                <a href="/tag/<?= htmlspecialchars($tag) ?>"><?= htmlspecialchars($tag) ?></a> 
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <a href="/hike/edit/<?= htmlspecialchars($hike['id']) ?>">Edit</a> |
                        <a href="/hike/delete/<?= htmlspecialchars($hike['id']) ?>">Delete</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </body>
        </html>
        <?php
    }

    public static function displayHike($hike) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Inclusion unique du header
        if (isset($_SESSION['user_id'])) {
            include_once __DIR__ . '/headerAccount.php';
        } else {
            include_once __DIR__ . '/header.php';
        }

        // Affichage des détails d'une randonnée
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= htmlspecialchars($hike['name']) ?></title>
            <link rel="stylesheet" href="/public/css/hikeView.css">
        </head>
        <body>
            <h1><?= htmlspecialchars($hike['name']) ?></h1>
            <p>Distance: <?= htmlspecialchars($hike['distance']) ?> km</p>
            <p>Duration: <?= htmlspecialchars($hike['duration']) ?> hours</p>
            <p>Elevation Gain: <?= htmlspecialchars($hike['elevation_gain']) ?> m</p>
            <p>Description: <?= htmlspecialchars($hike['description']) ?></p>
            <?php if (isset($hike['tags']) && is_array($hike['tags'])): ?>
                <p>Tags: 
                    <?php foreach ($hike['tags'] as $tag): ?>
                        <a href="/tag/<?= htmlspecialchars($tag) ?>"><?= htmlspecialchars($tag) ?></a>
                    <?php endforeach; ?>
                </p>
            <?php endif; ?>
            <a href="/hike/edit/<?= htmlspecialchars($hike['id']) ?>">Edit</a> |
            <a href="/hike/delete/<?= htmlspecialchars($hike['id']) ?>">Delete</a>
        </body>
        </html>
        <?php
    }
}
?>
