function volverAtras() {
  var confirmacion = confirm('¿Confirmar atras?');
  if (confirmacion == true) {
    window.location = 'origen.php';
  }
}

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

function comprobar2() {
  var opciones = document.getElementsByName('destino');
  for (var i = 0; i < opciones.length; i++) {
    if (opciones[i].checked) {
      document.getElementById('otro').disabled = true;
    }
  }
}

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

/*function tiempo() {
  myVar = setTimeout(boton, 15000);
}*/

/*function boton() {
  document.getElementById('siguiente').disabled = false;
}*/

function borrar() {
  if (localStorage.contador == 0) {
    document.getElementById('atras').disabled = true;
  }
}
