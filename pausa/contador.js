function tiempo() {
  var hora = new Date();
  hora = hora.getHours();
  console.log(hora);
  var contador = 0;
  if (hora == '08' || hora == '16' || hora == '00' || hora == '24' || hora == '07' || hora == '15' || hora == '23') {
    contador = 600000;
  }else if (hora == '10' || hora == '19' || hora == '02' || hora == '09' || hora == '01') {
    contador = 900000;
  }else {
    contador = 0;
  }

  setTimeout(fin, contador);
}

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
