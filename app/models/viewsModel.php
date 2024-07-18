<?php
    namespace app\models;
    #Modelo para la redirección de las vistas.
    class viewsModel {
        protected function obtenerVistasModelo($vista){
            $lista=["dashboard", "userNew", "userList","logOut"];
            if(in_array($vista, $lista)){
                if(is_file("./app/views/content/".$vista.".php")){
                    $contenido = "./app/views/content/".$vista.".php";
                }else{
                    $contenido = "error";
                }
            }elseif ($vista == "login" || $vista == "index") {
                $contenido ="login";
            }elseif ($vista == "register") {
                $contenido ="register";
            }else {
                $contenido = "error";
            }
            return $contenido;
        }}
?>