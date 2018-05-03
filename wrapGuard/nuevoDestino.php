<?php
//incluimos los archivos necesarios e inicializamos sus objetos
require_once '../bbdd/sesiones.php';
$sesion = new Sesiones();
require_once '../bbdd/empleados.php';
$empleado = new Empleados();
require_once '../bbdd/wrapGuard.php';
$wrap = new WrapGuard();
//sacamos el usuario con la sesion iniciada
$usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>DESTINO INCORRECTO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles.css" type="text/css" media="all">
  <script src="../pace/pace.js"></script>
  <link rel="shortcut icon" href="../assets/ico/favicon.ico">
  <!-- Links para alerts y confirms -->
    <script src="../jquery/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../jquery/jquery-confirm.css">
    <script src="../jquery/jquery-confirm.js"></script>
</head>

<body>
  <?php
    if (isset($_GET['vin']) && $_GET['vin'] != '') {
     $vin = $_GET['vin'];
   }else {
     $vin = $_POST['bastidor'];
   }
   ?>
  <header>
    <span class="izquierda">
      <a href="../roles.php" id='roles' style="visibility:hidden;">ROLES</a>
      <a  href= "#"><img src="../assets/img/logo.png" alt="logo TSI" title="Logo TSI" width="auto" height="50" /></a>
    </span>
    <br>
    <span class="derecha" onclick = "botonSalir();" style="visibility:hidden;"><a>SALIR</a></span>
    <br>
    <br>
    <h3>
      <?php echo $usuario['user']; ?> - <script>document.write(localStorage.usuario2);</script>
      <br>
      <?php echo $vin; ?>
    </h3>
  </header>
    <div class="two-columns">

      <form class="contact_form" action="nuevoDestinoBBDD.php" method="post" enctype="multipart/form-data">
        <ul>
          <li>

            <input type="hidden" name="vin" value=<?php echo $vin; ?>>

            <select class="" name="destino" id="otro">
               <option value="primera" selected disabled>NUEVO DESTINO</option>
               <option value="ISRAEL">ISRAEL</option>
               <option value="SOUTH KOREA">S. KOREA</option>
               <option value="SOUTH AFRICA">S. AFRICA</option>
             </select>
          </li>
        </ul>

    </div>
  <div class="botones">
    <button type="submit" name="button" value="submit" id="siguiente"><b>ACEPTAR</b></button>
  </div>
</form>
</body>
</html>
