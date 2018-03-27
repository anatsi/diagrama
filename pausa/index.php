<?php
//incluimos los archivos necesarios e inicializamos sus objetos
require_once '../bbdd/sesiones.php';
$sesion = new Sesiones();
require_once '../bbdd/empleados.php';
$empleado = new Empleados();
//sacamos el usuario de la sesion iniciada
$usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>MODO CHEQUER</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles.css" type="text/css" media="all">
  <script src="../pace/pace.js"></script>
  <!--<link href="../pace/themes/pace-theme-center-radar.css" rel="stylesheet">-->
  <link rel="shortcut icon" href="../assets/ico/favicon.ico">
  <script type="text/javascript" src="../comprobar.js"></script>
  <!-- Links para alerts y confirms -->
    <script src="../jquery/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../jquery/jquery-confirm.css">
    <script src="../jquery/jquery-confirm.js"></script>
    <script type="text/javascript" src="contador.js"></script>
</head>

<body onload="tiempo();">
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
      <h3>HAS ENTRADO EN PAUSA</h3>
    </div>
</body>
</html>
