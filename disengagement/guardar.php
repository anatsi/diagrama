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
    require_once '../bbdd/disengagement.php';
    $disengagement = new Disengagement();
    require_once '../bbdd/sesiones.php';
    $sesion = new Sesiones();
    require_once '../bbdd/empleados.php';
    $empleado = new Empleados();

    if (isset($_POST['derecha']) == false) {
      $_POST['derecha'] = NULL;
    }
    if (isset($_POST['izquierda']) == false) {
      $_POST['izquierda'] = NULL;
    }
    if (isset($_POST['derecha_reparado']) == false) {
      $_POST['derecha_reparado'] = NULL;
    }
    if (isset($_POST['izquierda_reparado']) == false) {
      $_POST['izquierda_reparado'] = NULL;
    }

      if (isset($_POST['bastidor'])) {
        //guardamos la hora y la fecha de fin
        $dia = date('Y-m-d');
        $hora = date('H:i:s');
        //sacamos el usuario de la sesion iniciada
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
        //llamamos a la funcion de guardar el movimiento
        $nuevoMovimiento=$disengagement->nuevoDisengagement($bastidorFinal, $_POST['construccion'], $dia, $hora, $_POST['tamano'], $_POST['tipo'], $_POST['ruido'], $_POST['derecha'], $_POST['izquierda'], $_POST['derecha_reparado'], $_POST['izquierda_reparado'], $usuario['user']);
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
                    window.location = 'index.php';
                  },
                },
              });
            </script>
          <?php

        }else {
          //si el movimiento se guarda bien, incrementamos el contador y le llevamos ala pagina de finalizado
          ?>
            <script type="text/javascript">
              window.location = 'finalizado.php';
            </script>
          <?php
        }
      }
     ?>
  </div>
</body>
</html>
