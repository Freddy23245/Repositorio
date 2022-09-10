<?php
 
   require("templates/head.php");
   require("templates/header.php");
  require_once("Controladores/UsuarioControlador.php");


    
if (isset($_POST['accion'])) {

    $usuario=$_POST['user'];
    $password=$_POST['pass'];

    $pass_hash=sha1($password);

        

        if(UsuarioControlador::isNullLogin($usuario,$pass_hash))
        {
            $_SESSION["message"]="Por Favor Verifique que los Campos esten completo";
        }else
        {

       if( UsuarioControlador::login($usuario,$pass_hash))
       {
           
            $user=UsuarioControlador::get_usuario($usuario,$pass_hash);

            $_SESSION['log']=array(
            "id_usuario"=>$user->getId_usuario(),
            "usuario"=>$user->getUsuario(),
            "nombre"=>$user->getNombre(),
            "correo"=>$user->getCorreo(),
            "id_tipo"=>$user->getId_tipo(),
            "id_estado"=>$user->getId_estado(),
        
           
            );

           

            if($_SESSION["log"]["id_estado"]=="2")
            {
                $_SESSION["log"]=null;
                $_SESSION["message"] = 'Usuario Bloqueado ';
            }else{
                UsuarioControlador::last_session($_SESSION["log"]["id_usuario"]);
                header("location:index.php");
                $_SESSION["message"]="Bienvenido";
                echo "<script>toastr.success('Bienvenido');</script>";
            }
            

        

       }else{

            $_SESSION["message"]="Usuario o Contraseña Incorrectos";
            
            echo "<script>toastr.error('Error al loguearse');</script>";
       }
    }
        
        
  
    }







?>
      
	<section class="listadop container"> 

		<br>
        <div class= "row">
        <div class= "col-mx-6 mx-auto">
          
          <div class=card>
          <div class="card-header"> Login de usuario</div>
          <div class="card-body text-center">
          <div class="card-text">


    <form action="" method="POST" class="form-login">

	<?php  if (isset($error) && !empty($error)): ?>
    <script>
    toastr.error('<?php echo $error ?>', 'Error al loguearse');
    </script>  
    <?php endif; ?>

     <?php if(isset($_SESSION['message'])){ //verifico si existe mensaje?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert"> <?php //tipo de alerta ?>
             
             <?php echo $_SESSION['message']; //muestro mensaje ?> 
                
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span> <?php //tipo de boton ?>
                </button>
                </div>

        <?php unset($_SESSION['message']);
              unset($_SESSION["archivoSubido"]); } ?> 
				
	<div class="row">
	<div class="col-lg-4">
	<label for="userName">Usuario:</label>
	</div>
	
	<div class="col-lg-8">
	<input type="text" name="user" id="user" placeholder="Ingrese su nombre..." autofocus>
	</div>
	</div>    <!-- row -->
    
    <br>
    <div class="row">
	<div class="col-lg-4">
	<label for="userEmail">Contraseña:</label>
	</div>
 
    <div class="col-lg-8">
    <input type="password" name="pass" id="pass" placeholder="Ingrese contraseña...">
	</div>
    </div> <!-- row -->
    <br><br>            
    
    <div class="row">
    
    <div class="col-lg-5">
    <button type="submit" class="btn btn-success"><i class="fa fa-user"></i> Ingresar</button>
	<input type="hidden" name="accion" value="1">
    </div>
				
	<!--<div class="col-lg-5">
        <a href="recupera_pass.php">
	<button type="reset" class="btn btn-primary text-right"> Olvide Contraseña</button></a>
	</div>-->
    <div class="col-lg-7">
    <a href="recupera_pass.php"type="submit" class="btn btn-primary" ><i class="fa fa-reset"></i>Olvide Contraseña</a>
	
    </div>
	</div> <!-- row -->
    <br><br> 

	<div class="row">

   
    <div class="col-lg-12">
      <p><h6>¿Aun no te registraste?</h6></p>
    </div>
	</div> <!-- row -->
  
     <div class="row">

    <div class="col-lg-12">
    <a href="login_visitante.php"type="submit" class="btn btn-secondary" ><i class="fa fa-pencil"></i>Registrarse</a>
	<input type="hidden" name="accion" value="2">
    </div>
				
	
	</div> 	<!-- row -->
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

	<?php require("templates/footer.php") ?>
	

	