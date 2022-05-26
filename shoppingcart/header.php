<header class="header">

   <div class="flex">

      <img src="../img/logoBarra.png" width="40" height="40" style="margin-right: 1%;">
      <a href="../index.php" class="logo">Garden of Books</a>

      <nav class="navbar">
         <?php

         //Muestra las secciones Pedidos y Añadir Libros solo si tu rol es 1, es decir, ADMIN
         if ($_SESSION['rol'] == 1) {
            echo "<a href='pedidos.php'>Pedidos</a>";
            echo "<a href='admin.php'>Añadir libros</a>";
         }

         ?>
         <a href="../index.php">Libros</a>

         <?php

         //Cuenta los libros en el carrito para mostrar un numero al lado que corresponde a la cantidad de libros en el carrito
         $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
         $row_count = mysqli_num_rows($select_rows);

         ?>

         <a href="cart.php" class="cart">Carrito <span><?php echo $row_count; ?></span> </a>

         <a href='../cerrarSesion.php' class="cart">Cerrar Sesión</a>

      </nav>

      <!-- menu desplegable para móviles-->
      <div id="menu-btn" class="fas fa-bars"></div>


   </div>

</header>