<?php
    namespace app\controllers;
    use app\models\viewsModel;
    use app\models\mainModel;
#Controlador para redirección entre vistas principales como "login" "register" "error"
    class viewsController extends viewsModel {
        public function obtenerVistasController($vista){
            $db = mainModel::connect();
            if ($db === false) {
                $respuesta = "error";
            } else {
                if($vista != ""){
                    $respuesta = $this->obtenerVistasModelo($vista);
                } else {
                    $respuesta = "login";
                }
            }
            return $respuesta;
        }
    }
?>