var esteNo = 0;
var contador = 0;
var tiempoFinal = 0;

function inicio() {
  esteNo = 0;
  myVar = setTimeout(elegido, 10000);
  contador += 10000;
  console.log('inicio');
  console.log(localStorage.origen);
}

function elegido() {
  var elegido = document.getElementsByName('destino');
  for (var i = 0; i < elegido.length; i++) {
    if (elegido[i].checked) {
      var esEste = elegido[i].value;
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
      esteNo++;
      if (esteNo >= elegido.length) {
        elegidoSelect();
      }
    }
  }
}

function elegidoSelect() {
  var elegidoSel = document.getElementById('otro').value;
  if (elegidoSel == ""){
    inicio();
  }else if (elegidoSel == 'PUVA') {
    puva();
  }else if (elegidoSel == 'RAI') {
    rai();
  }else {
    fin();
  }
}

function sp9() {
  tiempoFinal = 10000 - contador;
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
  }else {
    fin();
  }
}

function p9() {
  tiempoFinal = 10000 - contador;
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
  }else {
    fin();
  }
}

function p12() {
  tiempoFinal = 10000 - contador;
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
  }else {
    fin();
  }
}

function malvinas() {
  tiempoFinal = 10000 - contador;
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
  }else {
    fin();
  }
}

function puva() {
  tiempoFinal = 10000 - contador;
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
  }else {
    fin();
  }
}

function rai() {
  tiempoFinal = 10000 - contador;
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
  }else {
    fin();
  }
}

function fin() {
  contador = 0;
  tiempoFinal = 0;
  console.log('fin');
  document.getElementById('siguiente').disabled = false;
}
