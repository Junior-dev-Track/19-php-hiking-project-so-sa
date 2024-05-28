<?php
namespace Src;

use Controllers\HikeController;
use Controllers\AuthController;

class Router {
    public function handleRequest($uri) {
        if ($uri == '/' || $uri == '/index.php') {
            $controller = new HikeController();
            $controller->listHikes();
        } elseif (preg_match('/^\/hike\/(\d+)$/', $uri, $matches)) {
            $controller = new HikeController();
            $controller->showHike($matches[1]);
        } elseif (preg_match('/^\/tag\/(.+)$/', $uri, $matches)) {
            $controller = new HikeController();
            $controller->listHikesByTag($matches[1]);
        } elseif ($uri == '/login') {
            $controller = new AuthController();
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $controller->login();
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $controller->login();
            }
        } elseif ($uri == '/register') {
            $controller = new AuthController();
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $controller->register();
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $controller->register();
            }
        } else {
            echo "404 Not Found";
        }
    }
}
?>

