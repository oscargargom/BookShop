<?php

if (file_exists('env.php')) {
   include_once 'env.php';
}

include_once 'config.php';



session_start();

if (!isset($_SESSION['rol'])) {
   header('location: login.php');
}


if (isset($_POST['add_to_cart'])) {

   
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   //Hace un select de los libros en el carrito
   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   //Si el libro que se ha seleccionado ya estaba en el select anteriormente hecho, se notifica al usuario que ha ya sido añadido
   if (mysqli_num_rows($select_cart) > 0) {
      $message[] = 'El libro ya ha sido añadido al carrito';
   } else {
      //Si no habia sido añadido antes, se inserta dentro del carrito
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'Libro añadido al carrito correctamente';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Garden of books</title>
   <link rel="icon" href="img/logo.png">
   <link rel="stylesheet" href="shoppingcart/css/styleFooter.css">
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="shoppingcart/css/style.css">


</head>

<body>

   <?php

   if (isset($message)) {
      foreach ($message as $message) {
         echo '<div class="message"><span>' . $message . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
      };
   };

   ?>

   <header class="header">

      <div class="flex">

         <img src="img/logoBarra.png" width="40" height="40" style="margin-right: 1%;">
         <a href="index.php" class="logo">Garden of Books</a>

         <nav class="navbar">


            <a href="index.php">Libros</a>

            <?php

            //Muestra las secciones Pedidos y Añadir Libros solo si tu rol es 1, es decir, ADMIN
            if ($_SESSION['rol'] == 1) {
               echo "<a href='shoppingcart/pedidos.php'>Pedidos</a>";
               echo "<a href='shoppingcart/admin.php'>Añadir libros</a>";
            }

            ?>
            <a href="shoppingcart/contacto.php">Contáctanos</a>
            <?php
            //Cuenta los libros en el carrito para mostrar un numero al lado que corresponde a la cantidad de libros en el carrito
            $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);

            ?>

            <a href="shoppingcart/cart.php" class="cart">Carrito <span><?php echo $row_count; ?></span> </a>

            <a href='cerrarSesion.php' class="cart">Cerrar Sesión</a>

         </nav>

         <!-- menu desplegable para móviles-->
         <div id="menu-btn" class="fas fa-bars"></div>


      </div>

   </header>

   <div class="container">

      <section class="products">

         <h1 class="heading">Libros Disponibles</h1>

         <div class="box-container">

            <?php

            //Para mostrar los libros se hace un select de los productos
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            //Si la cantidad de libros del select es mayor a cero, se muestran en pantalla
            if (mysqli_num_rows($select_products) > 0) {
               while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>

                  <form action="" method="post">
                     <div class="box">
                        <img src="shoppingcart/uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
                        <h3><?php echo $fetch_product['name']; ?></h3>
                        <div class="price"><?php echo $fetch_product['price']; ?>€</div>
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                        <input type="submit" class="btn" value="Añadir al carrito" name="add_to_cart">
                     </div>
                  </form>

            <?php
               };
            };
            ?>

         </div>

      </section>

   </div>
   <footer>
      <div class="footer-container">
         <div class="left-col">
            <img src="img/logoBarra.png" width="40" height="40" alt=""><span style="font-size: 190%"> Garden of Books</span>

            <div class="social-media">
               <a href="#"><i class="fab fa-facebook-f"></i></a>
               <a href="#"><i class="fab fa-twitter"></i></a>
               <a href="#"><i class="fab fa-instagram"></i></a>
               <a href="#"><i class="fab fa-youtube"></i></a>
               <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <p class="rights-text">© 2022 Creado por Oscar García All Rights Reserved.</p>
         </div>

         <div class="right-col">
            <h1>Boletín Informativo</h1>
            <div class="border"></div>
            <p>Introduce tu email para obtener noticias y ofertas.</p>
            <form action="" class="newsletter-form">
               <input type="text" class="txtb" placeholder="Introduce tu email">
               <input type="submit" class="btn" value="Enviar">
            </form>
         </div>
      </div>
   </footer>
   <!-- custom js file link  -->
   <script src="shoppingcart/js/script.js"></script>

</body>

</html>