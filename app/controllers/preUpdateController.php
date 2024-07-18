<?php
namespace app\Controllers;
use Exception;
    use app\models\mainModel;
    require_once __DIR__ . '/../models/mainModel.php';

    header('Content-Type: application/json');
    $id = $_GET['id']; //Obtiene el id de la URL.

    if (!isset($id)) { //Filtro para confirmar que si existe un id enviado en la URL.
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "ID no proporcionado"]);
        exit;
    }
    $model = new mainModel();
    
    try {
        $listData = mainModel::mostrarActualizar("person", $id); //Mostrar los datos de la DB.
        echo json_encode($listData);
    } catch(Exception $e) {
        error_log($e->getMessage());
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Ocurrió un error"]);
    }
?>