<?php

require("Entidades/Usuarios.php");
require_once("Datos/Conexion.php");


class UsuarioDao extends Conexion{

    protected static $con;


    private static function getConnection()
    {
        self::$con=Conexion::conectar();
    }

    private static function desconectar()
    {
        self::$con=null;
    }

    public static function registrar($usuario)
    {
        
        $query="insert into usuarios(usuario,password,nombre,correo,last_session,id_estado,id_tipo)
        values(:usuario,:password,:nombre,:correo,null,:id_estado,:id_tipo)";

        self::getConnection();
        $resultado=self::$con->prepare($query);

        $resultado->bindValue(":usuario",$usuario->getUsuario());
        $resultado->bindValue(":password",$usuario->getPassword());
        $resultado->bindValue(":nombre",$usuario->getUsuario());
        $resultado->bindValue(":correo",$usuario->getCorreo());
        $resultado->bindValue(":id_estado",$usuario->getId_estado());
        $resultado->bindValue(":id_tipo",$usuario->getId_tipo());

        $resultado->execute();
        
    return  $resultado = self::$con->lastInsertId();

          
            
       
       

    }

    public static function Login($usuario)
    {
        $query="select id_usuario,password,usuario,nombre,correo,id_tipo,id_estado from usuarios where usuario=:usuario and password=:password";

        self::getConnection();

        $resultado=self::$con->prepare($query);

        $resultado->bindValue(":usuario",$usuario->getUsuario());
        $resultado->bindValue(":password",$usuario->getPassword());

        $resultado->execute();

        if($resultado->rowCount()>0 )
        {

            $filas=$resultado->fetch();
            if($filas['usuario']==$usuario->getUsuario() && $filas['password']==$usuario->getPassword())
            {
                return true;

            }

        }

        return false;




    }



    public static function get_Usuario($usuario)
    {
        $query="select * from usuarios where usuario=:usuario and password=:password";

        self::getConnection();

        $resultado=self::$con->prepare($query);

        $resultado->bindValue(":usuario",$usuario->getUsuario());
        $resultado->bindValue(":password",$usuario->getPassword());

        $resultado->execute();

    

            $filas=$resultado->fetch();

            $usuario=new Usuarios();

            $usuario->setId_usuario($filas["id_usuario"]);
            $usuario->setUsuario($filas["usuario"]);
            $usuario->setPassword($filas["password"]);
            $usuario->setNombre($filas["nombre"]);
            $usuario->setCorreo($filas["correo"]);
            $usuario->setId_estado($filas["id_estado"]);
            $usuario->setId_tipo($filas["id_tipo"]);


        return $usuario;

    }


    
    public static function emailExiste($email)
    {
        $query="select * from usuarios where correo=:correo";

        self::getConnection();

        $resultado=self::$con->prepare($query);

        $resultado->bindValue(":correo",$email->getCorreo());
      

        $resultado->execute();

        
        if($resultado->rowCount()>0 )
        {
            return true;
        }
        return false;
    }


    public static function Last_session($id_usuario)
    {
        $query="Update usuarios set last_session=NOW() where id_usuario=:id_usuario";

        self::getConnection();

        $resultado=self::$con->prepare($query);

        $resultado->bindValue(":id_usuario",$id_usuario->getId_usuario());
      

        $resultado->execute();

        
      
    }

   

    public static function Activar($id_usuario)
    {
        $query="Update usuarios set id_estado=1 where id_usuario=:id_usuario";

        self::getConnection();

        $resultado=self::$con->prepare($query);

        $resultado->bindValue(":id_usuario",$id_usuario->getId_usuario());
      

        if ($resultado->execute())
        {
            return $msg="Cuenta Activada";
        }else{
            return $msg="Cuenta bloqueada";
        }

       

      
    }

    public static function cambiar_pass($usu)
    {
        $query="Update usuarios set password=:password where correo=:correo";

        self::getConnection();

        $resultado=self::$con->prepare($query);

        $resultado->bindValue(":correo",$usu->getCorreo());
        $resultado->bindValue(":password",$usu->getPassword());
      

        if ($resultado->execute())
        {
            return $msg="Cuenta Activada";
        }else{
            return $msg="Cuenta bloqueada";
        }

       

      
    }


    public static function habilitado($usu)
    {
        $query="select e.estado from usuarios u inner join estados e on e.id_estado=u.id_estado where u.id_usuario=:id_usuario;";

        self::getConnection();

        $resultado=self::$con->prepare($query);

        $resultado->bindValue(":id_usuario",$usu->getId_usuario());


       $filas= $resultado->fetch();

        $filas["estado"];

        return $filas;




    }



    










}











?>