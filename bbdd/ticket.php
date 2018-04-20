<?php
/**
 * Clase encargada de las consultas a la tabla ticket.
 */

 //Llamamos a la clase db, encargada de la conexion.
 require_once 'dbJockeys.php';

class Ticket extends dbJockeys
{
  //la funcion construct llama al construct de db, encargada de la conexión.
  function __construct()
  {
    parent::__construct();
  }

  //funcion encargada de insertar una nueva entrada en la tabla ticket
  function nuevoTicket($mensaje, $asunto, $usuario, $fecha, $hora){
    //realizamos la consuta y la guardamos en $sql
    $sql="INSERT INTO ticket(id, mensaje, asunto, usuario, fecha, hora, resuelto, comentario)
    VALUES(NULL, '".$mensaje."', '".$asunto."', '".$usuario."', '".$fecha."', '".$hora."', NULL, NULL)";
    //Realizamos la consulta utilizando la funcion creada en db.php
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      return true;
    }else{
      return null;
    }
  }

  //SACAR TODOS LOS TICKETS DE UN USUARIO
  function listaTicketsUsuario($usuario){
    //Construimos la consulta
    $sql="SELECT * from ticket WHERE usuario = '".$usuario."' ORDER BY id desc";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=null){
      //Montamos la tabla de resultados
      $tabla=[];
      while($fila=$resultado->fetch_assoc()){
        $tabla[]=$fila;
      }
      return $tabla;
    }else{
      return null;
    }
  }

}
 ?>
