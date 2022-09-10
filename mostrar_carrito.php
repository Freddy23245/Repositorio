<?php 
require("templates/head.php");
require("templates/header.php");
?>
<div class="container">
<br>
<h3>Lista del carrito</h3>

<?php if(!empty($_SESSION['CARRITO'])){ ?>

<table class="table table-light">
	<tbody>
		<tr>
			
			<th width="40%">Nombre</th>
			<th width="15%" class="text-center">Cantidad</th>
			<th width="20%" class="text-center">Precio </th>
			<th width="20%" class="text-center" >Total</th>
			<th width="5%">--</th>
		</tr>

		<?php $total = 0; ?>
		<?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
			
		<tr>
			<th width="40%"><?php echo $producto['nombre']?></th>
			<th width="15%" class="text-center"> <?php echo $producto['cantidad'] ?></th>

			<th width="20%" class="text-center"><?php echo $producto['precio']?></th>
			<th width="20%" class="text-center" ><?php echo number_format($producto['precio']*$producto['cantidad'],2);?></th>
			<th width="5%">
				<form action="" method="post">
				<input type="hidden" name="id_producto" 
				value="<?php echo $producto['id_producto'];?>">
								<button 
					class="btn btn-danger"
					type="submit"
					name="btnAccion"
					value="Eliminar"
					>Eliminar</button>
                	</form>

			</th>

		</tr>
        
		<?php $total=$total + ($producto['precio']*$producto['cantidad']); ?>

	    <?php } //endfor ?>
		<tr>
			<td colspan="3" align="right"><h3>Total</h3></td>
			<td align="right"><h3>$<?php echo number_format($total,2);?></h3></td>
			<td></td>
		</tr>

		<tr>	
        
         <td colspan="5">	

         	<form action="pagar.php" method="post">	

            <div class="alert alert-success">	
          
            <small id="emailHelp" class="form-text text-muted">	
                 Los productos se enviaran a este correo
                 <h4><?php echo $_SESSION["log"]["correo"]; ?></h4>
            </small>
            </div>
            
            <button class="btn btn-primary btn-lg btn-block" type="submit" onclick="Pagar(1)" 
            name="btnAccion" value="proceder">Proceder a pagar >>
            	
            </button>
            
            </form>
         </td>

		</tr>
	</tbody>
</table>
<?php }else{ ?>

<div class="alert alert-success">
    No hay productos en el carrito...
</div>	

<?php } //empty session?>
</div>

<script src="js/alertaPagar.js"></script>

<?php require("templates/footer.php"); ?>
