<?php

require_once(__DIR__ . "/../models/Medicine.php");
require_once(__DIR__ . "/../models/Purchases.php");
require_once(__DIR__ . "/../models/Price.php");
require_once(__DIR__ . "/../models/Country.php");

use models\Medicine;
use models\Purchases;
use models\Price;
use models\Country;


// Controlador para la página de inicio
class SalesController
{

    public function ajaxGetSalesByYear(int $year) {
        $salesByYear = Medicine::getSalesByYear($year);        
        echo json_encode($salesByYear);
    }

    public function ajaxgetPriceAverageEvolutionByCountry(String $countryName = ""){

        var_dump($countryName);
        if($countryName != ""){
            $country = Country::getCountryByName($countryName);
            var_dump($country);
            $country_id = $country->getId();
        }else $country_id = 0;

        $priceAverage = Price::getPriceAverageEvolutionByCountry($country_id);
        echo json_Encode($priceAverage);

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
            $year = intval($_POST["year"]);                
            $controller->ajaxGetSalesByYear($year);
            break;

        
        case 'ajaxgetPriceAverageEvolutionByCountry':
            $countryName = "";
            if (isset($_POST["country"]) && !empty($_POST["country"]))$countryName = strval($_POST["country"]);                            
            $controller->ajaxgetPriceAverageEvolutionByCountry($countryName);
            break;
              

    }



    

}


?>