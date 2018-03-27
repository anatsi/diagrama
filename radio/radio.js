function si() {
  document.getElementById('siguiente').disabled=true;
  document.getElementById('opcion3').disabled=false;
  document.getElementById('lab lab3').style.display='inline-block';
  document.getElementById('opcion4').disabled=false;
  document.getElementById('lab lab4').style.display='inline-block';
}

function desbloquear() {
  document.getElementById('siguiente').disabled=false;
}

function no() {
  document.getElementById('opcion3').disabled=true;
  document.getElementById('lab lab3').style.display='none';
  document.getElementById('opcion4').disabled=true;
  document.getElementById('lab lab4').style.display='none';
}

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
