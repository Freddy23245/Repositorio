<?php

class Productos{

    private $id_producto;
    private $id_marca;
    private $id_categoria;
    private $nombre;
    private $precio;
    private $descripcion;
	private $talle;
    private $stock;
    private $imagen;

    public function getId_producto(){
		return $this->id_producto;
	}

	public function setId_producto($id_producto){
		$this->id_producto = $id_producto;
	}

	public function getId_marca(){
		return $this->id_marca;
	}

	public function setId_marca($id_marca){
		$this->id_marca = $id_marca;
	}

	public function getId_categoria(){
		return $this->id_categoria;
	}

	public function setId_categoria($id_categoria){
		$this->id_categoria = $id_categoria;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}


	public function getTalle(){
		return $this->talle;
	}

	public function setTalle($talle){
		$this->talle = $talle;
	}



	public function getStock(){
		return $this->stock;
	}

	public function setStock($stock){
		$this->stock = $stock;
	}

	public function getImagen(){
		return $this->imagen;
	}

	public function setImagen($imagen){
		$this->imagen = $imagen;
	}




}




?>