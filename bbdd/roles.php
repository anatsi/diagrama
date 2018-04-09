<?php
/**
 * Clase encargada de las consultas a la tabla movimientos.
 */

 //Llamamos a la clase db, encargada de la conexion.
 require_once 'dbMovimientos.php';

class Roles extends dbMovimientos
{
  //la funcion construct llama al construct de db, encargada de la conexión.
  function __construct()
  {
    parent::__construct();
  }

  //funcion para sacar el ultimo rol que ha mantenido un usuario
  function ultimoRol($usuario){
    //Construimos la consulta
    $sql="SELECT * from roles WHERE usuario='".$usuario."' ORDER BY id DESC LIMIT 1";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }

  //funcion encargada de insertar un nuevo rol para el usuario
  function nuevoRol($rol, $usuario, $fechai, $horai){
    //realizamos la consuta y la guardamos en $sql
    $sql="INSERT INTO roles(id, rol, usuario, fecha_inicio, hora_inicio, fecha_fin, hora_fin)
    VALUES(NULL, '".$rol."', '".$usuario."', '".$fechai."', '".$horai."', NULL, NULL)";
    //Realizamos la consulta utilizando la funcion creada en db.php
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      return true;
    }else{
      return null;
    }
  }

  //funcion encargada de poner hora y fecha de fin a un rol de un usuario
  function finalizarRol($id, $fechaf, $horaf){
    $sql="UPDATE roles SET fecha_fin = '".$fechaf."', hora_fin = '".$horaf."' WHERE id = ".$id;
    $consulta=$this->realizarConsulta($sql);
    if ($consulta=!false) {
         return true;
    }else {
         return false;
    }
  }

}

 ?>
