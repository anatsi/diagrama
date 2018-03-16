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
    //incluimos los archivos necesarios e inicializamos sus objetos
      require_once '../bbdd/empleados.php';
      $empleado = new Empleados();
      require_once '../bbdd/roles.php';
      $rol = new Roles();
      //comprobamos si el usuario elegido existe
      $existe = $empleado -> LoginUser($_POST['usuario2']);

      if ($existe == null) {
        //si no exite se lo decimos y le devolvemos a la pantalla de elegir usuario
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
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        // si si que existe le llevamos a la pantalla de escanear el bastidor
        $nuevoRol = $rol -> nuevoRol('VINILOS', $_POST['usuario2'], $fecha, $hora);
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
