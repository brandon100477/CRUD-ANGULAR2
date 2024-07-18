<?php
    namespace app\Controllers;
    use app\models\mainModel;
    use Exception;
    require_once __DIR__ . '/../models/mainModel.php';

    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Procesamiento de los datos recibidos
        $data = json_decode(file_get_contents('php://input'), true);
        $model = new mainModel();
        try {
            $name = $model->cleanString($data['name']);
            $email = $model->cleanString($data['email']);
            $pet =  $model->cleanString($data['pet']);
    
            $updateData = [ //Diciconario de datos para ectualizar datos.
                'name' => $name,
                'email' => $email,
                'pet' => $pet,
                'update_user' => date("Y-m-d H:i:s")
            ];
    
            $tabla = 'person';
            $condicion = "id = " . intval($data['id']); 
    
            $result = mainModel::actualizar($tabla, $updateData, $condicion); //Llamado al modelo para actualziar.
            if ($result === true) {
                echo json_encode(['status' => 'success', 'message' => 'Datos actualizados correctamente']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error al actualizar los datos: ' . $result]);
            }
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    } else {
        http_response_code(405); // Método no permitido
        echo json_encode(['status' => 'error', 'message' => 'Método HTTP no permitido']);
    }
?>