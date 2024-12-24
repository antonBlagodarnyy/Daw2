const output = document.getElementById("output");

const tareas = [];
let reloj;

class Tarea {
  constructor(nombre) {
    this.nombre = nombre;
    this.completado = false;
  }
  completarTarea() {
    this.completado = true;
  }
}

agregarTarea(new Tarea("Comprar"));
agregarTarea(new Tarea("Proyecto"));


function agregarTarea(tarea) {
  tareas.push(tarea);
}

function mostrarTareas() {
  output.innerHTML = tablaDeObjetosEnArray(tareas);
}

function recordatorio() {
  const pendientes = tareas.filter((tarea) => !tarea.completado);
  reloj = setInterval(() => {
    if (pendientes.length > 0) 
      alert("Existen tareas pendientes.");
    else
    alert("No existen tareas pendientes.")
  }, 5000);
}

function detenerRecordatorio() {
  clearInterval(reloj);
}

function crearTarea() {
  agregarTarea(new Tarea(prompt("Introduzca el nombre de la tarea")));
}

function completarTarea() {
  let nombre = prompt("Introduzca el nombre de la tarea");
  let tarea = tareas.find((e) => e.nombre == nombre);

  if (tarea != undefined) {
    tarea.completarTarea();
    alert("Tarea completada");
  } else alert("No existe esa tarea");
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
