<?php

if (file_exists('../env.php')) {
	include_once '../env.php';
}

include_once '../config.php';


session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pedidos</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
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
                        
                        <h3>Usuario: <?php echo $fetch_product['name']; ?></h3>
                        <h3>Libros: <?php echo $fetch_product['total_products']; ?></h3>
                        <h3>Precio Total: <?php echo $fetch_product['total_price']; ?>€</h3>


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
   <style>
       footer {
           position: absolute;
           bottom: 0;
           width: 100%;
           height: 40px;

       }

   </style>
   <footer>
      <div class="container-fluid">
         <form method="POST">
            <button type="button" onclick="location.href='../cerrarSesion.php'" class="btn btn-success">Cerrar Sesión</button>
         </form>
      </div>
   </footer>
   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>