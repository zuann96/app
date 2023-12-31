<?php
namespace models;

require_once(__DIR__ . "/../database/DatabaseConfig.php");
require_once(__DIR__ . "/../utils/Logger.php");

use utils\Logger;
use database\DatabaseConfig;
use mysqli;
use Exception;


class Country {
    private $id;
    private $name;

    // Constructor
    public function __construct(String $name, ?int $id = null){
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
    public function setName(String $name) {
        $this->name = $name;
    }

    /**
     * Obtencion de todos los paises disponibles
     *
     * @return void
     * 
     */
    public static function getAllCountries(){
        try {
            $countryData = [];

            $conn = DatabaseConfig::getResourcesReader();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);
                    
            if (!$conn->connect_errno) {
                $query = "SELECT * FROM app_db.COUNTRIES ORDER BY COUNTRIES.ID ASC";                
                $stmt = $conn->prepare($query);
                if ($stmt !== false) {
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) $countryData[] = $row;
                    }else throw new Exception(__METHOD__ . "paises no encontrados: ");                    
                } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);
            } else throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);       
            
            return $countryData;
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }

    }

    /**
     * Comprovación existencia de pais por nombre
     *
     * @param string $countryName
     * 
     * @return bool
     * 
     */
    public static function isCountryExistsByName(string $countryName): bool {
        try {
            
            $conn = DatabaseConfig::getResourcesReader();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);
                    
            $query = "SELECT COUNT(*) FROM app_db.COUNTRIES WHERE NAME = ? LIMIT 1";
            $stmt =  $conn->prepare($query);

            if ($stmt !== false) {
                $stmt->bind_param("s", $countryName);
                $stmt->execute();
                $stmt->bind_result($count);
                $stmt->fetch();

                return $count > 0;
                
            } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);
    
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        } 
    }
    
    /**
     * Obtener pais por id
     *
     * @param int $countryId
     * 
     * @return Country
     * 
     */
    public static function getCountryById(int $countryId) {        
        try{
            
            $conn = DatabaseConfig::getResourcesReader();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);
                       
            $query = "SELECT * FROM app_db.COUNTRIES WHERE ID = ? LIMIT 1";
            $stmt =  self:: $conn->prepare($query);
            
            if ($stmt !== false) {
                $stmt->bind_param("i", $countryId);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();                       
                    return new Country($row['ID'], $row['NAME']);
                } else throw new Exception(__METHOD__ . " pais no encontrado ");

            }else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);
        }catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        } 
    }

    /**
     * Obtencion de pais por nombre
     *
     * @param string $name
     * 
     * @return Country
     * 
     */
    public static function getCountryByName(string $name) {
        try {
        
            $conn = DatabaseConfig::getResourcesReader();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);
        
            $query = "SELECT * FROM app_db.COUNTRIES WHERE NAME = ? LIMIT 1";
            $stmt =  $conn->prepare($query);
            
            if ($stmt !== false) {
                $stmt->bind_param("s", $name);
                $stmt->execute();
                $result = $stmt->get_result();
                
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    return new Country($row['NAME'], $row['ID']);
                } else throw new Exception(__METHOD__ . " pais no encontrado: ");

            } else throw new Exception(__METHOD__ . " error en la consulta: " . $conn->error);
    
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        } 
    }

    /**
     * inserción de pais
     *
     * @param Country $country
     * 
     * @return bool
     * 
     */
    public static function insertCountry(Country $country){   
        try {

            $conn = DatabaseConfig::getResourcesUpdater();
            if ($conn->connect_errno) throw new Exception(__METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error);
        
            $query = "INSERT INTO app_db.COUNTRIES (NAME) VALUES (?)";
            $stmt =  $conn->prepare($query);

            if ($stmt !== false) {
                $stmt->bind_param("s", $country->name);
                $stmt->execute();
                $affectedRows = $stmt->affected_rows;
                
                if ($affectedRows > 0) {
                    $country->id = $stmt->insert_id;
                    return true;
                    
                } else throw new Exception( __METHOD__ . " No se pudo insertar el paciente en la base de datos.");

            } else throw new Exception( __METHOD__ . " error en la consulta ");
            
        } catch (Exception $e) {
            Logger::log($e->getMessage());
            return false;
        }
    }
}
