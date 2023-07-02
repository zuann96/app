<?php

namespace models;

require_once __DIR__ . '/../database/DatabaseConfig.php';

class Patient {
    private $id;
    private $code;

    // Constructor
    public function __construct(int $id, string $code){
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
    
    public static function getPatient(int $patientId) {        
        try {
            $env_variables = \database\DatabaseConfig::getResourcesReader();
            $conn = new \mysqli($env_variables["dbname"], $env_variables["username"], $env_variables["passwd"]);

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
                    } else return false;
                                            
                } else {
                    echo __METHOD__ . " error en la consulta: " . $conn->error;
                    return false;
                }
            } else {
                echo __METHOD__ . " error de conexión a la base de datos: " . $conn->connect_error;
                return false;
            }                   
        } catch(Exception $e) {
            echo __METHOD__ . " error: " . $e->getMessage();
            return false;
        }        
    }
}
