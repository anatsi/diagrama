<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
//comprobamos si el bastidor se ha rellenado
if (isset($_POST['bastidor'])) {
  //incluimos los archivos necesarios e inicializamos sus objetos
  require_once '../bbdd/sesiones.php';
  $sesiones = new Sesiones();
  require_once '../bbdd/empleados.php';
  $empleado = new Empleados();
  require_once '../bbdd/campa.php';
  $campa = new Campa();
  //sacamos el nombre del usuario activo
  $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);

  //guardamos el nuevo registro de campa
  $nuevaCampa = $campa -> nuevoBastidor($_POST['bastidor'], $_POST['dia'], $_POST['hora'], $usuario['user']);
  if ($nuevaCampa == null) {
    //si no se guarda bien, avisamos al usuario y lo devolvemos a la pagina anterior
    ?>
    <script type="text/javascript">
      alert('Algo salio mal, vuelva a intentarlo, por favor.');
      window.location = 'index.php';
    </script>
    <?php
  }else {
    // si si que se guarda bien, le devolvemos a la pagina de inicio sin más
    ?>
      <script type="text/javascript">
        window.location = 'index.php';
      </script>
    <?php
  }
}else {
  //si no se ha rellenado volvemos a la pagina anterior
  ?>
  <script type="text/javascript">
    alert('Escanear un bastidor antes de continuar.');
    window.location = 'index.php';
  </script>
  <?php
}
 ?>
