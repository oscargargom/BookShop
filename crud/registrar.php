<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtPrecio"]) || empty($_POST["txtImagen"]  )){
        header('Location: configAdmin.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $precio = $_POST["txtPrecio"];
    $imagen = $_POST["txtImagen"];
    $categoria = $_POST["txtCategoria"];
    
    $sentencia = $bd->prepare("INSERT INTO items(nombre,precio,imagen,categoria) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$precio,$imagen,$categoria]);

    if ($resultado === TRUE) {
        header('Location: configAdmin.php?mensaje=registrado');
    } else {
        header('Location: configAdmin.php?mensaje=error');
        exit();
    }
    
?>