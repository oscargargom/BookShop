<?php
require_once 'funciones.php';

session_start();
$sesionOn = 1;
$carritoOn = 1;

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


    <main>
  

    </main>
    <footer>
        <div class="container-fluid">
            <form method="POST">
                <button type="button" onclick="location.href='cerrarSesion.php'" class="btn btn-success">Cerrar Sesión</button>
            </form>
        </div>
    </footer>

    <script src="carritoCompra/js/main.js"></script>

<?php
cierre();