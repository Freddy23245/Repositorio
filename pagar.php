<?php 
require("templates/head.php"); 
require("templates/header.php");
require_once("Controladores/CompraControlador.php"); 
require_once("Controladores/DetalleCompraControlador.php"); 
  

?>

<?php if($_POST){
	$Monto=0; 
  $id_usuario = $_SESSION["log"]["id_usuario"];
  
  if(is_null($id_usuario)){
    header("location:login.php");
    $_SESSION["message"]="Debe loguearse para comprar";
  }
	
	foreach ($_SESSION['CARRITO'] as $indice => $producto) {
		$Monto=$Monto + ($producto['precio']*$producto['cantidad']);
	} 
	
	$registro_id = CompraControlador::agregar_compra($id_usuario,$Monto);
  
  $id_compra=(int)$registro_id;


	foreach ($_SESSION['CARRITO'] as $indice => $producto) {


	$id_producto = $producto['id_producto'];
    $precio_unitario = $producto['precio'];
    $cantidad = $producto['cantidad'];
    
   DetalleCompraControlador::agregar_detalleCompra($id_compra,$id_producto,$precio_unitario,$cantidad);
    DetalleCompraControlador::disminuir($id_producto,$cantidad);
     


	}
 
    unset($_SESSION['CARRITO']);
    header("location:index.php");
     $_SESSION["message"]="Compra realizada";
} //post
 
  
?>
  
  <div class="jumbotron container text-center">
  	<h1 class="display-4">¡Listo!</h1>
  	<hr class="my-4">
  	<p class="lead">Pagaste con MercadoPago la cantidad de:
      <h4> $<?php echo number_format($Monto,2);?> </h4>
    
	</p>
  	
  	<strong>Para aclaraciones: fariasrodrigoleonel@gmail.com</strong>
  </div>
   
 
<?php require("templates/footer.php") ?>