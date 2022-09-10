<?php

require("funcion_arraycolumn.php");
session_start();
$mensaje ="";


if(isset($_POST['btnAccion'])){
     switch ($_POST['btnAccion']) {
    case 'Agregar':

      if(is_numeric($_POST['id_producto'])){
        $ID = $_POST['id_producto'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
      }else{
       
        $mensaje = "id de producto incorrecto ".$ID; break;}

 if(!isset($_SESSION['CARRITO'])){
            
            $producto=array(
                'id_producto'=>$ID,
                'nombre'=>$nombre,
                'cantidad'=>$cantidad,
                'precio'=>$precio,
            );
            $_SESSION['CARRITO'][0]=$producto;
            
            $mensaje= "Producto agregado al carrito";
            
        }else{
            
            $idProductos=array_column($_SESSION['CARRITO'],"id_producto");    
            


            if(in_array($ID,$idProductos)){
                echo "<script>alert('El producto ya ha sido seleccionado..');</script>";
            }else{


            
            $NumeroProductos=count($_SESSION['CARRITO']);
            $producto=array(
                'id_producto'=>$ID,
                'nombre'=>$nombre,
                'cantidad'=>$cantidad,
                'precio'=>$precio,
            );


            $_SESSION['CARRITO'][$NumeroProductos]=$producto;
            $mensaje= "Producto agregado al carrito";
        }
    } 

  break;

  case "Eliminar":

  if(is_numeric($_POST['id_producto'])){
        $ID = $_POST['id_producto'];
        
        foreach ($_SESSION['CARRITO'] as $indice => $producto) {

        if ($producto['id_producto']==$ID){
        
          unset($_SESSION['CARRITO'][$indice]);
          
          echo "<script>alert('Elemento borrado...');</script>";
        } //if
        }//foreach 

      }else{
       

        echo "<script>alert('Error al borrar amigo...');</script>"; break;}

    break;
   
  
  }//switch
  }//if


?>