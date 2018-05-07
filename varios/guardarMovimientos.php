<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ELEGIR ORIGE</title>
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
    //incluimos los archivos necesarios e inicializamos sus objetos
    require_once '../bbdd/movimientos.php';
    $movimiento = new Movimientos();
    require_once '../bbdd/sesiones.php';
    $sesion = new Sesiones();
    require_once '../bbdd/empleados.php';
    $empleado = new Empleados();

    // comprobamos si se ha seleccionado algun destino
    if ($_POST['destino']) {
      $destino = $_POST['destino'];
    }elseif ($_POST['otrosDestinos']) {
      $destino = $_POST['otrosDestinos'];
    }else {
      // si no se ha seleccionado algun destino, lo devuelves a la pagina de destino
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
      //comprobamos si existe un origen y un destino
      if (isset($_POST['origen']) && isset($destino)) {
        //sacamos la fecha y la hora final
        $diad = date('Y-m-d');
        $horad = date('H:i:s');
        //sacamos le nombre del usuario conectado
        $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
        //cambiamos los caracteres 5 y 6 del bastidor por X.
        if (strlen($_POST['bastidor'])==17) {
          $bastidor = $_POST['bastidor'];
          $primera= substr($bastidor, 0, 4);
          $segunda = substr($bastidor, 6);
          $bastidorFinal = $primera .'XX'. $segunda;
        }elseif (strlen($_POST['bastidor'])==8) {
          $bastidorFinal = substr($_POST['bastidor'], 0, 7);
        }else {
          $bastidorFinal = $_POST['bastidor'];
        }

        //guardamos el nuevo movimiento en la bbdd
        $nuevoMovimiento=$movimiento->nuevoMovimiento($_POST['diao'], $_POST['horao'], $_POST['origen'], $bastidorFinal, $diad, $horad, $destino, $usuario['user'], 'VARIOS');
        if ($nuevoMovimiento == null) {
          // si no se guarda, le avisamos y lo devolvemos a la pantalla de origen
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
          //si se guarda correctamente, aumentamos el contador y le llevamos a la pantalla de finalizado
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
