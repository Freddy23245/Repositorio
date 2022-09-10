

<?php


require ("templates/head.php");
require ("templates/header.php");
require("Controladores/UsuarioControlador.php");
require("PHPMailer-master/enviar_mail.php");

$errors=array();


if (isset($_POST['Guardar'])){

$nombre = $_POST["nombre"];
$usuario = $_POST["usuario"];
$password = $_POST["password"];
$con_password=$_POST["con_password"];
$email=$_POST["email"];
$id_estado=2;
$tipo_usuario=2;
$pass_hash=sha1($password);

//$token=generateToken();

			if(UsuarioControlador::isNull($usuario,$pass_hash,$nombre,$email,$id_estado,$tipo_usuario))
			{
				$errors[] = "campos Vacios";
			}
			if(!UsuarioControlador::isEmail($email)){
				$errors[]="Mail Invalido";
			}
			if(!UsuarioControlador::validaPassword($password,$con_password))
			{
				$errors[]= "Verifique que las Contraseñas Coincidan";
			}
			if(UsuarioControlador::Email_Existe($email))
			{
				$errors[]= "El email Ya se encuentra registrado con otro usuario";
			}
			if(count($errors)==0){
			$registro = UsuarioControlador::Insertar($usuario,$pass_hash,$nombre,$email,$id_estado,$tipo_usuario);
			$_SESSION["message"]='Usuario Registrado Correctamente';
			$int_cast=(int)$registro;
			if($int_cast > 0)
			{
				
				$url='http://localhost/Proyecto_PP_3.0/activar.php?id='.$registro;
			
				//$asunto='Activar Cuenta  - Sistema de Ropa';
				$cuerpo="Estimado $nombre: <br><br> Para continuar con el proceso de registro
				es indispensable hacer click en el siguiente link <a href='$url'>Activar Cuenta</a>";
				echo "<Script>Alert(Registrado usuario)</Script>";
				if(enviar($email,$cuerpo))
				{
					
					$_SESSION["message"] ="Para terminar con el proceso de registro siga las siguientes instrucciones enviadas al correo $email";"<br><a href='login.php'>Iniciar Sesion</a>";
					//exit;
			
			
			}
		}

			

			
		


			}else{
				$errors[]= "Error al registrarse ";
			}
}

?>



<section class="listadop container">

<br>
            
<div class= "row">
        <div class= "col-mx-6 mx-auto">
 
 <div class="card">
          <div class="card-header">Registrarse</div>
          <div class="card-body text-center">
          <div class="card-text">

            <?php if (isset($error) && !empty($error)): ?>
             <script>
              toastr.error('<?php echo $error ?>', 'Error en el alta de usuario');
             </script>  
            <?php endif; ?>
            	 
				 <?php require("flash_message.php"); ?>
			
			<?php echo UsuarioControlador::resultBlock($errors); ?>
			<form action="" method="POST" enctype="multipart/form-data"> <?php //el enctype me sirve para insertar fotos ?>
              
     
							
							<div class="form-group">
								
								<div class="col-md-9">
									<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php if(isset($nombre)) echo $nombre; ?>" required >
								</div>
							</div>
							
							<div class="form-group">
								
								<div class="col-md-9">
									<input type="text" class="form-control" name="usuario" placeholder="Usuario" value="<?php if(isset($usuario)) echo $usuario; ?>" required>
								</div>
							</div>
							
							<div class="form-group">
							
								<div class="col-md-9">
									<input type="password" class="form-control" name="password" placeholder="Password" required>
								</div>
							</div>
							
							<div class="form-group">
								
								<div class="col-md-9">
									<input type="password" class="form-control" name="con_password" placeholder="Confirmar Password" required>
								</div>
							</div>
							
							<div class="form-group">
						
								<div class="col-md-9">
									<input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>" required>
								</div>
							</div>
							
						
							
							<div class="form-group">                                      
								<div class="col-md-offset-3 col-md-9">
									<button id="btn-signup" name="Guardar" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Registrar</button> 
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

    <br>

  </section>
   <?php require ("templates/footer.php"); ?>