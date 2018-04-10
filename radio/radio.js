//funcion para hacer visibles las opciones de ok/nok cuando se pulsa al si
function si() {
  document.getElementById('siguiente').disabled=true;
  document.getElementById('opcion3').disabled=false;
  document.getElementById('lab lab3').style.display='inline-block';
  document.getElementById('opcion4').disabled=false;
  document.getElementById('lab lab4').style.display='inline-block';
}

//funcion para desbloquear el boton de siguiente
function desbloquear() {
  document.getElementById('siguiente').disabled=false;
}

//funcion para ocultar las opciones de ok/nok cuando se pulsa al no
function no() {
  document.getElementById('opcion3').disabled=true;
  document.getElementById('lab lab3').style.display='none';
  document.getElementById('opcion4').disabled=true;
  document.getElementById('lab lab4').style.display='none';
}

//funcion para comprobar que el bastidor es de una connect
function comprobarBastidor() {
  var bastidor = document.getElementById('bastidor').value;
  var modelo = bastidor.substr(8, 1);
  if (modelo == 'G') {
    return true;
  }else {
    $.confirm({
      title: 'ERROR',
      content: 'Bastidor no valido.',
      type: 'red',
      buttons: {
        OK: function () {
          window.location = 'bastidor.php';
        },
      },
    });
    return false;
  }
}
