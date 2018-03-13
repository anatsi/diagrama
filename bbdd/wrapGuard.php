<?php
/**
 * Clase encargada de las consultas a la tabla movimientos.
 */

 //Llamamos a la clase db, encargada de la conexion.
 require_once 'dbJockeys.php';

class WrapGuard extends dbJockeys
{
  //la funcion construct llama al construct de db, encargada de la conexión.
  function __construct()
  {
    parent::__construct();
  }

  //funcion encargada de insertar un nuevo registro de vinilos en la base de datos
  function nuevoWrap($usuario, $usuario2, $modelo, $destino, $bastidor, $fecha, $hora, $repetido){
    //realizamos la consuta y la guardamos en $sql
    $sql="INSERT INTO wrap_guard(id, usuario1, usuario2, modelo, destino, bastidor, fecha, hora, repetido)
    VALUES(NULL, '".$usuario."', '".$usuario2."', '".$modelo."', '".$destino."', '".$bastidor."', '".$fecha."', '".$hora."', ".$repetido.")";
    //Realizamos la consulta utilizando la funcion creada en db.php
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      return true;
    }else{
      return null;
    }
  }

  //funcion para comprobar si ya existe una entrada con ese mismo VIn en la base de ddatos
  function mismoVIN($bastidor){
    //Construimos la consulta
    $sql="SELECT * from wrap_guard WHERE bastidor='".$bastidor."' ORDER BY id DESC LIMIT 1";
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
