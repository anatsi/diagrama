<?php
//incluimos los archivos necesarios e inicializamos sus objetos
  include './bbdd/sesiones.php';
  $sesion= new Sesiones();
  require_once './bbdd/empleados.php';
  $empleado = new Empleados();
  //comprobamos si la sesion esta iniciada
  if (isset($_SESSION['usuario'])) {
    //sacamos el nombre del usaurio por la sesion
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
        <a href="roles.php" id='roles'>ROLES</a>
        <a  href= "#"><img src="assets/img/logo.png" alt="logo TSI" title="Logo TSI" width="auto" height="50" /></a>
      </span>
      <br>
      <span class="derecha" onclick = "botonSalir();"><a>SALIR</a></span>
      <br>
      <br>
      <h3><?php echo $usuario['user']; ?></h3>
    </header>
    <div class="two-columns">
      <form class="contact_form" action="" method="post" enctype="multipart/form-data">
        <ul>
          <li>
            <label for="origen" id="titulo">CLATTER NOISE</label>
            <div class="wrap">

              <label id="lab">
                <input  type="radio" name="COMPROBAR" value="COMPROBAR" onclick="window.location = './motor/index.php';">
               <div class="btn btn-sık"><span>COMPROBAR</span></div>
             </label>
            <label id="lab">
              <input  type="radio" name="REGISTRAR" value="REGISTRAR" onclick="window.location = './clatter/bastidor.php';">
             <div class="btn btn-sık"><span>REGISTRAR</span></div>
           </label>
            </div>
          </li>
        </ul>
    </div>
    <div class="botones">
    </div>
    </form>
  <?php
  }else {
    //si la sesion no ests iniciada la devolvemos a la pagina de inicio de sesion
    ?>
      <script type="text/javascript">
        window.location = 'index.php';
      </script>
    <?php
  }
   ?>
  </body>

</html>
