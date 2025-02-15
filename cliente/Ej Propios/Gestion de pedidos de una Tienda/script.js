const output = document.getElementById("output");

const pedidos = [
  {
    id: 1,
    cliente: "Juan Pérez",
    productos: [
      { nombre: "Silla", precio: 25, cantidad: 2 },
      { nombre: "Mesa", precio: 50, cantidad: 1 },
    ],
    fecha: "2024-11-05",
  },
  {
    id: 2,
    cliente: "Ana Gómez",
    productos: [
      { nombre: "Silla", precio: 25, cantidad: 4 },
      { nombre: "Sofá", precio: 200, cantidad: 1 },
    ],
    fecha: "2024-11-06",
  },
  {
    id: 3,
    cliente: "Juan Pérez",
    productos: [
      { nombre: "Mesa", precio: 50, cantidad: 2 },
      { nombre: "Lámpara", precio: 15, cantidad: 3 },
    ],
    fecha: "2024-11-06",
  },
];

function verPedidos() {
  output.innerHTML = tablaDeObjetosEnArray(pedidos);
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
/**Recorre un objeto y devuleve <td>s con los valores de sus propiedades
 *
 * @param {Object} objeto
 * @returns {String} columnas con los valores de las propiedades del objeto
 */
function imprimirObjeto(objeto) {
  let datos = ``;

  //Recorro las propiedades del objeto
  for (let propt in objeto) {
    const value = objeto[propt];
    if (typeof value === "boolean") {
      // Si es un boolean
      datos += `<td>${value ? "Sí" : "No"}</td>`;
    } else if (Array.isArray(value)) {
      // Si es un array, genero una subtabla
      datos += `<td>${tablaDeObjetosEnArray(value)}</td>`;
    } else if (typeof value === "object") {
      // Si es un objeto, recursivamente imprimo su contenido
      datos += `<td>${imprimirObjeto(value)}</td>`;
    } else {
      // Para otros tipos, simplemente agrego el valor
      datos += `<td>${value}</td>`;
    }
  }

  return datos;
}
