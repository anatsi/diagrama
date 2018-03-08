<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
  </head>
  <body>
    <?php
      require_once '../bbdd/movimientos.php';
      $movimientos = new Movimientos();

      $error = $movimientos -> marcarError($_GET['id']);
      $ultimoMovimiento = $movimientos -> MovimientoID($_GET['id']);
      if ($error == false) {
        ?>
        <script type="text/javascript">
            window.location = 'origen.php';
          </script>
        <?php
      }else {
        if (isset($_POST['origen']) && isset($_POST['destino'])) {
          if (isset($_POST['origen']) && isset($_POST['destino'])) {
            $nuevoMov = $movimientos -> nuevoMovimiento($ultimoMovimiento['fecha_origen'], $ultimoMovimiento['hora_origen'], $_POST['origen'], $ultimoMovimiento['bastidor'], $ultimoMovimiento['fecha_destino'], $ultimoMovimiento['hora_destino'], $_POST['destino'], $ultimoMovimiento['usuario'], $ultimoMovimiento['rol']);
          }
          if (isset($_POST['origen']) == false && isset($_POST['destino']) == true) {
            $nuevoMov = $movimientos -> nuevoMovimiento($ultimoMovimiento['fecha_origen'], $ultimoMovimiento['hora_origen'], $ultimoMovimiento['origen'], $ultimoMovimiento['bastidor'], $ultimoMovimiento['fecha_destino'], $ultimoMovimiento['hora_destino'], $_POST['destino'], $ultimoMovimiento['usuario'], $ultimoMovimiento['rol']);
          }
          if (isset($_POST['origen']) == true && isset($_POST['destino']) == false) {
            $nuevoMov = $movimientos -> nuevoMovimiento($ultimoMovimiento['fecha_origen'], $ultimoMovimiento['hora_origen'], $_POST['origen'], $ultimoMovimiento['bastidor'], $ultimoMovimiento['fecha_destino'], $ultimoMovimiento['hora_destino'], $ultimoMovimiento['destino'], $ultimoMovimiento['usuario'], $ultimoMovimiento['rol']);
          }
          if ($nuevoMov == true) {
            ?>
            <script type="text/javascript">
              window.location = 'origen.php';
            </script>
            <?php
          }
        }else {
          ?>
          <script type="text/javascript">
            localStorage.setItem("contador", Number(localStorage.contador) - 1);
            window.location = 'origen.php';
          </script>
          <?php
        }

      }
     ?>
  </body>
</html>
