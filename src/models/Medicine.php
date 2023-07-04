<?php

namespace models;

require_once "database" . DIRECTORY_SEPARATOR. "DatabaseConfig.php";
require_once "utils" . DIRECTORY_SEPARATOR. "Logger.php";

use utils\Logger;
use database\DatabaseConfig;
use mysqli;
use Exception;

class Medicine {
    private $id;
    private $name;

    // Constructor
    public function __construct(string $name, ?int $id = null){
        $this->id = $id;
        $this->name = $name;
    }

    // Getter para ID
    public function getId() {
        return $this->id;
    }

    // Setter para ID
    public function setId(int $id) {
        $this->id = $id;
    }

    // Getter para Name
    public function getName() {
        return $this->name;
    }

    // Setter para Name
    public function setName(string $name) {
        $this->name = $name;
    }
    
    public static function isMedicineExistsByName(string $medicineName): bool {
        try {
            $env_variables = DatabaseConfig::getResourcesReader();
            $conn = new mysqli($env_variables["dbname"], $env_variables["username"], $env_variables["passwd"]);
    
            if (!$conn->connect_errno) {
                $query = "SELECT COUNT(*) FROM app_db.MEDICINES WHERE NAME = ? LIMIT 1";
                $stmt = $conn->prepare($query);
    
                if ($stmt !== false) {
                    $stmt->bind_param("s", $medicineName);
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
    

    public static function getMedicineById(int $medicineId) {        
        try {
            $env_variables = DatabaseConfig::getResourcesReader();
            $conn = new mysqli($env_variables["dbname"], $env_variables["username"], $env_variables["passwd"]);

            if (!$conn->connect_errno) {
                $query = "SELECT * FROM app_db.MEDICINES WHERE ID = ? LIMIT 1";
                $stmt = $conn->prepare($query);

                if ($stmt !== false) {
                    $stmt->bind_param("i", $medicineId);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        return new Medicine($row['ID'], $row['NAME']);
                    } else return false;
                                            
                } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);

            } else throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);                
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        } finally{
            if ($conn !== null) $conn->close(); 
        }
    }

    public static function getMedicineByName(string $name) {
        try {
            $env_variables = DatabaseConfig::getResourcesReader();
            $conn = new mysqli($env_variables["dbname"], $env_variables["username"], $env_variables["passwd"]);
    
            if (!$conn->connect_errno) {
                $query = "SELECT * FROM app_db.MEDICINES WHERE NAME = ? LIMIT 1";
                $stmt = $conn->prepare($query);
    
                if ($stmt !== false) {
                    $stmt->bind_param("s", $name);
                    $stmt->execute();
                    $result = $stmt->get_result();
    
                    if ($result->num_rows > 0) {
                        
                        $row = $result->fetch_assoc();
                        return new Medicine($row['NAME'],$row['ID']);

                    } else throw new Exception(__METHOD__ . "medicine no encontrado: " . $conn->error);

                } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);
            } else throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);

        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        } finally{
            if ($conn !== null) $conn->close(); 
        }
    }
    

    public static function insertMedicine(Medicine $medicine){   
        try {

            $env_variables = DatabaseConfig::getResourcesUpdater();
            $conn = new mysqli($env_variables["dbname"], $env_variables["username"], $env_variables["passwd"]);
    
            if (!$conn->connect_errno) {
                $query = "INSERT INTO app_db.MEDICINES (NAME) VALUES (?)";
                $stmt = $conn->prepare($query);
    
                if ($stmt !== false) {
                    $stmt->bind_param("s", $medicine->name);
                    $stmt->execute();
                    $affectedRows = $stmt->affected_rows;
                    
                    if ($affectedRows > 0) {
                        $medicine->id = $stmt->insert_id;
                        return true;
                        
                    } else throw new Exception( __METHOD__ . " No se pudo insertar el paciente en la base de datos.");
                    
                } else throw new Exception( __METHOD__ . " error en la consulta ");
            } else throw new Exception( __METHOD__ . "error de conexión a la base de datos: " . $conn->connect_error);
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        } finally{
            if ($conn !== null) $conn->close(); 
        }
    }
}
