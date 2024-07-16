<?php
     require_once "./config/app.php";
     require_once "./autoload.php";
     require_once "./app/views/inc/session_start.php";
?>
<!DOCTYPE html>
<html lang="es" ng-app="crudAngular">
    <head>
        <?php require_once "./app/views/inc/head.php";?>
    </head>
    <body ng-controller="mainController">
        <div class="login-box">
        <form class="Formulario" method="POST" action="">
            <input type="hidden" name="modulo_user" value="registrar">
            <div class="title">
                <h2>Register Form</h2>
            </div>
            <div class="user-box">
            <input type="text" name="user" pattern="[A-Za-z0-9áéíóúÁÉÍÓÚñÑ ]{3,20}" required="">
            <label>Username</label>
            </div>
            <div class="user-box">
            <input type="email" name="email" required="" maxlength="50">
            <label>Email</label>
            </div>
            <div class="user-box">
            <input type="password" name="pass" required="" pattern="[ A-Za-z0-9áéíóúÁÉÍÓÚñÑ$@ ]{8,}">
            <label>Password</label>
            </div>
            <center>
                <button type="submit"><a class="sign-up aux">LOGIN<span></span></a></button>
            </center>
        </form>
    </div>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
        <script src="./app/controllers/controller.js"></script>
    </body>
</html>