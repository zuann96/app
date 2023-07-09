<?php

require_once ("controllers/HomeController.php");
require_once ("controllers/SalesController.php");
require_once ("controllers/UploadController.php");


class Router {
    private $routes = [];

    public function addRoute($route, $handler) {
        $this->routes[$route] = $handler;
    }

    public function dispatch($requestedRoute) {

        $route = strtok($requestedRoute, "?");
       
        if (array_key_exists($route, $this->routes)) {
            $handler = $this->routes[$route];
            $handlerParts = explode("@", $handler);
            $controllerName = $handlerParts[0];
            $methodName = $handlerParts[1];

            if (class_exists($controllerName)) {
                $controllerInstance = new $controllerName();

                if (method_exists($controllerInstance, $methodName)) {
                    $controllerInstance->$methodName();
                    return;
                }
            }
        }

        // // Ruta no encontrada
        // echo "404 - Not Found";
    }
}



?>