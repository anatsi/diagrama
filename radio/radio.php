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
  <title>¿RADIO?</title>
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
<?php
// comprobamos si el bastidor se ha escaneado bien
  if(isset($_POST['bastidor']) && $_POST['bastidor'] != ""){
    //sacamos el nombre del usuario con la sesion iniciada
    $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
 ?>
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
          <label for="destino" id="titulo">¿RADIO?</label>
          <div class="wrap">
            <label id="lab">
              <input type="radio" id="opcion1" name="arriba" value="SI" onclick="si();">
               <div  class="btn btn-sık"><span>SI</span></div>
            </label>
            <label id="lab">
              <input  type="radio" id="opcion2" name="arriba" value="NO" onclick="no(); desbloquear();">
             <div class="btn btn-sık"><span>NO</span></div>
           </label>
           <label id="lab lab3" style="display: none;">
             <input  type="radio" id="opcion3" name="abajo" value="OK" disabled onclick="desbloquear();">
            <div class="btn btn-sık"><span>OK</span></div>
          </label>
          <label id="lab lab4" style="display:none;">
            <input  type="radio" id="opcion4" name="abajo" value="NOK" disabled onclick="desbloquear();">
           <div class="btn btn-sık"><span>NOK</span></div>
         </label>
        </div>
      </li>
    </ul>
      <?php
      //guardamos los datos del formulatio anterior en inputs para pasarlos al siguiente
        echo "<input type='hidden' name='bastidor' value='".$_POST['bastidor']."'>";
       ?>
  </div>
  <div class="botones">
    <button type="submit" name="button" id="siguiente" disabled=true><b>SIGUIENTE</b></button>
    <button type="button" name="button" id="atras" onclick="volverAtrasWrap();" style="width:98%;"><b>ATRAS</b></button>
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
            window.location = 'bastidor.php';
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
