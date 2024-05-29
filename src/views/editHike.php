<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require __DIR__ . '/../../config/database.php';
$id = $_GET['id'];
$pdo = \Config\Database::getInstance();
$sql = "SELECT * FROM hikes WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$hike = $stmt->fetch();
if ($hike['user_id'] !== $_SESSION['user_id']) {
    header('Location: HikeView.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Hike</title>
    <link rel="stylesheet" href="/public/css/hikeView.css">
</head>
<body>
    <h1>Edit Hike</h1>
    <form action="../controllers/editHikeProcess.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($hike['id']) ?>">
        <input type="text" name="hike_name" value="<?= htmlspecialchars($hike['name']) ?>" required>
        <input type="text" name="distance" value="<?= htmlspecialchars($hike['distance']) ?>" required>
        <input type="text" name="duration" value="<?= htmlspecialchars($hike['duration']) ?>" required>
        <input type="text" name="elevation_gain" value="<?= htmlspecialchars($hike['elevation_gain']) ?>" required>
        <textarea name="description" required><?= htmlspecialchars($hike['description']) ?></textarea>
        <input type="text" name="tag_
