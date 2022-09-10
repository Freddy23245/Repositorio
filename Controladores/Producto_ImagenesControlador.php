<?php

require_once("Datos/Producto_ImagenesDao.php");

class Producto_ImagenesControlador{


    public static function agregar_imagenes($titulo_producto,$imagen)
    {
        $obj_Producto_Imagenes=new Producto_Imagenes();

        $obj_Producto_Imagenes->settitulo_producto($titulo_producto);
        $obj_Producto_Imagenes->setImagen($imagen);

        return Producto_ImagenesDao::agregar_imagenes($obj_Producto_Imagenes);

    }
}
