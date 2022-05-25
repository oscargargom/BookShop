<?php 

    session_start();

    //Cierra la sesión y redirige de vuelta al login.php
    session_destroy();
    header('Location: login.php');
    exit();
?>
