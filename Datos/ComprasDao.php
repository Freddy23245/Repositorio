<?php

require("Entidades/Compras.php");
require_once("Datos/Conexion.php");



class ComprasDao extends Conexion{

    protected static $con;


    private static function getConnection()
    {
        self::$con=Conexion::conectar();

        
    }

    private static function desconectar()
    {
        self::$con=null;
    }

   public static function Agregar_compra($compras){

    $query="insert into compras(id_usuario,Fecha,Monto) values(:id_usuario, NOW(),:Monto)";

    self::getConnection();

    $resultado=self::$con->prepare($query);

    $resultado->bindValue(":id_usuario",$compras->getid_usuario());
    $resultado->bindValue(":Monto",$compras->getMonto());
 

        $resultado->execute();

        return  $resultado = self::$con->lastInsertId();

        

     }

   
   public static function listar_ventas()
  {
      $query="SELECT v.ID, v.ClaveTransaccion,v.PayPalDatos,v.Fecha,v.Correo,v.Total,v.Status FROM 
      tblventas as v;";

      self::getConnection();

      $resultado=self::$con->prepare($query);

      $resultado->execute();

      $filas=$resultado->fetchAll();

      return $filas;


  }

}