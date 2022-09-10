<?php
require_once("Datos/Conexion.php");



    class Categorias extends Conexion
    {

        protected static $con;


        private static function getConnection()
        {
            self::$con=Conexion::conectar();
    
            
        }
    
        private static function desconectar()
        {
            self::$con=null;
        }
    
    
        public static function listar_categoria()
        {
            $query="select * from categorias";
    
            self::getConnection();
    
            $resultado=self::$con->prepare($query);
    
            $resultado->execute();
    
            $filas=$resultado->fetchAll();
    
            return $filas;
    
    
        }
 
            

        public static function listar_marcas()
        {
            $query="select * from marcas";
    
            self::getConnection();
    
            $resultado=self::$con->prepare($query);
    
            $resultado->execute();
    
            $filas=$resultado->fetchAll();
    
            return $filas;
    
    
        }



    }



?>