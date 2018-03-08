<!-- Links para alerts y confirms -->
  <script src="../jquery/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="../jquery/jquery-confirm.css">
  <script src="../jquery/jquery-confirm.js"></script>
<?php
  require_once '../bbdd/sesiones.php';
  $sesiones = new Sesiones();
  require_once '../bbdd/empleados.php';
  $empleado = new Empleados();
  require_once '../bbdd/wrapGuard.php';
  $wrap = new WrapGuard();
  $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);

  if (isset($_POST['destino'])) {
    $usuario2 = $_POST['usuario2'];
    $modelo = substr($_POST['bastidor'], 8, 2);
    if ($modelo == 'MA') {
      $modelo = 'KUGA';
    }elseif ($modelo == 'CE' || $modelo == 'CD' || $modelo == 'CF') {
      $modelo = 'MONDEO';
    }elseif ($modelo == 'CJ') {
      $modelo = 'S-MAX';
    }elseif ($modelo == 'CK') {
      $modelo = 'GALAXY';
    }elseif ($modelo == 'G4' || $modelo == 'G5' || $modelo == 'G6' || $modelo == 'G7' || $modelo == 'GR' || $modelo == 'GS' || $modelo == 'GT' || $modelo == 'GU') {
      $modelo = 'CONNECT';
    }

    $mismoVIN = $wrap -> mismoVIN($_POST['bastidor']);
    if ($mismoVIN == null || $mismoVIN == false) {
      $repetido = 1;
    }else {
      $repetido = $mismoVIN['repetido'] +1;
    }

    $fecha = date('Y-m-d');
    $hora = date('H:i:s');
    $nuevoWrap = $wrap -> nuevoWrap($usuario['user'], $usuario2, $modelo, $_POST['destino'], $_POST['bastidor'], $fecha, $hora, $repetido);
    if ($nuevoWrap == false || $nuevoWrap == null) {
      ?>
      <script type="text/javascript">
        $.confirm({
          title: 'ERROR',
          content: 'Vuelva a registrar el vehiculo.',
          type: 'red',
          buttons: {
            OK: function () {
              window.location = 'bastidor.php';
            },
          },
        });
      </script>
      <?php
    }else {
      ?>
        <script type="text/javascript">
          window.location = 'finalizado.php';
        </script>
      <?php
    }
  }else {
    ?>
      <script type="text/javascript">
        $.confirm({
          title: 'ERROR',
          content: 'Elegir un destino antes de continuar.',
          type: 'red',
          buttons: {
            OK: function () {
              window.location = 'bastidor.php';
            },
          },
        });
      </script>
    <?php
  }
 ?>
