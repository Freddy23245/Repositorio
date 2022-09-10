<?php

class DetalleCompra{

private $id_carrito;
private $id_compra;
private $id_producto;
private $precio_unitario;
private $cantidad;

    public function getid_carrito(){
		return $this->id_carrito;
	}

	public function setid_carrito($id_carrito){
		$this->id_carrito= $id_carrito;
	}

	 public function getid_compra(){
		return $this->id_compra;
	}

	public function setid_compra($id_compra){
		$this->id_compra= $id_compra;
	}

	public function getid_producto(){
		return $this->id_producto;
	}

	public function setid_producto($id_producto){
		$this->id_producto = $id_producto;
	}

	public function getprecio_unitario(){
		return $this->precio_unitario;
	}

	public function setprecio_unitario($precio_unitario){
		$this->precio_unitario = $precio_unitario;
	}

	public function getcantidad(){
		return $this->cantidad;
	}

	public function setcantidad($cantidad){
		$this->cantidad = $cantidad;
	}

	
 }