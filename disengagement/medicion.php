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
  <title>MODELO</title>
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
// comprobamos si el bastidor se ha escaneado bien
  if(isset($_POST['ruido']) && $_POST['ruido'] != ''){
    $_POST['ruido']  = $_POST['ruido'];
  }else {
    $_POST['ruido'] = NULL;
  }

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
          <label for="derecha" id="titulo">DERECHA</label>
          <input type="number" name="derecha" step="any"/>
          <label for="derecha_reparado" id="titulo">REPARADO</label>
          <input type="number" name="derecha_reparado" step="any"/>
        </li>
        <li>
          <label for="izquierda" id='titulo'>IZQUIERDA</label>
          <input type="number" name="izquierda" step="any">
          <label for="izquierda_reparado" id="titulo">REPARADO</label>
          <input type="number" name="izquierda_reparado" step="any"/>
        </li>
      </ul>
      <?php
      //ponemos los datos recogidos del formulario anterior en inputs para poder pasarlo a la siguiente pagina
        echo "<input type='hidden' name='bastidor' value='".$_POST['bastidor']."'>";
        echo "<input type='hidden' name='construccion' value='".$_POST['construccion']."'>";
        echo "<input type='hidden' name='tamano' value='".$_POST['tamano']."'>";
        echo "<input type='hidden' name='tipo' value='".$_POST['tipo']."'>";
        echo "<input type='hidden' name='ruido' value='".$_POST['ruido']."'>";
       ?>
  </div>
  <div class="botones">
    <button type="submit" name="button" id="siguiente"><b>SIGUIENTE</b></button>
    <button type="reset" name="button" id="reset"><b>LIMPIAR</b></button>
    <button type="button" name="button" id="atras" onclick="volverAtrasIndex();"><b>ATRAS</b></button>
  </div>
  </form>
</body>

</html>

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
