<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';
require_once 'config/database.php';
use Src\Router;

$router = new Router();
$router->handleRequest($_SERVER['REQUEST_URI']);
?>
