<?php
//incluimos los archivos necesarios e inicializamos sus objetos
require_once '../bbdd/sesiones.php';
$sesiones = new Sesiones();
require_once '../bbdd/empleados.php';
$empleado = new Empleados();

//comprobamos si hay alguna sesion iniciada
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

<!-- Links para alerts y confirms -->
  <script src="../jquery/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="../jquery/jquery-confirm.css">
  <script src="../jquery/jquery-confirm.js"></script>

</head>
<?php
  //comprobamos si el bastidor se ha escaneado corretamente
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
    <h3><?php echo $usuario['user']; ?> - <script>document.write(localStorage.usuario2);</script>
      <br>
      <?php echo $_POST['bastidor']; ?>
    </h3>

  </header>
  <div class="two-columns">
    <form class="contact_form" action="guardar.php" method="post" enctype="multipart/form-data" onsubmit="return enviar();">
      <ul>
        <li>
          <label for="destino" id="titulo">DESTINO</label>
          <div class="wrap">
            <label id="lab">
              <input type="radio" id="opcion1" name="destino" value="ISRAEL">
               <div  class="btn btn-sık"><span>ISRAEL</span></div>
            </label>
            <label id="lab">
              <input  type="radio" id="opcion2" name="destino" value="SOUTH KOREA">
             <div class="btn btn-sık"><span>S. KOREA</span></div>
           </label>
           <label id="lab">
             <input  type="radio" id="opcion3" name="destino" value="SOUTH AFRICA">
            <div class="btn btn-sık"><span>S. AFRICA</span></div>
          </label>
         <?php
         //guardamos el bastidor escaneado en un input para pasarlo a la siguiente pantalla
            echo "<input type='hidden' name='bastidor' value='".$_POST['bastidor']."'>";
          ?>
          <script type="text/javascript">
          //guardamos el segundo usuario en un input para pasarlo a la siguiente pantalla
            document.write("<input type='hidden' name='usuario2' value='"+localStorage.usuario2+"'>")
          </script>
          </div>
        </li>
      </ul>
  </div>
  <div class="botones">
    <button type="submit" name="button" id="siguiente"><b>FINALIZAR</b></button>
    <button type="button" name="button" id="reset" onclick="location.reload(true);"><b>LIMPIAR</b></button>
    <button type="button" name="button" id="atras" onclick="volverAtrasWrap();"><b>ATRAS</b></button>
  </div>
  </form>
</body>

</html>
<?php
}else {
  // si el bastidor no se ha escaneado correctamente, avisamos y le devolvemos a la pantalla de escanear el bastidor
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
 }else {
   //si no hay ninguna sesion inciada, lo devolvemos a la pantalla de iniciar sesion
   ?>
     <script type="text/javascript">
       window.location = "../index.php";
     </script>
   <?php
 }
  ?>
