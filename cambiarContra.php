<?php
  require_once './bbdd/empleados.php';
  $empleados = new Empleados();

  require_once './bbdd/sesiones.php';
  $sesiones = new Sesiones();

  if (isset($_POST['form-username']) && isset($_POST['form-password'])) {
    if ($_POST['form-username'] == $_POST['form-password']) {
      $salt = '$tsi$/';
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
            window.location = "origen.php";
          </script>
        <?php
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
