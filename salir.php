<?php
require_once './bbdd/sesiones.php';
$sesion = new Sesiones();
require_once './bbdd/empleados.php';
$empleado = new Empleados();
require_once './bbdd/movimientos.php';
$movimientos = new Movimientos();
$usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ELEGIR ORIGEN</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css" type="text/css" media="all">
  <script src="./pace/pace.js"></script>
  <link href="./pace/themes/pace-theme-center-radar.css" rel="stylesheet">
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <script type="text/javascript" src="comprobar.js">

  </script>
  <script type="text/javascript">
    var fecha = new Date();
    var dia = fecha.getDate();
    var mes = fecha.getMonth();
    var year = fecha.getFullYear();

    var fechaFin = year + '-' + mes + '-' + dia;
    localStorage.setItem('fechaFin', fechaFin);

    var hora = fecha.getHours();
    var minutos = fecha.getMinutes();
    var segundos = fecha.getSeconds();

    var horaFin = hora + ':' + minutos + ':' + segundos;
    localStorage.setItem('horaFin', horaFin);
  </script>
</head>

<body>
  <header>
    <span class="izquierda">
    	<a  href= "#"><img src="assets/img/logo.png" alt="logo TSI" title="Logo TSI" width="auto" height="50" /></a>
    </span>
    <br>
    <br>
    <h3><?php echo $usuario['user']; ?></h3>
  </header>
    <div class="two-columns">
      <h3>MOVIMIENTOS REALIZADOS: <script>document.write(localStorage.contador);</script></h3>
    </div>
  <div class="botones">
    <button type="submit" name="button" id="siguiente" onclick="window.location = './bbdd/logout.php'"><b>SALIR</b></button>
  </div>
</body>
</html>
<?php
  $movimientos= "<script> document.write(localStorage.contador) </script>";
  $fechaInicio = "<script> document.write(localStorage.fechaInicio) </script>";
  $horaInicio = "<script> document.write(localStorage.horaInicio) </script>";
  $fechaFin = "<script> document.write(localStorage.fechaFin) </script>";
  $horaFin = "<script> document.write(localStorage.horaFin) </script>";
  $nuevoRegistro = $movimientos -> movimientosDia($usuario['user'], $fechaInicio, $horaInicio, $movimientos, $fechaFin, $horaFin);
 ?>
