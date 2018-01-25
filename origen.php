<?php
require_once './bbdd/sesiones.php';
$sesion = new Sesiones();
if (isset($_SESSION['usuario'])) {

 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ELEGIR ORIGEN</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css" type="text/css" media="all">
  <script src="./pace/pace.js"></script>
  <link href="./pace/themes/pace-theme-center-radar.css" rel="stylesheet">
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <script type="text/javascript" src="comprobar.js">

  </script>

</head>

<body>
  <header>
    <span class="derecha"><a href="./bbdd/logout.php">SALIR</a></span>
    <br>
    <h2>JOCKEYS</h2>
  </header>
  <div class="two-columns">
    <form class="contact_form" action="bastidor.php" method="post" enctype="multipart/form-data">
      <ul>
        <li>
          <label for="origen" id="titulo">ORIGEN</label>
          <div class="wrap">
            <label id="lab">
              <input type="radio" id="opcion1" name="origen" value="CANOPY" onclick="comprobar();">
               <div  class="btn btn-sık"><span>CANOPY</span></div>
            </label>
            <label id="lab">
              <input  type="radio" id="opcion2" name="origen" value="P12" onclick="comprobar();">
             <div class="btn btn-sık"><span>P12</span></div>
           </label>
           <label id="lab">
             <input  type="radio" id="opcion3" name="origen" value="MALVINAS" onclick="comprobar();">
            <div class="btn btn-sık"><span>MALVINAS</span></div>
          </label>
          </div>
          <select class="" name="otrosOrigenes" id="otro" onchange="bloquear();">
             <option value="primera" selected disabled>OTRAS OPCIONES</option>
             <option value="YARD" onchange="bloquear();">YARD</option>
             <option value="P9" onchange="bloquear();">P9</option>
             <option value="ZENDER" onchange="bloquear();">ZENDER</option>
             <option value="RAI" onchange="bloquear();">RAI</option>
             <option value="MOLINO" onchange="bloquear();">MOLINO</option>
             <option value="MOVA" onchange="bloquear();">MOVA</option>
             <option value="PUVA" onchange="bloquear();">PUVA</option>
             <option value="RAVA" onchange="bloquear();">RAVA</option>
             <option value="SP9VA" onchange="bloquear();">SP9VA</option>
           </select>
        </li>
      </ul>
      <input type='hidden' name='hora' value="">
  </div>

  <div class="botones">
    <button type="submit" name="button" id="siguiente"><b>SIGUIENTE</b></button>
    <button type="reset" name="button" id="reset" onclick="devolver();"><b>LIMPIAR</b></button>
  </div>
  </form>

</body>

</html>
<?php
}else {
  ?>
    <script type="text/javascript">
      window.location = "index.html";
    </script>
  <?php
}
 ?>
