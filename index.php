<?php
require_once 'vendor/autoload.php';
require_once 'config/database.php';
include('src/views/header.php');
use Models\Hike;
use Controllers\HikeController;
use Src\Router;

try {
    $hike = new Hike();
    var_dump($hike); // Si l'objet Hike est correctement instancié, l'autoloading fonctionne
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

try {
    $controller = new HikeController();
    var_dump($controller); // Si l'objet HikeController est correctement instancié, l'autoloading fonctionne
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

$router = new Router();
$router->handleRequest($_SERVER['REQUEST_URI']);
?>
