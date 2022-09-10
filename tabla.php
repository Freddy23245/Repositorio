<?php require_once("Controladores/ProductoControlador.php");


$fila=ProductoControlador::mostrar_prod();


?>


<section class="tabla container">
	<div class="table-responsive">
		<table class="table table-hover table-condensed table-bordered table-fixed" id="iddatatable">
			<thead>
				<tr class="tablat">
					
				<th>Id Producto</th>
				    <th>Nombre</th>
					<th>Precio</th>
					<th>Stock</th>
					<th>Descripcion</th>
					<th>Talle</th>
					<th>Imagen</th>
					<th>Marca</th>
					<th>Categoria</th>
				    
					<th></th>
				</tr>
			</thead>
			<tfoot>
				<tr class="tablab">
				    
				<th>Id Producto</th>
				    <th>Nombre</th>
					<th>Precio</th>
					<th>Stock</th>
					<th>Descripcion</th>
					<th>Talle</th>
					<th>Imagen</th>
					<th>Marca</th>
					<th>Categoria</th>

                    <th></th>
				</tr>
			</tfoot>
			<tbody >
				
					
			<?php
					foreach ($fila as $p) { ?>
						<tr>
							<td><?php echo $p["id_producto"] ?></td>
							<td><?php echo $p["nombre"] ?></td>
							<td><?php echo $p["precio"] ?></td>
							<td><?php echo $p["stock"] ?></td>
							<td><?php echo $p["descripcion"] ?></td>
							<td><?php echo $p["talle"] ?></td>
							<td><img width="150" height="150" src="imagenes/<?php echo $p["imagen"] ?>"></td>
							
							
							<td><?php echo $p["Marca"] ?></td>
							<td><?php echo $p["Categoria"] ?></td>
						
							<td>
								<?php if ($_SESSION["log"]['id_tipo'] == '2' or $_SESSION["log"]['id_tipo'] == '1') { ?>
								
								<form class="formabm" method="POST" action="editar.php">
									<button class="btn btn-warning" type="submit" >
										<i class="fa fa-pencil"></i>
									</button>
									<input type="hidden" name="accion" value="2">
									<input type="hidden" name="id" value="<?php echo $p['id_producto']; ?>">

                               </form>

							<?php } ?>
								
						
								<?php if ($_SESSION["log"]['id_tipo'] == '1'){ ?>
								<form class="formabm" method="POST" action="eliminar.php">
									<button class="btn btn-danger" type="submit" >
										<i class="fa fa-trash"></i>
									</button> 
									<input type="hidden" name="accion" value="3">
									<input type="hidden" name="id" value="<?php echo $p['id_producto']; ?>">
								</form>
								<?php } ?>
							</td>
						</tr> 
					<?php 
						}
				?>

          </tbody>
		</table>
	</div>
</section>





