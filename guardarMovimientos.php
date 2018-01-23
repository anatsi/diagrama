<?php
echo "jvope";
require_once './bbdd/movimientos.php';
$movimiento = new Movimientos();

if ($_POST['destino']) {
  $destino = $_POST['destino'];
}else {
  $destino = $_POST['otrosDestinos'];
}

echo $_POST['origen'];
echo $destino;
  if (isset($_POST['origen']) && isset($destino)) {
    $nuevoMovimiento=$movimiento->nuevoMovimiento($_POST['diao'], $_POST['horao'], $_POST['origen'], $_POST['bastidor'], $_POST['diad'], $_POST['horad'], $destino);
    echo $nuevoMovimiento;
    if ($nuevoMovimiento == null) {
      ?>
        <script type="text/javascript">
          alert("Error al registrar el movimiento.");
          window.location = 'origen.php';
        </script>
      <?php
    }else {
      ?>
        <script type="text/javascript">
          window.location = 'origen.php';
        </script>
      <?php
    }
  }

 ?>
