<?php

require_once("Datos/ProductosDao.php");

class ProductoControlador{


    public static function agregar_prod($id_marca,$id_categoria,$nombre,$precio,$descripcion,$talle,$stock,$imagen)
    {
        $obj_prod=new Productos();

        $obj_prod->setId_marca($id_marca);
        $obj_prod->setId_categoria($id_categoria);
        $obj_prod->setNombre($nombre);
        $obj_prod->setPrecio($precio);
        $obj_prod->setDescripcion($descripcion);
        $obj_prod->setTalle($talle);
        $obj_prod->setStock($stock);
        $obj_prod->setImagen($imagen);

        return ProductosDao::Agregar_Productos($obj_prod);

    }


    public static function editar_prod($id_producto,$id_marca,$id_categoria,$nombre,$precio,$descripcion,$talle,$stock,$imagen)
    {
        $obj_prod=new Productos();

        $obj_prod->setId_producto($id_producto);
        $obj_prod->setId_marca($id_marca);
        $obj_prod->setId_categoria($id_categoria);
        $obj_prod->setNombre($nombre);
        $obj_prod->setPrecio($precio);
        $obj_prod->setDescripcion($descripcion);
        $obj_prod->setTalle($talle);
        $obj_prod->setStock($stock);
        $obj_prod->setImagen($imagen);

        return ProductosDao::Editar_productos($obj_prod);

    }

    public static function eliminar_prod($id_producto)
    {
        $obj_prod=new Productos();

        $obj_prod->setId_producto($id_producto);

        return ProductosDao::Eliminar_productos($obj_prod);

    }


    public static function mostrar_prod()
    {
        return ProductosDao::listar_productos();
    }

     public static function productos_mas_vendidos()
    {
        return ProductosDao::productos_mas_vendidos();
    }


    public static function get_producto($id_producto)
    {
        $obj_prod=new Productos();

        $obj_prod->setId_producto($id_producto);

        return ProductosDao::listar_productos();
    }


    public static function get_prod_id($id)
    {
        return ProductosDao::get_productos($id);
    }

    public static function get_catalogo($id)
    {
        return ProductosDao::catalogo_prod($id);
    }



    public static function Producto_Existe($producto)
    {
        $obj_producto=new Productos();
        $obj_producto->setNombre($producto);

        return ProductosDao::ProductoExiste($obj_producto);

    }


}




?>