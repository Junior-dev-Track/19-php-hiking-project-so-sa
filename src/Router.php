<?php
namespace Src;

use Controllers\HikeController;

class Router {
    public function handleRequest($uri) {
        $controller = new HikeController();
        if ($uri == '/' || $uri == '/index.php') {
            $controller->listHikes();
        } elseif (preg_match('/^\/hike\/(\d+)$/', $uri, $matches)) {
            $controller->showHike($matches[1]);
        } elseif (preg_match('/^\/tag\/(.+)$/', $uri, $matches)) {
            $controller->listHikesByTag($matches[1]);
        } elseif ($uri == '/src/views/login.php') {
            include 'src/views/login.php';
        } elseif ($uri == '/src/views/register.php') {
            include 'src/views/register.php';
        } else {
            echo "404 Not Found";
        }
    }
}
?>
