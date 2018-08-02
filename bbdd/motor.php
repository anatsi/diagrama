<?php
/**
 * Clase encargada de las consultas a la tabla radio.
 */

 //Llamamos a la clase db, encargada de la conexion.
 require_once 'dbJockeys.php';

class Motor extends dbJockeys
{
  //la funcion construct llama al construct de db, encargada de la conexión.
  function __construct()
  {
    parent::__construct();
  }

  //funcion encargada de sacar el ultimo bastidor que ha guardado un usuario
  function buscarBastidor($bastidor){
    //Construimos la consulta
    $sql="SELECT * from motor WHERE bastidor LIKE '".$bastidor."' LIMIT 1";
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

  //funcion encargada de poner hora y fecha de fin a un rol de un usuario
  function bastidorLeido($bastidor){
    $sql="UPDATE motor SET leido = 1 WHERE bastidor = '".$bastidor."'";
    $consulta=$this->realizarConsulta($sql);
    if ($consulta=!false) {
         return true;
    }else {
         return false;
    }
  }

  //funcion encargada de insertar una nueva entradaa en la tabla de motor
  function nuevoVIN($bastidor, $motor){
    //realizamos la consuta y la guardamos en $sql
    $sql="INSERT INTO motor(id, bastidor, motor, leido) VALUES(NULL, '".$bastidor."', '".$motor."', 1)";
    //Realizamos la consulta utilizando la funcion creada en db.php
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      return true;
    }else{
      return null;
    }
  }


}

 ?>
