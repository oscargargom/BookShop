<?php 
    if(!isset($_GET['id'])){
        header('Location: configAdmin.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd->prepare("DELETE FROM items where id = ?;");
    $resultado = $sentencia->execute([$id]);

    if ($resultado === TRUE) {
        header('Location: configAdmin.php?mensaje=eliminado');
    } else {
        header('Location: configAdmin.php?mensaje=error');
    }
    
?>