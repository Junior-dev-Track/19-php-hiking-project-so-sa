<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}

require __DIR__ . '/../../config/database.php';
$pdo = \Config\Database::getInstance();
$id = $_GET['id'];
$sql = "SELECT * FROM hikes WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$hike = $stmt->fetch();
if ($hike && $hike['user_id'] !== $_SESSION['user_id']) {
    header('Location: /src/views/HikeView.php');
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
    <form action="/src/controllers/editHikeProcess.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($hike['id']) ?>">
        <input type="text" name="hike_name" value="<?= htmlspecialchars($hike['name']) ?>" required>
        <input type="text" name="distance" value="<?= htmlspecialchars($hike['distance']) ?>" required>
        <input type="text" name="duration" value="<?= htmlspecialchars($hike['duration']) ?>" required>
        <input type="text" name="elevation_gain" value="<?= htmlspecialchars($hike['elevation_gain']) ?>" required>
        <textarea name="description" required><?= htmlspecialchars($hike['description']) ?></textarea>
        <input type="text" name="tag_id" value="<?= htmlspecialchars($hike['tag_id']) ?>" required>
        <button type="submit">Update Hike</button>
    </form>
</body>
</html>
