<?php 


require("templates/head.php");
require("templates/header.php");
require_once("Controladores/ProductoControlador.php");
require_once("Controladores/CategoriaControlador.php");

$id = $_POST['id'];

$prod=ProductoControlador::get_prod_id($id);

?>	
                <section class="listadop container">
          
          <br>

          <div class= "row">
        <div class= "col-mx-6 mx-auto">
          
         
                <div class="card">
                        <div class="card-header">¿Desea eliminar producto?</div>
                        <div class="card-body text-center">
                                <div class="card-text">
                                        <p><?php echo $prod->getNombre() ?></p>

                                         <p class="contenedor tamano-1">
                                        <img src="imagenes/<?php echo $prod->getImagen();?>">
                                       </p>
                                        

                                         <p>Categoria:<?php echo $prod->getId_categoria() ?></p>

                                        <p>Marca:<?php echo $prod->getId_marca() ?></p>          
                 
                                                                                
                                      
                                        <form method="POST" action="abm.php">
                                                <button class="btn btn-danger" type="submit"><span class="fa fa-trash"></span>Eliminar</button> 
                                                <input type="hidden" name="accion" value="3">
                                                <input type="hidden" name="id" value="<?php echo $prod->getId_producto(); ?>">

                                                
                                                <a href="abm.php" class="btn btn-primary"><i class="fa fa-reply"></i> Volver</a>
                                        </form>
                                </div>
                                <!-- card text -->
                        </div>
                        <!-- text center -->
                </div>
                <!-- card -->

                </div> <!-- /col-md-6 -->
	</div> 	<!-- row -->
	<br>
                </section>
<?php require ("templates/footer.php") ?>

