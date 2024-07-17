<?php
    namespace app\controllers;
    use app\models\viewsModel;
    use app\models\mainModel;
#Controlador para redirección entre vistas principales como "login" "register" "error"
    class viewsController extends viewsModel {
        public function obtenerVistasController($vista){
            $db = mainModel::connect();
            if ($db === false) {
                // Aquí puedes manejar el caso de fallo de conexión, por ejemplo, redirigir a una vista de error
                $respuesta = "error"; // Cambia esto según tu lógica de manejo de errores
            } else {
                if($vista != ""){
                    $respuesta = $this->obtenerVistasModelo($vista);
                    // No necesitas imprimir o devolver la conexión PDO aquí
                } else {
                    $respuesta = "login";
                }
            }
            return $respuesta;
        }
    }
?>