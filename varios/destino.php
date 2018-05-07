<?php
//incluimos los archivos necesarios y inicializamos lsus objetos
require_once '../bbdd/sesiones.php';
$sesiones = new Sesiones();
require_once '../bbdd/empleados.php';
$empleado = new Empleados();

//comprobamos si la sesion esta iniciada
if (isset($_SESSION['usuario'])) {
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ELEGIR DESTINO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles.css" type="text/css" media="all">
  <script src="../pace/pace.js"></script>
  <link rel="shortcut icon" href="../assets/ico/favicon.ico">
  <script type="text/javascript" src="../comprobar.js"></script>
  <script type="text/javascript" src="tiempo.js"></script>

<!-- Links para alerts y confirms -->
  <script src="../jquery/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="../jquery/jquery-confirm.css">
  <script src="../jquery/jquery-confirm.js"></script>

</head>
<?php
// comprobamos si el bastidor se ha escaneado bien
  if(isset($_POST['bastidor']) && $_POST['bastidor'] != ""){
    //sacamos el nombre del usuario con la sesion iniciada
    $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
 ?>
<body onload="inicio();">
  <header>
    <span class="izquierda">
      <a href="../roles.php" id='roles' style="visibility:hidden;">ROLES</a>
      <a  href= "#"><img src="../assets/img/logo.png" alt="logo TSI" title="Logo TSI" width="auto" height="50" /></a>
    </span>
    <br>
    <span class="derecha" onclick = "botonSalir();" style="visibility:hidden;"><a>SALIR</a></span>
    <br>
    <br>
    <h3><?php echo $usuario['user']; ?>    -    <?php echo $_POST['origen']; ?>
      <br>
      <?php echo $_POST['bastidor']; ?>
    </h3>

  </header>
  <div class="two-columns">
    <form class="contact_form" action="guardarMovimientos.php" method="post" enctype="multipart/form-data" onsubmit="return enviar();">

      <ul>
        <li>
          <label for="destino" id="titulo">DESTINO</label>
          <div class="wrap">
            <label id="lab">
              <input type="radio" name="lanzamiento" value="SI">
               <div  class="btn btn-sık" style="width: 160%; background-color: orange; height: 40px;" onclick="this.style.backgroundColor= 'green';"><span>¿LANZAMIENTO?</span></div>
            </label>
            <br>
            <label id="lab">
              <input type="radio" id="opcion1" name="destino" value="P9" onclick="comprobar2();">
               <div  class="btn btn-sık"><span>P9</span></div>
            </label>
            <label id="lab">
              <input  type="radio" id="opcion2" name="destino" value="SP9" onclick="comprobar2();">
             <div class="btn btn-sık"><span>SP9</span></div>
           </label>
           <label id="lab">
             <input  type="radio" id="opcion3" name="destino" value="MALVINAS" onclick="comprobar2();">
            <div class="btn btn-sık"><span>MALVINAS</span></div>
          </label>
          <label id="lab">
            <input  type="radio" id="opcion4" name="destino" value="P12" onclick="comprobar2();">
           <div class="btn btn-sık"><span>P12</span></div>
         </label>
          </div>
          <select class="" name="otrosDestinos" id="otro" onchange="bloquear2();">
             <option value="" selected disabled onchange="bloquear2();">OTRAS ZONAS</option>
             <option value="ZENDER" onchange="bloquear2();">ZENDER</option>
             <option value="MOVA1" onchange="bloquear2();">MOVA1</option>
             <option value="MOVA2" onchange="bloquear2();">MOVA2</option>
             <option value="PUVA" onchange="bloquear2();">PUVA</option>
             <option value="RAVA" onchange="bloquear2();">RAVA</option>
             <option value="RAVA2" onchange="bloquear2();">RAVA2</option>
             <option value="SP9VA" onchange="bloquear2();">SP9VA</option>
             <option value="RAI" onchange="bloquear2();">RAI</option>
             <option value="MOLINO" onchange="bloquear2();">MOLINO</option>
             <option value="P0" onchange="bloquear2();">P0</option>
             <option value="FCPA" onchange="bloquear2();">FCPA</option>
             <option value="VQC" onchange="bloquear2();">VQC</option>
             <option value="P.COLORES" onchange="bloquear2();">P.COLORES</option>
             <option value="CIRCUITO" onchange="bloquear2();">CIRCUITO</option>
             <option value="PRPB" onchange="bloquear2();">PRPB</option>
             <option value="CANOPY" onchange="bloquear2();">CANOPY</option>
             <option value="CAMPA" onchange="bloquear2();">CAMPA</option>
             <option value="P.BLANCO" onchange="bloquear2();">P.BLANCO</option>
             <option value="PINTURAS" onchange="bloquear2();">PINTURAS</option>
             <option value="RINCON AMERICANO" onchange="bloquear2();">RINCON AMERICANO</option>
           </select>
        </li>
      </ul>
      <?php
        //guardamos los datos del formulario anterior en inu¡puts para pasarlos a la siguiente pagina
        echo "<input type='hidden' name='horao' value='".$_POST['horao']."'>";
        echo "<input type='hidden' name='diao' value='".$_POST['diao']."'>";
        echo "<input type='hidden' name='origen' value='".$_POST['origen']."'>";
        echo "<input type='hidden' name='bastidor' value='".$_POST['bastidor']."'>";

       ?>
  </div>
  <div class="botones">
    <button type="submit" name="button" style="background-color:grey;" id="siguiente" disabled=true><b>REALIZANDO...</b></button>
    <button type="button" name="button" id="reset" onclick="location.reload(true);"><b>LIMPIAR</b></button>
    <button type="button" name="button" id="atras" onclick="volverAtras();"><b>ATRAS</b></button>
  </div>
  </form>
</body>

</html>
<?php
// si el bastidos no se ha escaneado bien, le devolvemos a la pagian de escaneo
}else {
  ?>
    <script type="text/javascript">
      $.confirm({
        title: 'ERROR',
        content: 'Escanear el bastidor antes de continuar.',
        type: 'red',
        buttons: {
          OK: function () {
            window.location = 'origen.php';
          },
        },
      });
    </script>
  <?php
}
 ?>
 <?php
 // si no se ha iniciado sesion, le devolvemos a la pagina de inicio de sesion
 }else {
   ?>
     <script type="text/javascript">
       window.location = "../index.php";
     </script>
   <?php
 }
  ?>
