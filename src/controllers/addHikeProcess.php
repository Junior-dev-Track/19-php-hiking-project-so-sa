<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hike_name = $_POST['hike_name'];
    $distance = floatval($_POST['distance']);
    $duration = floatval($_POST['duration']);
    $elevation_gain = floatval($_POST['elevation_gain']);
    $description = $_POST['description'];
    $tag_id = intval($_POST['tag_id']);
    $timestamp = date('Y-m-d H:i:s');  // Current timestamp for both created_at and updated_at

    // Connexion à la base de données
    $configPath = realpath(__DIR__ . '/../../config/database.php');
    if ($configPath === false || !file_exists($configPath)) {
        die('Database configuration file not found.');
    }
    require $configPath;
    $pdo = \Config\Database::getInstance();

    // Insertion des données
    $sql = "INSERT INTO hikes (name, distance, duration, elevation_gain, description, tag_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$hike_name, $distance, $duration, $elevation_gain, $description, $tag_id, $timestamp, $timestamp]);

    echo "The hike has been added successfully!";
    header('Location: ../views/HikeView.php');
    exit();
}
?>
