<?php
//inclimos los archivos necesarios e inicializamos sus objetos
require_once '../bbdd/sesiones.php';
$sesion = new Sesiones();
require_once '../bbdd/empleados.php';
$empleado = new Empleados();
//sacamos el usuario de la  sesion iniciada
$usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>MOVIMIENTO FINALIZADO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles.css" type="text/css" media="all">
  <script src="../pace/pace.js"></script>
  <!--  <link href="../pace/themes/pace-theme-center-radar.css" rel="stylesheet">-->
  <link rel="shortcut icon" href="../assets/ico/favicon.ico">
  <!--<script type="text/javascript">
    function movimientoFinalizado() {
      myVar = setTimeout(fuera, 2000);
    }
    function fuera() {
      window.location = 'origen.php';
    }
  </script>-->
</head>

<body>
  <header>
    <span class="izquierda">
    	<a  href= "#"><img src="../assets/img/logo.png" alt="logo TSI" title="Logo TSI" width="auto" height="50" /></a>
    </span>
    <br>
    <br>
    <h3><?php echo $usuario['user']; ?></h3>
  </header>
    <div class="two-columns">
      <h3>MOVIMIENTO REALIZADO CON EXITO</script></h3>
    </div>
    <div class="botones">
      <button type="button" name="button" id="siguiente" onclick="window.location = 'origen.php'"><b>ACEPTAR</b></button>
    </div>
</body>
</html>
