<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ENVIAR TICKET</title>

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
                <h3>Formulario ticket</h3>
              </div>
            </div>
            <div class="form-bottom">
              <form role="form" action="guardarTicket.php" method="post" class="login-form">
                <div class="form-group">
                  <label class="sr-only" for="form-username">Asunto</label>
                  <input type="text" name="asunto" maxlength="200" placeholder="ASUNTO" class="form-username form-control" id="form-username" required>
                </div>
                <div class="form-group">
                  <label class="sr-only" for="form-password">Mensaje</label>
                  <textarea name="mensaje" maxlength="800" placeholder="MENSAJE" rows="8" cols="80" class="form-username form-control" style="resize: none;" required></textarea>
                </div>
                <button type="submit" class="btn">ENVIAR</button>
                <br><br>
                <button type="button" name="button" class="btn" onclick="window.location = 'roles.php'">ATRÁS</button>
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
