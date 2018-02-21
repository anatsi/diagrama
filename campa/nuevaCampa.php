<?php
if (isset($_POST['bastidor'])) {
  require_once '../bbdd/sesiones.php';
  $sesiones = new Sesiones();
  require_once '../bbdd/empleados.php';
  $empleado = new Empleados();
  require_once '../bbdd/campa.php';
  $campa = new Campa();
  $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);

  $nuevaCampa = $campa -> nuevoBastidor($_POST['bastidor'], $_POST['dia'], $_POST['hora'], $usuario['user']);
  if ($nuevaCampa == null) {
    ?>
    <script type="text/javascript">
      alert('Algo salio mal, vuelva a intentarlo, por favor.');
      window.location = 'index.php';
    </script>
    <?php
  }else {
    ?>
      <script type="text/javascript">
        window.location = 'index.php';
      </script>
    <?php
  }
}else {
  ?>
  <script type="text/javascript">
    alert('Escanear un bastidor antes de continuar.');
    window.location = 'index.php';
  </script>
  <?php
}
 ?>
