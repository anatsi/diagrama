<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GUARDAR MOVIMIENTO</title>
    <style media="screen">
      body{
        color: white;
      }
      .titul{
        color: black;
      }
    </style>
    <!-- Links para alerts y confirms -->
      <script src="../jquery/jquery-3.3.1.min.js"></script>
      <link rel="stylesheet" href="../jquery/jquery-confirm.css">
      <script src="../jquery/jquery-confirm.js"></script>
  </head>
  <body>
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

  </body>
</html>
