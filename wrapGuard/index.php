<?php
//incluimos los archivos necesarios e inicializamos sus objetos
require_once '../bbdd/sesiones.php';
$sesion = new Sesiones();
require_once '../bbdd/empleados.php';
$empleado = new Empleados();
//sacamos el nombre del usuario con la sesion iniciada
$usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>MODO WRAP GUARD</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles.css" type="text/css" media="all">
  <script src="../pace/pace.js"></script>
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
    <br>
    <br>
    <h3><?php echo $usuario['user']; ?></h3>
  </header>
    <div class="two-columns">
      <form class="contact_form" action="comprobarUsuario.php" method="post" enctype="multipart/form-data" onsubmit="return guardarUser();">
        <ul>
          <li>
            <label for="origen" id="titulo">SEGUNDO USUARIO: </label>
            <div class="wrap">
              <input type="text" name="usuario2" value="" id='usuario2'>
            </div>
          </li>
        </ul>
    </div>

    <div class="botones">
      <button type="submit" name="button" id="siguiente"><b>SIGUIENTE</b></button>
      <button type="reset" name="button" id="reset" style="width: 98%;"><b>LIMPIAR</b></button>
    </div>
      </form>
  </div>
</body>
</html>
