<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
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
    require_once '../bbdd/radio.php';
    $radio = new Radio();
    require_once '../bbdd/sesiones.php';
    $sesion = new Sesiones();
    require_once '../bbdd/empleados.php';
    $empleado = new Empleados();
    $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);

    //comprobar que se ha rellenado el ultimo formulario
      if (isset($_POST['arriba'])) {
        //recoger los datos del ultimo formulario
        if ($_POST['arriba'] == 'SI') {
          $clima = $_POST['abajo'];
        }else {
          $clima = $_POST['arriba'];
        }

        //sacar fecha y hora actual
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        //guardamos la entrada.
        $nuevaEntrada = $radio -> nuevaRadio($_POST['bastidor'], $_POST['radio'], $clima, $fecha, $hora, $usuario['user']);
        if ($nuevaEntrada == null || $nuevaEntrada == false) {
          ?>
            <script type="text/javascript">
              $.confirm({
                title: 'ERROR',
                content: 'El vehiculo no se ha podido registrar.',
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
        // si el ultimo formulario no se habia rellenado lo devolvemos a la pantalla principal
        ?>
          <script type="text/javascript">
            $.confirm({
              title: 'ERROR',
              content: 'Elegir una opcion antes de continuar.',
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
  </div>
</body>
</html>
