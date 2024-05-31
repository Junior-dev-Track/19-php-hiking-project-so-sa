<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit();
}

// Utilisez l'ID reçu du routeur
$id = isset($id) ? $id : null;
if ($id === null) {
    echo "No ID provided.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Hike</title>
    <link rel="stylesheet" href="/public/css/formView.css">
</head>
<body>
    <h1>Do you really want to delete this hike?</h1>
    <form action="/src/controllers/deleteHikeProcess.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
        <button type="submit">Yes, delete it</button>
        <button type="button" onclick="window.location.href='http://127.0.0.1:8000'">No, go back</button>
    </form>
</body>
</html>
