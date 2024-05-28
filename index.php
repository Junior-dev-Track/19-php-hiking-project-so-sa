<?php
require_once 'vendor/autoload.php';
require_once 'config/database.php';

// Inclure le header en haut du fichier pour qu'il soit affiché en premier
include('header.php');

$router = new \App\Router();
$router->handleRequest($_SERVER['REQUEST_URI']);
?>

