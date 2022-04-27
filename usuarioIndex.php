<?php

    require_once 'funciones.php';

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




apertura();
?>

    <h1>Usuario Index</h1>


<form action="cerrarSesion.php" method="POST">
    <input type="submit" value="Cerrar Sesión" />
</form>

<?php 
cierre();

