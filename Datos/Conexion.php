<?php

class Conexion{

     /**
     * Conexión a la base datos
     *
     * @return PDO
     */

    public static function conectar(){

        try {

            $cn=new PDO("mysql:host=localhost;dbname=tienda","root","");
            
            return $cn;


        } catch (PDOException $e) {
            
            die($e->getMessage());

        }
    }








}



?>