//Declaramos la estructura de datos
var n1;
var n2;

//Variable para mostrar algunos datos por pantalla
const output = document.getElementById("output");

class Equipo {
    constructor(nombre, capacidad) {
        this.nombre = nombre,
            this.capacidad = capacidad,
            this.golesMarcados = [],
            this.golesEncajados = [],
            this.partidos = []

        //Calculamos los resultados de los partidos
        for (let i = 0; i < n1 - 1; i++) {
            let golesMarcados = Math.floor(Math.random() * (5 - 0 + 1)) - 0;
            let golesEncajados = Math.floor(Math.random() * (5 - 0 + 1)) - 0;

            this.golesMarcados.push(golesMarcados);
            this.golesEncajados.push(golesEncajados);

            //Asignamos el resultado del partido correspondiente
            //To fixed se come los decimales, el plus sirve para volver a pasarla a int ya que devuelve un string
            if (golesMarcados > golesEncajados) {

                this.partidos.push({ Resultado: "W", Asistencia: +(this.capacidad * 0.99).toFixed(0) });

            } else if (golesMarcados < golesEncajados) {
                this.partidos.push({ Resultado: "L", Asistencia: +(this.capacidad * 0.75).toFixed(0) });

            } else {
                this.partidos.push({ Resultado: "D", Asistencia: +(this.capacidad * 0.85).toFixed(0) });

            }
        }


    }
}

const equipos = [];

//Pedimos los numeros
do {
    n1 = parseInt(prompt("Introduzca un numero entre 1 y 20."));

    if (isNaN(n1))
        alert("Introduzca un numero")
    else if (n1 > 20)
        alert("Introduzca un numero menor a 20")
    else if (n1 < 0)
        alert("Introduzca un numero mayor a 0")
} while (isNaN(n1) || n1 > 20 || n1 < 0);
console.log(n1)

n2 = parseInt(prompt("Introduzca un numero menor a 120000"));
if (n2 > 120000 || n2 < 0) {
    alert("Ese no es un numero valido. Debe recargar la pagina y empezar de 0.")
} else {

    //Inicializamos los equipos
    for (let i = 0; i < n1; i++) {
        equipos.push(new Equipo(`Equipo ${i}`, Math.floor(Math.random() * (n2 - n2 / 2 + 1)) + n2 / 2))

    }

    console.log(equipos);


    function capacidadMediaPartidos() {
        //Sacamos la capacidad total por medio de reduce
        let totalCapacidad = equipos.reduce(((acumulador, equipoActual) => {
            acumulador += equipoActual.capacidad;
            return acumulador;
        }), 0)
        //Sacamos la media
        let media = totalCapacidad / equipos.length;
        //Mostramos el resultado
        output.innerHTML = `<p>Media teorica de los estadios de la competicion: ${media}</p>`;
    }

    function estadioConMayorCapacidad() {
        //Declaramos las variables que vamos a necesitar
        let estadioConMayorCapacidad;
        let capacidad = 0;
        //Recorremos los equipos
        equipos.forEach(equipo => {
            //Si la capacidad que tenemos almacenada es menor a la de ese equipo
            if (capacidad < equipo.capacidad) {
                //Apuntamos a ese equipo
                estadioConMayorCapacidad = equipo;
                //Guardamos su capacidad
                capacidad = equipo.capacidad;
            }
        });
        //Mostramos el resultado
        output.innerHTML = `<p>${estadioConMayorCapacidad.nombre}</p>`;
    }

    function equipoConMayorAsistencia() {
        //Declaramos las variables que vamos a necesitar
        let equipoMayorAsistencia;
        let asistenciaMayor = 0;

        //Recorremos todos los equipos
        equipos.map((equipo) => {
            //Por cada equipo reducimos sus partidos sacando su asistencia total
            let asistenciaEquipo = equipo.partidos.reduce((acumulador, partidoActual) => {
                acumulador += partidoActual.Asistencia;
                return acumulador;
            }, 0)
            //Asignamos los valores si resulta mayor al que ya tenemos
            if (asistenciaEquipo > asistenciaMayor) {
                asistenciaMayor = asistenciaEquipo;
                equipoMayorAsistencia = equipo;
            }
        })
        output.innerHTML = `<p>Nombre: ${equipoMayorAsistencia.nombre}  Asistencia: ${asistenciaMayor}</p>`;
    }


}
