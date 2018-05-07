<?php
//incluimos los archivos necesarios e inicializamos sus objetos
require_once '../bbdd/sesiones.php';
$sesiones = new Sesiones();
require_once '../bbdd/empleados.php';
$empleado = new Empleados();
require_once '../bbdd/campa.php';
$campa = new Campa();

if (isset($_SESSION['usuario'])) {
  //comprobamos si la sesion esta iniciada
  $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>MODO CAMPA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Enlaces a los archivos js y css necesarios -->
  <link rel="stylesheet" href="../styles.css" type="text/css" media="all">
  <script src="../pace/pace.js"></script>
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
    <span class="derecha" onclick = "botonSalir();"><a>SALIR</a></span>
    <br>
    <br>
    <h3>
      <?php echo $usuario['user']; ?>
      <br>
      <?php
      //sacamos el bastidor del ultimo registro de ese usuario
        $ultimoMov = $campa -> UltimoBastidor($usuario['user']);
        echo $ultimoMov['bastidor'];
       ?>
    </h3>
  </header>
  <div class="two-columns">
    <p style="font-weight: bold; font-size:16px; float: right;">SUPERVISOR CAMPA</p>
    <form class="contact_form" action="nuevaCampa.php" method="post" enctype="multipart/form-data">
      <?php
      //recogemos la fecha y la hora actuales y la pasamos por un input hidden
        $dia = date('Y-m-d');
        $hora = date('H:i:s');
        echo "<input type='hidden' name='hora' value='".$hora."'>";
        echo "<input type='hidden' name='dia' value='".$dia."'>";
       ?>
      <ul>
        <li>
          <label for="Bastidor" id="titulo">BASTIDOR</label>
          <input type="text" name="bastidor" autofocus required pattern="([W|N][F|M][a-zA-Z0-9]{8}[A-Z]{2}[0-9]{5})|([A-Z]{2}[0-9]{5}[A-Z]{1})|([A-Z]{2}[0-9]{5})"/>
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
   //si la sesion no esta iniciada, lo devolvemos al formulario de inicio de sesion
   ?>
     <script type="text/javascript">
       window.location = "../index.php";
     </script>
   <?php
 }
  ?>
