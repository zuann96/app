<?php

// Controlador para la página de inicio
class SalesController
{
    // Método para mostrar la página de inicio
    public function index()
    {
        // Lógica adicional para preparar los datos necesarios para la vista
        $title = $pageTitle = "Sales graphics";
        $currentPage = "sales";
        
        $message = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
       
        

        // Incluir la vista
        require_once "public" . DIRECTORY_SEPARATOR. "views" . DIRECTORY_SEPARATOR. "sales.php";
    }

    // Otros métodos del controlador para manejar otras páginas y acciones
    // ...
}



?>