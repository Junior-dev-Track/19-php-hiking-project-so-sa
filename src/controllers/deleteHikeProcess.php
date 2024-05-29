<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    require __DIR__ . '/../../config/database.php';
    $pdo = \Config\Database::getInstance();

    $sql = "DELETE FROM hikes WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    echo "The hike has been deleted successfully!";
    header('Location: ../views/HikeView.php');
    exit();
}
?>
