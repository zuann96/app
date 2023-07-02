<?php

class Country {
    private $id;
    private $name;
    private $iso;

    // Constructor
    public function __construct($id, $name, $iso) {
        $this->id = $id;
        $this->name = $name;
        $this->iso = $iso;
    }

    // Getter para ID
    public function getId() {
        return $this->id;
    }

    // Setter para ID
    public function setId($id) {
        $this->id = $id;
    }

    // Getter para Name
    public function getName() {
        return $this->name;
    }

    // Setter para Name
    public function setName($name) {
        $this->name = $name;
    }

    // Getter para ISO
    public function getIso() {
        return $this->iso;
    }

    // Setter para ISO
    public function setIso($iso) {
        $this->iso = $iso;
    }
    
    public static function getCountry($countryId) {
        // Conexión a la base de datos
        $conn = new mysqli('nombre_servidor', 'nombre_usuario', 'contraseña', 'nombre_base_de_datos');
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consulta SQL para obtener el país por ID
        $query = "SELECT * FROM COUNTRIES WHERE ID = $countryId";
        $result = $conn->query($query);

        // Verificar si se encontró el país
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $country = new Country($row['ID'], $row['NAME'], $row['ISO']);
        } else {
            $country = null; // No se encontró el país
        }

        // Cerrar la conexión a la base de datos
        $conn->close();

        return $country;
    }
}
