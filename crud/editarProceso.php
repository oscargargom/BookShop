<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: configAdmin.php?mensaje=error');
    }

    include 'model/conexion.php';
    $id = $_POST['id'];
    $nombre = $_POST['txtNombre'];
    $precio = $_POST['txtPrecio'];
    $imagen = $_POST['txtImagen'];
    $categoria = $_POST['txtCategoria'];

    $sentencia = $bd->prepare("UPDATE items SET nombre = ?, precio = ?, imagen = ?, categoria = ? where id = ?;");
    $resultado = $sentencia->execute([$nombre, $precio, $imagen, $categoria, $id]);

    if ($resultado === TRUE) {
        header('Location: configAdmin.php?mensaje=editado');
    } else {
        header('Location: configAdmin.php?mensaje=error');
        exit();
    }
    
?>