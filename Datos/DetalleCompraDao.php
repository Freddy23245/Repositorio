<?php

require("Entidades/DetalleCompra.php");
require_once("Datos/Conexion.php");



class DetalleCompraDao extends Conexion{

    protected static $con;


    private static function getConnection()
    {
        self::$con=Conexion::conectar();

        
    }

    private static function desconectar()
    {
        self::$con=null;
    }

   public static function Agregar_detalleCompra($detalleCompra){

    $query="insert into detalle_compras(id_compra,id_producto,cantidad,precio_unitario) values(:id_compra,:id_producto,:cantidad,:precio_unitario)";

    self::getConnection();

    $resultado=self::$con->prepare($query);

    $resultado->bindValue(":id_compra",$detalleCompra->getid_compra());
    $resultado->bindValue(":id_producto",$detalleCompra->getid_producto());
    $resultado->bindValue(":cantidad",$detalleCompra->getcantidad());
    $resultado->bindValue(":precio_unitario",$detalleCompra->getprecio_unitario());
   
    $resultado->execute();

     }

   

       public static function disminuir_Stock($detalleCompra){


         $query="update productos set stock = stock - :cantidad where id_producto=:id_producto";

            self::getConnection();

            $resultado=self::$con->prepare($query);

            $resultado->bindValue(":cantidad",$detalleCompra->getcantidad());
            $resultado->bindValue(":id_producto",$detalleCompra->getid_producto());

            $resultado->execute();

  }

  public static function ProductoDetalle($ProductoDetalle)
    {
        $query="select * from detalle_compras where id_producto=:id_producto";

        self::getConnection();

        $resultado=self::$con->prepare($query);

        $resultado->bindValue(":id_producto",$ProductoDetalle->getid_producto());
      

        $resultado->execute();

        
        if($resultado->rowCount()>0 )
        {
            return true;
        }
        return false;
    }

}