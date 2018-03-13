<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>BORRAR MOVIMIENTO</title>
  </head>
  <body>
    <?php
    //incluimos los archivos necesarios e inicializamos los objetos
      require_once '../bbdd/movimientos.php';
      $movimientos = new Movimientos();
      //actualizamos el movimiento para marcar error
      $error = $movimientos -> marcarError($_GET['id']);
      //sacamos todos los datos de movimiento por el id
      $ultimoMovimiento = $movimientos -> MovimientoID($_GET['id']);
      if ($error == false) {
        ?>
        <script type="text/javascript">
            window.location = 'origen.php';
          </script>
        <?php
      }else {
        //comprobamos si se ha seleccionada un nuevo origen o un nuevo destino
        if (isset($_POST['origen']) || isset($_POST['destino'])) {
          //dependiendo de lo que se haya seleccionado, hacemos la consulta  ala bbdd para guardar el movimiento corregido
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
            //si se guarda bien, lo devolvemos a la pagina de origen
            ?>
            <script type="text/javascript">
              window.location = 'origen.php';
            </script>
            <?php
          }
        }else {
          // si no se habia elegido ni origen ni destino, descontamos uno del contador y lo devolvemos a la pantalla de origen
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
