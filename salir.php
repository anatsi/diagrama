<?php
//incluimos los archivos necesarios e inicializamos sus objetos
require_once './bbdd/sesiones.php';
$sesion = new Sesiones();
require_once './bbdd/empleados.php';
$empleado = new Empleados();
require_once './bbdd/movimientos.php';
$movimientos = new Movimientos();
require_once './bbdd/roles.php';
$rol = new Roles();
//sacamos el nombre del empleado con la sesion iniciada
$usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>SALIR</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles.css" type="text/css" media="all">
  <script src="./pace/pace.js"></script>
  <!--<link href="./pace/themes/pace-theme-center-radar.css" rel="stylesheet">-->
  <link rel="shortcut icon" href="./assets/ico/favicon.ico">
  <script type="text/javascript" src="comprobar.js"></script>
  <script type="text/javascript">
    function movimientos() {
      var contador = <?php echo $_GET['m']; ?>;
      if (contador == 0) {
        document.getElementById('movimientos').style.display='none';
      }else {
        document.getElementById('movimientos').style.display='block';
      }
    }
  </script>
</head>

<body onload="movimientos();">
  <header>
    <span class="izquierda">
    	<a  href= "#"><img src="./assets/img/logo.png" alt="logo TSI" title="Logo TSI" width="auto" height="50" /></a>
    </span>
    <br>
    <br>
    <h3><?php echo $usuario['user']; ?></h3>
  </header>
    <div class="two-columns">
      <h3 id="movimientos">MOVIMIENTOS REALIZADOS: <script>document.write(localStorage.contador);</script></h3>
    </div>
  <div class="botones">
    <button type="submit" name="button" id="siguiente" onclick="window.location = './bbdd/logout.php'"><b>SALIR</b></button>
  </div>
</body>
</html>
<?php
//recogemos las variables de inicio de sesion y de movimientos realizadps
  $movimientosVar= $_GET['m'];
  $fechaInicio = $_GET['fi'];
  $horaInicio = $_GET['hi'];
  $fechaFin = date('Y-m-d');
  $horaFin = date('H:i:s');
  //guardamos los movimientos realizados ese dia
  $nuevoRegistro = $rol -> movimientosDia($usuario['user'], $fechaInicio, $horaInicio, $movimientosVar, $fechaFin, $horaFin);
  //sacamos el ultimo rol que ha hecho ese usuario
  $ultimoRol = $rol -> ultimoRol($usuario['user']);
  // si el ultimo rol no tiene fecha de fin, se la ponemos
  if ($ultimoRol['fecha_fin'] == null && $ultimoRol['hora_fin'] == null || $ultimoRol['fecha_fin'] == '0000-00-00' && $ultimoRol['hora_fin'] == '00:00:00') {
    $finalizarRol = $rol -> finalizarRol($ultimoRol['id'], $fechaFin, $horaFin);
  }
  if ($_GET['u2']) {
    $ultimoRol2 = $rol -> ultimoRol($_GET['u2']);
    $finalizarRol = $rol -> finalizarRol($ultimoRol2['id'], $fechaFin, $horaFin);
  }
 ?>
<script type="text/javascript">
//devolvemos el contador a 0
  localStorage.setItem('contador', 0);
</script>
