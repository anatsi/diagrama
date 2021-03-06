<?php
//incluimos los archivos necesarios e inicializamos sus objetos
require_once '../bbdd/sesiones.php';
$sesion = new Sesiones();
require_once '../bbdd/empleados.php';
$empleado = new Empleados();
require_once '../bbdd/motor.php';
$motor = new Motor();
//sacamos el nombre del usuario que ha iniciado sesion
$usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>VEHICULO REGISTRADO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles.css" type="text/css" media="all">
  <script src="../pace/pace.js"></script>
  <link rel="shortcut icon" href="../assets/ico/favicon.ico">
</head>

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
      <?php
      if (strlen($_POST['bastidor'])==17) {
        $bastidor = $_POST['bastidor'];
        $primera= substr($bastidor, 0, 4);
        $segunda = substr($bastidor, 6);
        $bastidorFinal = $primera .'XX'. $segunda;
        $bastidorGuardar = $bastidorFinal;
      }elseif (strlen($_POST['bastidor'])==8) {
        $bastidor = substr($_POST['bastidor'], 0, 7);
        $bastidorFinal = '%'.$bastidor;
        $bastidorGuardar = $bastidor;
      }else {
        $bastidorFinal = '%'. $_POST['bastidor'];
        $bastidorGuardar = $_POST['bastidor'];
      }

      $seleccionado = $motor->buscarBastidor($bastidorFinal);
      if ($seleccionado == NULL || $seleccionado == FALSE) {
        echo "<h3>ATENCION,PREGUNTAR A DISPO (ST7/ST4) </h3>";
        //guardos el bastidor en la bbdd.
        $nuevoMotor = $motor -> nuevoVIN($bastidorGuardar, 'DISPO ST7/ST4');
        //si no se guarda bien se informa para que se vuelva a leer.
        if ($nuevoMotor == NULL || $nuevoMotor == false) {
          ?>
            <script type="text/javascript">
              $.confirm({
                title: 'ERROR',
                content: 'Vuelva a leer el vehiculo.',
                type: 'red',
                buttons: {
                  OK: function () {
                    window.location = 'index.php';
                  },
                },
              });
            </script>
          <?php
        }
      }else {
        if ($seleccionado['leido'] == 1) {
          echo "<h3>VIN YA LEIDO</h3>";
          echo "<br><h3>".$seleccionado['motor']."</h3>";
        }else {
          //Cambia de '0' a '1' la columna 'leido'
          $leer = $motor -> bastidorLeido($seleccionado['bastidor']);
          //Muestra contenido columna texto
          echo "<h3>".$seleccionado['motor']."</h3>";
        }
      }
      ?>
    </div>
    <div class="botones">
      <button type="button" name="button" id="siguiente" onclick="window.location = 'index.php'"><b>ACEPTAR</b></button>
    </div>
</body>
</html>
