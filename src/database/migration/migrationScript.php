<?php

require_once "models" . DIRECTORY_SEPARATOR . "Patient.php";
require_once "models" . DIRECTORY_SEPARATOR . "Medicine.php";
require_once "utils" . DIRECTORY_SEPARATOR. "Logger.php";
use models\Patient;
use models\Medicine;
use utils\Logger;

//MIGRACION PACIENTES
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



Logger::log("Iniciando migración...");
$startTime = microtime(true);
$csvNames = ["purchases.csv","prices.csv"];

$insertCounter = $errorCounter = 0;

foreach($csvNames as $fileName){
    $filePath = "database/migration/{$fileName}";
    $delimiter = ";";

    $purchaseData = csvToArray($filePath, $delimiter);
    $header = $purchaseData["header"];
    $data =  $purchaseData["data"];

    if (count($header) === count($data[0])) {
        foreach ($data as $row) {
            $combinedRow = array_combine($header, $row);
            
            // Acceder a los valores del encabezado y los datos en cada iteración
            foreach ($combinedRow as $headerKey => $value) {
                
                $result_aux = false;
                                
                switch($headerKey){

                    case 'Patient_id':
                        
                        if(Patient::isPatientExistsByCode($value))break;
                        $patient = new Patient($value);
                        $result = $patient->insertPatient($patient);
                        $result_aux = true;

                        break;
                    
                    case 'Medicine':

                        if(Medicine::isMedicineExistsByName($value))break;
                        $medicine = new Medicine($value);
                        $result = $medicine->insertMedicine($medicine);
                        $result_aux = true;                     
                        
                        break;

                }
                
                if($result_aux){
                    if($result)$insertCounter++;
                    else $errorCounter++;
                }
                
                

            }
            
        }
    } else Logger::log("El encabezado y los datos no tienen la misma cantidad de columnas.");
    

    $endTime = microtime(true);
    $totalTime = $endTime - $startTime;
    Logger::log("Migración completada. Tiempo total: " . $totalTime . " segundos / insertados {$insertCounter} / errores {$errorCounter}");

}


















?>