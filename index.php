<?php
    require_once 'funciones.php';

    session_start();

    //Si el rol no está definido redirige a login.php
    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        
        if($_SESSION['rol'] != 1 && $_SESSION['rol'] != 2){
            header('location: login.php');
        }
    }

if($_SESSION['rol']==1){
    $usr = 'Admin';
} else {
    $usr = 'TiendaLibros';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda Libros</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="carritoCompra/css/main.css">
</head>
<body>
    <?php
        include_once('carritoCompra/layout/menu.php');
    ?>

    <main>
        <?php
            $response = json_decode(file_get_contents('http://dwes.lan/TiendaLibrosPrincipal/carritoCompra/api/productos/api-productos.php?categoria=juguetes'), true);
            if($response['statuscode'] == 200){
                foreach($response['items'] as $item){
                    include('carritoCompra/layout/items.php');
                }
            }else{
                echo $response['response'];
            }
        ?>
        
    </main>
    <footer>
    <form action="cerrarSesion.php" method="POST">
        <input type="submit" value="Cerrar Sesión" />
    </form>
    </footer>
    <script src="carritoCompra/js/main.js"></script>
</body>
</html>



    

<?php
