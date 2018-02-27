<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CAMBIAR CONTRASEÑA</title>
    <style media="screen">
      body{
        color: white;
      }
    </style>
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
                alert('La contraseña debe de ser diferente a la que tenias.');
                window.location = "cambiarContraFormulario.php";
              </script>
            <?php
          }else {

            $contraC = sha1(md5($salt . $_POST['form-username']));
            $nuevaContra = $empleados -> cambiarContra($contraC, $_SESSION['usuario']);

            if ($nuevaContra == false) {
              ?>
                <script type="text/javascript">
                  alert('Algo salio mal. Intentelo mas tarde');
                  window.location = "index.html";
                </script>
              <?php
            }else {
              ?>
                <script type="text/javascript">
                  alert('Contraseña actualizada con exito.');
                  window.location = "roles.php";
                </script>
              <?php
            }
          }

        }else {
          ?>
            <script type="text/javascript">
              alert('Las contraseñas no coinciden.');
              window.location = "cambiarContra.html";
            </script>
          <?php
        }

      }
     ?>
  </body>
</html>
