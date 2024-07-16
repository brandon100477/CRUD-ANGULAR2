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
        <form class="">
            <div class="title">
                <h2>Login Form</h2>
            </div>
            <div class="user-box">
            <input type="email" name="" required="">
            <label>Email</label>
            </div>
            <div class="user-box">
            <input type="password" name="" required="">
            <label>Password</label>
            </div>
            <center>
            <button type="submit"><a type="submit">LOGIN<span></span></a></button>  
            <a class="sign-up" href="#/register">SIGN UP<span></span></a>
            </center>
        </form>
        <div ng-view></div> 
        </div>
       
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-route.min.js"></script>
        <script src="./app/controllers/controller.js"></script>
    </body>
</html>