<?php
    namespace app\Controllers;
    use app\models\mainModel;
    require_once __DIR__ . '/../models/mainModel.php';
    require_once __DIR__ . '/../../config/app.php';

    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Procesamiento de los datos recibidos
        $data = json_decode(file_get_contents('php://input'), true);
        $model = new mainModel();

        $email = mainModel::cleanString($data['email']);
        $hashedPassword = $model->getHashedPasswordByEmail($email);// Encriptar la contraseña

        if (password_verify($data['pass'], $hashedPassword['pass'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $hashedPassword['name'];
            $_SESSION['email'] = $email;
            $redirectUrl = APP_URL .'dashboard';
            echo json_encode(['status' => 'success', 'message' => 'Inicio de sesión exitoso', 'redirectUrl' => $redirectUrl]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Correo electrónico o contraseña incorrectos, intentelo nuevamente por favor.']);
        }
    } else {
        http_response_code(405); // Método no permitido
        echo json_encode(['status' => 'error', 'message' => 'Método HTTP no permitido']);
    }
?>