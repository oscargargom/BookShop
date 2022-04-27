<?php

function apertura($titulo="TiendaLibros"){
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titulo; ?></title>
</head>
<body>

    <?php
}

function cierre(){
    ?>
    <footer>
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
    </body>
</html>
<?php
}

