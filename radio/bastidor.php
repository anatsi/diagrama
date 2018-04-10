<?php
//incluimos los archivos necesarios e inicializamos los objetos
require_once '../bbdd/sesiones.php';
$sesiones = new Sesiones();
require_once '../bbdd/empleados.php';
$empleado = new Empleados();

//comprobamos si la sesion esta iniciada
if (isset($_SESSION['usuario'])) {
  //saacamos el nombre del usuario con la sesion iniciada
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
  <link rel="shortcut icon" href="../assets/ico/favicon.ico">
  <script type="text/javascript" src="../comprobar.js"></script>
  <script type="text/javascript" src="radio.js"></script>

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
    <h3><?php echo $usuario['user']; ?></h3>
  </header>
  <div class="two-columns">
    <form class="contact_form" action="radio.php" method="post" enctype="multipart/form-data" onsubmit="return comprobarBastidor()">
      <ul>
        <li>
          <label for="Bastidor" id="titulo">BASTIDOR</label>
          <input type="text" id="bastidor" name="bastidor" autofocus required pattern="([W][F][a-zA-Z0-9]{8}[A-Z]{2}[0-9]{5})"/>
        </li>
      </ul>
  </div>
  <div class="botones">
    <button type="submit" name="button" id="siguiente"><b>SIGUIENTE</b></button>
  </div>
  </form>

</body>

</html>

<?php
}else {
  // si la sesion no esta iniciada, lo devolvemos a la pantalla de iniciar sesion
  ?>
    <script type="text/javascript">
      window.location = "../index.php";
    </script>
  <?php
}
 ?>
