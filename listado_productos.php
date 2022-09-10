<?php require("templates/head.php"); ?>
<?php require("templates/header.php");?>
<?php require_once("Controladores/ProductoControlador.php");?>


<section class="listadop container">

  <?php if($mensaje!=""){?>
  <div class="alert alert-success">
    
    <?php echo $mensaje; ?>

    <a href="mostrar_carrito.php" class="badge badge-success">Ver carrito</a>

  </div>  
  <?php }//mensaje ?>
          <?php 
            $items=3;
            if(!isset($_GET['page'])){
                $page = 1;
            }else{
                $page = $_GET['page'];
            }
            $start=($page-1)*$items;
            //$query="SELECT * FROM productos LIMIT $start,$items";

       

 if(isset($_GET['id'])){

  $id = $_GET['id'];

  $id_cast=(int)$id;
   
   $productos= ProductoControlador::get_catalogo($id_cast);
   $cantidad= count($productos);

?> 
  <div>
    <br>
    <input type="text" name="buscador" id="buscador" placeholder="Buscar..." align="center">
    <br>
    
      <ul id="demo">
  
               <div class="row">

            <?php if($cantidad > 0){
              for($i = 0; $i < $cantidad; $i++){
                $prod = $productos[$i];
                ?>
  
  
  <div class="col-md-4 articulo" id="listado-productos">
  <div class="panel panel-default ">

<div class="panel-heading">
  <p><h4 class="featurette-heading2">
  <?php echo $prod["nombre"];?>
</h4></p>
</div>


 <p class="contenedor tamano-1">
    <img src="imagenes/<?php echo $prod['imagen']; ?>">
</p>
<br>

  
<P><h4 class="featurette-heading2"> Precio: $<?php echo $prod["precio"]; ?>
</h4></p>

<!--<p class="featurette-heading2"> Categoria: <?php echo $prod["categoria"];?> </p>-->
<p class="featurette-heading2"> Marca: <?php echo $prod["Marca"];?> </p>
<p class="featurette-heading2"> Talle: <?php echo $prod["talle"];?> </p>
<p class="featurette-heading2"> Stock: <?php echo $prod["stock"];?> </p>

</div>

<div class="panel-body">
<p class="featurette-heading2"> Descripcion: <?php echo $prod["descripcion"];?> </p>

</div> <!--panel-->

<div class="panel-footer">
 
 <form action="" method="post">

<input type="hidden" name="id_producto" id="id_producto" value="<?php echo $prod["id_producto"];?>">
<input type="hidden" name="nombre" id="nombre" value="<?php echo $prod["nombre"];?>">
<input type="hidden" name="precio" id="precio" value="<?php echo $prod["precio"];?>">


<input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1;?>">
 

  <button 
  class="btn btn-success btn-block"
  name="btnAccion"        
  value="Agregar"
  type="submit">
Agregar al carrito
</button>

</form>

</div> <!--panel-footer-->


</div> <!--col-->

 
 <?php } //ENDFOR
  }else{
  echo "no hay registros";
   } //endif cantidad ?>

    </div> <!-- row  -->


 <?php }//endif ?>

</ul>
  </div>
<br><br>
 
        <nav class="page-ind">
            <?php
            //$sql="SELECT * FROM productos WHERE id_categoria = '$id'";
            
          //  $Result2=mysqli_query(conectar(),$sql);

            if (empty($Result2)){ 
                echo " ";
            } else {
                $Registered=mysqli_num_rows($Result2);
                $Pages=ceil($Registered/$items);?>
                <ul class="pagination justify-content-center">
                  
                  <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                      <a class='page-link' href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1)."&id=".$id; } ?>">Anterior</a>
                  </li>
                  <?php
                  for ($i=1; $i <= $Pages ; $i++) { 
                  echo "<li class='page-item'><a class='page-link' href='listado_productos.php?page=".$i."&id=".$id."'>".$i." </a></li>";
                  } ?>
                  <li class="page-item <?php if($page >= $Pages){ echo 'disabled'; } ?>">
                      <a class='page-link' href="<?php if($page >= $Pages){ echo '#'; } else { echo "?page=".($page + 1)."&id=".$id; } ?>">Siguiente</a>
                  </li>
                  
                </ul>
            <?php 
            }
            ?>
            </nav>
            </section>

<?php require("templates/footer.php"); ?>
<script src="js/buscar_productos.js"></script>



          
          
          
        


 