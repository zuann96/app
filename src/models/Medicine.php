<?php

namespace models;

require_once(__DIR__ . "/../database/DatabaseConfig.php");
require_once(__DIR__ . "/../utils/Logger.php");

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

    public static function getSalesByYear(int $year){
        try {
            $salesData = [];

            $conn = DatabaseConfig::getResourcesReader();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);
                    
            if (!$conn->connect_errno) {
                $query = "SELECT M.NAME AS MEDICINE, SUM(P.QUANTITY) AS SOLDS, YEAR(P.PURCHASE_DATE) AS YEAR
                FROM app_db.PURCHASES P
                INNER JOIN app_db.MEDICINES M ON M.ID = P.MEDICINE_ID
                WHERE YEAR(P.PURCHASE_DATE) = ?
                GROUP BY MEDICINE_ID, YEAR(PURCHASE_DATE)  
                ORDER BY `SOLDS` DESC";
                $stmt = $conn->prepare($query);

                if ($stmt !== false) {
                    $stmt->bind_param("i", $year);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) $salesData[] = $row;
                    }else throw new Exception(__METHOD__ . "medicine no encontrado: ");                    
                } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);
            } else throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);       
            
            return $salesData;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }


    }
    
    
    public static function isMedicineExistsByName(string $medicineName): bool {
        try {
        
            $conn = DatabaseConfig::getResourcesReader();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);

            $query = "SELECT COUNT(*) FROM app_db.MEDICINES WHERE NAME = ? LIMIT 1";
            $stmt = $conn->prepare($query);

            if ($stmt !== false) {
                $stmt->bind_param("s", $medicineName);
                $stmt->execute();
                $stmt->bind_result($count);
                $stmt->fetch();
                $stmt->free_result();
                $stmt->close();

                return $count > 0;
            } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);
         

        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }
    
    public static function getMedicineById(int $medicineId) {        
        try {

            $conn = DatabaseConfig::getResourcesReader();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);
                    
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
                    } else throw new Exception(__METHOD__ . "medicine no encontrado: ");
                                            
                } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);

            } else throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);                
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }

    public static function getMedicineByName(string $name) {
        try {
            $conn = DatabaseConfig::getResourcesReader();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);
        
            $query = "SELECT * FROM app_db.MEDICINES WHERE NAME = ? LIMIT 1";
            $stmt = $conn->prepare($query);

            if ($stmt !== false) {
                $stmt->bind_param("s", $name);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    
                    $row = $result->fetch_assoc();
                    return new Medicine($row['NAME'],$row['ID']);

                } else throw new Exception(__METHOD__ . "medicine no encontrado: ");

            } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);
           
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }
    
    public static function insertMedicine(Medicine $medicine){   
        try {
        
            $conn = DatabaseConfig::getResourcesUpdater();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);

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

        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }
}
