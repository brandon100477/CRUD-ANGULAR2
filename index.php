<?php
     require_once "./config/app.php";
     require_once "./autoload.php";
     require_once "./app/views/inc/session_start.php";
     if(isset($_GET['views'])){
        $url = explode("/", $_GET['views']);
    }else{
        $url = ["login"];
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php require_once "./app/views/inc/head.php";?>
    </head>
    <body>
    
    <?php
    #Configuracion y redirección de vistas dependen de si existe o no en la URL.
        use app\controllers\viewsController;
        $viewsController = new viewsController();
        $vista=$viewsController->obtenerVistasController($url[0]);
        if ($vista == "login" || $vista == "error" || $vista == "register"){
            require_once "./app/views/content/".$vista.".php";
        }else {
            require_once "./app/views/inc/navbar.php";
            require_once $vista;
        }
        #Se implementan los scripts del archivo.
        require_once "./app/views/inc/script.php";
    ?>
</body>
</html>