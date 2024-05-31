<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $hike_name = $_POST['hike_name'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    $elevation_gain = $_POST['elevation_gain'];
    $description = $_POST['description'];
    $tag_id = $_POST['tag_id'];

    require __DIR__ . '/../../config/database.php';
    $pdo = \Config\Database::getInstance();
    
    $sql = "UPDATE hikes SET name = ?, distance = ?, duration = ?, elevation_gain = ?, description = ?, tag_id = ?, updated_at = NOW() WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$hike_name, $distance, $duration, $elevation_gain, $description, $tag_id, $id]);

    echo "The hike has been updated successfully at " . date("Y-m-d H:i:s");
    header('Location: http://127.0.0.1:8000');
    exit();
}
?>
