<?php

    session_start();
    //Si el rol no está definido redirige a login.php
    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        //Si el rol no es distinto o igual a 2, es decir, 1 o 2 (admin o usuario), redirige a login.php
        if($_SESSION['rol'] != 2){
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
    <h1>Usuario Index</h1>


<form action="cerrarSesion.php" method="POST">
    <input type="submit" value="Cerrar Sesión" />
</form>

</body>
</html>
