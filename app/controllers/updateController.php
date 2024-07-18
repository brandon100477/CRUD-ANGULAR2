<?php
namespace app\Controllers;
use Exception;
    use app\models\mainModel;
    require_once __DIR__ . '/../models/mainModel.php';

    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);
    $model = new mainModel();
    /* try{
        $listData = mainModel::mostrar("person");
        error_log(print_r($listData, true)); // Agrega esto para depurar
        echo json_encode($listData);
    }catch(Exception $e){
        error_log($e->getMessage());
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "An error occurred"]);
    } */
?>