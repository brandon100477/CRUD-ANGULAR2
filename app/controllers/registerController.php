<?php
    namespace app\Controllers;
    use app\models\mainModel;
    require_once __DIR__ . '/../models/mainModel.php';

    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Procesamiento de los datos recibidos
        $data = json_decode(file_get_contents('php://input'), true);
        $model = new mainModel();

        // Limpieza de los datos para evitar inyecciones SQL.
        $name = mainModel::cleanString($data['name']); 
        $email = mainModel::cleanString($data['email']);
        $pass = password_hash(mainModel::cleanString($data['pass']), PASSWORD_BCRYPT);// Encriptar la contraseña
        $pet =  mainModel::cleanString($data['pet']);

        $insertData = [ //Diccionario de datos limpios.
            'name' => $name,
            'email' => $email,
            'password' => $pass,
            'password2' => $pass,
            'pet' => $pet,
            'created_user' =>date("Y-m-d H:i:s"),
            'update_user' =>date("Y-m-d H:i:s")
            ];
        $tabla = 'person';
        $result = mainModel::insertar($tabla, $insertData);
        // Respuesta basada en algún criterio.
        if ($result === true) {
             echo json_encode(['status' => 'success', 'message' => 'Datos registrados correctamente']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error al registrar los datos: ' . $result]);
           }
    } else {
        http_response_code(405); // Método no permitido
        echo json_encode(['status' => 'error', 'message' => 'Método HTTP no permitido']);
    }
?>