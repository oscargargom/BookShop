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
apertura($usr);?>


    <h1> <?php echo $_SESSION['username']?> Index</h1>

    <form action="cerrarSesion.php" method="POST">
        <input type="submit" value="Cerrar Sesión" />
    </form>

<?php
cierre();
