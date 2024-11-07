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
    this.stock > 0
      ? (this.disponibilidad = true)
      : (this.disponibilidad = false);
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
/**Le pide al usuario que escoja una categoria usando la constante y una funcionalidad
 *
 * @returns {String} categoriaEscogida
 */
function pedirCategoria() {
  //Declaro la categoria que va a devolver
  let categoriaEscogida;

  //Switch que llama a un metodo y que utiliza el valor que ese metodo devuelve
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
/**Pasa el inventario de productos por una funcionalidad
 * y le atribuye el resultado al objeto del DOM "output".
 */
function verListadoDeProductos() {
  output.innerHTML = tablaDeObjetosEnArray(inventario);
}

/**Filtro el inventario segun un atributo y los imprimo
 */
function verProductosDisponibles() {
  //Saco el array filtrado donde disponibilidad sea true
  let productosDisponibles = inventario.filter(
    (producto) => producto.disponibilidad == true
  );

  //Saco la tabla de ese array
  let listado = tablaDeObjetosEnArray(productosDisponibles);

  //Lo imprimo por pantalla
  output.innerHTML = listado;
}

/**Saca un clon del array filtrado por categoria y con .map() incrementa los precios de todos sus objetos
 *
 */
function incrementarPreciosEnUnaCategoria() {
  //Pido el precio
  let incremento = parseInt(
    prompt(`Introduzca la cantidad que desea sumarle al precio.`)
  );
  //Pido la categoria
  categoriaEscogida = pedirCategoria();

  //Como el ejercicio pide que se hagan los cambios en un array distinto,
  //saco los datos en un array aparte con structuredClone y los muestro como datos temporales.
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

/**Imprime un mensaje en funcion de un booleano devuelto por some()
 *
 */
function verProductosCaros() {
  //TODO Validar input correctamente

  //Pedimos la cantidad a incrementar
  let cantidad = parseInt(prompt(`Introduzca la cantidad de corte.`));

  //Sacamos una funcion que aplica a cada elemento un boolean
  let caro = (element) => element.precio > cantidad;

  //Vemos con some si algun elemento de inventario devuelve true con con la funcion "caro"
  //E imprimimos el mensaje correspondiente
  inventario.some(caro)
    ? (output.innerHTML = `<p>Existen productos mas caros de esa cantidad.</p>`)
    : (output.innerHTML = `<p>No existen productos tan caros</p>`);
  return caro;
}

/**Sumamos el valor del stock de todos los productos
 *
 */
function calcularValorStock() {
  let valorStock = 0;

<<<<<<< HEAD
  inventario.filter((e) => e.disponibilidad).map((e) => (valorStock += e.precio * e.stock));
=======
  //Primero filtramos el inventario segun los productos disponibles
  inventario
    .filter((e) => e.disponibilidad)
    //Por cada elemento del array filtrado, sumamos el precio multiplicado por el stock
    .map((e) => (valorStock += e.precio * e.stock));
>>>>>>> 487b81c336d072606ef744e3f3418afb6e5eeeee

  //Lo imprimimos
  output.innerHTML = `Valor del stock: ${valorStock}€.`;
}

/**Filtramos el array por categoria y lo imprimimos
 *
 */
function filtrarPorCategoria() {
  //Pedimos la categoria
  let categoriaEscogida = pedirCategoria();

  //Filtramos el array
  let inventarioCategoria = inventario.filter(
    (producto) => producto.categoria === categoriaEscogida
  );

  //Sacamos la tabla y la imprimimos
  output.innerHTML = tablaDeObjetosEnArray(inventarioCategoria);
}

/**Filtramos el array por categoria y despues comprobamos que todos sus productos esten disponibles
 *
 */
function comprobarDisponibilidadCategoria() {
  //Pedimos la categoria
  let categoriaEscogida = pedirCategoria();

  //Filtramos el array
  let inventarioCategoria = inventario.filter(
    (producto) => producto.categoria === categoriaEscogida
  );

  //En funcion de si todas las disponibilidades del array son true, imprimimos el mensaje
  inventarioCategoria.every((e) => e.disponibilidad)
    ? (output.innerHTML = `Todos los productos de esa categoria estan disponibles.`)
    : (output.innerHTML = `Existen productos fuera de stock.`);
}

/**Pedimos los datos de un nuevo producto y lo aniadimos al array
 *
 */
function aniadirProducto() {
  //TODO validar datos correctamente
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

/**Pedimos al usuario el nombre de un producto y si se encuentra en el inventario lo eliminamos
 *
 */
function eliminarProducto() {
  //Pedimos el nombre
  let nombreProducto = prompt(
    `Introduzca el nombre del producto que desea eliminar`
  );

  //Sacamos una funcion que comprueba que haya un elemento con el nombreProducto
  productoExistente = inventario.some(
    (producto) => producto.nombre === nombreProducto
  );

  //Si no se encuentra informar al user
  if (!productoExistente) alert(`Producto no encontrado`);
  //Si se encuentra, filtrar el inventario por los nombres que no sean iguales a nombreProducto
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
    //Si es un boolean
    if (typeof objeto[propt] === "boolean") {
      //Concateno "si" o "no", dependiendo del valor del boolean
      datos += `<td>${objeto[propt] ? "Si" : "No"}</td>`;
      //En caso contrario concateno el valor de la propiedad directamente
    } else {
      datos += `<td>${objeto[propt]}</td>`;
    }
  }
  //Devuelvo los <td>s
  return datos;
}
