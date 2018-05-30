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

  //funcion encargada de sacar el ultimo bastidor que ha guardado un usuario
  function buscarBastidor($bastidor){
    //Construimos la consulta
    $sql="SELECT * from campa WHERE bastidor='".$bastidor."' ORDER BY id DESC LIMIT 1";
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

  function RestarHoras($horaini,$horafin)
         {
           $horai=substr($horaini,0,2);
           $mini=substr($horaini,3,2);
           $segi=substr($horaini,6,2);

           $horaf=substr($horafin,0,2);
           $minf=substr($horafin,3,2);
           $segf=substr($horafin,6,2);

           $ini=((($horai*60)*60)+($mini*60)+$segi);
           $fin=((($horaf*60)*60)+($minf*60)+$segf);

           $dif=$fin-$ini;

           $difh=floor($dif/3600);
           $difm=floor(($dif-($difh*3600))/60);
           $difs=$dif-($difm*60)-($difh*3600);
           return date("H:i:s",mktime($difh,$difm,$difs));
         }

}
 ?>
