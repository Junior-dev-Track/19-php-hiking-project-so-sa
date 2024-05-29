<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Hike</title>
    <link rel="stylesheet" href="hikeView.css">
</head>
<body>
    <h1>Do you really want to delete this hike?</h1>
    <form action="deleteHikeProcess.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <button type="submit">Yes, delete it</button>
        <button type="button" onclick="location.href='HikeView.php'">No, go back</button>
    </form>
</body>
</html>
