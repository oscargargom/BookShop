<?php

if (file_exists('env.php')) {
    include_once 'env.php';
}

include_once 'config.php';
session_start();


if (isset($_SESSION['rol'])) {
    header('location: shoppingcart/products.php');
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    //Almacena el usuario
    $username = $_POST['username'];
    //Almacena la constraseña
    $password = $_POST['password'];

    //Recibe los usuarios de la base de datos (Admin y usuario)
    $db = new Database();
    $query = $db->connect()->prepare('SELECT username, password, rol_id FROM usuarios WHERE username = :username');
    $query->execute(['username' => $username]);

    $row = $query->fetch();

    if (!empty($row) and password_verify($_POST['password'], $row['password'])) {
        $rol = $row['rol_id'];

        $_SESSION['rol'] = $rol;
        $_SESSION['username'] = $username;

        header('location: shoppingcart/products.php');
    } else {
        // Si no existe el usuario introducido activa la alerta de bootstrap y añade un string a la variable alerta, para informar de los datos incorrectos
        $alerta1 = true;
        $alerta = "Nombre de usuario o contraseña incorrecto";
    }
}

?>





<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>

                <form action="#" class="login-form" method="POST">
                    <img src="img/logo.png" width="70" height="70" style="display:block; margin:auto;">

                    <h1>Garden of Books</h1>

                    <div class="txtb">
                        <input type="text" name="username" required>
                        <span data-placeholder="Nombre de usuario"></span>
                    </div>

                    <div class="txtb">
                        <input type="password" name="password" required>
                        <span data-placeholder="Contraseña"></span>
                    </div>

                    <input type="submit" class="logbtn" value="Iniciar sesión" style="font-weight: bold;">

                    <div class="bottom-text" style="font-size: 15px; font-weight: bold">
                        ¿No tienes cuenta? <a href="register.php">Regístrate</a>
                    </div>

                    <div>
                        <!-- Comienza Bootstrap alerta datos incorrrectos -->
                        <?php if (isset($alerta1) && $alerta1 == true) : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </symbol>
                            </svg>

                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    <?php echo $alerta ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- Finaliza Bootstrap alerta datos incorrrectos -->
                </form>
 

    <!-- Animaciones Login inputs -->
    <script type="text/javascript">
        $(".txtb input").on("focus", function() {
            $(this).addClass("focus");
        });

        $(".txtb input").on("blur", function() {
            if ($(this).val() == "")
                $(this).removeClass("focus");
        });
    </script>

</body>

</html>