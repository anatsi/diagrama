<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    //incluimos los archivos necesarios e inicializamos sus objetos
      require_once '../bbdd/movimientos.php';
      $movimientos = new Movimientos();

      //marcamos el movimiento como error
      $error = $movimientos -> marcarError($_GET['id']);
      //recogemos el movimiento por su id
      $ultimoMovimiento = $movimientos -> MovimientoID($_GET['id']);
      //si no se ha podido marcar como error, lo devolvemos a la pagina de origen
      if ($error == false) {
        ?>
        <script type="text/javascript">
            window.location = 'origen.php';
          </script>
        <?php
      }else {
        //si si que se ha podido marcar como error, comprobamos si se ha elegido un origen o un destino
        if (isset($_POST['origen']) || isset($_POST['destino'])) {
          //deppendiendo de las que se hayan marcado, guardamos en la bbdd la nueva entrada
          if (isset($_POST['origen']) && isset($_POST['destino'])) {
            $nuevoMov = $movimientos -> nuevoMovimiento($ultimoMovimiento['fecha_origen'], $ultimoMovimiento['hora_origen'], $_POST['origen'], $ultimoMovimiento['bastidor'], $ultimoMovimiento['fecha_destino'], $ultimoMovimiento['hora_destino'], $_POST['destino'], $ultimoMovimiento['usuario'], $ultimoMovimiento['rol'], $ultimoMovimiento['lanzamiento']);
          }
          if (isset($_POST['origen']) == false && isset($_POST['destino']) == true) {
            $nuevoMov = $movimientos -> nuevoMovimiento($ultimoMovimiento['fecha_origen'], $ultimoMovimiento['hora_origen'], $ultimoMovimiento['origen'], $ultimoMovimiento['bastidor'], $ultimoMovimiento['fecha_destino'], $ultimoMovimiento['hora_destino'], $_POST['destino'], $ultimoMovimiento['usuario'], $ultimoMovimiento['rol'], $ultimoMovimiento['lanzamiento']);
          }
          if (isset($_POST['origen']) == true && isset($_POST['destino']) == false) {
            $nuevoMov = $movimientos -> nuevoMovimiento($ultimoMovimiento['fecha_origen'], $ultimoMovimiento['hora_origen'], $_POST['origen'], $ultimoMovimiento['bastidor'], $ultimoMovimiento['fecha_destino'], $ultimoMovimiento['hora_destino'], $ultimoMovimiento['destino'], $ultimoMovimiento['usuario'], $ultimoMovimiento['rol'], $ultimoMovimiento['lanzamiento']);
          }
          //si se ha guardado bien, lo devolvemos a la pagina de origen
          if ($nuevoMov == true) {
            ?>
            <script type="text/javascript">
              window.location = 'origen.php';
            </script>
            <?php
          }
        }else {
          //si no se ha marcado ni origen ni destino, lo devolvemos a origen y descontamos el contador
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
