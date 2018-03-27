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
  var opciones = document.getElementsByName('origen');
  for (var i = 0; i < opciones.length; i++) {
    if (opciones[i].checked) {
      var elegido = opciones[i].value;
      localStorage.setItem('origen', elegido);
      document.getElementById('otro').disabled = true;
    }
  }
}

// la misma funcion pero para los destinos
function comprobar2() {
  var opciones = document.getElementsByName('destino');
  for (var i = 0; i < opciones.length; i++) {
    if (opciones[i].checked) {
      document.getElementById('otro').disabled = true;
    }
  }
}

//funcion para cuando eliges un origen del select bloquear el resto
function bloquear() {
  var elegido = document.getElementById('otro').value;
  if (elegido != 'primera') {
    localStorage.setItem('origen', elegido);
    var select = document.getElementById('otro');
    select.style.backgroundColor = 'rgb(3, 119, 25)';
    select.style.color = 'white';
    document.getElementById('opcion1').disabled = true;
    document.getElementById('opcion2').disabled = true;
    document.getElementById('opcion3').disabled = true;
    document.getElementById('opcion4').disabled = true;
  }
}

// lo mismo para los destinos
function bloquear2() {
  var elegido = document.getElementById('otro').value;
  if (elegido != 'primera') {
    var select = document.getElementById('otro');
    select.style.backgroundColor = 'rgb(3, 119, 25)';
    select.style.color = 'white';
    document.getElementById('opcion1').disabled = true;
    document.getElementById('opcion2').disabled = true;
    document.getElementById('opcion3').disabled = true;
    document.getElementById('opcion4').disabled = true;
  }
}

//funcion para cuando limpias el formulario volver a activar todas las opciones
function devolver() {
  localStorage.removeItem('origen');
  var select = document.getElementById('otro');
  select.style.backgroundColor = 'white';
  select.style.color = 'black';
  document.getElementById('otro').disabled = false;
  document.getElementById('opcion1').disabled = false;
  document.getElementById('opcion2').disabled = false;
  document.getElementById('opcion3').disabled = false;
  document.getElementById('opcion4').disabled = false;
}

//funcion que comprueba si el contador esta a 0 cada vez que se borra, y si lo esta, bloquea el boton de borrar
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
function botonSalir(pagina) {
  $.confirm({
    title: 'SALIR',
    content: '¿Has terminado tu jornada laboral?',
    buttons: {
      SI: function () {
        window.location = '../'+pagina+'.php?m=' + localStorage.contador + '&fi=' + localStorage.fechaInicio + '&hi=' + localStorage.horaInicio + '&u2=' + localStorage.usuario2;
      },

      NO: function () {
        console.log('cancelado');
      },
    },
  });
}

//funcion que guarda en local storage el segundo usuario en el rol de vinilos
function guardarUser() {
  var usuario = document.getElementById('usuario2').value;
  usuario = usuario.toUpperCase();
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
