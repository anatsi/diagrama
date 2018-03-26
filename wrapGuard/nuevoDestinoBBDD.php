<?php
require_once '../bbdd/wrapGuard.php';
$wrap = new WrapGuard();

  //comprobamos que se haya elegido un destinp
  if ( isset($_POST['destino']) && $_POST['destino']!='primera') {
    //actualizamos el destino para ese vin
    $cambiarDestino = $wrap -> cambiarDestino($_POST['vin'], $_POST['destino']);
    //si se actualiza mal lo enviamos a la pantalla anterior
    if ($cambiarDestino == false) {
      ?>
      <script type="text/javascript">
        alert('Algo salio mal');
        window.location ="nuevoDestino.php?vin=<?php echo $_POST['vin']; ?>";
      </script>
      <?php
    }else {
      //si se actualiza bien lo llevamos a la panttalla de escanear el bastidor
      ?>
        <script type="text/javascript">
          window.location = 'bastidor.php';
        </script>
      <?php
    }
  }else {
    //si no se elige un destino le devolvemos a la pantalla anterior
    ?>
      <script type="text/javascript">
        alert('Elegir un destino antes de continuar');
        window.location ="nuevoDestino.php?vin=<?php echo $_POST['vin']; ?>";
      </script>
    <?php
  }
 ?>
