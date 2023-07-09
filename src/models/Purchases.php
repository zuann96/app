<?php

namespace models;

require_once(__DIR__ . "/../database/DatabaseConfig.php");
require_once(__DIR__ . "/../utils/Logger.php");

use utils\Logger;
use database\DatabaseConfig;
use mysqli;
use Exception;

class Purchases {
    private $id;
    private $patient_id;
    private $country_id;
    private $medicine_id;
    private $quantity;
    private $purchase_date;

    // Constructor
    public function __construct(int $patient_id, int $country_id, int $medicine_id, int $quantity, $purchase_date, ?int $id = null) {
        $this->id = $id;
        $this->patient_id = $patient_id;
        $this->country_id = $country_id;
        $this->medicine_id = $medicine_id;
        $this->quantity = $quantity;
        $this->purchase_date = $purchase_date;
    }

    // Getter para ID
    public function getId() {
        return $this->id;
    }

    // Setter para ID
    public function setId(int $id) {
        $this->id = $id;
    }

    // Getter para Patient ID
    public function getPatientId() {
        return $this->patient_id;
    }

    // Setter para Patient ID
    public function setPatientId(int $patient_id) {
        $this->patient_id = $patient_id;
    }

    // Getter para Country ID
    public function getCountryId() {
        return $this->country_id;
    }

    // Setter para Country ID
    public function setCountryId(int $country_id) {
        $this->country_id = $country_id;
    }

    // Getter para Medicine ID
    public function getMedicineId() {
        return $this->medicine_id;
    }

    // Setter para Medicine ID
    public function setMedicineId(int $medicine_id) {
        $this->medicine_id = $medicine_id;
    }

    // Getter para Quantity
    public function getQuantity() {
        return $this->quantity;
    }

    // Setter para Quantity
    public function setQuantity(int $quantity) {
        $this->quantity = $quantity;
    }

    // Getter para Purchase Date
    public function getPurchaseDate() {
        return $this->purchase_date;
    }

    // Setter para Purchase Date
    public function setPurchaseDate($purchase_date) {
        $this->purchase_date = $purchase_date;
    }

    /**
     * Obtener los años de compras
     *
     * @return 
     * 
     */
    public static function getPurchaseYears(){
        try {
            $salesData = [];

            $conn = DatabaseConfig::getResourcesReader();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);
                    
            if (!$conn->connect_errno) {
                $query = "SELECT DISTINCT YEAR(PURCHASE_DATE) AS AÑO FROM app_db.PURCHASES ORDER BY AÑO DESC;";
                $stmt = $conn->prepare($query);

                if ($stmt !== false) {
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc())$salesData[] = $row["AÑO"];
                    }else throw new Exception(__METHOD__ . "año no encontrado: ");                    
                } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);
            } else throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);       
            
            return $salesData;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }


        
    }

    /**
     * Insertar compra
     *
     * @param Purchases $purchase
     * 
     * @return 
     * 
     */
    public static function insertPurchase(Purchases $purchase) {
        try {
           
            $conn = DatabaseConfig::getResourcesUpdater();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);

            $query = "INSERT INTO app_db.PURCHASES (PATIENT_ID, COUNTRY_ID, MEDICINE_ID, QUANTITY, PURCHASE_DATE) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);

            if ($stmt !== false) {
                $stmt->bind_param("iiiis", $purchase->patient_id, $purchase->country_id, $purchase->medicine_id, $purchase->quantity, $purchase->purchase_date);
                $stmt->execute();
                
                $affectedRows = $stmt->affected_rows;

                if ($affectedRows > 0) {
                    $purchase->id = $stmt->insert_id;
                    return true;
                } else throw new Exception(__METHOD__ . " No se pudo insertar la compra.");
                    
                

            } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);                
           
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }

    /**
     * Actualizar compra
     *
     * @param Purchases $purchase
     * 
     * @return
     * 
     */
    public static function updatePurchase(Purchases $purchase) {
        try {
        
            $conn = DatabaseConfig::getResourcesUpdater();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);
                    
            $query = "UPDATE app_db.PURCHASES SET PATIENT_ID = ?, COUNTRY_ID = ?, MEDICINE_ID = ?, QUANTITY = ?, PURCHASE_DATE = ? WHERE ID = ?";
            $stmt = $conn->prepare($query);

            if ($stmt !== false) {
                $stmt->bind_param("iiiisi", $purchase->patient_id, $purchase->country_id, $purchase->medicine_id, $purchase->quantity, $purchase->purchase_date, $purchase->id);
                $stmt->execute();
                $affectedRows = $stmt->affected_rows;

                return $affectedRows > 0;
            } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);

           
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }

    /**
     * Eliminar compra
     *
     * @param Purchases $purchase
     * 
     * @return 
     * 
     */
    public static function deletePurchase(Purchases $purchase) {
        try {
        
            $conn = DatabaseConfig::getResourcesUpdater();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);
                    
            $query = "DELETE FROM app_db.PURCHASES WHERE ID = ?";
            $stmt = $conn->prepare($query);

            if ($stmt !== false) {
                $stmt->bind_param("i", $purchase->id);
                $stmt->execute();
                $affectedRows = $stmt->affected_rows;
                

                return $affectedRows > 0;
            } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);            

        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }
}
