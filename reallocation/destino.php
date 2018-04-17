<?php
//incluimos los archivos necesarios e inicializamos los objetos
require_once '../bbdd/sesiones.php';
$sesiones = new Sesiones();
require_once '../bbdd/empleados.php';
$empleado = new Empleados();

//comprobamos si la sesion esta iniciada
if (isset($_SESSION['usuario'])) {
  //sacamos el nombre del usuario con la sesion iniciada
  $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ELEGIR UN DESTINO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      <a href="../roles.php" id='roles' style="visibility:hidden;">ROLES</a>
      <a  href= "#"><img src="../assets/img/logo.png" alt="logo TSI" title="Logo TSI" width="auto" height="50" /></a>
    </span>
    <br>
    <span class="derecha" onclick = "botonSalir();" style="visibility:hidden;"><a>SALIR</a></span>
    <br>
    <br>
    <h3><?php echo $usuario['user']; ?>
        <br>
        <?php echo $_POST['bastidor']; ?>
    </h3>
  </header>
  <div class="two-columns">
    <form class="contact_form" action="guardar.php" method="post" enctype="multipart/form-data" onsubmit="return enviar();">
      <ul>
        <li>
          <label for="destino" id="titulo">DESTINO</label>
          <input type="text" id="bastidor" name="destino" autofocus required/>
        </li>
      </ul>
      <?php
      //recogemos en un input el bastidor escaneado anteriormente para pasarlo a la siguiente pagina
      echo "<input type='hidden' name='bastidor' value='".$_POST['bastidor']."'>";
      ?>
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
