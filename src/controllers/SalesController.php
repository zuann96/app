<?php

require_once(__DIR__ . "/../models/Medicine.php");
require_once(__DIR__ . "/../models/Purchases.php");

use models\Medicine;
use models\Purchases;

// Controlador para la página de inicio
class SalesController
{

    public function ajaxGetSalesByYear(int $year) {

        
        $salesByYear = Medicine::getSalesByYear(2023);
        
        
        echo json_encode($salesByYear);
    }

    // Método para mostrar la página de inicio
    public function index(){
    
        // Lógica adicional para preparar los datos necesarios para la vista
        $title = $pageTitle = "Sales graphics";
        $currentPage = "sales";       
    
        $availableYears = Purchases::getPurchaseYears();


        // Incluir la vista
        require_once "views/sales.php";
       
        
    }


}

// Crear una instancia del controlador
$controller = new SalesController();

// Verificar si se ha enviado la solicitud POST con los datos necesarios
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"])) {

    $action = $_POST["action"];


    switch($action){

        case 'ajaxGetSalesByYear':
                $year = (int)$_POST["year"];                
                $controller->ajaxGetSalesByYear($year);
            break;

    }



    

}


?>