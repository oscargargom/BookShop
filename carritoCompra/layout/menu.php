<?php
//Si la sesión ya está iniciada, no se vuelve a iniciar
if ($sesionOn != 1) {
    session_start();
}

?>
<nav>
    <ul>
        <li><a href="http://dwes.lan/TiendaLibrosPrincipal/index.php">Home</a></li>


        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Libros
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Romance</a></li>
                <li><a class="dropdown-item" href="#">Fantasía</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="http://dwes.lan/TiendaLibrosPrincipal/index.php">Todos</a></li>
            </ul>
        </li>




        <?php
        if ($_SESSION['rol'] == 1) {
            echo '<li><a href="http://dwes.lan/TiendaLibrosPrincipal/crud/configAdmin.php">Configuracion</a></li>';
        }

        ?>
        <?php
        if ($carritoOn == 1) {
            echo "<li class='carrito'>
                <a href='#' class='btn-carrito'>Carrito</a>
                <div id='carrito-container'>
                    <div id='tabla'>

                    </div>
                </div>
            </li>";
        }

        ?>
    </ul>
</nav>