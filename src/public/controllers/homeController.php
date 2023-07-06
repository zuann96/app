<?php

// Controlador para la página de inicio
class HomeController
{
    // Método para mostrar la página de inicio
    public function index()
    {
        // Lógica adicional para preparar los datos necesarios para la vista
        $title = "Welcome to My Website";
        $message = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";

        // Incluir la vista
        require_once 'php/views/home.php';
    }

    // Otros métodos del controlador para manejar otras páginas y acciones
    // ...
}

// Crear una instancia del controlador y llamar al método correspondiente según la acción solicitada
$controller = new HomeController();

// Ejemplo de llamada al método "index" para mostrar la página de inicio
$controller->index();
