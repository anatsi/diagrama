<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>ELEGIR ORIGEN</title>
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
    <span class="derecha"><a href="./bbdd/logout.php">SALIR</a></span>
    <br>
    <h2>JOCKEYS</h2>
  </header>
  <div class="two-columns">
    <form class="contact_form" action="bastidor.php" method="post" enctype="multipart/form-data">
      <ul>
        <li>
          <label for="origen" id="titulo">ORIGEN</label>
          <div class="wrap">
            <label id="lab">
              <input type="radio" name="origen" value="CANOPY" onclick="comprobar();">
               <div  class="btn btn-sık"><span>CANOPY</span></div>
            </label>
            <label id="lab">
              <input  type="radio"  name="origen" value="P12" onclick="comprobar();">
             <div class="btn btn-sık"><span>P12</span></div>
           </label>
           <label id="lab">
             <input  type="radio"  name="origen" value="MALVINAS" onclick="comprobar();">
            <div class="btn btn-sık"><span>MALVINAS</span></div>
          </label>
          </div>
          <select class="" name="otrosOrigenes" id="otro">
             <option value="" selected disabled>OTRAS OPCIONES</option>
             <option value="YARD">YARD</option>
             <option value="P9">P9</option>
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
      <input type='hidden' name='hora' value="">
  </div>
  <?php
    $diao = date('Y-m-d');
    $horao = date('H:i:s');
    echo "<input type='hidden' name='horao' value='".$horao."'>";
    echo "<input type='hidden' name='diao' value='".$diao."'>";
   ?>
  <div class="botones">
    <button type="submit" name="button" id="siguiente"><b>SIGUIENTE</b></button>
  </div>
  </form>

</body>

</html>
