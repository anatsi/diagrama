<?php
  require_once './bbdd/movimientos.php';
  $movimientos = new Movimientos();

  $error = $movimientos -> marcarError($_GET['id']);
  if ($error == false) {
    header("Location: origen.php");
  }else {
    header("Location: origen.php");
  }
 ?>
