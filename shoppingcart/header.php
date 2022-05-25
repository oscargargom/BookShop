<header class="header">

   <div class="flex">

      <img src="../img/logoBarra.png" width="40" height="40" style="margin-right: 1%;"> 
      <a href="#" class="logo">Garden of Books</a>

      <nav class="navbar">
         <?php

         if($_SESSION['rol']==1){
            echo "<a href='pedidos.php'>Pedidos</a>";
            echo "<a href='admin.php'>Añadir libros</a>";
         }
         
         ?>
         <a href="products.php">Libros</a>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="cart.php" class="cart">Carrito <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

      <a type="button" href='../cerrarSesion.php' class="cart">Cerrar Sesión</a>

   </div>

</header>