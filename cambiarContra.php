<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CAMBIAR CONTRASEÑA</title>
    <style media="screen">
      body{
        color: white;
      }
      .titul{
        color: black;
      }
    </style>
  <!-- Links para alerts y confirms -->
    <script src="./jquery/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="./jquery/jquery-confirm.css">
    <script src="./jquery/jquery-confirm.js"></script>
    <script type="text/javascript" src="comprobar.js"></script>
  </head>
  <body>
    <?php
      require_once './bbdd/empleados.php';
      $empleados = new Empleados();

      require_once './bbdd/sesiones.php';
      $sesiones = new Sesiones();

      if (isset($_POST['form-username']) && isset($_POST['form-password'])) {
        $usuario = $empleados -> EmpleadoUser($_SESSION['usuario']);
        if ($_POST['form-username'] == $_POST['form-password']) {
          $salt = '$tsi$/';
          if ($usuario['password'] == sha1(md5($salt . $_POST['form-username']))) {
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

            $contraC = sha1(md5($salt . $_POST['form-username']));
            $nuevaContra = $empleados -> cambiarContra($contraC, $_SESSION['usuario']);

            if ($nuevaContra == false) {
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
  </body>
</html>
