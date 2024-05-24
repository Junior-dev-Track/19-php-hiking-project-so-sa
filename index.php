<?php
// Inclure le header
require_once __DIR__ . '/src/View/header.php';

require_once __DIR__ . '/Router.php';
require_once __DIR__ . '/src/Controllers/HomeController.php';
require_once __DIR__ . '/src/Controllers/HikeController.php';

// Initialiser le routeur
$router = new Router();

// Définir les routes
$router->add('/', 'HomeController@index');
$router->add('/about', 'HomeController@about');
$router->add('/hikes', 'HikeController@list');

// Démarrer le routage
$router->dispatch(isset($_GET['url']) ? $_GET['url'] : '/');

// Inclure le footer
require_once __DIR__ . '/src/View/footer.php';
?>
