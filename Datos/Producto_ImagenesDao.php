<?php 
require("Entidades/Producto_Imagenes.php");
require_once("Datos/Conexion.php");



class Producto_ImagenesDao extends Conexion{

    protected static $con;


    private static function getConnection()
    {
        self::$con=Conexion::conectar();

        
    }

    private static function desconectar()
    {
        self::$con=null;
    }


  public static function agregar_imagenes($img){

    $query="insert into producto_imagenes(titulo_producto, imagen) values(:titulo_producto,:imagen)";

    self::getConnection();

    $resultado=self::$con->prepare($query);

    $resultado->bindValue(":titulo_producto",$img->gettitulo_producto());
    $resultado->bindValue(":imagen",$img->getImagen());
    
        $resultado->execute();

  }

}