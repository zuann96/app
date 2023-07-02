<?php

namespace models;

require_once __DIR__ . '/../database/DatabaseConfig.php';

class Medicine {
    private $id;
    private $name;

    // Constructor
    public function __construct(int $id, string $name){
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
    
    public static function getMedicine(int $medicineId) {        
        try {
            $env_variables = \database\DatabaseConfig::getResourcesReader();
            $conn = new \mysqli($env_variables["dbname"], $env_variables["username"], $env_variables["passwd"]);

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
                        
                    
                } else {
                    echo __METHOD__ . " error en la consulta: " . $conn->error;
                    return false;
                }
            } else {
                echo  __METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error;
                return false;
            }                   
        } catch(Exception $e) {
            echo  __METHOD__ . " error: " . $e->getMessage();
            return false;
        }        
    }
}
