<?php
/**
 * Clase encargada de las consultas a la tabla radio.
 */

 //Llamamos a la clase db, encargada de la conexion.
 require_once 'dbJockeys.php';

class Aullido extends dbJockeys
{
  //la funcion construct llama al construct de db, encargada de la conexión.
  function __construct()
  {
    parent::__construct();
  }

  //funcion encargada de insertar una nueva revision de radio
  function nuevaRadio($bastidor, $aullido, $fecha, $hora, $usuario){
    //realizamos la consuta y la guardamos en $sql
    $sql="INSERT INTO aullido(id, bastidor, aullido, fecha, hora, usuario)
    VALUES(NULL, '".$bastidor."', '".$aullido."', '".$fecha."', '".$hora."', '".$usuario."')";
    //Realizamos la consulta utilizando la funcion creada en db.php
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      return true;
    }else{
      return null;
    }
  }


  //funcion encargada de sacar el ultimo bastidor que ha guardado un usuario
  function buscarBastidor($bastidor){
    //Construimos la consulta
    $sql="SELECT * from aullido WHERE bastidor='".$bastidor."' ORDER BY id DESC LIMIT 1";
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
