<?php
require_once './bbdd/movimientos.php';
$movimiento = new Movimientos();
require_once './bbdd/sesiones.php';
$sesion = new Sesiones();
require_once './bbdd/empleados.php';
$empleado = new Empleados();

if ($_POST['destino']) {
  $destino = $_POST['destino'];
}else {
  $destino = $_POST['otrosDestinos'];
}

  if (isset($_POST['origen']) && isset($destino)) {
    $diad = date('Y-m-d');
    $horad = date('H:i:s');
    $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
    $nuevoMovimiento=$movimiento->nuevoMovimiento($_POST['diao'], $_POST['horao'], $_POST['origen'], $_POST['bastidor'], $diad, $horad, $destino, $usuario['user']);
    echo $nuevoMovimiento;
    if ($nuevoMovimiento == null) {
      ?>
        <script type="text/javascript">
          alert("Error al registrar el movimiento.");
          window.location = 'origen.php';
        </script>
      <?php
    }else {
      ?>
        <script type="text/javascript">
          window.location = 'origen.php';
        </script>
      <?php
    }
  }

 ?>
