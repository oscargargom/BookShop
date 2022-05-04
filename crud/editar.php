<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['id'])){
        header('Location: configAdmin.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd->prepare("select * from items where id = ?;");
    $sentencia->execute([$id]);
    $itemsLibros = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($itemsLibros);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $itemsLibros->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">precio: </label>
                        <input type="number" class="form-control" name="txtPrecio" autofocus required
                        value="<?php echo $itemsLibros->precio; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Imagen: </label>
                        <input type="text" class="form-control" name="txtImagen" autofocus required
                        value="<?php echo $itemsLibros->imagen; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoria: </label>
                        <input type="text" class="form-control" name="txtCategoria" autofocus required
                        value="<?php echo $itemsLibros->categoria; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $itemsLibros->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>