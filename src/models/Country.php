<?php
namespace models;

require_once __DIR__ . '/../database/DatabaseConfig.php';
// use database\DatabaseConfig;

class Country {
    private $id;
    private $name;
    private $iso;

    // Constructor
    public function __construct(int $id, String $name, String $iso){
        $this->id = $id;
        $this->name = $name;
        $this->iso = $iso;
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

    // Getter para ISO
    public function getIso() {
        return $this->iso;
    }

    // Setter para ISO
    public function setIso(String $iso) {
        $this->iso = $iso;
    }
    
    public static function getCountry(int $countryId) {        
        try{
            $env_variables =  \database\DatabaseConfig::getResourcesReader();
            $conn = new \mysqli($env_variables["dbname"], $env_variables["username"], $env_variables["passwd"]);
            if (!$conn->connect_errno) {
                $query = "SELECT * FROM app_db.COUNTRIES WHERE ID = ? LIMIT 1";
                $stmt = $conn->prepare($query);
                if ($stmt !== false) {
                    $stmt->bind_param("i", $countryId);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();                       
                        return new Country($row['ID'], $row['NAME'],$row['ISO']);
                    } else return false;
                }else{
                    echo  __METHOD__ . " error en la consulta: " . $conn->error;
                    return false;
                }

            }else {
                echo  __METHOD__ . "error de conexión a la base de datos: " . $conn->connect_error;
                return false;
            }                   
        }catch(Exception $e) {
            echo  __METHOD__ . " error: " . $e->getMessage();
            return false;
        }        
    }
}
