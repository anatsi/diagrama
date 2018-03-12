<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ELEGIR DESTINO</title>
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
      require_once '../bbdd/empleados.php';
      $empleado = new Empleados();

      $existe = $empleado -> LoginUser($_POST['usuario2']);

      if ($existe == null) {
        ?>
          <script type="text/javascript">
            $.confirm({
              title: 'ERROR',
              content: 'El usuario elegido no existe.',
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
        ?>
          <script type="text/javascript">
            window.location = 'bastidor.php';
          </script>
        <?php
      }
     ?>
  </div>
</body>
</html>
