<?php
require_once '../bbdd/sesiones.php';
$sesiones = new Sesiones();
require_once '../bbdd/empleados.php';
$empleado = new Empleados();
require_once '../bbdd/campa.php';
$campa = new Campa();

if (isset($_SESSION['usuario'])) {
  $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>MODO CAMPA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles.css" type="text/css" media="all">
  <script src="../pace/pace.js"></script>
<!--  <link href="../pace/themes/pace-theme-center-radar.css" rel="stylesheet">-->
  <link rel="shortcut icon" href="../assets/ico/favicon.ico">
  <script type="text/javascript" src="../comprobar.js"></script>

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
    <h3>
      <?php echo $usuario['user']; ?>
      <br>
      <?php
        $ultimoMov = $campa -> UltimoBastidor($usuario['user']);
        echo $ultimoMov['bastidor'];
       ?>
    </h3>
  </header>
  <div class="two-columns">
    <form class="contact_form" action="nuevaCampa.php" method="post" enctype="multipart/form-data">
      <?php
        $dia = date('Y-m-d');
        $hora = date('H:i:s');
        echo "<input type='hidden' name='hora' value='".$hora."'>";
        echo "<input type='hidden' name='dia' value='".$dia."'>";
       ?>
      <ul>
        <li>
          <label for="Bastidor" id="titulo">BASTIDOR</label>
          <input type="text" name="bastidor" autofocus required pattern="([W][F][a-zA-Z0-9]{8}[A-Z]{2}[0-9]{5})"/>
        </li>
      </ul>
  </div>
  <div class="botones">
    <button type="submit" name="button" id="siguiente"><b>GUARDAR</b></button>
    <button type="reset" name="button" id="reset" onclick="devolver();" style="width: 98%;"><b>LIMPIAR</b></button>
  </div>
  </form>

</body>

</html>
 <?php
 }else {
   ?>
     <script type="text/javascript">
       window.location = "../index.php";
     </script>
   <?php
 }
  ?>
