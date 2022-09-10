<?php 
 

 include("Controladores/Producto_ImagenesControlador");
 
if (isset($_POST['accion'])){

	$idProd=(int)$registro_id_prod;

	foreach ($_FILES['imagenes']['tmp_name'] as $key => $value) {
		if(file_exists($_FILES['imagenes']['tmp_name'][$key])){
         if(move_uploaded_file($_FILES['imagenes']['tmp_name'][$key], 'imagenes/'.$_FILES['imagenes']['name'][$key])){

         	$ruta = "imagenes/".$_FILES['imagenes']['name'][$key];
            Producto_ImagenesControlador::agregar_imagenes($idProd, $ruta);
             
         }
		}
	}
} //foreach
?>