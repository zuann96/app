<?php

$migrationFile = "database" . DIRECTORY_SEPARATOR . "migration" . DIRECTORY_SEPARATOR . "migrationScript.php";


require($migrationFile);






// require_once 'models/Country.php';
// require_once 'database/DatabaseConfig.php';

// $country = new Country();

// require_once 'models/Patient.php';


// use models\Patient;

// $code = "asdasd14567";
// $patient = new Patient($code);
// $patient->insertPatient($patient);
// echo "<pre>";




// $host = getenv("MYSQL_HOST");
// $username = getenv("MYSQL_USER");
// $passwd = getenv("MYSQL_ROOT_PASSWORD");
// $dbname = getenv("MYSQL_DATABASE");


// var_dump(getenv(null));
// $con = new mysqli($dbname, $username, $passwd);

// // mysqli::__construct(
// //     string $host = ini_get("mysqli.default_host"),
// //     string $username = ini_get("mysqli.default_user"),
// //     string $passwd = ini_get("mysqli.default_pw"),
// //     string $dbname = "",
// //     int $port = ini_get("mysqli.default_port"),
// //     string $socket = ini_get("mysqli.default_socket")
// // )

//     // var_dump($host, $username, $passwd, $dbname);

// if($con)
// {   
//     var_dump(mysqli_ping($con));
//     var_dump($host, $username, $passwd, $dbname );
// }
 
?>
