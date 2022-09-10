<?php

require_once("Datos/Categorias.php");

class CategoriaControlador{

    public static function mostrar()
    {
        return Categorias::listar_categoria();
    }




    public static function mostrar_marca()
    {
        return Categorias::listar_marcas();
    }

}






?>