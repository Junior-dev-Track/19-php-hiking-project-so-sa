<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/config/config.php';
require_once ROOT . '/vendor/autoload.php';
require_once ROOT . '/config/database.php';

use Src\Router;

$router = new Router();
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->handleRequest($uri);
?>
