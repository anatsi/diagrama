<?php
/**
 * Clase encargada de las consultas a la tabla movimientos.
 */

 //Llamamos a la clase db, encargada de la conexion.
 require_once 'dbMovimientos.php';

class Movimientos extends dbMovimientos
{
  //la funcion construct llama al construct de db, encargada de la conexión.
  function __construct()
  {
    parent::__construct();
  }

  //funcion encargada de insertar un nuevo movimiento en la tabla de movimientos
  function nuevoMovimiento($fechao, $horao, $origen, $bastidor, $fechad, $horad, $destino, $usuario, $rol, $lanzamiento){
    //realizamos la consuta y la guardamos en $sql
    $sql="INSERT INTO movimientos(id, fecha_origen, hora_origen, origen, bastidor, fecha_destino, hora_destino, destino, usuario, error, rol, lanzamiento)
    VALUES(NULL, '".$fechao."', '".$horao."', '".$origen."', '".$bastidor."', '".$fechad."', '".$horad."', '".$destino."', '".$usuario."', 0, '".$rol."', '".$lanzamiento."')";
    //Realizamos la consulta utilizando la funcion creada en db.php
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      return true;
    }else{
      return null;
    }
  }

  //funcion para sacar el ultimo movimiento que ha hecho un usuario
  function UltimoMovimiento($bastidor){
    //Construimos la consulta
    $sql="SELECT * from movimientos WHERE bastidor='".$bastidor."' AND error = 0 ORDER BY id DESC LIMIT 1";
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

  //funcion encargada de sacar un moivmiento sabiendo su id
  function MovimientoID($id){
    //Construimos la consulta
    $sql="SELECT * from movimientos WHERE id=".$id;
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

  //funcion para marcar que un movimiento tiene error
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
