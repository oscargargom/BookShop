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
apertura($usr); //Abrir HTML
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <main class="container">
    
        <h1> <?php echo $_SESSION['username']?> Index</h1>

    <form action="cerrarSesion.php" method="POST">
        <input type="submit" value="Cerrar Sesión" />
    </form>

    </main>
    <footer class="container">
        <?php
        if(isset($_SESSION['rol'])){
            echo 'Rol: ' .  $_SESSION['rol'] .  '<br>';
        }

        if(isset($_SESSION['username'])){
            echo 'Nombre de usuario: ' .  $_SESSION['username'];
        } else {
            echo 'Usuario Anónimo';
        }
        
        ?>
    </footer>




    

<?php
cierre(); //Cerrar HTML
