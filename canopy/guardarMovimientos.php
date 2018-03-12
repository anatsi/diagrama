<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ELEGIR ORIGEN</title>
  <style media="screen">
    body{
      color: white;
    }
    .titul{
      color: black;
    }
  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles.css" type="text/css" media="all">
  <script src="../pace/pace.js"></script>
  <!--  <link href="../pace/themes/pace-theme-center-radar.css" rel="stylesheet">-->
  <link rel="shortcut icon" href="../assets/ico/favicon.ico">
  <script type="text/javascript" src="../comprobar.js"></script>

  <!-- Links para alerts y confirms -->
    <script src="../jquery/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../jquery/jquery-confirm.css">
    <script src="../jquery/jquery-confirm.js"></script>

</head>
<body>
  <div class="two-columns">
    <?php
    require_once '../bbdd/movimientos.php';
    $movimiento = new Movimientos();
    require_once '../bbdd/sesiones.php';
    $sesion = new Sesiones();
    require_once '../bbdd/empleados.php';
    $empleado = new Empleados();

    if ($_POST['destino']) {
      $destino = $_POST['destino'];
    }elseif ($_POST['otrosDestinos']) {
      $destino = $_POST['otrosDestinos'];
    }else {
      ?>
        <script type="text/javascript">
          $.confirm({
            title: 'Elegir un destino antes de continuar.',
            titleClass: 'titul',
            type: 'red',
            buttons: {
              OK: function () {
                window.location = 'destino.php';
              },
            },
          });
        </script>
      <?php
    }

      if (isset($_POST['origen']) && isset($destino)) {
        $diad = date('Y-m-d');
        $horad = date('H:i:s');
        $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
        $nuevoMovimiento=$movimiento->nuevoMovimiento($_POST['diao'], $_POST['horao'], $_POST['origen'], $_POST['bastidor'], $diad, $horad, $destino, $usuario['user'], 'CANOPY');
        if ($nuevoMovimiento == null) {
          ?>
            <script type="text/javascript">
              $.confirm({
                title: 'Error al registrar el movimiento.',
                titleClass: 'titul',
                type: 'red',
                buttons: {
                  OK: function () {
                    window.location = 'origen.php';
                  },
                },
              });
            </script>
          <?php
        }else {
          ?>
            <script type="text/javascript">
              localStorage.setItem("contador", Number(localStorage.contador) + 1);
              window.location = 'finalizado.php';
            </script>
          <?php
        }
      }
     ?>
  </div>
</body>
</html>
