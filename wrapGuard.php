<?php
  require_once './bbdd/sesiones.php';
  require_once './bbdd/roles.php';
  require_once './bbdd/empleados.php';

  $sesion = new Sesiones();
  $empleado = new Empleados();
  $rol = new Roles();

  $fecha = date('Y-m-d');
  $hora = date('H:i:s');

  if (isset($_SESSION['usuario'])) {
    $usuario = $empleado -> EmpleadoUser($_SESSION['usuario']);

    //recoger el ultimo rol para ese usuario
    $ultimoRol = $rol -> ultimoRol($usuario['user']);
    //si no tiene una ultima entrada, guardamos la entrada
    if ($ultimoRol ==  null || $ultimoRol == false) {
      $nuevoRol = $rol -> nuevoRol('VINILOS', $usuario['user'], $fecha, $hora);
      //si se guarda mal lo sacamos
      if ($nuevoRol == null || $nuevoRol == false) {
        ?>
          <script type="text/javascript">
            window.location = 'roles.php';
          </script>
        <?php
      }else {
        //si se guarda bien entramos al rol de VINILOS
        ?>
          <script type="text/javascript">
            window.location = './wrapGuard/index.php';
          </script>
        <?php
      }
    }
    //si si que tiene una ultima entrada
    else {
      //comprobamos si la entrada tiene fecha de fin puesta o no
      if ($ultimoRol['fecha_fin'] == null && $ultimoRol['hora_fin'] == null || $ultimoRol['fecha_fin'] == '0000-00-00' && $ultimoRol['hora_fin'] == '00:00:00') {
        //si no tiene fecha de fin comprobamos si esta entrando al mismo rol que estaba
        if ($ultimoRol['rol'] == 'VINILOS') {
          //si esta en el mismo rol, lo enviamos a la carpeta de este rol sin guardar nada.
          ?>
            <script type="text/javascript">
              window.location = './wrapGuard/index.php';
            </script>
          <?php
        }else {
          // si es un rol diferente, primero guardamos la fecha y hora de fin
          $finalizarRol = $rol ->finalizarRol($ultimoRol['id'], $fecha, $hora);
          if ($finalizarRol == null || $finalizarRol == false) {
            ?>
              <script type="text/javascript">
                window.location = 'roles.php';
              </script>
            <?php
          }else {
            //si esto se guarda bien, creamos la nuea entrada y si se guarda bien lo enviamos a la carpeta del rol
            $nuevoRol = $rol -> nuevoRol('VINILOS', $usuario['user'], $fecha, $hora);
            if ($nuevoRol == null || $nuevoRol == false) {
              ?>
                <script type="text/javascript">
                  window.location = 'roles.php';
                </script>
              <?php
            }else {
              ?>
                <script type="text/javascript">
                  window.location = './wrapGuard/index.php';
                </script>
              <?php
            }
          }
        }
      }else {
        //si la ultima entrada si que tenia fecha de fin, guardamos la nueva enntrada y lo enviamos a la carpeta del rol.
        $nuevoRol = $rol -> nuevoRol('VINILOS', $usuario['user'], $fecha, $hora);
        if ($nuevoRol == null || $nuevoRol == false) {
          ?>
            <script type="text/javascript">
              window.location = 'roles.php';
            </script>
          <?php
        }else {
          ?>
            <script type="text/javascript">
              window.location = './wrapGuard/index.php';
            </script>
          <?php
        }
      }
    }
  }else {
    ?>
      <script type="text/javascript">
        window.location = 'index.php';
      </script>
    <?php
  }
 ?>
