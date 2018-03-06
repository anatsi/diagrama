<?php
require_once '../bbdd/sesiones.php';
$sesiones = new Sesiones();
require_once '../bbdd/empleados.php';
$empleado = new Empleados();

if (isset($_SESSION['usuario'])) {

if (isset($_POST['origen']) || isset($_POST['otrosOrigenes'])) {
  $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
  if ($_POST['origen']) {
    $origen = $_POST['origen'];
  }else {
    $origen = $_POST['otrosOrigenes'];
  }
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
      <a href="../roles.php" id='roles'>ROLES</a>
      <a  href= "#"><img src="../assets/img/logo.png" alt="logo TSI" title="Logo TSI" width="auto" height="50" /></a>
    </span>
    <br>
    <span class="derecha" onclick = "window.location= '../salir.php?m='+localStorage.contador+'&fi='+localStorage.fechaInicio+'&hi='+localStorage.horaInicio"><a>SALIR</a></span>
    <br>
    <br>
    <h3><?php echo $usuario['user']; ?>    -    <?php echo $origen; ?></h3>
  </header>
  <div class="two-columns">
    <form class="contact_form" action="destino.php" method="post" enctype="multipart/form-data">
      <?php
        $diao = date('Y-m-d');
        $horao = date('H:i:s');
        echo "<input type='hidden' name='horao' value='".$horao."'>";
        echo "<input type='hidden' name='diao' value='".$diao."'>";
       ?>
      <ul>
        <li>
          <label for="Bastidor" id="titulo">BASTIDOR</label>
          <input type="text" name="bastidor" autofocus required pattern="([W][F][a-zA-Z0-9]{8}[A-Z]{2}[0-9]{5})"/>
        </li>
      </ul>
      <?php
        echo "<input type='hidden' name='origen' value='".$origen."'>";
       ?>
  </div>
  <div class="botones">
    <button type="submit" name="button" id="siguiente"><b>SIGUIENTE</b></button>
    <button type="reset" name="button" id="reset"><b>LIMPIAR</b></button>
    <button type="button" name="button" id="atras" onclick="volverAtras();"><b>ATRAS</b></button>
  </div>
  </form>

</body>

</html>
<?php
}else {
  ?>
    <script type="text/javascript">
      alert('Elegir un origen antes de continuar.');
      window.location = 'origen.php';
    </script>
  <?php
}
 ?>
 <?php
 }else {
   ?>
     <script type="text/javascript">
       window.location = "../index.php";
     </script>
   <?php
 }
  ?>
