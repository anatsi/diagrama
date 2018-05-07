<?php
/**
 * Clase encargada de las consultas a la tabla disengagement.
 */

 //Llamamos a la clase db, encargada de la conexion.
 require_once 'dbJockeys.php';

class Disengagement extends dbJockeys
{
  //la funcion construct llama al construct de db, encargada de la conexión.
  function __construct()
  {
    parent::__construct();
  }

  //funcion encargada de insertar una nueva entrada en la tabla campa
  function nuevoDisengagement($bastidor, $construccion, $fecha, $hora, $tamano, $tipo, $ruido, $derecha, $izquierda, $derecha_reparada, $izquierda_reparada, $usuario){
    //realizamos la consuta y la guardamos en $sql
    $sql = "INSERT INTO disengagement(id, bastidor, construccion, fecha, hora, tamano, tipo,  ruido, derecha, izquierda, derechaR, izquierdaR, usuario)
    VALUES(NULL, '".$bastidor."', '".$construccion."', '".$fecha."', '".$hora."', '".$tamano."', '".$tipo."', '".$ruido."', '".$derecha."', '".$izquierda."', '".$derecha_reparada."', '".$izquierda_reparada."', '".$usuario."')";
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
