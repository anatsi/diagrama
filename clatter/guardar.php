<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <style media="screen">
    body{
      color: black;
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
    require_once '../bbdd/clatter.php';
    $clatter = new Clatter();
    require_once '../bbdd/sesiones.php';
    $sesion = new Sesiones();
    require_once '../bbdd/empleados.php';
    $empleado = new Empleados();
    //sacamos el usuario con la sesion iniciada
    $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);

    //comprobar que se ha rellenado el ultimo formulario
      if (isset($_POST['arriba'])) {
        //recoger los datos del ultimo formulario
        if ($_POST['arriba'] == 'SI') {
          $clatters = $_POST['abajo'];
        }else {
          $clatters = $_POST['arriba'];
        }

        //sacar fecha y hora actual
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        //cambiamos los caracteres 5 y 6 del bastidor por X.
        if (strlen($_POST['bastidor'])==17) {
          $bastidor = $_POST['bastidor'];
          $primera= substr($bastidor, 0, 4);
          $segunda = substr($bastidor, 6);
          $bastidorFinal = $primera .'XX'. $segunda;
          $bastidorBuscar=substr($bastidorFinal, 10);
        }elseif (strlen($_POST['bastidor'])==8) {
          $bastidorFinal = substr($_POST['bastidor'], 0, 7);
          $bastidorBuscar=$bastidorFinal;
        }else {
          $bastidorFinal = $_POST['bastidor'];
          $bastidorBuscar=$bastidorFinal;
        }

        $mismoBastidor= $clatter ->buscarBastidor($bastidorBuscar);
        if ($mismoBastidor == null || $mismoBastidor == false) {
          //guardamos la entrada.
          $nuevaEntrada = $clatter -> nuevaRadio($bastidorFinal, $clatters, $fecha, $hora, $usuario['user']);
          if ($nuevaEntrada == null || $nuevaEntrada == false) {
            // si se guarda mal, avisamos al usuario
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
            //si se guarda bien, lo enviamos a la pagina de finalizado
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
                content: 'Bastidor repetido.',
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
