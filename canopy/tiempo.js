//iniciamos las variables que necesitaremos mas tarde
var esteNo = 0;
var contador = 0;
var tiempoFinal = 0;

/*funcion encargada de iniciar el contador y comprobar
si hay un destino seleccionado cada 3 segundos*/
function inicio() {
  esteNo = 0;

  //iniciamos el contados
  myVar = setTimeout(elegido, 1000);

  //le sumamos 3 segundos mas al contador
  contador += 1000;
  console.log('inicio');
  console.log(localStorage.origen);
}

//funcion encargada de ver que destino ha sigo el seleccionado
//y rederigir a la funcion de este destino
function elegido() {
  //guardamos los destinos en un array
  var elegido = document.getElementsByName('destino');

  //recorremos el array para comprobar cual es el que se ha elegido
  for (var i = 0; i < elegido.length; i++) {
    if (elegido[i].checked) {
      var esEste = elegido[i].value;

      //dependiendo del elegido lo enviamos a su funcion personalizada
      if (esEste == 'SP9') {
        p9();
      } else if (esEste == 'P9') {
        p9();
      } else if (esEste == 'P12') {
        p12();
      } else if (esEste == 'FCPA') {
        fcpa();
      }
    } else {
      //si no se ha elegido ninguno, lo enviamos a la funcion que comprueba los otros destinos
      esteNo++;
      if (esteNo >= elegido.length) {
        elegidoSelect();
      }
    }
  }
}

// si el elegido es del select y no de las opciones de fuera, esta es la funcion que lo elegira
function elegidoSelect() {
  //recogemos el destino que se ha elegido.
  var elegidoSel = document.getElementById('otro').value;
  if (elegidoSel == "") {
    //si no se ha elegido ninguno volvemos a la funcion de inicio
    inicio();
  }
    
  //si si que se ha elegido alguno, lo llevamos a su funcion personalizada
  else if (elegidoSel == 'VQC') {
    vqc();
  } else if (elegidoSel == 'P.COLORES') {
    colores();
  }else if (elegidoSel == 'MALVINAS') {
    malvinas();
  } else {
    fin();
  }
}

//funciones de los direfenres destinos que se pueden seleccionar
function p9() {
  if (localStorage.origen == 'CANOPY') {
    console.log('origen:canopy');
    tiempoFinal = 40000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  } else if (localStorage.origen == 'P12') {
    console.log('origen:p12');
    tiempoFinal = 90000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  } else if (localStorage.origen == 'VQC') {
    console.log('origen:vqc');
    tiempoFinal = 140000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  }else {
    fin();
  }
}

function p12() {
  if (localStorage.origen == 'CANOPY') {
    console.log('origen:canopy');
    tiempoFinal = 70000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  } else if (localStorage.origen == 'P12') {
    console.log('origen:p12');
    tiempoFinal = 70000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  } else if (localStorage.origen == 'FCPA') {
    console.log('origen:fcpa');
    tiempoFinal = 30000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  }else {
    fin();
  }
}

function fcpa() {
  if (localStorage.origen == 'CANOPY') {
    console.log('origen:canopy');
    tiempoFinal = 40000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  }else {
    fin();
  }
}

function vqc() {
  if (localStorage.origen == 'CANOPY') {
    console.log('origen:canopy');
    tiempoFinal = 60000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  } else if (localStorage.origen == 'P12') {
    console.log('origen:p12');
    tiempoFinal = 30000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  } else if (localStorage.origen == 'FCPA') {
    console.log('origen:fcpa');
    tiempoFinal = 30000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  } else {
    fin();
  }
}

function colores() {
  if (localStorage.origen == 'CANOPY') {
    console.log('origen:canopy');
    tiempoFinal = 40000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  } else if (localStorage.origen == 'P12') {
    console.log('origen:p12');
    tiempoFinal = 30000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  } else if (localStorage.origen == 'FCPA') {
    console.log('origen:fcpa');
    tiempoFinal = 30000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  } else if (localStorage.origen == 'VQC') {
    console.log('origen:vqc');
    tiempoFinal = 30000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  }else {
    fin();
  }
}

function malvinas() {
  if (localStorage.origen == 'P.COLORES' || localStorage.origen == 'P12' || localStorage.origen == 'FCPA' || localStorage.origen == 'VQC') {
    console.log('origen: colores, 12, fcpa, vqc');
    tiempoFinal = 100000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  }else {
    fin();
  }
}

//funcion encargada de finalizar el contador y quitar el bloqueo al boton de siguiente
function fin() {
  //ponemos el contados y el tiempo final a 0
  contador = 0;
  tiempoFinal = 0;
  console.log('fin');

  //desbloqueamos el boton de finalizar para que puedan guardar el movimiento
  document.getElementById('siguiente').innerHTML = '<b>FINALIZAR</b>';
  document.getElementById('siguiente').disabled = false;
  document.getElementById('siguiente').style.backgroundColor = 'rgb(3, 119, 25)';
}
