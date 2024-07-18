<?php
     require_once "./config/app.php";
     require_once "./autoload.php";
?>
<!DOCTYPE html>
<html lang="es" ng-app="crudAngular">
    <head>
        <?php require_once "./app/views/inc/head.php";?>
    </head>
    <body ng-controller="mainController">
    <div class="login-box">
        <form class="Formulario" method="POST" ng-submit="submitForm()">
            <input type="hidden" name="modulo_user" value="registrar">
            <div class="title">
                <h2>Register Form</h2>
            </div>
            <div class="user-box" ng-class="{ 'error': !name.length }">
                <input type="text" name="name" ng-model="name" required>
                <label>Name</label>
                <span  ng-show="!name.length">Por favor ingresar tu nombre.</span>
            </div><br>
            <div class="user-box" ng-class="{ 'error': !email.length }">
                <input type="email" name="email" ng-model="email" required maxlength="50">
                <label>Email</label>
                <span ng-show="!email.length">Por favor ingresar tu correo electronico.</span>
            </div><br>
            <div class="user-box" ng-class="{ 'error': !pass.length }">
                <input type="password" name="pass" ng-model="pass" required>
                <label>Password</label>
                <span ng-show="!pass.length">Por favor ingresar tu contraseña.</span> 
            </div><br>
            <div class="user-box" ng-class="{ 'error': !pass2.length || pass2 !== pass }">
                <input type="password" name="pass2" ng-model="pass2" required>
                <label>Confirm password</label>
                <span ng-show="!pass2.length">Por favor confirmar la contraseña.</span>
                <span ng-show="pass2.length && pass2 !== pass">Lo siento, las contraseñas no coinciden.</span>
            </div><br>
            <div class="user-box" ng-class="{ 'error': !pet.length }">
                <select name="pet" ng-model="pet" id="pet">
                    <option value="">Seleccine una mascota</option>
                    <option value="Gato">Gato</option>
                    <option value="Perro">Perro</option>
                    <option value="Loro">Loro</option>
                    <option value="Pez">Pez</option>
                </select><br>
                <span ng-show="!pet.length">Seleccione el tipo de mascota que tienes.</span>
            </div><br>
            <center>
            <button type="submit" name="registro" disabled ng-disabled="!name.length || !email.length || !pass.length || !pass2.length || pass2 !== pass"><p class="sign-up aux">LOGIN<span></span></p></button>
            </center>
        </form>
    </div>
    <?php require_once "./app/views/inc/script.php"; ?>
    <script src="./app/controllers/controller.js"></script>
    </body>
</html>