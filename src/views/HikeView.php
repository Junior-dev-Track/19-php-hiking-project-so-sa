<?php
namespace Views;

require_once __DIR__ . '/../../config/config.php';  // Inclure le fichier de configuration global

class HikeView {
    public static function displayHikes($hikes) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        ob_start();  // Démarre la capture de sortie pour éviter les problèmes de headers multiples

        if (isset($_SESSION['user_id'])) {
            $headerFile = ROOT . '/src/views/headerAccount.php';
        } else {
            $headerFile = ROOT . '/src/views/header.php';
        }

        include $headerFile;
        ob_end_flush();  // Envoie la sortie capturée

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
                        <a href="/hike/<?= $hike['id'] ?>"><?= $hike['name'] ?></a> - 
                        Distance: <?= $hike['distance'] ?> km, 
                        Duration: <?= $hike['duration'] ?> hours, 
                        Elevation Gain: <?= $hike['elevation_gain'] ?> m
                        <?php if (isset($hike['tags']) && is_array($hike['tags'])): ?>
                            - Tags: 
                            <?php foreach ($hike['tags'] as $tag): ?>
                                <a href="/tag/<?= $tag ?>"><?= $tag ?></a> 
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </body>
        </html>
        <?php
    }

    public static function displayHikeDetails($hike) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        ob_start();  // Démarre la capture de sortie pour éviter les problèmes de headers multiples

        if (isset($_SESSION['user_id'])) {
            $headerFile = ROOT . '/src/views/headerAccount.php';
        } else {
            $headerFile = ROOT . '/src/views/header.php';
        }

        include $headerFile;
        ob_end_flush();  // Envoie la sortie capturée

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= $hike['name'] ?></title>
            <link rel="stylesheet" href="/public/css/hikeView.css">
        </head>
        <body>
            <h1><?= $hike['name'] ?></h1>
            <p>Distance: <?= $hike['distance'] ?> km</p>
            <p>Duration: <?= $hike['duration'] ?> hours</p>
            <p>Elevation Gain: <?= $hike['elevation_gain'] ?> m</p>
            <p>Description: <?= $hike['description'] ?></p>
            <p>Created by: <?= $hike['creator_name'] ?></p>
            <p>Tags: 
                <?php if (isset($hike['tags']) && is_array($hike['tags'])): ?>
                    <?= implode(", ", $hike['tags']) ?>
                <?php endif; ?>
            </p>
            <button onclick="window.location.href='/'">Back to the list</button>
        </body>
        </html>
        <?php
    }
}

