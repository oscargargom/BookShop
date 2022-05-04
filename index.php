<?php
require_once 'funciones.php';

session_start();
$sesionOn = 1;

//Si el rol no está definido redirige a login.php
if (!isset($_SESSION['rol'])) {
    header('location: login.php');
} else {
    //Si el rol no es igual a admin o usuairo redirige a login.php
    if ($_SESSION['rol'] != 1 && $_SESSION['rol'] != 2) {
        header('location: login.php');
    }
}

apertura();
?>


<body>
    <?php
    include_once('carritoCompra/layout/menu.php');
    ?>

    <main>
        <?php
        $response = json_decode(file_get_contents('http://dwes.lan/TiendaLibrosPrincipal/carritoCompra/api/productos/api-productos.php?categoria=juguetes'), true);
        if ($response['statuscode'] == 200) {
            foreach ($response['items'] as $item) {
                include('carritoCompra/layout/items.php');
            }
        } else {
            echo $response['response'];
        }
        ?>

    </main>
    <footer>
        <div class="container-fluid">
            <form method="POST">
                <button type="button" onclick="location.href='cerrarSesion.php'" class="btn btn-success">Cerrar Sesión</button>
            </form>
        </div>
    </footer>

    <script src="carritoCompra/js/main.js"></script>
</body>

</html>





<?php
