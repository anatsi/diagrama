<?php
require_once './bbdd/sesiones.php';
$sesiones = new Sesiones();

if (isset($_SESSION['usuario'])) {

if(isset($_POST['bastidor']) && $_POST['bastidor'] != ""){
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ELEGIR DESTINO</title>
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
    <form class="contact_form" action="guardarMovimientos.php" method="post" enctype="multipart/form-data">

      <ul>
        <li>
          <label for="destino" id="titulo">DESTINO</label>
          <div class="wrap">
            <label id="lab">
              <input type="radio" id="opcion1" name="destino" value="P12" onclick="comprobar2();">
               <div  class="btn btn-sık"><span>P12</span></div>
            </label>
            <label id="lab">
              <input  type="radio" id="opcion2" name="destino" value="P9" onclick="comprobar2();">
             <div class="btn btn-sık"><span>P9</span></div>
           </label>
           <label id="lab">
             <input  type="radio" id="opcion3" name="destino" value="MALVINAS" onclick="comprobar2();">
            <div class="btn btn-sık"><span>MALVINAS</span></div>
          </label>
          </div>
          <select class="" name="otrosDestinos" id="otro" onchange="bloquear();">
             <option value="" selected disabled onchange="bloquear();">OTRAS OPCIONES</option>
             <option value="YARD" onchange="bloquear();">YARD</option>
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
      <?php
        echo "<input type='hidden' name='horao' value='".$_POST['horao']."'>";
        echo "<input type='hidden' name='diao' value='".$_POST['diao']."'>";
        echo "<input type='hidden' name='origen' value='".$_POST['origen']."'>";
        echo "<input type='hidden' name='bastidor' value='".$_POST['bastidor']."'>";

       ?>
  </div>
  <div class="botones">
    <button type="submit" name="button" id="siguiente"><b>FINALIZAR</b></button>
    <button type="reset" name="button" id="reset" onclick="devolver();"><b>LIMPIAR</b></button>
    <button type="button" name="button" id="atras" onclick="window.location = 'origen.php';"><b>ATRAS</b></button>
  </div>
  </form>
</body>

</html>
<?php
}else {
  ?>
    <script type="text/javascript">
      alert('Escanear el bastidor antes de continuar.');
      window.location = 'origen.php';
    </script>
  <?php
}
 ?>
 <?php
 }else {
   ?>
     <script type="text/javascript">
       window.location = "index.html";
     </script>
   <?php
 }
  ?>
