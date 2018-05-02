//iniciamos las variables necesarias para despues
var esteNo = 0;
var contador = 0;
var tiempoFinal = 0;

//funcion encargada de empezar con contador y comprobar si hay und estino seleccionado cada 3s
function inicio() {
  esteNo = 0;

  //iniciamos la cuenta atras en 3 segundos
  myVar = setTimeout(elegido, 1000);

  //sumamos los 3 segundos al contador
  contador += 1000;
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
        p9();
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
  if (elegidoSel == '') {
    // si no se ha elegido ninguno, le devolvemos a la funiocn de inicio
    inicio();
  }

  //dependiendo del elegido, le enviamos a su funcion personalizada
  else if (elegidoSel == 'FCPA') {
    fcpa();
  } else if (elegidoSel == 'VQC') {
    vqc();
  }else if (elegidoSel == 'P.COLORES') {
    colores();
  }else {
    fin();
  }
}

//funciones de los diferentes destinos
function p9() {
  if (localStorage.origen == 'P12') {
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
  } else if (localStorage.origen == 'CANOPY') {
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

function p12() {
  if (localStorage.origen == 'FCPA') {
    console.log('origen:fcpa');
    tiempoFinal = 30000 - contador;
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
  } else if (localStorage.origen == 'CANOPY') {
    console.log('origen:canopy');
    tiempoFinal = 70000 - contador;
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

function malvinas() {
  if (localStorage.origen == 'FCPA') {
    console.log('origen:fcpa');
    tiempoFinal = 100000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  } else if (localStorage.origen == 'VQC') {
    console.log('origen:vqc');
    tiempoFinal = 100000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  } else if (localStorage.origen == 'P.COLORES') {
    console.log('origen:p.colores');
    tiempoFinal = 100000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  } else if (localStorage.origen == 'P12') {
    console.log('origen:p12');
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
  if (localStorage.origen == 'FCPA') {
    console.log('origen:fcpa');
    tiempoFinal = 30000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  } else if (localStorage.origen == 'CANOPY') {
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
  }else {
    fin();
  }
}

function colores() {
  if (localStorage.origen == 'P12') {
    console.log('origen: p12');
    tiempoFinal = 30000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  }else if (localStorage.origen == 'VQC') {
    console.log('origen: vqc');
    tiempoFinal = 30000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  }else if (localStorage.origen == 'CANOPY') {
    console.log('origen: canopy');
    tiempoFinal = 40000 - contador;
    console.log(tiempoFinal);
    if (tiempoFinal > 0) {
      setTimeout(fin, tiempoFinal);
    }else {
      fin();
    }
  }else if (localStorage.origen == 'FCPA') {
    console.log('origen: FCPA');
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

//funcion final para poner el contador a 0 otra vez y desbloquear el boton de siguiente
function fin() {
  contador = 0;

  //ponemos el contador y el tiempo final a 0
  tiempoFinal = 0;
  console.log('fin');
  
  //desbloqueamos el boton de siguiente y cambiamos el titulo
  document.getElementById('siguiente').innerHTML = '<b>FINALIZAR</b>';
  document.getElementById('siguiente').disabled = false;
  document.getElementById('siguiente').style.backgroundColor = 'rgb(3, 119, 25)';
}
