<?php
/**
 * Clase encargada de las consultas a la tabla campa.
 */

 //Llamamos a la clase db, encargada de la conexion.
 require_once 'dbJockeys.php';

class Campa extends dbJockeys
{
  //la funcion construct llama al construct de db, encargada de la conexión.
  function __construct()
  {
    parent::__construct();
  }

  //funcion encargada de insertar una nueva entrada en la tabla campa
  function nuevoBastidor($bastidor, $fecha, $hora, $usuario){
    //realizamos la consuta y la guardamos en $sql
    $sql="INSERT INTO campa(id, bastidor, fecha, hora, usuario, proveedor, inspeccion)
    VALUES(NULL, '".$bastidor."', '".$fecha."', '".$hora."', '".$usuario."', NULL, NULL)";
    //Realizamos la consulta utilizando la funcion creada en db.php
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      return true;
    }else{
      return null;
    }
  }

  //funcion encargada de sacar el ultimo bastidor que ha guardado un usuario
  function UltimoBastidor($usuario){
    //Construimos la consulta
    $sql="SELECT * from campa WHERE usuario='".$usuario."' ORDER BY id DESC LIMIT 1";
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

}
 ?>
