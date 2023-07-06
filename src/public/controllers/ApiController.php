<?php

namespace controllers;

use models\Medicine;

class ApiController
{
    public function isMedicineExistsByName($request)
    {
        // Verificar que se envió el nombre del medicamento
        if (isset($request['name'])) {
            $medicineName = $request['name'];
            
            // Llamar al método estático de la clase Medicine
            $exists = Medicine::isMedicineExistsByName($medicineName);

            // Devolver la respuesta en formato JSON
            echo json_encode(['exists' => $exists]);
        } else {
            // Si no se envió el nombre del medicamento, devolver un mensaje de error
            echo json_encode(['error' => 'Missing medicine name']);
        }
    }
}

// Recibir y manejar la solicitud
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = json_decode(file_get_contents('php://input'), true);

    $controller = new ApiController();
    $controller->isMedicineExistsByName($requestData);
}
