<?php
/**
 * Clase encargada de las consultas a la tabla radio.
 */

 //Llamamos a la clase db, encargada de la conexion.
 require_once 'dbJockeys.php';

class Radio extends dbJockeys
{
  //la funcion construct llama al construct de db, encargada de la conexión.
  function __construct()
  {
    parent::__construct();
  }

  //funcion encargada de insertar una nueva revision de radio
  function nuevaRadio($bastidor, $radio, $fecha, $hora, $usuario){
    //realizamos la consuta y la guardamos en $sql
    $sql="INSERT INTO radio(id, bastidor, radio, clima, fecha, hora, usuario)
    VALUES(NULL, '".$bastidor."', '".$radio."', '', '".$fecha."', '".$hora."', '".$usuario."')";
    echo $sql;
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
