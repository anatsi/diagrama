function comprobar() {
  opciones = document.getElementsByName('origen');
  for (var i = 0; i < opciones.length; i++) {
    if (opciones[i].checked) {
      document.getElementById('otro').disabled = 'true';
    }
  }
}
