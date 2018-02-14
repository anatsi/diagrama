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
      <?php
        $ultimoMovimiento = $movimientos ->UltimoMovimiento($usuario['user']);
        echo "<h3>EL ULTIMO MOVIMIENTO, CON VIN:".$ultimoMovimiento['bastidor']." SE BORRARÁ.</h3>";
       ?>
    </div>
  <div class="botones">
    <button type="button" name="button" id="siguiente" onclick="window.location = 'borrarddbb.php?id=<?php echo $ultimoMovimiento['id']; ?>';"><b>ACEPTAR</b></button>
    <button type="button" name="button" id="atras" style="width: 100%;" onclick="window.location = 'origen.php';"><b>ATRÁS</b></button>
  </div>
</body>
</html>
