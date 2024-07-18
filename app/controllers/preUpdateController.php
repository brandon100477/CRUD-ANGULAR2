<?php
namespace app\Controllers;
use Exception;
    use app\models\mainModel;
    require_once __DIR__ . '/../models/mainModel.php';

    header('Content-Type: application/json');
    $id = $_GET['id'];

    if (!isset($id)) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "ID no proporcionado"]);
        exit;
    }
    
    $model = new mainModel();
    
    try {
        $listData = mainModel::mostrarActualizar("person", $id);
        error_log(print_r($listData, true)); // Para depurar
        echo json_encode($listData);
    } catch(Exception $e) {
        error_log($e->getMessage());
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Ocurrió un error"]);
    }
?>