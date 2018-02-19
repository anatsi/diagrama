<?php
require_once '../bbdd/sesiones.php';
$sesiones = new Sesiones();
require_once '../bbdd/empleados.php';
$empleado = new Empleados();

if (isset($_SESSION['usuario'])) {

if(isset($_POST['bastidor']) && $_POST['bastidor'] != ""){
  $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ELEGIR DESTINO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles.css" type="text/css" media="all">
  <script src="../pace/pace.js"></script>
  <link href="../pace/themes/pace-theme-center-radar.css" rel="stylesheet">
  <link rel="shortcut icon" href="../assets/ico/favicon.ico">
  <script type="text/javascript" src="comprobar.js">

  </script>

</head>

<body onload="tiempo();">
  <header>
    <span class="izquierda">
      <a href="../roles.php" id='roles'>ROLES</a>
      <a  href= "#"><img src="../assets/img/logo.png" alt="logo TSI" title="Logo TSI" width="auto" height="50" /></a>
    </span>
    <br>
    <span class="derecha" onclick = "window.location= 'salir.php?m='+localStorage.contador+'&fi='+localStorage.fechaInicio+'&hi='+localStorage.horaInicio"><a>SALIR</a></span>
    <br>
    <br>
    <h3><?php echo $usuario['user']; ?>    -    <?php echo $_POST['origen']; ?>
      <br>
      <?php echo $_POST['bastidor']; ?>
    </h3>

  </header>
  <div class="two-columns">
    <form class="contact_form" action="guardarMovimientos.php" method="post" enctype="multipart/form-data" onsubmit="return destino();">

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
          <label id="lab">
            <input  type="radio" id="opcion4" name="destino" value="ZENDER" onclick="comprobar2();">
           <div class="btn btn-sık"><span>ZENDER</span></div>
         </label>
          </div>
          <select class="" name="otrosDestinos" id="otro" onchange="bloquear();">
             <option value="" selected disabled onchange="bloquear();">OTRAS ZONAS</option>
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
    <button type="submit" name="button" id="siguiente" disabled=true><b>FINALIZAR</b></button>
    <button type="reset" name="button" id="reset" onclick="devolver();"><b>LIMPIAR</b></button>
    <button type="button" name="button" id="atras" onclick="volverAtras();"><b>ATRAS</b></button>
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
