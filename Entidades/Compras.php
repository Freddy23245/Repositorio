<?php 

class Compras{

private $id_compra;
private $id_usuario;
private $Fecha;
private $Monto;

    public function getid_compra(){
		return $this->id_compra;
	}

	public function setid_compra($id_compra){
		$this->id_compra = $id_compra;
	}

	 public function getid_usuario(){
		return $this->id_usuario;
	}

	public function setid_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	public function getMonto(){
		return $this->Monto;
	}

	public function setMonto($Monto){
		$this->Monto = $Monto;
	}

 }
