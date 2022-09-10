
            <?php if(isset($_SESSION['message'])){ //pregunto si hay mensaje en session?>
				<div class="alert" align="text-center">

			    <?php echo $_SESSION['message']; //muestro mensaje en session?>

				<?php  if (isset($_SESSION["archivoSubido"]) && !empty($_SESSION["archivoSubido"])): //muestra foto?>

                <img src="<?php echo $_SESSION["archivoSubido"]; ?>" width="100" height="100" align="text-center">

                <?php endif; ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>

		    <?php unset($_SESSION['message']);
		          unset($_SESSION["archivoSubido"]); } 
		     ?>
