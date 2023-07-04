<?php

namespace models;

require_once "database" . DIRECTORY_SEPARATOR. "DatabaseConfig.php";
require_once "utils" . DIRECTORY_SEPARATOR. "Logger.php";

use utils\Logger;
use database\DatabaseConfig;
use mysqli;
use Exception;

class Patient {
    private $id;
    private $code;

    // Constructor
    public function __construct(string $code, ?int $id = null){
        $this->id = $id;
        $this->code = $code;
    }

    // Getter para ID
    public function getId() {
        return $this->id;
    }

    // Setter para ID
    public function setId(int $id) {
        $this->id = $id;
    }

    // Getter para Code
    public function getCode() {
        return $this->code;
    }

    // Setter para Code
    public function setCode(string $code) {
        $this->code = $code;
    }
    

    public static function isPatientExistsByCode(string $code): bool {
        try {
            $env_variables = DatabaseConfig::getResourcesReader();
            $conn = new mysqli($env_variables["dbname"], $env_variables["username"], $env_variables["passwd"]);
    
            if (!$conn->connect_errno) {
                $query = "SELECT COUNT(*) FROM app_db.PATIENTS WHERE CODE = ? LIMIT 1";
                $stmt = $conn->prepare($query);
    
                if ($stmt !== false) {
                    $stmt->bind_param("s", $code);
                    $stmt->execute();
                    $stmt->bind_result($count);
                    $stmt->fetch();
                    $stmt->close();
                    
                    return $count > 0;
                } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);                
            } else throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);            
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        } finally{
            if ($conn !== null) $conn->close(); 
        }
    }
    


    public static function getPatientById(int $patientId) {        
        try {
            $env_variables = DatabaseConfig::getResourcesReader();
            $conn = new mysqli($env_variables["dbname"], $env_variables["username"], $env_variables["passwd"]);

            if (!$conn->connect_errno) {
                $query = "SELECT * FROM app_db.PATIENTS WHERE ID = ? LIMIT 1";
                $stmt = $conn->prepare($query);

                if ($stmt !== false) {
                    $stmt->bind_param("i", $patientId);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        return new Patient($row['ID'], $row['CODE']);
                    } else throw new Exception(__METHOD__ . " paciente no encontrado: " . $conn->error);    

                } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);                
            } else throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);     

        } catch(Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }finally{
            if ($conn !== null) $conn->close(); 
        }        
    }


    public static function insertPatient(Patient $patient){   
        try {

            $env_variables = DatabaseConfig::getResourcesUpdater();
            $conn = new mysqli($env_variables["dbname"], $env_variables["username"], $env_variables["passwd"]);
    
            if (!$conn->connect_errno) {
                $query = "INSERT INTO app_db.PATIENTS (CODE) VALUES (?)";
                $stmt = $conn->prepare($query);
    
                if ($stmt !== false) {
                    $stmt->bind_param("s", $patient->code);
                    $stmt->execute();
                    $affectedRows = $stmt->affected_rows;
                    
                    if ($affectedRows > 0) {
                        $patient->id = $stmt->insert_id;
                        return true;
                        
                    } else throw new Exception( __METHOD__ . " No se pudo insertar el paciente en la base de datos.");

                } else throw new Exception( __METHOD__ . " error en la consulta ");
            } else throw new Exception( __METHOD__ . "error de conexión a la base de datos: " . $conn->connect_error);
                
        } catch(Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }finally{
            if ($conn !== null) $conn->close(); 
        } 
    }
    


}
