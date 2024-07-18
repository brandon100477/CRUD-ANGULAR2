<?php
namespace app\Controllers;
    use app\models\mainModel;
    require_once __DIR__ . '/../models/mainModel.php';

    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);
    $model = new mainModel();
    $listData = mainModel::mostrar("person");
    echo json_encode($listData);
?>