<?php
  include './bbdd/sesiones.php';
  $sesion= new Sesiones();
  require_once './bbdd/empleados.php';
  $empleado = new Empleados();
  if (isset($_SESSION['usuario'])) {
  $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ELEGIR ROL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles.css" type="text/css" media="all">
  <script src="./pace/pace.js"></script>
  <!--<link href="./pace/themes/pace-theme-center-radar.css" rel="stylesheet">-->
  <link rel="shortcut icon" href="./assets/ico/favicon.ico">

  <script type="text/javascript" src="comprobar.js"></script>
  <!-- Links para alerts y confirms -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="jquery/jquery-confirm.css">
    <script src="jquery/jquery-confirm.js"></script>

</head>

<body>
  <header>
    <span class="izquierda">
    	<a  href= "#"><img src="./assets/img/logo.png" alt="logo TSI" title="Logo TSI" width="auto" height="50" /></a>
    </span>
    <span class="derecha" onclick = "botonSalir2();"><a>SALIR</a></span>
    <br>
    <br>
    <h3><?php echo $usuario['user']; ?></h3>
  </header>
  <div class="two-columns">
    <form class="contact_form" action="" method="post" enctype="multipart/form-data">
      <ul>
        <li>
          <label for="origen" id="titulo">ROLES</label>
          <div class="wrap">

            <label id="lab">
              <input  type="radio" name="CANOPY" value="CANOPY" onclick="window.location = 'canopy.php';">
             <div class="btn btn-sık"><span>CANOPY</span></div>
           </label>
          <label id="lab">
            <input  type="radio" name="VARIOS" value="VARIOS" onclick="window.location = 'varios.php';">
           <div class="btn btn-sık"><span>VARIOS</span></div>
         </label>
         <label id="lab">
           <input  type="radio" name="CAMPA" value="CAMPA" onclick="window.location = 'campa.php';">
          <div class="btn btn-sık"><span>CAMPA</span></div>
        </label>
         <label id="lab">
           <input  type="radio" name="WRAP" value="WRAP" onclick="window.location = 'wrapGuard.php';">
          <div class="btn btn-sık btn5"><span>WRAP GUARD</span></div>
        </label>
        <label id="lab">
          <input type="radio" name="CHEQUER" value="CHEQUER" onclick="window.location = 'chequer.php';">
           <div  class="btn btn-sık"><span>CHEQUER</span></div>
        </label>
          </div>
        </li>
      </ul>
  </div>

  </form>
<?php
}else {
  ?>
    <script type="text/javascript">
      window.location = 'index.php';
    </script>
  <?php
}
 ?>
</body>

</html>
