<?php
	require_once("Controladores/Producto_ImagenesControlador.php");;
	#RECIBIR ARCHIVOS MULTIMEDIA
#-----------------------------------------------------------
	if(isset($_POST["tituloProducto"]) && isset($_POST["multimedia"])){
    
    var_dump($_POST["tituloProducto"]);

    var_dump($_POST["multimedia"]);

	$tituloProducto = $_POST["tituloProducto"];
	$imagen = $_POST["multimedia"];
	
	Producto_ImagenesControlador::agregar_imagenes($tituloProducto,$imagen);

		if ($sql) {
			echo "ok";
		}else{	
			echo "error";
		}


	}