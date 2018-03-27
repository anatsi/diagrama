<?php
//incluimos los archivos necesarios e inicializamos sus objetos
require_once '../bbdd/sesiones.php';
$sesiones = new Sesiones();
require_once '../bbdd/empleados.php';
$empleado = new Empleados();

//comprobamos si la sesión esta iniciada.
if (isset($_SESSION['usuario'])) {
  $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);

 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ESCANEAR BASTIDOR</title>
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
  <header>
    <span class="izquierda">
      <a  href= "#"><img src="../assets/img/logo.png" alt="logo TSI" title="Logo TSI" width="auto" height="50" /></a>
    </span>
    <br>
    <br>
    <h3><?php echo $usuario['user']; ?></h3>
  </header>
  <div class="two-columns">
    <form class="contact_form" action="borrar2.php" method="post" enctype="multipart/form-data">
      <ul>
        <li>
          <label for="Bastidor" id="titulo">BASTIDOR A BORRAR:</label>
          <input type="text" name="bastidor" autofocus required pattern="([W][F][a-zA-Z0-9]{8}[A-Z]{2}[0-9]{5})"/>
        </li>
      </ul>
  </div>
  <div class="botones">
    <button type="submit" name="button" id="siguiente"><b>SIGUIENTE</b></button>
    <button type="reset" name="button" id="reset"><b>LIMPIAR</b></button>
    <button type="button" name="button" id="atras" onclick="window.location='origen.php'"><b>ATRAS</b></button>
  </div>
  </form>

</body>

</html>
<?php
}else {
  ?>
  <script type="text/javascript">
    window.location='../index.php';
  </script>
  <?php
}
 ?>
