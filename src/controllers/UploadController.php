<?php

require_once ("database/migration/migrationResources.php");

// Controlador para la página de inicio
class UploadController
{
    // Método para mostrar la página de inicio
    public function index()
    {
        // Lógica adicional para preparar los datos necesarios para la vista
        $title = $pageTitle = "Upload";
        $currentPage = "upload";
       
        // Incluir la vista
        require_once("views/upload.php");
    }

    // Método para manejar la subida del archivo CSV
    public function handleUpload($filePath, $name)
    {
      
        $parameter = "";
        $delimiter = ";";       
  
        $filePaths[$name] = $filePath;
        migrationScript($parameter,$filePaths, $delimiter);
     
    }


}

$controller = new UploadController();

// Verificar si se ha enviado un archivo y si no hay errores
if (isset($_FILES["file"]) && $_FILES["file"]["error"] === UPLOAD_ERR_OK) {

    $filePath = $_FILES["file"]["tmp_name"];
    $name = $_FILES["file"]["name"];

    $controller->handleUpload($filePath, $name);


}







?>