<?php
require_once("Router.php");

// Crear una instancia del enrutador
$router = new Router();

// Agregar las rutas y controladores correspondientes
$router->addRoute("/home", "HomeController@index");
$router->addRoute("/", "HomeController@index");
$router->addRoute("/sales", "SalesController@index");
$router->addRoute("/upload", "UploadController@index");

// Obtener la ruta solicitada
$requestUri = $_SERVER["REQUEST_URI"];
// Ejecutar el enrutador
$router->dispatch($requestUri);

?>