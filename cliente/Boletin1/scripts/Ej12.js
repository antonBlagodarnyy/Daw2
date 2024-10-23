const importeEletrico = 15;
const importeCombustion = 20;
parking = [];

class Vehiculo {
    constructor(matricula, tipo,
        // horaEntrada
    ) {
        this.matricula = matricula;
        this.tipo = tipo;
        // this.horaEntrada = horaEntrada;
    }
    /* calcularCoste(horaSalida) {
        if (this.tipo == "cocheElectrico") {
            this
        } 
    }*/
}


//Opciones del menu:
//1.-Ver vehiculos estacionados
//2.-Estacionar vehiculo
//3.-Sacar vehiculo

function menu(){
    
}

function registrarVehiculo() {


    parking.push(new Vehiculo(matricula, tipo,
        //    horaEntrada
    ));
}

//Funcionalidades
function eleccion(numMinimo, numMaximo, mensaje) {
    let eleccion;
    do {
        eleccion = parseInt(prompt(mensaje));
    } while (isNaN(eleccion) || eleccion < numMinimo || eleccion > numMaximo);
    return eleccion;
}
