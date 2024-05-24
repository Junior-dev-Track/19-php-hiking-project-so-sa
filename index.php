<?php
require_once 'vendor/autoload.php';
require_once 'config/database.php';

// Test pour vérifier si l'autoloader fonctionne
use App\models\Hike;

try {
    $hike = new Hike();
    var_dump($hike); // Si l'objet Hike est correctement instancié, l'autoloading fonctionne
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

use App\controllers\HikeController;

try {
    $controller = new HikeController();
    var_dump($controller); // Si l'objet HikeController est correctement instancié, l'autoloading fonctionne
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

$router = new \App\Router();
$router->handleRequest($_SERVER['REQUEST_URI']);
