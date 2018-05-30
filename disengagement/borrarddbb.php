<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    //incluimos los archivos necesarios e inicializamos sus objetos
      require_once '../bbdd/disengagement.php';
      $disengagements = new Disengagement();

      //marcamos el movimiento como error
      $error = $disengagements -> borrarDisengagement($_POST['bastidor']);
      //si no se ha podido marcar como error, lo devolvemos a la pagina de origen
      if ($error == false) {
        ?>
        <script type="text/javascript">
            window.location = 'index.php';
          </script>
        <?php
      }else {
        ?>
          <script type="text/javascript">
            window.location='index.php';
          </script>
        <?php
        }

     ?>
  </body>
</html>
