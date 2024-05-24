<?php
namespace App;

require_once 'src/controllers/HikeController.php';

class Router {
    public function handleRequest($uri) {
        $path = trim($uri, '/');
        if ($path == 'about') {
            $controller = new Controllers\HikeController();
            $controller->about();
        } else {
            $controller = new Controllers\HikeController();
            $controller->list();
        }
    }
}
