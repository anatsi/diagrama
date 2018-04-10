//funcion para iniciar el contador
function tiempo() {
  //recogemos la hora actual
  var hora = new Date();
  hora = hora.getHours();
  console.log(hora);
  //iniciamos el contador a 0
  var contador = 0;
  //dependiendo de la hora que sea, ponemos el contador a 10 minutos o a 15
  if (hora == '08' || hora == '16' || hora == '00' || hora == '24' || hora == '07' || hora == '15' || hora == '23') {
    contador = 600000;
  }else if (hora == '10' || hora == '19' || hora == '02' || hora == '09' || hora == '01') {
    contador = 900000;
  }else {
    //si no es hora de pausa, ponemos el contador a 0
    contador = 0;
  }
  //iniciamos el cronometro que cuando acabe ira a la funcion de fin
  setTimeout(fin, contador);
}

//funcion que avisa de que la pausa ha finalizado
function fin() {
  $.confirm({
    title: 'FIN DE PAUSA',
    content: 'El tiempo de la pausa ha finalizado',
    type: 'red',
    buttons: {
      OK: function () {
        console.log('fin');
      },
    },
  });
}
