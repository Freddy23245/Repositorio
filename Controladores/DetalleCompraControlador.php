<?php

require_once("Datos/DetalleCompraDao.php");

class DetalleCompraControlador{


    public static function agregar_detalleCompra($id_compra,$id_producto,$precio_unitario,$cantidad)
    {
        $obj_detalleCompra=new DetalleCompra();

        $obj_detalleCompra->setid_compra($id_compra);
        $obj_detalleCompra->setid_producto($id_producto);
        $obj_detalleCompra->setprecio_unitario($precio_unitario);
        $obj_detalleCompra->setcantidad($cantidad);
       
        

        return DetalleCompraDao::Agregar_detalleCompra($obj_detalleCompra);

    }

    public static function disminuir($id_producto,$cantidad)
	{
		$obj_detalleCompra=new DetalleCompra();

		 $obj_detalleCompra->setid_producto($id_producto);
		 $obj_detalleCompra->setcantidad($cantidad);

		 return DetalleCompraDao::disminuir_Stock($obj_detalleCompra);
   	}

    public static function ProductoDetalle($ProductoDetalle)
    {
        $obj_ProductoDetalle=new DetalleCompra();
        $obj_ProductoDetalle->setid_producto($ProductoDetalle);

        return DetalleCompraDao::ProductoDetalle($obj_ProductoDetalle);

    }
}