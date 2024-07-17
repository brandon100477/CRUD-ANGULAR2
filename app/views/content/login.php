<?php
     require_once "./config/app.php";
     require_once "./autoload.php";
?>
<!DOCTYPE html>
<html lang="es" ng-app="angularLogin">
    <head>
        <?php require_once "./app/views/inc/head.php";?>
    </head>
    <body ng-controller="loginController">
    <div class="login-box">
  <form class="form" method="POST" ng-submit="submitForm()">
    <div class="title">
        <h2>Login Form</h2>
    </div>
    <div class="user-box">
      <input type="email" name="email" ng-model="email" required="">
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="pass" ng-model="pass" required="">
      <label>Password</label>
    </div>
    <center>
      <button type="submit"><p >LOGIN<span></span></p></button>  
      <a class="sign-up" href="<?php echo APP_URL; ?>register">SIGN UP<span></span></a>
    </center>
  </form>
</div>
    <?php require_once "./app/views/inc/script.php"; ?>
    <script src="./app/controllers/login.js"></script>
    </body>
</html>