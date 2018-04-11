<?php
/**
 * Clase encargada de las consultas a la tabla radio.
 */

 //Llamamos a la clase db, encargada de la conexion.
 require_once 'dbJockeys.php';

class Reallocation extends dbJockeys
{
  //la funcion construct llama al construct de db, encargada de la conexión.
  function __construct()
  {
    parent::__construct();
  }

  //funcion encargada de insertar una nueva revision de radio
  function nuevaReallocation($bastidor, $fecha, $hora, $destino, $usuario){
    //realizamos la consuta y la guardamos en $sql
    $sql="INSERT INTO reallocation(id, bastidor, fecha, hora, destino, usuario)
    VALUES(NULL, '".$bastidor."', '".$fecha."', '".$hora."', '".$destino."', '".$usuario."')";
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
