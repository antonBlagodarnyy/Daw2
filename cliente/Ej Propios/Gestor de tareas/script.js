const output = document.getElementById("output");
const regExFecha = /^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/;

const tareas = [
  {
    id: 1,
    descripcion: "Reunion con el equipo",
    prioridad: "alta",
    completada: false,
    fechaLimite: "2024-11-29",
  },
  {
    id: 2,
    descripcion: "Terminar informe de ventas",
    prioridad: "media",
    completada: true,
    fechaLimite: "2024-11-27",
  },
  {
    id: 3,
    descripcion: "Comprar materiales para el proyecto",
    prioridad: "baja",
    completada: false,
    fechaLimite: "2024-12-05",
  },
  {
    id: 4,
    descripcion: "Revisar código del proyecto",
    prioridad: "alta",
    completada: false,
    fechaLimite: "2024-11-30",
  },
  {
    id: 5,
    descripcion: "Revisión de presupuesto",
    prioridad: "media",
    completada: true,
    fechaLimite: "2024-11-25",
  },
];
class Tarea {
  constructor(descripcion, prioridad, fechaLimite) {
    this.id = tareas.length+1;
    this.descripcion = descripcion;
    this.prioridad = prioridad;
    this.completada = false;
    this.fechaLimite = fechaLimite; //YYYY-MM-DD
    tareas.push(this);
  }
}
const Prioridades = {
    Alta: "alta",
    Media: "media",
    Baja: "baja",
  };
  
//Metodos secundarios
/**Le pide al usuario que escoja una categoria usando la constante y una funcionalidad
 *
 * @returns {String} categoriaEscogida
 */
function pedirPrioridad() {
    //Declaro la categoria que va a devolver
    let categoriaEscogida;
  
    //Switch que llama a un metodo y que utiliza el valor que ese metodo devuelve
    switch (
      eleccion(
        1,
        3,
        `Escoja la prioridad:
      1.-Alta.
      2.-Media.
      3.-Baja.`
      )
    ) {
      case 1:
        categoriaEscogida = Prioridades.Alta;
        break;
      case 2:
        categoriaEscogida = Prioridades.Media;
        break;
      case 3:
        categoriaEscogida = Prioridades.Baja;
        break;
      default:
        alert(`Error en switch`);
        break;
    }
    return categoriaEscogida;
  }

  //Metodos principales
function verTareas() {
  output.innerHTML = tablaDeObjetosEnArray(tareas);
}

function agregarTarea() {
let prioridad = pedirPrioridad();
let descripcion = prompt("Introduzca la descripcion de la tarea.")
let fechaEscogida;
do{
    fechaEscogida=prompt("Introduzca una fecha limite en formato YYYY-MM-DD");
}while (!regExFecha.test(fechaEscogida));

new Tarea(descripcion,prioridad,fechaEscogida);
}

//Funcionalidades
/**Pide al usuario un numero entero y lo valida correctamente,
 * asegurandose que este entre el numMinimo y el numMaximo.
 *
 * @param {number} numMinimo
 * @param {number} numMaximo
 * @param {string} mensaje
 * @returns {number} Integer validada
 */
function eleccion(numMinimo, numMaximo, mensaje) {
  let eleccion;
  do {
    eleccion = parseInt(prompt(mensaje));
  } while (isNaN(eleccion) || eleccion < numMinimo || eleccion > numMaximo);
  return eleccion;
}

/**Recibe un array de objetos iguales y devuelve una tabla HTML
 * que muestra las propiedades de los objetos
 *
 * @param {Object[]} array
 * @returns {string} Tabla HTML template literal
 */
function tablaDeObjetosEnArray(array) {
  //Creo las etiquetas que abren la tabla de la tabla
  let tabla = `<table>
        <thead>`;

  //Saco el primer objeto del array para recorrer solo las propiedades
  let objeto = array[0];
  //Creo las cabeceras con las propiedades
  for (let propt in objeto) {
    tabla += `<th>${propt}</th>`;
  }
  //Cierro la cabeza de la tabla y abro el body
  tabla += `</thead>
        <tbody>`;

  //Recorro los objetos y por cada objeto abro una fila,
  //dentro de la fila llamo a la funcionalidad "imprimir objeto"
  array.forEach((objeto) => {
    tabla += `<tr>${imprimirObjeto(objeto)}</tr>`;
  });

  tabla += `</tbody></table>`;

  return tabla;
}
/**Recorre un objeto y devuelve <td>s con los valores de sus propiedades
 *
 * @param {Object} objeto
 * @returns {String} columnas con los valores de las propiedades del objeto
 */
function imprimirObjeto(objeto) {
  let datos = ``;

  for (let propt in objeto) {
    const value = objeto[propt];

    if (typeof value === "boolean") {
      // Si es boolean, muestra "Sí" o "No"
      datos += `<td>${value ? "Sí" : "No"}</td>`;
    } else if (Array.isArray(value)) {
      // Si es un array
      if (value.length > 0 && typeof value[0] === "object") {
        // Si es un array de objetos, genera una subtabla
        datos += `<td>${tablaDeObjetosEnArray(value)}</td>`;
      } else {
        // Si no, conviértelo en una lista separada por comas
        datos += `<td>${value.join(", ")}</td>`;
      }
    } else if (typeof value === "object") {
      // Si es un objeto, recursivamente imprimir su contenido
      datos += `<td>${imprimirObjeto(value)}</td>`;
    } else {
      // Para otros tipos, simplemente agregar el valor
      datos += `<td>${value}</td>`;
    }
  }

  return datos;
}
