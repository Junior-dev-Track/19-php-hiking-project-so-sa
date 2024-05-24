<?php
namespace App;

use App\Controllers\HikeController;

class Router {
    public function handleRequest($uri) {
        $path = trim($uri, '/');
        $pathParts = explode('/', $path);

        if ($pathParts[0] == 'about') {
            $controller = new HikeController();
            $controller->about();
        } elseif ($pathParts[0] == 'hike' && isset($pathParts[1])) {
            $controller = new HikeController();
            $controller->show($pathParts[1]);
        } else {
            $controller = new HikeController();
            $controller->list();
        }
    }
}
