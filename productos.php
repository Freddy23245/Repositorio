<?php
require "funciones.php";
$productos = miQuery("SELECT * FROM productos");
?>

<?php
require "templates/head.php";
require "templates/header.php";
?>	

<?php if (isset($_GET["borrar"])): ?>
<script>
   toastr.success('El producto #<?php echo $_GET["borrar"] ?> fue eliminado con éxito...', 'Producto eliminado');
</script>  
<?php endif; ?>
<?php if (isset($_GET["alta"])): ?>
<script>
   toastr.success('El producto fue ingresado con éxito...', 'Producto ingresado');
</script>  
<?php endif; ?>
<main role="main">

   <div class="album py-5 bg-light">
      <div class="container">
         <?php if ($_SESSION["log"]): ?>
            <form class="form-inline" method="POST" action="editar.php">
               <button type="submit" class="btn btn btn-success"><i class="fa fa-plus"></i> Nuevo Producto</button>
               <input type="hidden" name="producto-id" value="">
            </form>
            <br><br>
         <?php endif; ?>
         <div class="row">
            <?php if (!empty($productos)): ?>
               <?php for ($i=0; $i < count($productos); $i++): ?>
                  <div class="col-md-4">
                     <div class="card mb-4 shadow-sm">
                        <img src="images/<?php echo $productos[$i]["imagen"] ?>" height="230px">
                        <div class="card-body">
                           <h3><?php echo $productos[$i]["nombre"] ?></h3>
                           <p class="card-text"><?php echo $productos[$i]["descripcion"] ?></p>
                           <?php if ($_SESSION["log"]): ?>
                              <div class="text-right">
                                 <form class="form-inline" method="POST" action="editar.php">
                                    <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</button>
                                    <input type="hidden" name="producto-id" value="<?php echo $productos[$i]["id"] ?>">
                                 </form>
                                 <form class="form-inline" method="POST" action="borrar.php">
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Borrar</button>
                                    <input type="hidden" name="producto-id" value="<?php echo $productos[$i]["id"] ?>">
                                 </form>
                              </div>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               <?php endfor; ?>
            <?php else: ?>
               <h4 class="noexisten"><i class="fa fa-warning"></i> No existen productos para mostrar.</h4>
            <?php endif; ?>

         </div>
      </div>
   </div>
</main>


<?php
require "templates/footer.php";
?>