const importeEletrico = 0.0015;
const importeCombustion = 0.002;
parking = [];

class Vehiculo {
  constructor(matricula, tipo) {
    this.matricula = matricula;
    this.tipo = tipo;
    this.horaEntrada = new Date();
  }

  calcularCoste() {
    this.horaSalida = new Date();
    this.tiempoTranscurrido = (this.horaSalida - this.horaEntrada) / 1000;

    if (this.tipo == "electrico") {
      this.importe = this.tiempoTranscurrido * importeEletrico;
    } else {
      this.importe = this.tiempoTranscurrido * importeCombustion;
    }

    alert(`Ha estado ${this.tiempoTranscurrido} segundos. 
        Debe de pagar ${this.importe}`);
  }

  datosVehiculo() {
    let datosVehiculo = `Matricula: ${this.matricula}
    Tipo: ${this.tipo}
    Hora de entrada: ${this.horaEntrada}`;
    return datosVehiculo;
  }
}

//Main
let salir = false;
do {
  switch (menu()) {
    case 1:
      imprimirTodosLosVehiculos();
      break;
    case 2:
      registrarVehiculo(prompt(`Introduzca la matricula del vehiculo`));
      break;
    case 3:
      sacarVehiculo(prompt(`Introduzca la matricula del vehiculo que sale`));
      break;
    case 4:
      salir = true;
      alert(`Adios`);
      break;
      Default: alert(`Valor fuera de rango`);
  }
} while (!salir);

function imprimirTodosLosVehiculos() {
  let datos = ``;
  parking.forEach((vehiculo) => {
    datos += vehiculo.datosVehiculo();
  });
  alert(datos);
}

function menu() {
  let eleccionMenu;
  do {
    eleccionMenu = eleccion(
      1,
      4,
      `
            +++++++++++++PARKING++++++++++
            Seleccione una accion:
            1.-Ver vehiculos estacionados.
            2.-Estacionar un vehiculo.
            3.-Sacar un vehiculo.
            4.-Salir.
            `
    );
  } while (isNaN(eleccionMenu));

  return eleccionMenu;
}

function registrarVehiculo(matricula) {
  let tipo;
  do {
    tipo = prompt(`Introduzca el tipo de vehiculo`);
    if (tipo !== "electrico" && tipo !== "combustion") {
      alert(`Tipo de vehiculo no valido.`);
    }
  } while (tipo !== "electrico" && tipo !== "combustion");

  parking.push(new Vehiculo(matricula, tipo));
}

function sacarVehiculo(matricula) {
  vehiculoExistente = parking.some(
    (vehiculo) => vehiculo.matricula === matricula
  );

  if (vehiculoExistente) {
    let vehiculoASacar = parking.find(
      (vehiculo) => (vehiculo.matricula = matricula)
    );
    vehiculoASacar.calcularCoste();
    parking = parking.filter((vehiculo) => vehiculo.matricula != matricula);
    alert(`Vehiculo eliminado.`);
  } else {
    alert(`No se encuentra el vehiculo`);
  }
}
//Funcionalidades
function eleccion(numMinimo, numMaximo, mensaje) {
  let eleccion;
  do {
    eleccion = parseInt(prompt(mensaje));
  } while (isNaN(eleccion) || eleccion < numMinimo || eleccion > numMaximo);
  return eleccion;
}
