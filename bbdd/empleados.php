<?php
/**
 * Clase encargada de las consultas a la tabla movimientos.
 */

 //Llamamos a la clase db, encargada de la conexion.
 require_once 'dbOperativa.php';

class Empleados extends db
{
  //la funcion construct llama al construct de db, encargada de la conexión.
  function __construct()
  {
    parent::__construct();
  }


  //funcion que loguea al usuario contra la db
  function LoginUser($user){
    //Construimos la consulta
    $sql="SELECT * from empleados WHERE user='".$user."'";
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

  //funcion para actualizar actividad de la tabla general
  function cambiarContra($contra, $user){
    $sql="UPDATE empleados SET password = '".$contra."', primera_vez = 1 WHERE id = ".$user;
    $finalizarAct=$this->realizarConsulta($sql);
    if ($finalizarAct=!false) {
         return true;
    }else {
         return false;
    }
  }
}

 ?>
