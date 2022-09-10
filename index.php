
<?php 
require("templates/head.php"); 
require("Datos/Conexion.php");
require("templates/header.php"); 
?> 

  <div class="index container">
	 <?php require("flash_message.php"); ?>
   
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" border-left= "black 5px solid"
  border-right= "black 5px solid">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="imagenes/100.jpeg" class="d-block w-100" width="200" height="500"  alt="...">
      <div class="container">
        <div class="carousel-caption text-left">
          <h1>Gran oportunidad.</h1>
          <p>No te pierdas los mejores precios en abrigos.</p>
          <p><a class="btn btn-lg btn-primary" href="#" role="button"><i class="fa fa-check"></i> Seguir viendo</a></p>
        </div>
      </div>
    </div> 
    <div class="carousel-item">
      <img src="imagenes/imgmov2.jpg" class="d-block w-100" width="200" height="500" alt="...">
      <div class="container">
        <div class="carousel-caption">
          <h1>Indumentaria deportiva.</h1>
          <p>Contamos con una gran variedad de indumentaria deportiva.</p>
          <p><a class="btn btn-lg btn-success" href="#" role="button"><i class="fa fa-search"></i> Continuar viendo</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="imagenes/25.jpg" class="d-block w-100" width="200" height="500" alt="...">
      <div class="container">
        <div class="carousel-caption text-right">
          <h1>No deje de visitar la pagina.</h1>
          <p>Contamos con mas de mil modelos deportivos.</p>
          <p><a class="btn btn-lg btn-warning" href="#" role="button"><i class="fa fa-image"></i> Seguir viendo</a></p>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div><!-- index -->
    

<?php require("templates/footer.php") ?>
	
  