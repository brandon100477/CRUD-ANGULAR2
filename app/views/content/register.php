<p?php
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
        <form class="Formulario" method="POST" action="" ng-submit="submitForm()">
            <input type="hidden" name="modulo_user" value="registrar">
            <div class="title">
                <h2>Register Form</h2>
            </div>
            <div class="user-box" ng-class="{ 'error': !name.length }">
                <input type="text" name="name" ng-model="name" required>
                <label>Name</label>
                <span class="span" ng-show="!name.length">Por favor ingresar tu nombre.</span>
            </div>
            <div class="user-box" ng-class="{ 'error': !email.length }">
                <input type="email" name="email" ng-model="email" required maxlength="50">
                <label>Email</label>
                <span ng-show="!email.length">Please enter your email.</span>
            </div>
            <div class="user-box" ng-class="{ 'error': !pass.length }">
                <input type="password" name="pass" ng-model="pass" required>
                <label>Password</label>
                <span ng-show="!pass.length">Please enter a password.</span>  </div>
            <div class="user-box" ng-class="{ 'error': !pass2.length || pass2 !== pass }">
                <input type="password" name="pass2" ng-model="pass2" required>
                <label>Confirm password</label>
                <span ng-show="!pass2.length">Please confirm your password.</span>  <span ng-show="pass2.length && pass2 !== pass">Passwords don't match.</span>  </div>
            <div class="user-box" ng-class="{ 'error': !pet.length }">
                <input type="text" name="pet" ng-model="pet" required>
                <label>Pet</label>
                <span ng-show="!pet.length">Please enter your pet's name.</span>  </div>
            <center>
            <button type="submit" name="registro" disabled ng-disabled="!name.length || !email.length || !pass.length || !pass2.length || pass2 !== pass"><p class="sign-up aux">LOGIN<span></span></p></button>
            </center>
        </form>
    </div>
    <?php require_once "./app/views/inc/script.php"; ?>
    <script src="./app/controllers/controller.js"></script>
    </body>
</html>