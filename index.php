<?php
//sacamos los headers del dispositivo desd ele que entramos
/*$headers = apache_request_headers();

// los guardamos en variables
 $mystring = $headers['User-Agent'];
 $findme = 'Android';
 //comprobamos si es android
 $pos1 = strpos($mystring, $findme);
 if ($pos1 != true) {
 // si no es android lo enviamos a la pagina de no disponible
   ?>
    <script type="text/javascript">
      window.location = 'nodisponible.html';
    </script>
   <?php
 }*/
 ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LOGIN</title>

  <!-- CSS-->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/form-elements.css">
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- Favicon and touch icons -->
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
</head>

<body>
  <!-- Top content -->
  <div class="top-content">
    <div class="inner-bg">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3 form-box">
            <div class="form-top">
              <div class="form-top-left">
                <p><img src="assets/files/logo.png" alt="logo TSI" title="Logo TSI" width="100" height="75" /></p>
                <h3>Movimientos jockeys</h3>
              </div>
            </div>
            <div class="form-bottom">
              <form role="form" action="login.php" method="post" class="login-form">
                <div class="form-group">
                  <label class="sr-only" for="form-username">Usuario</label>
                  <input type="text" name="form-username" placeholder="Usuario" class="form-username form-control" id="form-username" autofocus required>
                </div>
                <div class="form-group">
                  <label class="sr-only" for="form-password">Contraseña</label>
                  <input type="password" name="form-password" placeholder="Contraseña" class="form-password form-control" id="form-password" required>
                </div>
                <button type="submit" class="btn">Iniciar sesion</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Javascript -->
  <script src="assets/js/jquery-1.11.1.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.backstretch.min.js"></script>
</body>

</html>
