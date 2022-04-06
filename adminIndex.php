<?php

    session_start();

    //Si el rol no está definido redirige a login.php
    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        //Si el rol está definido pero no es igual a 1, redirige a login.php (para evitar que un usuario normal acceda al adminIndex.php
        if($_SESSION['rol'] != 1){
            header('location: login.php');
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    <h1>Administrador Index</h1>

    <form action="cerrarSesion.php" method="POST">
    <input type="submit" value="Cerrar Sesión" />
</form>
</body>
</html>
