<?php 
//Prueba de Cambios
require("templates/head.php");
require("templates/header.php");
require("validar_imagen.php");
//require("validar_variasimagenes.php");
require_once("Controladores/CategoriaControlador.php");
require_once("Controladores/ProductoControlador.php");
require_once("Controladores/Producto_ImagenesControlador.php");
require_once("Controladores/DetalleCompraControlador.php");


 $fila1=CategoriaControlador::mostrar();
 $fila2=CategoriaControlador::mostrar_marca();
if (isset($_POST['accion'])){
  
  switch ($_POST['accion']){
      case '1':
      
      $marca = $_POST["Marca"];
      $categoria = $_POST["Categoria"];
      $nombre = $_POST["Nombre"];
      $precio = $_POST["Precio"];
      $descripcion = $_POST["Descripcion"];
      $talle=$_POST["Talle"];
      $stock = $_POST["Stock"];
      $imagen=  $file_name;

      $error = FALSE; //validaciones
      
      if (empty($nombre)) {
         $error .= "El nombre del producto no puede estar vacío.<br>";
      }

      if(ProductoControlador::Producto_Existe($nombre))
      {
        $error .= "El nombre del producto se encuentra registrado, por favor ingrese otro nombre";
      }

      if (empty($precio)) {
         $error .= "El precio del producto no puede estar vacía.<br>";
      }

      if (empty($imagen)) {
         $error .= "La imagen del producto no puede estar vacía.<br>";
      }
      if (empty($categoria)) {
         $error .= "El producto debe tener una categoria asignada.<br>";
      } //verificar.errores

      if (empty($descripcion)) {
         $error .= "El producto debe tener una descripcion.<br>";
      } //verificar.errores
       

     if (!$error) {

      $registro_id_prod = ProductoControlador::agregar_prod($marca,$categoria,$nombre,$precio,$descripcion,$talle,$stock,$imagen);

      $_SESSION['message'] = 'Producto guardado correctamente'; //guardo mensaje en session
      $nombre = "";
      $precio = "";
      $imagen=  "";
      $categoria = "";
      $stock="";
      $descripcion = "";
      }//errores ejecuta funcion
     break;

    case '2':

    $id = $_POST["id"];
    $nombreNuevo = $_POST["Nombre"];
    $precioNuevo = $_POST["Precio"];
    $categoriaNueva = $_POST["Categoria"];
    $imagenNueva = $file_name;
    $descripcionNueva = $_POST["Descripcion"];
    $talleNuevo=$_POST["Talle"];
    $marcaNuevo = $_POST["Marca"];
    $stockNuevo = $_POST["Stock"];
     $error = FALSE; //validaciones
      if (empty($nombreNuevo)) {
         $error .= "El nombre del producto no puede estar vacío.<br>";
      }
      if (empty($precioNuevo)) {
         $error .= "El precio del producto no puede estar vacía.<br>";
      }

      if (empty($imagenNueva)) {
         $error .= "La imagen del producto no puede estar vacía.<br>";
      }
      if (empty($categoriaNueva)) {
         $error .= "El producto debe tener una categoria asignada.<br>";
      } //actualizar.errores
      
      if (empty($descripcionNueva)) {
         $error .= "El producto debe tener una descripcion asignada.<br>";
      } //actualizar.errores
      if(!$error){
 
         ProductoControlador::editar_prod($id,$marcaNuevo,$categoriaNueva,$nombreNuevo,$precioNuevo,$descripcionNueva,$talleNuevo,$stockNuevo,$imagenNueva);


    $_SESSION['message'] = 'Producto editado correctamente'; //guardo mensaje en session
    $_SESSION['message_type'] = 'info'; 
    }else{
    $_SESSION['message'] = 'Error al editar'; //guardo mensaje en session
    $_SESSION['message_type'] = 'info'; 	
    
    } //errores ejecuta

    break;

    case '3':   
      $id = $_POST['id'];
         if(DetalleCompraControlador::ProductoDetalle($id))
         {
            $_SESSION['message'] = 'El producto no se puede eliminar por favor verifique que no este en una compra'; //guardo mensaje en session
            $_SESSION['message_type'] = 'warning';

         }else{
            if(ProductoControlador::eliminar_prod($id))
            {
               $_SESSION['message'] = 'Producto eliminado'; //guardo mensaje en session
               $_SESSION['message_type'] = 'warning';
            }else{
               $_SESSION['message'] = 'Error al eliminar'; //guardo mensaje en session
               $_SESSION['message_type'] = 'warning';
            }
         }
      
 
      break;
            default:
               echo "No se ha seleccionado ninguna accion";
               break;

            } //switch
 } //isset accion

?>
        <section class="productosabm container">
        <div class="row">

        	<div class="col-lg-12">
                <span class="btn btn-primary btn_form" data-toggle="modal" data-target="#agregarnuevosdatosmodal">Agregar nuevo producto <span class="fa fa-plus-circle"></span>
                </span>
            </div>

            <div class="col-md-4">
            	<?php require("flash_message.php") ?>

            </div>
            
            <div class="col-lg-12">
                <?php include('tabla.php') ?>
            </div>

            
        </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar productos nuevos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="frmnuevo" method="POST" action="#" enctype="multipart/form-data">
                            
                            <label for="Nombre">Nombre</label>
                            <input class="form-control tituloProducto" type="text" name="Nombre" id="Nombre" placeholder="Ingrese nombre" required value="<?php if(isset($nombre) and !empty($nombre)) {echo $nombre;} ?>">
                            <br>
                            
                            <label for="Precio">Precio</label>
                            <input class="form-control" type="text" name="Precio" id="Precio" placeholder="Ingrese el precio del nuevo producto" required value="<?php if(isset($precio) and !empty($precio)) {echo $precio;} ?>">
                            <br>
                            
                    <div class="form-group">
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Categorias</label>
                    </div>
                  <select class="custom-select" id="Categoria" name= "Categoria">

                    <option selected></option>
                   
                    <?php foreach($fila1 as $valores){?>
                    <option value="<?php echo $valores['id_categoria']; ?>"><?php echo $valores['nombre']; ?></option> 
                 
                  <?php }?>

                  </select>
                  </div>
                  </div>
    


                   <div class="form-group">
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Marcas</label>
                    </div>

                      <select class="custom-select" id="Marca" name= "Marca">

                    <option selected></option>
                
                    <?php foreach($fila2 as $valores){?>
                    <option value="<?php echo $valores['id_marca']; ?>"><?php echo $valores['nombre']; ?></option> 
                 
                  <?php }?>
                  </select>
                  </div>
                  </div>
                

                  <label for="Stock">Stock</label>
                            <input class="form-control" type="number" name="Stock" id="Stock" placeholder="Ingrese el stock del nuevo producto" required value="<?php if(isset($stock) and !empty($stock)) {echo $stock;} ?>">
                            <br>

        <div class="form-group">
           <label for="Imagen">Añadir imagenes:</label>
        </div>
          
        <div class="form-group">
        <input type="file" name="Imagen" id="Imagen" multiple class="form-control" placeholder="Añadir imagenes">

        </div>
        
         <div class="form-group agregarMultimedia"> 
        <div class="input-group multimediaVirtual" style="display:none">
                
                <span class="input-group-addon"><i class="fa fa-youtube-play"></i></span> 
              
                 <input type="text" class="form-control input-lg multimedia" placeholder="Ingresar código video youtube">

              </div>

                   <!--=====================================
              SUBIR MULTIMEDIA DE PRODUCTO FÍSICO
              ======================================-->
              
              <div class="multimediaFisica needsclick dz-clickable">

                <div class="dz-message needsclick">
                  
                  Arrastrar o dar click para subir imagenes.

                </div>

              </div>

                    </div><br>

        <label for="Talle">Talle</label>
        <input class="form-control" type="text" name="Talle" id="Talle" placeholder="Ingrese la descripcion del nuevo producto" required value="<?php if(isset($talle) and !empty($talle)) {echo $talle;} ?>">
                            

        <label for="Descripcion">Descripcion</label>
        <input class="form-control" type="text" name="Descripcion" id="Descripcion" placeholder="Ingrese la descripcion del nuevo producto" required value="<?php if(isset($descripcion) and !empty($descripcion)) {echo $descripcion;} ?>">
                            
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <input type="hidden" name="accion" value="1">
        <input type="submit" class="btn btn-success guardarProducto" id="btnAgregarnuevo" value="Registrar"> 
        </div>
        
        </form>
        </div>
        </div>
        </div>
        </div>

<?php require("templates/footer.php") ?>
 
   <script>
    $(document).ready(function() {
        $('#iddatatable').DataTable();
    } );
</script>

 <script src="js/funcion_files.js"></script>


 <?php /* 

  <!-- SweetAlert 2 https://sweetalert2.github.io/-->
   <script src="files/plugins/sweetalert2/sweetalert2.all.js"></script>

   <!-- Dropzone http://www.dropzonejs.com/-->
   <script src="files/plugins/dropzone/dropzone.js"></script> 


   <!-- jQuery 3 -->
  <script src="files/bower_components/jquery/dist/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="files/bower_components/jquery-ui/jquery-ui.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="files/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

*/?>