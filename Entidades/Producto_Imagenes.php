<?php class Producto_Imagenes{
    
    private $Id_imagen;
    private $titulo_producto;
    private $Imagen;

    public function getId_imagen(){
		return $this->Id_imagen;
	}

	public function setId_imagen($Id_imagen){
		$this->Id_imagen = $Id_imagen;
	}
    
    public function gettitulo_producto(){
		return $this->titulo_producto;
	}

	public function settitulo_producto($titulo_producto){
		$this->titulo_producto = $titulo_producto;
	}

	public function getImagen(){
		return $this->Imagen;
	}

	public function setImagen($Imagen){
		$this->Imagen = $Imagen;
	}
}