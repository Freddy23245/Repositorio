<?php

class Usuarios{


        private $id_usuario;
        private $usuario;
        private $password;
        private $nombre;
        private $correo;
        private $last_session;
        private $id_estado;
        private $id_tipo;

        public function getId_usuario(){
            return $this->id_usuario;
        }
    
        public function setId_usuario($id_usuario){
            $this->id_usuario = $id_usuario;
        }
    
        public function getUsuario(){
            return $this->usuario;
        }
    
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }
    
        public function getPassword(){
            return $this->password;
        }
    
        public function setPassword($password){
            $this->password = $password;
        }
    
        public function getNombre(){
            return $this->nombre;
        }
    
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function getCorreo(){
            return $this->correo;
        }
    
        public function setCorreo($correo){
            $this->correo = $correo;
        }
        public function getLast_session(){
            return $this->last_session;
        }
    
        public function setLast_session($last_session){
            $this->last_session = $last_session;
        }
    
        public function getId_estado(){
            return $this->id_estado;
        }
    
        public function setId_estado($id_estado){
            $this->id_estado = $id_estado;
        }
    
        public function getId_tipo(){
            return $this->id_tipo;
        }
    
        public function setId_tipo($id_tipo){
            $this->id_tipo = $id_tipo;
        }




}


?>