<?php

if (file_exists('../env.php')) {
   include_once '../env.php';
}

include_once '../config.php';



session_start();

//Si la sesión no existe redirige de vuelta al login, esto hace que nadie pueda entrar sin estar logeado
if (!isset($_SESSION['rol'])) {
   header('location: ../login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Garden of Books</title>
   <link rel="icon" href="../img/logo.png">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/styleFooter.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/stylePedidos.css">

</head>

<body>

   <?php include 'header.php'; ?>

   <div class="container">

      <section class="products">

         <h1 class="heading">Pedidos Realizados</h1>

         <div class="box-container">

            <?php

            $select_products = mysqli_query($conn, "SELECT * FROM `ordenes`");
            if (mysqli_num_rows($select_products) > 0) {
               while ($fetch_product = mysqli_fetch_assoc($select_products)) {
            ?>

                  <form action="" method="post">
                     <div class="box">

                        <h3>ID PEDIDO:
                           <span style="color: #787878"><?php echo $fetch_product['id']; ?></span>
                        </h3>
                        <h3>Usuario:
                           <span style="color: #787878"><?php echo $fetch_product['name']; ?></span>
                        </h3>
                        <h3>Libros:
                           <span style="color: #787878"><?php echo $fetch_product['total_products']; ?></span>
                        </h3>
                        <h3>Precio Total:
                           <span style="color: #787887"><?php echo $fetch_product['total_price']; ?>€</span>
                        </h3>

                        <input type="hidden" name="product_id" value="<?php echo $fetch_product['id']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                        <input type="hidden" name="product_total" value="<?php echo $fetch_product['total_products']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['total_price']; ?>">

                     </div>
                  </form>

            <?php
               };
            };
            ?>

         </div>

      </section>

   </div>


   <?php include 'footer.php'; ?>
   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>