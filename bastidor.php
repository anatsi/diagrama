<?php
if (isset($_POST['origen']) || isset($_POST['otrosOrigenes'])) {
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ESCANEAR BASTIDOR</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css" type="text/css" media="all">
  <script src="./pace/pace.js"></script>
  <link href="./pace/themes/pace-theme-center-radar.css" rel="stylesheet">
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <script type="text/javascript" src="comprobar.js">

  </script>

</head>

<body>
  <header>
    <span class="derecha"><a href="#">SALIR</a></span>
    <br>
    <h2>JOCKEYS</h2>
  </header>
  <div class="two-columns">
    <form class="contact_form" action="destino.php" method="post" enctype="multipart/form-data">
      <ul>
        <li>
          <label for="Bastidor" id="titulo">BASTIDOR</label>
          <input type="text" name="bastidor" autofocus/>
        </li>
      </ul>
      <?php
        echo "<input type='hidden' name='horao' value='".$_POST['horao']."'>";
        echo "<input type='hidden' name='diao' value='".$_POST['diao']."'>";
        if ($_POST['origen']) {
          echo "<input type='hidden' name='origen' value='".$_POST['origen']."'>";
        }else {
          echo "<input type='hidden' name='origen' value='".$_POST['otrosOrigenes']."'>";
        }
       ?>
  </div>
  <div class="botones">
    <button type="submit" name="button" id="siguiente"><b>SIGUIENTE</b></button>
  </div>
  </form>

</body>

</html>
<?php
}else {
  ?>
    <script type="text/javascript">
      alert('Elegir un origen antes de continuar.');
      window.location = 'origen.php';
    </script>
  <?php
}
 ?>
