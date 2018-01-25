function comprobar() {
  var opciones = document.getElementsByName('origen');
  for (var i = 0; i < opciones.length; i++) {
    if (opciones[i].checked) {
      document.getElementById('otro').disabled = true;
    }
  }
}

function bloquear() {
  var elegido = document.getElementById('otro').value;
  if (elegido != 'primera') {
    var select = document.getElementById('otro');
    select.style.backgroundColor = 'rgb(3, 119, 25)';
    select.style.color = 'white';
    document.getElementById('opcion1').disabled = true;
    document.getElementById('opcion2').disabled = true;
    document.getElementById('opcion3').disabled = true;
  }
}

function devolver() {
  var select = document.getElementById('otro');
  select.style.backgroundColor = 'white';
  select.style.color = 'black';
  document.getElementById('otro').disabled = false;
  document.getElementById('opcion1').disabled = false;
  document.getElementById('opcion2').disabled = false;
  document.getElementById('opcion3').disabled = false;
}
