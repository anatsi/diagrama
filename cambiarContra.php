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
  <link rel="stylesheet" href="styles.css" type="text/css" media="all">
  <script src="pace/pace.js"></script>
  <!--  <link href="../pace/themes/pace-theme-center-radar.css" rel="stylesheet">-->
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <script type="text/javascript" src="comprobar.js"></script>

  <!-- Links para alerts y confirms -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="jquery/jquery-confirm.css">
    <script src="jquery/jquery-confirm.js"></script>

</head>
<body>
  <div class="two-columns">
    <?php
    //incluimos los archivos necesarios e inicializamos sus objetos
      require_once './bbdd/empleados.php';
      $empleados = new Empleados();

      require_once './bbdd/sesiones.php';
      $sesiones = new Sesiones();

      //comprbarmos que se hayan rellenado las dos contraseñas
      if (isset($_POST['form-username']) && isset($_POST['form-password'])) {
        //sacamos el nombre del usuario que tiene la sesion iniciada
        $usuario = $empleados -> EmpleadoUser($_SESSION['usuario']);
        // comprobamos si las dos contraseñas coinciden
        if ($_POST['form-username'] == $_POST['form-password']) {
          $salt = '$tsi$/';
          //encriptamos la contraseña y la compramos con la que ya tenia el usuario
          if ($usuario['password'] == sha1(md5($salt . $_POST['form-username']))) {
            // si es la misma le marcamos el error y lo devolvemos a el formulario de cambiar las contraseñas
            ?>
              <script type="text/javascript">
              $.confirm({
                title: 'La contraseña debe ser diferente a la que tenias.',
                titleClass: 'titul',
                type: 'red',
                buttons: {
                  OK: function () {
                    window.location = 'cambiarContraFormulario.php';
                  },
                },
              });
              </script>
            <?php
          }else {
            // si es diferente, la encriptamos y la guardamos en la bbdd
            $contraC = sha1(md5($salt . $_POST['form-username']));
            $nuevaContra = $empleados -> cambiarContra($contraC, $_SESSION['usuario']);

            if ($nuevaContra == false) {
              // si no se guarda bien avisamos y volvemos al formulario
              ?>
                <script type="text/javascript">
                $.confirm({
                  title: 'Algo salio mal.',
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
              // si se guarda bien avisamos y le llevamos a la pantalla de roles
              ?>
                <script type="text/javascript">
                $.confirm({
                  title: 'Contraseña actualizada con exito!',
                  titleClass: 'titul',
                  buttons: {
                    OK: function () {
                      window.location = 'roles.php';
                    },
                  },
                });
                </script>
              <?php
            }
          }

        }else {
          // si las contraseñas no coinciden avisamos y volvemos al formulario de cambiar la contraseña
          ?>
            <script type="text/javascript">
            $.confirm({
              title: 'Las contraseñas no coinciden',
              titleClass: 'titul',
              type: 'red',
              buttons: {
                OK: function () {
                  window.location = 'cambiarContraFormulario.php';
                },
              },
            });
            </script>
          <?php
        }

      }
     ?>
  </div>
</body>
</html>
