<?php

class Router {
    private $routes = [];

    public function addRoute($pattern, $controller, $method) {
        $this->routes[$pattern] = ['controller' => $controller, 'method' => $method];
    }

    public function dispatch($url) {
        foreach ($this->routes as $pattern => $route) {
            if (preg_match($pattern, $url, $matches)) {
                $controllerName = $route['controller'];
                $methodName = $route['method'];
                $controller = new $controllerName();
                return $controller->$methodName();
            }
        }
        // Si aucune route ne correspond, on peut gérer l'erreur ici
        echo "404 Not Found";
    }
}
