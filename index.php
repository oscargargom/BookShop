<?php

    require_once 'funciones.php';

    session_start();
   

apertura();
?>

    <h1>PORTADA</h1>
    

<?php 

if(isset($_SESSION['rol']) && $_SESSION['rol'] == 1){
    echo 'hola administrador';
}

cierre();

