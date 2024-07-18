<?php
namespace app\Controllers;
use Exception;
    use app\models\mainModel;
    require_once __DIR__ . '/../models/mainModel.php';

    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);
    $model = new mainModel();
    try{
        $listData = mainModel::mostrar("person");
        echo json_encode($listData); // Envio de lista de datos
    }catch(Exception $e){ // Controlador de errores.
        error_log($e->getMessage());
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "An error occurred"]);
    }
?>