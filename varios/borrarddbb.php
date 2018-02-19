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
      if ($error == false) {
        ?>
          <script type="text/javascript">
            window.location = 'origen.php';
          </script>
        <?php
      }else {
        ?>
        <script type="text/javascript">
          localStorage.setItem("contador", Number(localStorage.contador) - 1);
          window.location = 'origen.php';
        </script>
        <?php
      }
     ?>
  </body>
</html>
