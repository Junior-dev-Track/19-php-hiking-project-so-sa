<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Hike</title>
    <link rel="stylesheet" href="/public/css/formView.css">
</head>
<body>
    <h1>Add a New Hike</h1>
    <form action="../controllers/addHikeProcess.php" method="POST">
        <input type="text" name="hike_name" required placeholder="Hike Name">
        <input type="text" name="distance" required placeholder="Distance (km)">
        <input type="text" name="duration" required placeholder="Duration (hours)">
        <input type="text" name="elevation_gain" required placeholder="Elevation Gain (m)">
        <textarea name="description" required placeholder="Description"></textarea>
        <input type="text" name="tag_id" required placeholder="Tag ID">
        <button type="submit">Add Hike</button>
    </form>
</body>
</html>
