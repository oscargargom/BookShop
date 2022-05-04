<!doctype html>
<html lang="es">

<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../carritoCompra/css/main.css">
</head>

<body>
    <div>
        <?php
        //Para que no se vuelva a iniciar la sesión (session_start)
        $sesionOn=0;
        //Para que no se muestre el carrito en la ventana de Configuración
        $carritoOn=0;
        include_once('../carritoCompra/layout/menu.php');
        ?>
    </div>