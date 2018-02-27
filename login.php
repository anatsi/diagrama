<?php
//incluimos el archivo encargado de las sesiones y creamos el objeto.
  include './bbdd/sesiones.php';
  $sesion= new Sesiones();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <style media="screen">
      body{
        color: white;
      }
    </style>
  </head>
  <body>
    <?php
    //incluimos el archivo encargado de la tabla de usuarios de la db y creamos el objeto.
      include './bbdd/empleados.php';
      $user= new Empleados();

      //llamamos a la funcion de loguear el usuario creada en users.php
      $registrado=$user->LoginUser($_POST['form-username']);
      //comprobamos que el usuario existe
      if ($registrado!=null) {
        $salt='$tsi$/';
        //comprobamos que la contraseña que ha puesto es correcta.
        $contraC = sha1(md5($salt . $_POST['form-password']));
        if ($registrado['password']==$contraC) {
          ?>
            <script type="text/javascript">
              var fecha = new Date();
              var dia = fecha.getDate();
              var mes = fecha.getMonth();
              var year = fecha.getFullYear();

              var fechaInicio = year + '-' + mes + '-' + dia;
              localStorage.setItem('fechaInicio', fechaInicio);

              var hora = fecha.getHours();
              var minutos = fecha.getMinutes();
              var segundos = fecha.getSeconds();

              var horaInicio = hora + ':' + minutos + ':' + segundos;
              localStorage.setItem('horaInicio', horaInicio);
            </script>
          <?php
          //si el usuario existe y la contraseña es correcta, iniciamos la sesion.
          $sesion->addUsuario($registrado['id']);
          if ($registrado['primera_vez'] == 1) {
            ?>
              <script type="text/javascript">
              if (!localStorage.contador) {
                localStorage.setItem('contador', 0);
              }
                window.location="roles.php";
              </script>
            <?php
          }else {
            ?>
              <script type="text/javascript">
              if (!localStorage.contador) {
                localStorage.setItem('contador', 0);
              }
                window.location="cambiarContraFormulario.php";
              </script>
            <?php
          }
        }else {
          //si la contraseña no coincide, sacamos un mensaje y lo reenviamos al formulario.
          ?>
            <script type="text/javascript">
            alert('Contraseña incorrecta.');
            window.location="index.html";
            </script>
          <?php
        }
      }else {
        //si el usuario no esta registrado, se lo indicamos y le volvemos a enviar al formulario.
        ?>
          <script type="text/javascript">
            alert('Usuario incorrecto.');
            window.location="index.html";
          </script>
        <?php
      }
     ?>
  </body>
</html>
