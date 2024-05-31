<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];

        require __DIR__ . '/../../config/database.php';
        $pdo = \Config\Database::getInstance();

        try {
            $sql = "DELETE FROM hikes WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);

            echo "The hike has been deleted successfully!";
            header('Location: http://127.0.0.1:8000');
            exit();
        } catch (PDOException $e) {
            echo "Error deleting hike: " . $e->getMessage();
        }
    } else {
        echo "ID is not set or empty.";
    }
} else {
    echo "Invalid request method.";
}
?>
