<?php

require ("head.php");
require ("header.php");

?>

<section class="listadop container">
            
 <div class= "row">
 <div class= "col-md-4">
 
 <div class="card">
          <div class="card-header">Cambio de Contraseña</div>
          <div class="card-body text-center">
          <div class="card-text">

            <?php if (isset($error) && !empty($error)): ?>
             <script>
              toastr.error('<?php echo $error ?>', 'Error en el alta de usuario');
             </script>  
            <?php endif; ?>
            	 
				 <?php require("flash_message.php"); ?>
			
			<?//php echo UsuarioControlador::resultBlock($errors); ?>
			<form action="" method="POST" enctype="multipart/form-data"> <?php //el enctype me sirve para insertar fotos ?>
              
     
							
							<div class="form-group">
								
							
							<div class="form-group">
							
								<div class="col-md-9">
									<input type="password" class="form-control" name="password" placeholder="Nueva Contraseña" required>
								</div>
							</div>
							
							<div class="form-group">
								
								<div class="col-md-9">
									<input type="password" class="form-control" name="con_password" placeholder="Confirmar Nueva Contraseña" required>
								</div>
							</div>
							
						
							
						
							
							<div class="form-group">                                      
								<div class="col-md-offset-3 col-md-9">
									<button id="btn-signup" name="Guardar" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Cambiar Contraseña</button> 
								</div>
							</div>
			
          
          </form>
		  
		   </div>
       <!-- card text -->
       </div>
       <!-- text center -->
       </div>
       <!-- card -->
		</div> <!-- /col-md-6 -->

    </div> <!-- row -->
  </section>

<?php require("footer.php") ?>
