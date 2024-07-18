<?php
    namespace app\Controllers;
    use app\models\mainModel;
    use Exception;
    require_once __DIR__ . '/../models/mainModel.php';

    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Procesamiento de los datos recibidos
        $id = json_decode(file_get_contents('php://input'), true);
        $model = new mainModel();
        try {
            $tabla = 'person';
            $condicion = "id = " . intval($id); 
    
            $result = mainModel::eliminar($tabla, $condicion);
            if ($result === true) {
                echo json_encode(['status' => 'success', 'message' => 'Dato eliminado correctamente']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error al eliminar el dato: ' . $result]);
            }
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        } 
    } else {
        http_response_code(405); // Método no permitido
        echo json_encode(['status' => 'error', 'message' => 'Método HTTP no permitido']);
    }
?>