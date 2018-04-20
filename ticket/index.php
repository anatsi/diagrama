<?php
//incluimos los archivos necesarios e inicializamos sus objetos
require_once '../bbdd/sesiones.php';
$sesion = new Sesiones();
require_once '../bbdd/ticket.php';
$ticket = new Ticket();
require_once '../bbdd/empleados.php';
$empleado = new Empleados();
//sacamos el usuario de la sesion iniciada
$usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>TICKETS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles.css" type="text/css" media="all">
  <script src="../pace/pace.js"></script>
  <link rel="shortcut icon" href="../assets/ico/favicon.ico">
  <script type="text/javascript" src="../comprobar.js"></script>
</head>

<!-- Al cargar la pagina, iniciamos la funcion del cronometro -->
<body>
  <header>
    <span class="izquierda">
      <a href="../roles.php" id='roles'>ROLES</a>
      <a  href= "#"><img src="../assets/img/logo.png" alt="logo TSI" title="Logo TSI" width="auto" height="50" /></a>
    </span>
    <br>
    <span class="derecha" onclick = "botonSalir();"><a>SALIR</a></span>
    <br>
    <br>
    <h3><?php echo $usuario['user']; ?></h3>
  </header>
    <div class="two-columns">
      <div class="botones">
        <button type="button" name="button" id='siguiente' style="width:98%;" onclick="window.location='ticketFormulario.php'"><b> NUEVO TICKET </b></button>
      </div>
      <?php
        $lista= $ticket -> listaTicketsUsuario($usuario['user']);
        $cuenta = 0;
        foreach ($lista as $ticket) {
          if ($cuenta % 2 == 0) {
            $stilo = 'background-color: #fffcf5';
          }else {
            $stilo = 'background-color: #CAC6C5';
          }
          //transformar fechas
          $fecha=explode("-", $ticket['fecha']);
          $fecha=$fecha[2]."-".$fecha[1]."-".$fecha[0];
          //arreglamos el campo resuelto.
          if ($ticket['resuelto'] != '' && $ticket['resuelto']!= null) {
            $resuelto = $ticket['resuelto'];
            $comentario = $ticket['comentario'];
          }else {
            $resuelto = "Pendiente";
            $comentario = '';
          }
          echo "
          <div style='".$stilo."'>
            <hr>
            <h4>TICKET Nº ".$ticket['id']."</h4>
            <hr>
            <h6><b>ASUNTO: </b>".$ticket['asunto']."</h6>
            <hr>
            <h6><b>MENSAJE: </b>".$ticket['mensaje']."</h6>
            <hr>
            <h6><b>DIA: </b>".$fecha."</h6>
            <hr>
            <h6><b>HORA: </b>".$ticket['hora']."</h6>
            <hr>
            <h6><b>RESUELTO: </b>".$resuelto."</h6>
            <hr>
            <h6><b>COMENTARIO: </b>".$comentario."</h6>
            <hr>
          </div>
          ";
          $cuenta ++;
        }
       ?>
    </div>
</body>
</html>
