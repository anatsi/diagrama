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

  //funcion encargada de insertar los recuros para un servicio en la ddbb
  function movimientosDia($usuario, $fechao, $horao, $movimientos, $fechaf, $horaf){
    //realizamos la consuta y la guardamos en $sql
    $sql="INSERT INTO usuarios_movimientos(id, usuario, fecha_inicio, hora_inicio, movimientos, fecha_fin, hora_fin)
    VALUES(NULL, '".$usuario."', '".$fechao."', '".$horao."', ".$movimientos.", '".$fechaf."', '".$horaf."')";
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
