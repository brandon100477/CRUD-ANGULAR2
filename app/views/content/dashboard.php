<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
        header('Location:'. APP_URL); // Redirige al usuario a la página de login si no está autenticado.
        exit;
    }
?>
<!DOCTYPE html>
<html lang="es" ng-app="routingApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./app/static/css/dash.css">
    <?php require_once "./app/views/inc/script.php"; ?>
    <script src="./app/controllers/routing.js"></script>
    <title>Dashboard</title>
</head>
<body>
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="<?php echo APP_URL; ?>dashboard">
        <img class="img" src="./app/static/img/logo-prueba.jpeg" alt="">
        <span class="img-text"><strong>Brandon</strong></span>
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        </a>
    </div>
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="#!/dashboard" ><strong>Home</strong></a>
            <a class="navbar-item" href="#!/userNew"><strong>New user</strong></a>
            <a class="navbar-item" href="#!/userList"><strong>User list</strong></a>
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-info is-dark" href="<?php echo APP_URL; ?>logOut/"><strong>Log out</strong></a>

                </div>
            </div>
        </div>
    </div>
</nav>

    <div ng-view>


    </div>
    <script src="./app/static/js/navbar.js"></script>
</body>
</html>