<?php

// Controlador para la página de inicio
class HomeController
{
    // Método para mostrar la página de inicio
    public function index()
    {
        // Lógica adicional para preparar los datos necesarios para la vista
        $title = $pageTitle = "Home";
        $currentPage = "home";
        $message = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
       
        // Incluir la vista
        require_once "public" . DIRECTORY_SEPARATOR. "views" . DIRECTORY_SEPARATOR. "home.php";
    }

    // Otros métodos del controlador para manejar otras páginas y acciones
    // ...
}


?>