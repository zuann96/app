<?php

namespace models;

require_once(__DIR__ . "/../database/DatabaseConfig.php");
require_once(__DIR__ . "/../utils/Logger.php");

use utils\Logger;
use database\DatabaseConfig;
use mysqli;
use Exception;



class Price {
    private $id;
    private $country_id;
    private $year;
    private $medicine_id;
    private $price;

    // Constructor
    public function __construct(int $country_id, int $year, int $medicine_id, float $price, ?int $id = null) {
        $this->id = $id;
        $this->country_id = $country_id;
        $this->year = $year;
        $this->medicine_id = $medicine_id;
        $this->price = $price;
    }

    // Getter para ID
    public function getId() {
        return $this->id;
    }

    // Setter para ID
    public function setId(int $id) {
        $this->id = $id;
    }

    // Getter para Country
    public function getCountry() {
        return $this->country;
    }

    // Setter para Country
    public function setCountry(string $country) {
        $this->country = $country;
    }

    // Getter para Year
    public function getYear() {
        return $this->year;
    }

    // Setter para Year
    public function setYear(int $year) {
        $this->year = $year;
    }

    // Getter para Medicine
    public function getMedicine() {
        return $this->medicine;
    }

    // Setter para Medicine
    public function setMedicine(string $medicine) {
        $this->medicine = $medicine;
    }

    // Getter para Price
    public function getPrice() {
        return $this->price;
    }

    // Setter para Price
    public function setPrice(float $price) {
        $this->price = $price;
    }

    public static function getPriceAverageEvolutionByCountry($country_id = 0){
        try {
            $priceAverageData = [];
            $bind_param = false;
            $where = "";

            $conn = DatabaseConfig::getResourcesReader();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);
                             
            if($country_id != 0){
                $where = " WHERE COUNTRY_ID = ? ";
                $bind_param = true;
            }

            if (!$conn->connect_errno) {
                $query = "SELECT P.YEAR, C.NAME, ROUND(AVG(P.PRICE),2) AS AVERAGE_PRICE FROM app_db.PRICES P                
                INNER JOIN app_db.COUNTRIES C ON C.ID = P.COUNTRY_ID                 
                {$where}
                GROUP BY P.YEAR, P.COUNTRY_ID  
                ORDER BY P.COUNTRY_ID ASC";
                $stmt = $conn->prepare($query);

                if ($stmt !== false) {
                    if($bind_param)$stmt->bind_param("i", $country_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) $priceAverageData[] = $row;
                    }else throw new Exception(__METHOD__ . "price no encontrado: ");                    
                } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);
            } else throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);       
            
            return $priceAverageData;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }

    }

    public static function isPriceExists(int $country_id, int $year, int $medicine_id): bool {
        try {
        
            $conn = DatabaseConfig::getResourcesReader();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);

            if (!$conn->connect_errno) {
                $query = "SELECT COUNT(*) FROM app_db.PRICES WHERE COUNTRY_ID = ? AND YEAR = ? AND MEDICINE_ID = ? LIMIT 1";
                $stmt = $conn->prepare($query);

                if ($stmt !== false) {
                    $stmt->bind_param("sis", $country, $year, $medicine);
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
        }
    }

    public static function getPriceById(int $priceId) {
        try {

            
                $conn = DatabaseConfig::getResourcesReader();
                if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);
           
                $query = "SELECT * FROM app_db.PRICES WHERE ID = ? LIMIT 1";
                $stmt = $conn->prepare($query);

                if ($stmt !== false) {
                    $stmt->bind_param("i", $priceId);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        return new Price($row['COUNTRY_ID'], $row['YEAR'], $row['MEDICINE_ID'], $row['PRICE'], $row['ID']);
                    } else throw new Exception(__METHOD__ . " price no encontrado: ");
                        
                } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);
                                
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }

    public static function insertPrice(Price $price) {
        try {
        
            $conn = DatabaseConfig::getResourcesUpdater();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);

            if (!$conn->connect_errno) {
                $query = "INSERT INTO app_db.PRICES (COUNTRY_ID, YEAR, MEDICINE_ID, PRICE) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($query);

                if ($stmt !== false) {
                    $stmt->bind_param("siss", $price->country_id, $price->year, $price->medicine_id, $price->price);
                    $stmt->execute();
                    $affectedRows = $stmt->affected_rows;

                    if ($affectedRows > 0) {
                        $price->id = $stmt->insert_id;
                        return true;
                    } else throw new Exception(__METHOD__ . " error precio no insertado.");

                } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);                
            } else throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);

        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }

    public static function updatePrice(Price $price) {
        try {
           
            $conn = DatabaseConfig::getResourcesUpdater();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);
                    
            $query = "UPDATE app_db.PRICES SET COUNTRY_ID = ?, YEAR = ?, MEDICINE_ID = ?, PRICE = ? WHERE ID = ?";
            $stmt = $conn->prepare($query);

            if ($stmt !== false) {
                $stmt->bind_param("sissi", $price->country_id, $price->year, $price->medicine_id, $price->price, $price->id);
                $stmt->execute();
                $affectedRows = $stmt->affected_rows;

                return $affectedRows > 0;
            } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);


        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }

    public static function deletePrice(Price $price) {
        try {

            $conn = DatabaseConfig::getResourcesUpdater();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);

            $query = "DELETE FROM app_db.PRICES WHERE ID = ?";
            $stmt = $conn->prepare($query);

            if ($stmt !== false) {
                $stmt->bind_param("i", $price->id);
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
