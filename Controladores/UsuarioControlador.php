<?php

        require_once("Datos/UsuarioDao.php");

class UsuarioControlador{



   public static function isNull($nombre, $user, $pass, $pass_con, $email){
		if(strlen(trim($nombre)) < 1 || strlen(trim($user)) < 1 || strlen(trim($pass)) < 1 || strlen(trim($pass_con)) < 1 || strlen(trim($email)) < 1)
		{
			return true;
			} else {
			return false;
		}		
	}
	
    public static function isEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
			return true;
			} else {
			return false;
		}
	}
	
    public static function validaPassword($var1, $var2)
	{
		if (strcmp($var1, $var2) !== 0){
			return false;
			} else {
			return true;
		}
	}
    public static function generateToken()
	{
		$gen = md5(uniqid(mt_rand(), false));	
		return $gen;
	}
	

    public static function isNullLogin( $user, $pass){
		if( strlen(trim($user)) < 1 || strlen(trim($pass)) < 1 )
		{
			return true;
			} else {
			return false;
		}		
	}
	
   public static function resultBlock($errors){
		if(count($errors) > 0)
		{
			echo "<div id='error' class='alert alert-danger' role='alert'>
			<a href='#' onclick=\"showHide('error');\"></a>
			<ul>";
			foreach($errors as $error)
			{
				echo "<li>".$error."</li>";
			}
			echo "</ul>";
			echo "</div>";
		}
	}




    public static function Insertar($usuario,$password,$nombre,$correo,$id_estado,$id_tipo)
    {
        $obj_usuario=new Usuarios();

        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);
        $obj_usuario->setNombre($nombre);
        $obj_usuario->setCorreo($correo);
        $obj_usuario->setId_estado($id_estado);
        $obj_usuario->setId_tipo($id_tipo);

     return   UsuarioDao::registrar($obj_usuario);




    }

    public static function login($usuario,$password)
    {
        $obj_usuario=new Usuarios();

        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);

      return  UsuarioDao::Login($obj_usuario);
    

    }


    public static function get_usuario($usuario,$password)
    {
        $obj_usuario=new Usuarios();

        $obj_usuario->setUsuario($usuario);
        $obj_usuario->setPassword($password);

      return  UsuarioDao::get_Usuario($obj_usuario);

    }


    public static function Email_Existe($email)
    {
        $obj_usuario=new Usuarios();
        $obj_usuario->setCorreo($email);

        return UsuarioDao::emailExiste($obj_usuario);

    }

    public static function last_session($id_usuario)
    {
        $obj_usuario=new Usuarios();
        $obj_usuario->setId_usuario($id_usuario);

        return UsuarioDao::Last_session($obj_usuario);

    }

    public static function activar($id_usuario)
    {
        $obj_usuario=new Usuarios();
        $obj_usuario->setId_usuario($id_usuario);

        return UsuarioDao::Activar($obj_usuario);

    }


    public static function habilitado($id_usuario)
    {
        $obj_usuario=new Usuarios();

        $obj_usuario->setId_usuario($id_usuario);

        return UsuarioDao::habilitado($obj_usuario);
    }


    


}



?>