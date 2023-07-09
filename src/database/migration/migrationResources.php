<?php
require_once ("models/Patient.php");
require_once ("models/Medicine.php");
require_once ("models/Country.php");
require_once ("models/Price.php");
require_once ("models/Purchases.php");
require_once ("utils/Logger.php");
require_once ("database/DatabaseConfig.php");

use models\Patient;
use models\Medicine;
use models\Country;
use models\Price;
use models\Purchases;
use utils\Logger;
use database\DatabaseConfig;


/**
 * Convierte csv a array
 *
 * @param string $filePath directorio fitxero
 * @param string $delimiter separador de valores
 * @param mixed '
 * 
 * @return array
 * 
 */
function csvToArray(string $filePath, string $delimiter = ','): array
{
    $data = [];
    $header = null;
    
    if (($handle = fopen($filePath, 'r')) !== false) {
        while (($row = fgetcsv($handle, 0, $delimiter)) !== false) {
            if (!$header) {
                $header = $row; // Guardar el encabezado
            } else {
                $data[] = array_combine($header, $row); // Combinar el encabezado con los datos
            }
        }
        fclose($handle);
    }
    
    return ['header' => $header, 'data' => $data];
}


/**
 * Crea un fitxero de control de migracion
 *
 * @return void
 * 
 */
function createMigrationOkFile() {
    $filename = 'migration_ok';

    if (!file_exists($filename)) {
        // Crea el archivo
        $handle = fopen($filename, 'w');
        fclose($handle);       
    } 
}

/**
 * Comprueva si existe el fitxero de migracion
 *
 * @return void
 * 
 */
function checkMigrationOkFile() {
    $filename = 'migration_ok';

    if (file_exists($filename))return true;
    else return false;    
    
}

/**
 * Convierte csv a array
 *
 * @param string $parameter parametro 
 * @param array $filePaths array de direccion de fitxeros
 * @param string $delimiter separador de valores
 * 
 * @return array
 * 
 */
function migrationScript($parameter = "", $filePaths = [], $delimiter = ";"){

    Logger::log("Iniciando migración...");    
    $startTime = microtime(true);

    $insertCounter = 0;
    foreach($filePaths as $fileName=>$filePath){
        if(is_array($filePath))$filePath = $filePath[0];
        $purchaseData = csvToArray($filePath, $delimiter);
        $header = $purchaseData["header"];
        $data =  $purchaseData["data"];

        if (count($header) === count($data[0])) {
            foreach ($data as $row) {
                $combinedRow = array_combine($header, $row);
                $totalElements = count($combinedRow);
                $iteration = 1;

                // Acceder a los valores del encabezado y los datos en cada iteración            
                foreach ($combinedRow as $headerKey => $value) {
                    $result = false;
                    $iteration++;

                    switch($headerKey){

                        case 'Patient_id':
                            
                            if(Patient::isPatientExistsByCode($value))break;
                            $patient = new Patient($value);
                            $result = $patient->insertPatient($patient);

                            break;
                        
                        case 'Medicine':

                            if(Medicine::isMedicineExistsByName($value))break;
                            $medicine = new Medicine($value);
                            $result = $medicine->insertMedicine($medicine);                 
                            
                            break;

                        case 'Country':

                            if(Country::isCountryExistsByName($value))break;
                            $country = new Country($value);
                            $result = $country->insertCountry($country);
                            
                            break;
                        

                    }

                    if ($iteration === $totalElements) {
                        switch($fileName){

                            case "purchases.csv":  

                                $patient = Patient::getPatientByCode($combinedRow["Patient_id"]);
                                $country = Country::getCountryByName($combinedRow["Country"]);
                                $medicine = Medicine::getMedicineByName($combinedRow["Medicine"]);  
                                $purchases = new Purchases($patient->getId(), $country->getId(), $medicine->getId(),$combinedRow["Quantity"],$combinedRow["Purchase_date"]);
                                $result = $purchases->insertPurchase($purchases);    

                                break;
        
                            
                            case "prices.csv":
                                                        
                                $country = Country::getCountryByName($combinedRow["Country"]);
                                $medicine = Medicine::getMedicineByName($combinedRow["Medicine"]);    
                                if(Price::isPriceExists($country->getId(), $combinedRow["Year"], $medicine->getId()))break;                 
                                $price = new Price($country->getId(), $combinedRow["Year"], $medicine->getId(), $combinedRow["Price"]);                                
                                $result = $price->insertPrice($price);
                                
                                break;
        
        
                        }
                    }
                    
                    if($result)$insertCounter++;
                
                }
                
            }
        } else Logger::log("El encabezado y los datos no tienen la misma cantidad de columnas.");
        
    }

    $endTime = microtime(true);
    $totalTime = $endTime - $startTime;
    Logger::log("Migración completada. Tiempo total: " . $totalTime . " segundos / insertados {$insertCounter} ");
    if($parameter == "m")createMigrationOkFile();

}

?>