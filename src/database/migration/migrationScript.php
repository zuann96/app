<?php


require_once ("migrationResources.php");






try{

    $parameter = "";
    if(isset($argv[1]))$parameter = $argv[1];
    
    $itsConnected = false;
    $maxTry = 10;
    $counterTry = 0;
    while(!$itsConnected){
        $itsConnected = DatabaseConfig::establishDatabaseConnection();
        $counterTry++;
        sleep(5);
        if($counterTry == $maxTry){
            Logger::log("Imposible connectar con la base de datos");
            exit();
        }else Logger::log("Intento {$counterTry} / {$maxTry} ");
        
    }


    //Primera y unica ejecucion migracion
    switch($parameter){

        case "m":
        
            $filePaths["prices.csv"] = ["database/migration/prices.csv"];
            $filePaths["purchases.csv"] = ["database/migration/purchases.csv"];
            $delimiter = ";";

            if(checkMigrationOkFile())Logger::log("Migracion completada anteriormente..");
            else migrationScript($parameter, $filePaths, $delimiter);

            break;

        default:


    }


    
    
}catch(Exception $e) {
    Logger::log(__METHOD__ . " error migracion: " . $e->getMessage());
}    




















?>