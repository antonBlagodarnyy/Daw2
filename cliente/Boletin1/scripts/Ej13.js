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
  let listado = ``;
  inventario.forEach((producto) => {
    listado += `<p>${imprimirObjeto(producto)}</p>`;
  });
  output.innerHTML = listado;
}

function verProductosDisponibles() {
  let productosDisponibles = inventario.filter(
    (producto) => producto.disponibilidad == true
  );

  let listado = ``;
  productosDisponibles.forEach((producto) => {
    listado += `<p>${imprimirObjeto(producto)}</p>`;

    output.innerHTML = listado;
  });
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
  let datos = `<p>Valores temporales: </p>`;
  productosIncrementados.forEach((producto) => {
    datos += ` <p>${imprimirObjeto(producto)} </p>`;
  });

  output.innerHTML = datos;
}

//TODO Validar input correctamente
function verProductosCaros() {
  let cantidad = parseInt(prompt(`Introduzca la cantidad de corte.`));
  let caro = (element) => element.precio > cantidad;
  inventario.some(caro)
    ? (output.innerHTML = `Existen productos mas caros de esa cantidad.`)
    : (output.innerHTML = `No existen productos tan caros`);
  return caro;
}

function calcularValorStock() {
  let valorStock = 0;

  inventario
    .filter((e) => e.disponibilidad)
    .map((e) => (valorStock += e.precio * e.stock));

  output.innerHTML = `Valor del stock: ${valorStock}€.`;
}

function filtrarPorCategoria() {
  let categoriaEscogida = pedirCategoria();

  let inventarioCategoria = inventario.filter(
    (producto) => producto.categoria === categoriaEscogida
  );

  let datos = ``;
  inventarioCategoria.forEach((producto) => {
    datos += ` <p>${imprimirObjeto(producto)} </p>`;
  });

  output.innerHTML = datos;
}

function comprobarDisponibilidadCategoria() {
  let categoriaEscogida = pedirCategoria();

  let inventarioCategoria = inventario.filter(
    (producto) => producto.categoria === categoriaEscogida
  );

  inventarioCategoria.every(e => e.disponibilidad)
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
function eleccion(numMinimo, numMaximo, mensaje) {
  let eleccion;
  do {
    eleccion = parseInt(prompt(mensaje));
  } while (isNaN(eleccion) || eleccion < numMinimo || eleccion > numMaximo);
  return eleccion;
}

//TODO imprimir objetos en una tabla
function imprimirObjeto(objeto) {
  let datos = ``;
  for (let propt in objeto) {
    datos += `${propt}: ${objeto[propt]} | `;
  }
  return datos;
}
