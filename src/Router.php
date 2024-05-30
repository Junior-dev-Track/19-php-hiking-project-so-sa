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
        } elseif (preg_match('/^\/hike\/edit\/(\d+)$/', $uri, $matches)) {
            $id = $matches[1];
            $path = __DIR__ . '/views/editHike.php';
            if (file_exists($path)) {
                include $path;
            } else {
                echo "File not found: $path";
            }
        } elseif (preg_match('/^\/hike\/delete\/(\d+)$/', $uri, $matches)) {
            $id = $matches[1];
            echo "DEBUG: ID received in Router: $id"; // Ajout de débogage
            $path = __DIR__ . '/views/deleteHike.php';
            if (file_exists($path)) {
                include $path;
            } else {
                echo "File not found: $path";
            }
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
