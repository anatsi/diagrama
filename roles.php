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
  <title>ELEGIR ORIGEN</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles.css" type="text/css" media="all">
  <script src="./pace/pace.js"></script>
  <link href="./pace/themes/pace-theme-center-radar.css" rel="stylesheet">
  <link rel="shortcut icon" href="./assets/ico/favicon.ico">

  </script>

</head>

<body>
  <header>
    <span class="izquierda">
    	<a  href= "#"><img src="./assets/img/logo.png" alt="logo TSI" title="Logo TSI" width="auto" height="50" /></a>
    </span>
    <span class="derecha" onclick = "window.location= 'salir.php?m='+localStorage.contador+'&fi='+localStorage.fechaInicio+'&hi='+localStorage.horaInicio"><a>SALIR</a></span>
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
              <input type="radio" id="opcion1" name="origen" value="CANOPY" onclick="">
               <div  class="btn btn-sık"><span>CHEQUER</span></div>
            </label>
            <label id="lab">
              <input  type="radio" id="opcion2" name="origen" value="P12" onclick="window.location = './canopy/origen.php'">
             <div class="btn btn-sık"><span>CANOPY</span></div>
           </label>
           <label id="lab">
             <input  type="radio" id="opcion3" name="origen" value="MALVINAS" onclick="">
            <div class="btn btn-sık"><span>CAMPA</span></div>
          </label>
          <label id="lab">
            <input  type="radio" id="opcion4" name="origen" value="CAMPA" onclick="window.location = './varios/origen.php'">
           <div class="btn btn-sık"><span>VARIOS</span></div>
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
      window.location = 'index.html';
    </script>
  <?php
}
 ?>
</body>

</html>
