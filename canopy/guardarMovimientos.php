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
    //incluimos los archivos necesarios e inicializamos sus objetos
    require_once '../bbdd/movimientos.php';
    $movimiento = new Movimientos();
    require_once '../bbdd/sesiones.php';
    $sesion = new Sesiones();
    require_once '../bbdd/empleados.php';
    $empleado = new Empleados();

    //comprobamos que se ha elegido un destino y lo guardamos en una variable
    if ($_POST['destino']) {
      $destino = $_POST['destino'];
    }elseif ($_POST['otrosDestinos']) {
      $destino = $_POST['otrosDestinos'];
    }else {
      //si no se ha elegido ningun destino, lo devolvemos a la pagina de destinos
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
        //si hay un origen y un destino
        //guardamos la hora y la fecha de fin
        $diad = date('Y-m-d');
        $horad = date('H:i:s');
        //sacamos el usuario de la sesion iniciada
        $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
        //llamamos a la funcion de guardar el movimiento
        $nuevoMovimiento=$movimiento->nuevoMovimiento($_POST['diao'], $_POST['horao'], $_POST['origen'], $_POST['bastidor'], $diad, $horad, $destino, $usuario['user'], 'CANOPY');
        if ($nuevoMovimiento == null) {
          //si el movimiento no se guarda, avisamos
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
          //si el movimiento se guarda bien, incrementamos el contador y le llevamos ala pagina de finalizado
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
