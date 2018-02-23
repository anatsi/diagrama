<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
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
        $nuevoMov = $movimientos -> nuevoMovimiento($ultimoMovimiento['fecha_origen'], $ultimoMovimiento['hora_origen'], $_POST['origen'], $ultimoMovimiento['bastidor'], $ultimoMovimiento['fecha_destino'], $ultimoMovimiento['hora_destino'], $_POST['destino'], $ultimoMovimiento['usuario'], $ultimoMovimiento['rol']);
        echo $nuevoMov;
        if ($nuevoMov == true) {
          echo "bien";
          ?>
          <script type="text/javascript">
            window.location = 'origen.php';
          </script>
          <?php
        }
      }
     ?>
  </body>
</html>
