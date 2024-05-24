<?php
$host = '188.166.24.55';
$db = 'hamilton-9-so&sam';
$user = 'hamilton-9-so&sam';
$pass = 'n5g6ijcUQRMDEeDv';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
