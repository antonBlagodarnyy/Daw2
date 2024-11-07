var inventario = [];

const output = document.getElementById("output");

//Clase principal
class Producto {
  disponibilidad;
  constructor(nombre, stock, precio, categoria) {
    this.nombre = nombre;
    this.stock = stock;
    this.precio = precio;
    this.categoria = categoria;
    this.verDisponibilidad();
  }
  verDisponibilidad() {
    if (this.stock > 0) this.disponibilidad = true;
    else this.disponibilidad = false;
  }
}
const Categoria = {
  Electronica: "Electronica",
  Ropa: "Ropa",
  Hogar: "Hogar",
};

//Datos mock
inventario.push(new Producto("Camiseta blanca", 3, 12.99, Categoria.Ropa));
inventario.push(new Producto("Camiseta negra", 0, 13.99, Categoria.Ropa));
inventario.push(new Producto("Lavadora", 2, 300.99, Categoria.Electronica));
inventario.push(new Producto("Sofa ", 0, 200.99, Categoria.Hogar));

//Metodos secundarios
function pedirCategoria() {
  let categoriaEscogida;
  switch (
  eleccion(
    1,
    3,
    `Escoja la categoria:
    1.-Electronica.
    2.-Ropa.
    3.-Hogar.`
  )
  ) {
    case 1:
      categoriaEscogida = Categoria.Electronica;
      break;
    case 2:
      categoriaEscogida = Categoria.Ropa;
      break;
    case 3:
      categoriaEscogida = Categoria.Hogar;
      break;
    default:
      alert(`Error en switch`);
      break;
  }
  return categoriaEscogida;
}

//Metodos principales
function verListadoDeProductos() {
  output.innerHTML = tablaDeObjetosEnArray(inventario);
}

function verProductosDisponibles() {
  let productosDisponibles = inventario.filter(
    (producto) => producto.disponibilidad == true
  );

  let listado = tablaDeObjetosEnArray(productosDisponibles);

  output.innerHTML = listado;
}

function incrementarPreciosEnUnaCategoria() {
  let incremento = parseInt(
    prompt(`Introduzca la cantidad que desea sumarle al precio.`)
  );
  categoriaEscogida = pedirCategoria();

  //Como el ejercicio pide que se hagan los cambios en un array distinto,
  //saco los datos en un array aparte y los muestro como datos temporales.

  //Sacamos los productos que vamos a modificar
  let productosIncrementados = structuredClone(
    inventario.filter((producto) => producto.categoria === categoriaEscogida)
  );

  //Js tiene problemas de precision sumando int a decimal.
  //Para corregirlo he añadido toFixed. Y el + para convertirlo otra vez a numero
  productosIncrementados.map((producto) => {
    producto.precio = +(producto.precio + incremento).toFixed(2);
  });

  //Imprimimos los datos. structuredClone no copia metodos.
  //Asi que tengo que hacer "imprimirObjeto()" un metodo de fuera de la clase
  let datos = `<p>Valores temporales:</p>${tablaDeObjetosEnArray(
    productosIncrementados
  )}`;

  output.innerHTML = datos;
}

//TODO Validar input correctamente
function verProductosCaros() {
  let cantidad = parseInt(prompt(`Introduzca la cantidad de corte.`));
  let caro = (element) => element.precio > cantidad;
  inventario.some(caro)
    ? (output.innerHTML = `<p>Existen productos mas caros de esa cantidad.</p>`)
    : (output.innerHTML = `<p>No existen productos tan caros</p>`);
  return caro;
}

function calcularValorStock() {
  let valorStock = 0;

  inventario.filter((e) => e.disponibilidad).map((e) => (valorStock += e.precio * e.stock));

  output.innerHTML = `Valor del stock: ${valorStock}€.`;
}

function filtrarPorCategoria() {
  let categoriaEscogida = pedirCategoria();

  let inventarioCategoria = inventario.filter(
    (producto) => producto.categoria === categoriaEscogida
  );


  output.innerHTML = tablaDeObjetosEnArray(inventarioCategoria);
}

function comprobarDisponibilidadCategoria() {
  let categoriaEscogida = pedirCategoria();

  let inventarioCategoria = inventario.filter(
    (producto) => producto.categoria === categoriaEscogida
  );

  inventarioCategoria.every((e) => e.disponibilidad)
    ? (output.innerHTML = `Todos los productos de esa categoria estan disponibles.`)
    : (output.innerHTML = `Existen productos fuera de stock.`);
}
//TODO validar datos correctamente
function aniadirProducto() {
  let nombre = prompt(`Introduzca el nombre del producto.`);
  let stock = parseInt(prompt(`Introduzca el stock del producto.`));
  let precio = parseFloat(prompt(`Introduzca el precio del producto.`));
  let categoria;
  switch (
  eleccion(
    1,
    3,
    `Escoja la categoria:
    1.-Electronica.
    2.-Ropa.
    3.-Hogar.`
  )
  ) {
    case 1:
      categoria = Categoria.Electronica;
      break;
    case 2:
      categoria = Categoria.Ropa;
      break;
    case 3:
      categoria = Categoria.Hogar;
      break;
    default:
      alert(`Error en switch`);
      break;
  }
  inventario.push(new Producto(nombre, stock, precio, categoria));
}

function eliminarProducto() {
  let nombreProducto = prompt(
    `Introduzca el nombre del producto que desea eliminar`
  );
  productoExistente = inventario.some(
    (producto) => producto.nombre === nombreProducto
  );

  if (!productoExistente) alert(`Producto no encontrado`);
  else {
    inventario = inventario.filter(
      (producto) => producto.nombre != nombreProducto
    );
    alert(`Producto eliminado!`);
  }
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
  let tabla = `<table>
  <thead>`;

  let objeto = array[0];
  for (let propt in objeto) {
    tabla += `<th>${propt}</th>`;
  }

  tabla += `</thead>
  <tbody>`;

  array.forEach((objeto) => {
    tabla += `<tr>${imprimirObjeto(objeto)}</tr>`;
  });

  tabla += `</tbody></table>`;

  return tabla;
}
function imprimirObjeto(objeto) {
  let datos = ``;
  for (let propt in objeto) {
    if (typeof objeto[propt] === "boolean") {
      datos += `<td>${objeto[propt] ? "Si" : "No"}</td>`;
    } else {
      datos += `<td>${objeto[propt]}</td>`;
    }
  }
  return datos;
}
