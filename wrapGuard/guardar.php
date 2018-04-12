<!-- Links para alerts y confirms -->
  <script src="../jquery/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="../jquery/jquery-confirm.css">
  <script src="../jquery/jquery-confirm.js"></script>
<?php
//incluimos los archivos necesarios e inicializamos sus objetos
  require_once '../bbdd/sesiones.php';
  $sesiones = new Sesiones();
  require_once '../bbdd/empleados.php';
  $empleado = new Empleados();
  require_once '../bbdd/wrapGuard.php';
  $wrap = new WrapGuard();
  //sacamos el nombre del usuario con sesion iniciada
  $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);
  $error = 0;

//comprobamos si se ha elegido un destino
  if (isset($_POST['destino'])) {
    //guardamos el segundo usuario en una variable
    $usuario2 = $_POST['usuario2'];
    //sacamos los caracteres que necesitamos para saber el modelo del movil
    $modelo = substr($_POST['bastidor'], 8, 2);
    //comprobamos el modelo y lo guardamos en una variable
    if ($modelo == 'MA') {
      $modelo = 'KUGA';
    }elseif ($modelo == 'CE' || $modelo == 'CD' || $modelo == 'CF') {
      $modelo = 'MONDEO';
    }elseif ($modelo == 'CJ') {
      $modelo = 'S-MAX';
    }elseif ($modelo == 'CK') {
      $modelo = 'GALAXY';
    }elseif ($modelo == 'G4' || $modelo == 'G5' || $modelo == 'G6' || $modelo == 'G7' || $modelo == 'GR' || $modelo == 'GS' || $modelo == 'GT' || $modelo == 'GU') {
      $modelo = 'CONNECT';
    }

    //cambiamos los caracteres 5 y 6 del bastidor por X.
    $bastidor = $_POST['bastidor'];
    $primera= substr($bastidor, 0, 4);
    $segunda = substr($bastidor, 6);
    $bastidorFinal = $primera .'XX'. $segunda;

    //comprobamos si ya existia una entrada del mismo coche
    $mismoVIN = $wrap -> mismoVIN($bastidorFinal);
    // si no existia ponemos la variable repetido a 1
    if ($mismoVIN == null || $mismoVIN == false) {
      $repetido = 1;
    }else {
      // si ya existia le sumamos 1 a su variable de repetido
      $repetido = $mismoVIN['repetido'] +1;
      //comprobamos si tenian el mismo destino
      if ($mismoVIN['destino'] != $_POST['destino']) {
        // si no tienen el mismo destino marcamos que hay un error
        $error = 1;
      }
    }

    //sacamos la fecha y la hora actual
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');



    //guardamos el movimiento de wrap en la bbdd
    $nuevoWrap = $wrap -> nuevoWrap($usuario['user'], $usuario2, $modelo, $_POST['destino'], $bastidorFinal, $fecha, $hora, $repetido);
    if ($nuevoWrap == false || $nuevoWrap == null) {
      // si no se guarda bien, le marcamos el error y lo devolvemos a la pantalla de escanear el bastidor
      ?>
      <script type="text/javascript">
        $.confirm({
          title: 'ERROR',
          content: 'Vuelva a registrar el vehiculo.',
          type: 'red',
          buttons: {
            OK: function () {
              window.location = 'bastidor.php';
            },
          },
        });
      </script>
      <?php
    }else {

      if ($error == 1) {
        //si habiamos marcado error, lo llevamos a elegir un nuevo destino
        ?>
          <script type="text/javascript">
            window.location='nuevoDestino.php?vin=<?php echo $bastidorFinal; ?>';
          </script>
        <?php
      }
      // si se ha guardado bien, le mandamos a la pantalla de finalizado
      else {
        ?>
          <script type="text/javascript">
            window.location = 'finalizado.php';
          </script>
        <?php
      }

    }
  }else {
    // si no se habia elegido un destino, lo devolvemos a la pantalla de destinos
    ?>
      <script type="text/javascript">
        $.confirm({
          title: 'ERROR',
          content: 'Elegir un destino antes de continuar.',
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
