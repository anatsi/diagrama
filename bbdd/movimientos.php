<?php
/**
 * Clase encargada de las consultas a la tabla movimientos.
 */

 //Llamamos a la clase db, encargada de la conexion.
 require_once 'dbJockeys.php';

class Movimientos extends dbJockeys
{
  //la funcion construct llama al construct de db, encargada de la conexión.
  function __construct()
  {
    parent::__construct();
  }

  //funcion encargada de insertar los recuros para un servicio en la ddbb
  function nuevoMovimiento($fechao, $horao, $origen, $bastidor, $fechad, $horad, $destino, $usuario){
    //realizamos la consuta y la guardamos en $sql
    $sql="INSERT INTO movimientos(id, fecha_origen, hora_origen, origen, bastidor, fecha_destino, hora_destino, destino, usuario)
    VALUES(NULL, '".$fechao."', '".$horao."', '".$origen."', '".$bastidor."', '".$fechad."', '".$horad."', '".$destino."', '".$usuario."')";
    //Realizamos la consulta utilizando la funcion creada en db.php
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      return true;
    }else{
      return null;
    }
  }

  //funcion encargada de insertar los movimientos diarios de cada jockey
  function movimientosDia($usuario, $fechao, $horao, $movimientos, $fechaf, $horaf){
    //realizamos la consuta y la guardamos en $sql
    $sql="INSERT INTO usuarios_movimientos(usuario, fecha_inicio, hora_inicio, movimientos_numero, fecha_fin, hora_fin)
    VALUES('".$usuario."', '".$fechao."', '".$horao."', ".$movimientos.", '".$fechaf."', '".$horaf."')";
    //Realizamos la consulta utilizando la funcion creada en db.php
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      return true;
    }else{
      return null;
    }
  }

  function UltimoMovimiento($usuario){
    //Construimos la consulta
    $sql="SELECT * from movimientos WHERE usuario='".$usuario."' AND error = 0 ORDER BY id DESC LIMIT 1";
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

  function marcarError($id){
    $sql="UPDATE movimientos SET error = 1 WHERE id = ".$id;
    $consulta=$this->realizarConsulta($sql);
    if ($consulta=!false) {
         return true;
    }else {
         return false;
    }
  }
}
 ?>
