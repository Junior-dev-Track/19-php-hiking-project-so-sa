<?php
require_once 'vendor/autoload.php';
require_once 'config/database.php';

$router = new \App\Router();
$router->handleRequest($_SERVER['REQUEST_URI']);
