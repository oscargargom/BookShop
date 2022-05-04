<?php 
    //Si la sesión ya está iniciada, no se vuelve a iniciar
    if($sesionOn!=1){
       session_start();  
    }

   ?>
<nav>
        <ul>
            <li><a href="http://dwes.lan/TiendaLibrosPrincipal/index.php">Libros</a></li>
            <?php
            if($_SESSION['rol']==1){
               echo '<li><a href="http://dwes.lan/TiendaLibrosPrincipal/crud/configAdmin.php">Configuracion</a></li>';
            } 
            
            ?>
            <?php
            if($carritoOn==1){
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