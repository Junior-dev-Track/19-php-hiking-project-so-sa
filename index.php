<?php
require 'Router.php';
require 'src/Controllers/AboutController.php'; // Assure-toi d'inclure tous tes contrôleurs ici

$router = new Router();

// Ajouter des routes ici
$router->addRoute('#^/$#', 'HomeController', 'index');
$router->addRoute('#^/about$#', 'AboutController', 'index');

// Récupérer l'URL demandée
$url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';

// Dispatcher l'URL
$router->dispatch($url);
