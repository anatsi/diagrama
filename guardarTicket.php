<?php
  //incluimos los archivos necesarios e inicializamos sus objetos.
  require_once './bbdd/empleados.php';
  $empleados = new Empleados();

  require_once './bbdd/sesiones.php';
  $sesiones = new Sesiones();

  require_once './bbdd/ticket.php';
  $ticket = new Ticket();

  //sacamos el usuario conectado.
  $usuario = $empleados -> EmpleadoUser($_SESSION['usuario']);

  //comprobamos que se habia rellenado el formulario correctamente
  if (isset($_POST['mensaje']) && isset($_POST['asunto'])) {
    $fecha = date('Y-m-d');
    $hora = date('H:m:s');
    $nuevoTicket = $ticket -> nuevoTicket($_POST['mensaje'], $_POST['asunto'], $usuario['user'], $fecha, $hora);
    if ($nuevoTicket == false || $nuevoTicket == null) {
      ?>
        <script type="text/javascript">
          alert('No se pudo registrar el ticket');
          window.location = 'roles.php';
        </script>
      <?php
    }else {
      //enviar correo para vaisar de un nuevo ticket.
      // Enviar el email
      $mail = "robot@tsiberia.es";

      $header = 'From: ' . $mail . " \r\n";
      $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
      $header .= "Mime-Version: 1.0 \r\n";
      //$header .= "Content-Type: text/plain";
      $header .= "Content-Type: text/html; charset=utf-8";

      $mensaje = '<html>' . '<head><title>Email</title>
      <style type="text/css">
      h2 {
          color: black;
          font-family: Impact;
        }
      </style>
      </head>' .
      '<body>
        <h2>
          <b>Nuevo ticket registrado</b>
        </h2><br />' .
        '<b>ASUNTO: </b>'.$_POST['asunto']. '<br />
        <b> MENSAJE: </b>'.$_POST['mensaje'].' <br>
        <b> USUARIO: </b>'.$usuario['user'].' <br>
        <hr>'.
        'Por favor, no responda a este correo lo envia un robot automáticamente.'.
        '<br />Enviado el ' . date('d/m/Y', time()) .
      '</body></html>';

      $para = 'aasins@tsiberia.es';
      $copia= 'aasins@tsiberia.com';
      $asunto = 'NUEVO TICKET';

      mail("$para,$copia", $asunto, $mensaje, $header);
      ?>
      <script type="text/javascript">
        window.location = 'roles.php';
      </script>
      <?php
    }
  }else {
    ?>
      <script type="text/javascript">
        alert('Rellenar todos los campos antes de continuar');
        window.location = 'roles.php';
      </script>
    <?php
  }
 ?>
