//iniciamos las variables necesarias para despues
var esteNo = 0;
var contador = 0;
var tiempoFinal = 0;

//funcion encargada de empezar con contador y comprobar si hay und estino seleccionado cada 3s
function inicio() {
  esteNo = 0;
  //iniciamos la cuenta atras en 3 segundos
  myVar = setTimeout(elegido, 3000);
  //sumamos los 3 segundos al contador
  contador += 3000;
  console.log('inicio');
  console.log(localStorage.origen);
}

//funcion encargada de comprbar cual es el destino seleccionado y redireccionar a su funcion
function elegido() {
  //recogemos las opciones de destino en un array
  var elegido = document.getElementsByName('destino');
  //recorremos el array para ver cual es el destino elegido
  for (var i = 0; i < elegido.length; i++) {
    if (elegido[i].checked) {
      var esEste = elegido[i].value;
      //dependiendo del elegido, le enviamos a su funcion personalizada
      if (esEste == 'SP9') {
        sp9();
      } else if (esEste == 'P9') {
        p9();
      } else if (esEste == 'P12') {
        p12();
      } else if (esEste == 'MALVINAS') {
        malvinas();
      }
    } else {
      //si no se ha elegido ninguno, le enviamos a la siguiente funcion de comprobacion
      esteNo++;
      if (esteNo >= elegido.length) {
        elegidoSelect();
      }
    }
  }
}

//lo mismo que la de arriba pero para las opciones del select
function elegidoSelect() {
  //recogemos el destino elegido
  var elegidoSel = document.getElementById('otro').value;
  if (elegidoSel == "") {
    // si no se ha elegido ninguno, le devolvemos a la funiocn de inicio
    inicio();
  }
  //dependiendo del elegido, le enviamos a su funcion personalizada
  else if (elegidoSel == 'PUVA') {
    puva();
  } else if (elegidoSel == 'RAI') {
    rai();
  } else {
    fin();
  }
}

//funciones de los diferentes destinos
function sp9() {
  tiempoFinal = 40000 - contador;
  console.log(tiempoFinal);
  if (tiempoFinal > 0) {
    if (localStorage.origen == 'FCPA') {
      console.log('origen:fcpa');
    } else if (localStorage.origen == 'VQC') {
      console.log('origen:vqc');
    } else if (localStorage.origen == 'P.COLORES') {
      console.log('origen:p.colores');
    } else if (localStorage.origen == 'P12') {
      console.log('origen:p12');
    }
    setTimeout(fin, tiempoFinal);
    console.log('sp9');
  } else {
    fin();
  }
}

function p9() {
  tiempoFinal = 40000 - contador;
  console.log(tiempoFinal);
  if (tiempoFinal > 0) {
    if (localStorage.origen == 'FCPA') {
      console.log('origen:fcpa');
    } else if (localStorage.origen == 'VQC') {
      console.log('origen:vqc');
    } else if (localStorage.origen == 'P.COLORES') {
      console.log('origen:p.colores');
    } else if (localStorage.origen == 'P12') {
      console.log('origen:p12');
    }
    setTimeout(fin, tiempoFinal);
    console.log('p9');
  } else {
    fin();
  }
}

function p12() {
  tiempoFinal = 40000 - contador;
  if (tiempoFinal > 0) {
    if (localStorage.origen == 'FCPA') {
      console.log('origen:fcpa');
    } else if (localStorage.origen == 'VQC') {
      console.log('origen:vqc');
    } else if (localStorage.origen == 'P.COLORES') {
      console.log('origen:p.colores');
    } else if (localStorage.origen == 'P12') {
      console.log('origen:p12');
    }
    setTimeout(fin, tiempoFinal);
    console.log('p12');
  } else {
    fin();
  }
}

function malvinas() {
  tiempoFinal = 40000 - contador;
  if (tiempoFinal > 0) {
    if (localStorage.origen == 'FCPA') {
      console.log('origen:fcpa');
    } else if (localStorage.origen == 'VQC') {
      console.log('origen:vqc');
    } else if (localStorage.origen == 'P.COLORES') {
      console.log('origen:p.colores');
    } else if (localStorage.origen == 'P12') {
      console.log('origen:p12');
    }
    setTimeout(fin, tiempoFinal);
    console.log('malvinas');
  } else {
    fin();
  }
}

function puva() {
  tiempoFinal = 40000 - contador;
  if (tiempoFinal > 0) {
    if (localStorage.origen == 'FCPA') {
      console.log('origen:fcpa');
    } else if (localStorage.origen == 'VQC') {
      console.log('origen:vqc');
    } else if (localStorage.origen == 'P.COLORES') {
      console.log('origen:p.colores');
    } else if (localStorage.origen == 'P12') {
      console.log('origen:p12');
    }
    setTimeout(fin, tiempoFinal);
    console.log('puva');
  } else {
    fin();
  }
}

function rai() {
  tiempoFinal = 40000 - contador;
  if (tiempoFinal > 0) {
    if (localStorage.origen == 'FCPA') {
      console.log('origen:fcpa');
    } else if (localStorage.origen == 'VQC') {
      console.log('origen:vqc');
    } else if (localStorage.origen == 'P.COLORES') {
      console.log('origen:p.colores');
    } else if (localStorage.origen == 'P12') {
      console.log('origen:p12');
    }
    setTimeout(fin, tiempoFinal);
    console.log('rai');
  } else {
    fin();
  }
}

//funcion final para poner el contador a 0 otra vez y desbloquear el boton de siguiente
function fin() {
  contador = 0;
  //ponemos el contador y el tiempo final a 0
  tiempoFinal = 0;
  console.log('fin');
  //desbloqueamos el boton de siguiente y cambiamos el titulo
  document.getElementById('siguiente').innerHTML = '<b>FINALIZAR</b>';
  document.getElementById('siguiente').disabled = false;
}
