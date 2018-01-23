<?php
if(isset($_POST['bastidor']) && $_POST['bastidor'] != ""){
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ELEGIR DESTINO</title>
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
    <form class="contact_form" action="guardarMovimientos.php" method="post" enctype="multipart/form-data">

      <ul>
        <li>
          <label for="destino" id="titulo">DESTINO</label>
          <div class="wrap">
            <label id="lab">
              <input type="radio" name="destino" value="P12" onclick="comprobar();">
               <div  class="btn btn-sık"><span>P12</span></div>
            </label>
            <label id="lab">
              <input  type="radio"  name="destino" value="P9" onclick="comprobar();">
             <div class="btn btn-sık"><span>P9</span></div>
           </label>
           <label id="lab">
             <input  type="radio"  name="destino" value="MALVINAS" onclick="comprobar();">
            <div class="btn btn-sık"><span>MALVINAS</span></div>
          </label>
          </div>
          <select class="" name="otrosDestinos" id="otro">
             <option value="" selected disabled>OTRAS OPCIONES</option>
             <option value="CANOPY">CANOPY</option>
             <option value="YARD">YARD</option>
             <option value="ZENDER">ZENDER</option>
             <option value="RAI">RAI</option>
             <option value="MOLINO">MOLINO</option>
             <option value="MOVA">MOVA</option>
             <option value="PUVA">PUVA</option>
             <option value="RAVA">RAVA</option>
             <option value="SP9VA">SP9VA</option>
           </select>
        </li>
      </ul>
      <?php
        $diad = date('Y-m-d');
        $horad = date('H:i:s');
        echo "<input type='hidden' name='horad' value='".$horad."'>";
        echo "<input type='hidden' name='diad' value='".$diad."'>";
        echo "<input type='hidden' name='horao' value='".$_POST['horao']."'>";
        echo "<input type='hidden' name='diao' value='".$_POST['diao']."'>";
        echo "<input type='hidden' name='origen' value='".$_POST['origen']."'>";
        echo "<input type='hidden' name='bastidor' value='".$_POST['bastidor']."'>";

       ?>
  </div>
  <div class="botones">
    <button type="submit" name="button" id="siguiente"><b>FINALIZAR</b></button>
  </div>
  </form>
</body>

</html>
<?php
}else {
  ?>
    <script type="text/javascript">
      alert('Escanear el bastidor antes de continuar.');
      window.location = 'origen.php';
    </script>
  <?php
}
 ?>
