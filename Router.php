<?php
class Router {
    private $routes = [];

    public function add($route, $handler) {
        $this->routes[$route] = $handler;
    }

    public function dispatch($url) {
        if (array_key_exists($url, $this->routes)) {
            $handler = $this->routes[$url];
            list($controller, $action) = explode('@', $handler);
            require_once __DIR__ . "/src/Controllers/$controller.php";
            $controller = new $controller;
            $controller->$action();
        } else {
            echo "404 Not Found";
        }
    }
}
?>
