//funcion para sacar el confirm cuando se pulsa el boton de atras
function volverAtras() {
  $.confirm({
    title: 'ATRÁS',
    content: '¿Confirmar atrás?',
    buttons: {
      Aceptar: function () {
        window.location = 'origen.php';
      },

      Cancelar: function () {
        console.log('cancelado');
      },
    },
  });
}

//funcion para comprobar que origen se ha elegido y bloquear el resto
function comprobar() {
  //recogemos las opciones de origen disponible en un array
  var opciones = document.getElementsByName('origen');

  //recorremos el array para ver cual es el elegido
  for (var i = 0; i < opciones.length; i++) {
    if (opciones[i].checked) {
      var elegido = opciones[i].value;

      //guardamos el valor del origen elegido en el localStorage
      localStorage.setItem('origen', elegido);

      //bloqueamos el desplegable de mas origenes
      document.getElementById('otro').disabled = true;
    }
  }
}

// la misma funcion pero para los destinos
function comprobar2() {
  //recogemos las opciones de destino disponibles en un array
  var opciones = document.getElementsByName('destino');

  //recorremos el array para ver cual es la elegida
  for (var i = 0; i < opciones.length; i++) {
    if (opciones[i].checked) {
      //cuando encontramos la elegida, bloqueamos el desplegable de mas destinos
      document.getElementById('otro').disabled = true;
    }
  }
}

//funcion para cuando eliges un origen del select bloquear el resto
function bloquear() {
  //recogemos el origen elegido del desplegable
  var elegido = document.getElementById('otro').value;
  if (elegido != 'primera') {
    //guardamos el origen en localStorage
    localStorage.setItem('origen', elegido);

    //pintamos el select de verde
    var select = document.getElementById('otro');
    select.style.backgroundColor = 'rgb(3, 119, 25)';
    select.style.color = 'white';

    //bloqueamos las opciones de origen de fuera del select
    document.getElementById('opcion1').disabled = true;
    document.getElementById('opcion2').disabled = true;
    document.getElementById('opcion3').disabled = true;
    document.getElementById('opcion4').disabled = true;
  }
}

// lo mismo para los destinos
function bloquear2() {
  //recogemos la opcion elegida del select
  var elegido = document.getElementById('otro').value;
  if (elegido != 'primera') {
    //pintamos el select de verde
    var select = document.getElementById('otro');
    select.style.backgroundColor = 'rgb(3, 119, 25)';
    select.style.color = 'white';

    //bloqueamos las opciones de destino de fuera del select
    document.getElementById('opcion1').disabled = true;
    document.getElementById('opcion2').disabled = true;
    document.getElementById('opcion3').disabled = true;
    document.getElementById('opcion4').disabled = true;
  }
}

//funcion para cuando limpias el formulario volver a activar todas las opciones
function devolver() {
  //borramos el origen de localStorage
  localStorage.removeItem('origen');

  //volvemos a pintar el select de blanco
  var select = document.getElementById('otro');
  select.style.backgroundColor = 'white';
  select.style.color = 'black';

  //desbloqueamos todas las opciones de origen
  document.getElementById('otro').disabled = false;
  document.getElementById('opcion1').disabled = false;
  document.getElementById('opcion2').disabled = false;
  document.getElementById('opcion3').disabled = false;
  document.getElementById('opcion4').disabled = false;
}

//funcion que comprueba si el contador esta a 0 cada vez
// que se borra, y si lo esta, bloquea el boton de borrar
function borrar() {
  if (localStorage.contador == 0) {
    document.getElementById('atras').disabled = true;
  }
}

//funcion que bloquea el boton de enviar una vez pulsado para que no se envie mas de una vez
function enviar() {
  document.getElementById('siguiente').innerHTML = '<b>Enviando...</b>';
  document.getElementById('siguiente').disabled = true;
  return true;
}

//funcion que saca el confirm cuando se pulsa el boton de salir
function botonSalir() {
  $.confirm({
    title: 'SALIR',
    content: '¿Has terminado tu jornada laboral?',
    buttons: {
      SI: function () {
        window.location = '../salir.php?m=' + localStorage.contador + '&fi=' + localStorage.fechaInicio + '&hi=' + localStorage.horaInicio + '&u2=' + localStorage.usuario2;
      },

      NO: function () {
        console.log('cancelado');
      },
    },
  });
}

//funcion que guarda en local storage el segundo usuario en el rol de vinilos
function guardarUser() {
  //recogemos el usuario insertado
  var usuario = document.getElementById('usuario2').value;

  //lo cambiamos a mayusculas
  usuario = usuario.toUpperCase();

  //lo guardamos en el localStorage
  localStorage.setItem('usuario2', usuario);
  return true;
}

//confirm de volver atras para el rol de vinilos
function volverAtrasWrap() {
  $.confirm({
    title: 'ATRÁS',
    content: '¿Confirmar atrás?',
    buttons: {
      Aceptar: function () {
        window.location = 'bastidor.php';
      },

      Cancelar: function () {
        console.log('cancelado');
      },
    },
  });
}
