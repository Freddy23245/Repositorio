<?php 
require("templates/head.php");
require("templates/header.php");
require("validar_imagen.php");

require_once("Controladores/ProductoControlador.php");
require_once("Controladores/CategoriaControlador.php");
$fila1=CategoriaControlador::mostrar();
$fila2=CategoriaControlador::mostrar_marca();

$id = $_POST['id'];

//$id_cast=(int)$id;


$prod=ProductoControlador::get_prod_id($id);

    if(isset($_POST['submit']))
    {   
        $id=$_POST["id"];
        $marca = $_POST["Marca"];
        $categoria = $_POST["Categoria"];
        $nombre = $_POST["Nombre"];
        $precio = $_POST["Precio"];
        $descripcion = $_POST["Descripcion"];
        $stock = $_POST["Stock"];
        $imagen=  $file_name;
        


      //$prod_Ed=  ProductoControlador::editar_prod($id,$marca,$categoria,$nombre,$precio,$descripcion,$stock,$imagen);

        //$_SESSION["message"]="Datos Modificados Correctamente";

        

    }


?>
                <section class="listadop container">
                <div class="card">
                        <div class="card-header">Editar producto</div>
                        <div class="card-body text-center">
                                <div class="card-text">

  <?php if (isset($error) && !empty($error)): ?>
  <script>
  toastr.error('<?php echo $error ?>', 'Error al editar producto');
  </script>  
  <?php endif; ?> 

             <div class= "row">
             <div class= "col-md-4 mx-auto"> <?php //alinea automaticamente ?>
             <div class="card card-body">

  <form action="abm.php" method="POST" enctype="multipart/form-data" > <?php //envio como parametro el ID y lo envio a traves del metodo POST ?>
				

  <div class="form-group">
		

				<div class="form-group">
				<label for="Name">Nombre de producto:</label>
				</div>
                         
				<div class="form-group">
				<input type="text" name="Nombre" id="Nombre" class="form-control" value="<?php echo $prod->getNombre(); ?>" autofocus> 
                
			    </div>
			   
                <br>

                <div class="form-group">
				<label for="Precio">Precio de producto:</label>
				 </div>
                
				<div class="form-group">
				<input type="number" name="Precio" id="Precio" class="form-control" value="<?php echo $prod->getPrecio();?>">
             
			    </div>
			   
                <br>
                <div class="form-group">
				<label for="Precio">Stock:</label>
				 </div>
                
				<div class="form-group">
				<input type="number" name="Stock" id="Stock" class="form-control" value="<?php echo $prod->getStock();?>">
            
			    </div>
			   
                <br>

				<div class="form-group">
				<label for="Categoria">Categoria de producto:</label>
				</div>
			   

                <div class="form-group">
                 <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Categorias</label>
                </div>
                  <select class="custom-select" id="Categoria" name= "Categoria">
                 
                   <?php foreach($fila1 as $valores){?>
                   <option value="<?php echo $valores['id_categoria']; ?>"><?php echo $valores['nombre']; ?></option> 
                
                 <?php }?>

                 </select>
                </div>
				</div>
                
                <br>

                <div class="form-group">
                 <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Marca</label>
                </div>
                  <select class="custom-select" id="Marca" name= "Marca">
          
                    
                
                    <?php foreach($fila2 as $valores1){?>
                    <option value="<?php echo $valores1['id_marca']; ?>"><?php echo $valores1['nombre']; ?></option> 
                 
                  <?php }?>
                 
                  </select>
                </div>
				</div>
                
                <br>
			   
			    <div class="form-group">
				<label for="Imagen">Imagen:</label>
				</div>
			    

			    <div class="form-group">
				
                <input type="file" name="Imagen" id="Imagen" class="form-control" value="imagenes/<?php echo $prod->getImagen();?>">
				</div>
                
                <br>
				
				<div class="form-group">
                
                     <img src="imagenes/<?php echo $prod->getImagen(); ?>" width="200px">
                  
				
				</div>
                
                <br>

                <div class="form-group">
				<label for="Descripcion">Talle:</label>
				 </div>

				<div class="form-group">
				<input type="text" name="Talle" id="Talle" class="form-control" value="<?php echo $prod->getTalle(); ?>">
			    </div>
			   
                <br>
                <div class="form-group">
				<label for="Descripcion">Descripcion de producto:</label>
				 </div>

				<div class="form-group">
				<input type="text" name="Descripcion" id="Descripcion" class="form-control" value="<?php echo $prod->getDescripcion(); ?>">
			    </div>
			   
                <br>

                <input type="hidden" name="accion" value="2">
                <input type="hidden" name="id" value="<?php echo $prod->getId_producto(); ?>">   

				<div class="form-group">
					
			   <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>

		        <a href="abm.php" class="btn btn-primary"><i class="fa fa-reply"></i> Volver</a>
					
				</div> 
				
	    </form>
		</div>
                                <!-- card text -->
                        </div>
                        <!-- text center -->
                </div>
                <!-- card -->
                </section>
       

<?php require("templates/footer.php") ?>