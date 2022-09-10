<?php 
require_once("Datos/IniciarSession.php");
require_once("Controladores/CategoriaControlador.php");
require_once("carrito.php");
//require("Controladores/UsuarioControlador.php");
$filas=CategoriaControlador::mostrar();

 ?>

<header>

<div class="titulo container">
<div class="text-center">
    <hr class="bg-white">	      
	<p>INDUMENTARIA SPORT

    <span>&mdash; WCL &mdash;</span>
    </p>
    <hr class="bg-white">	

</div>		  
</div><!-- titulo -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark container">



	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
    <span class="navbar-toggler-icon"></span>
    </button>
	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav">

	<?php if (basename($_SERVER['PHP_SELF']) == "index.php") { ?>
          <li class="nav-item-active">
          <a class="btn btn-secondary nav-link active" aria-haspopup="true" href="index.php"><i class="fa fa-home"></i> Inicio
          	<span class="sr-only">(current)</span></a>
          </li>
          <?php } else { ?>
          <li class="nav-item">
         <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Inicio <span class="sr-only">(current)</span></a>
          </li> <?php } ?>
     
	<?php if (basename($_SERVER['PHP_SELF']) == "listado_productos.php") { ?>
       <li class="nav-item active"> 
       <li class="nav-item dropdown">
       <a class="btn btn-secondary nav-link active dropdown-toggle" aria-haspopup="true" href="#" id="navbarDropdown" data-toggle="dropdown"><i class="fa fa-star"></i>Categorias</a>
	   <div class="dropdown-menu">
	 
     <?php  
            
    foreach($filas as $valores){ ?>
          
                  <a class="dropdown-item" href="listado_productos.php?id=<?php echo $valores['id_categoria']; ?>"><?php echo $valores['nombre']; ?></a> 
                 
                      <?php   }  ?> 


	   </li>
	   </li>
          <?php } else { ?>
          <li class="nav-item"> 
       <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown"><i class="fa fa-star"></i> Categorias<span class="sr-only">(current)</span></a>
	   <div class="dropdown-menu">
	    
      <?php  
                   foreach($filas as $valores){ ?>
          
                      <a class="dropdown-item" href="listado_productos.php?id=<?php echo $valores['id_categoria']; ?>"><?php echo $valores['nombre']; ?></a> 
                 
                      <?php   }  //while */?>

	   </li>
	   </li> <?php } ?>

     <?php if (basename($_SERVER['PHP_SELF']) == "mostrar_carrito.php") { ?>
          <li class="nav-item-active">
          <a class="btn btn-secondary nav-link active" aria-haspopup="true" href="mostrar_carrito.php"><i class="fa fa-shopping-cart"></i>Carrito(<?php echo 
            (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']); 
            ?>)
            <span class="sr-only">(current)</span></a>
          </li>
          <?php } else { ?>
          <li class="nav-item">
         <a class="nav-link" href="mostrar_carrito.php"><i class="fa fa-shopping-cart"></i> Carrito(<?php 
          echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']); 
          ?>)
           <span class="sr-only">(current)</span></a>
          </li> <?php } ?>

       <?php  if(isset($_SESSION["log"])){ ?>

	    <li class="nav-item">
	    <a class="nav-link" href="logout.php"><i class="fa fa-user-circle"></i> Logout<span class="sr-only">(current)</span></a>
		</li>
       
        <li><span class="nav-link"><i class="fa fa-user"></i> Bienvenido <?php echo $_SESSION["log"]["usuario"]; ?> </span>
        </li>

	  <?php if($_SESSION["log"]["id_tipo"] == '1'){ ?>

         <?php if (basename($_SERVER['PHP_SELF']) == "abm.php") { ?>
          <li class="nav-item-active">
          <a class="btn btn-secondary nav-link active" aria-haspopup="true" href="abm.php"><i class="fa fa-pencil"></i>
          	Productos
          	<span class="sr-only">(current)</span></a>
          </li>
          <?php } else { ?>
          <li class="nav-item">
         <a class="nav-link" href="abm.php"><i class="fa fa-pencil"></i>Productos<span class="sr-only">(current)</span></a>
          </li> <?php } ?>

          <?php if (basename($_SERVER['PHP_SELF']) == "tablaVentas.php") { ?>
          <li class="nav-item-active">
          <a class="btn btn-secondary nav-link active" href="tablaVentas.php"><i class="fa fa-list"></i>
            Reportes
            <span class="sr-only">(current)</span></a>
          </li>
          <?php } else { ?>
          <li class="nav-item">
         <a class="nav-link" href="tablaVentas.php"><i class="fa fa-list"></i>Reportes<span class="sr-only">(current)</span></a>
          </li> <?php } ?>
       
        

	    <?php }//administrador 
		}//log ?> 

<?php if(!isset($_SESSION["log"])){ ?>

	<?php if (basename($_SERVER['PHP_SELF']) == "login.php") { ?>
          <li class="nav-item-active">
          <a class="btn btn-secondary nav-link active" href="login.php"><i class="fa fa-circle"></i> Login
          	<span class="sr-only">(current)</span></a>
          </li>
          <?php } else { ?>
          <li class="nav-item">
         <a class="nav-link" href="login.php"><i class="fa fa-circle"></i> Login <span class="sr-only">(current)</span></a>
          </li> <?php } ?>

    <li><span class="nav-link"><i class="fa fa-user"></i>No ha iniciado sesión</span></li>
                           
<?php }?>
   </ul>
 </div> <!-- div=collapse -->
</nav>
</header>


	
