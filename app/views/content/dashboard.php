<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
        header('Location:'. APP_URL); // Redirige al usuario a la página de login
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./app/static/css/dash.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="ini">
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['name']); ?></h1>
        <img class="img-inicio" src="./app/static/img/programanding.png" alt="">
        <p>Prueba realizada con éxito</p>
    </div>
</body>
</html>