const output = document.getElementById("output");
var biblioteca = [];

class Libro {
  constructor(titulo, autor, anio, categoria, disponible) {
    this.titulo = titulo;
    this.autor = autor;
    this.anio = anio;
    this.categoria = categoria;
    this.disponible = disponible;
  }
}
const Categoria = {
  Ficcion: "Ficcion",
  NoFiccion: "No ficcion",
  Historia: "Historia",
  Ciencia: "Ciencia",
};

// Datos mock
biblioteca.push(
  new Libro(
    "Cien Años de Soledad",
    "Gabriel García Márquez",
    1967,
    Categoria.Ficcion,
    true
  ),
  new Libro(
    "Sapiens: De animales a dioses",
    "Yuval Noah Harari",
    2011,
    Categoria.Historia,
    false
  ),
  new Libro(
    "El Origen de las Especies",
    "Charles Darwin",
    1859,
    Categoria.Ciencia,
    true
  ),
  new Libro("1984", "George Orwell", 1949, Categoria.Ficcion, true),
  new Libro(
    "Breve historia del tiempo",
    "Stephen Hawking",
    1988,
    Categoria.Ciencia,
    false
  ),
  new Libro(
    "Breve historia del tiempo",
    "Stephen Hawking",
    1988,
    Categoria.Ciencia,
    true
  )
);

//Metodos secundarios
/**Le pide al usuario que escoja una categoria usando la constante y una funcionalidad
 *
 * @returns {String} categoriaEscogida
 */
function pedirCategoria() {
  let categoriaEscogida;
  switch (
    eleccion(
      1,
      4,
      `Escoja la categoria:
      1.-Ficcion.
      2.-No ficcion.
      3.-Historia.
      4.-Ciencia.`
    )
  ) {
    case 1:
      categoriaEscogida = Categoria.Ficcion;
      break;
    case 2:
      categoriaEscogida = Categoria.NoFiccion;
      break;
    case 3:
      categoriaEscogida = Categoria.Historia;
      break;
    case 4:
      categoriaEscogida = Categoria.Ciencia;
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
function verLibros() {
  output.innerHTML = tablaDeObjetosEnArray(biblioteca);
}

/**Filtro el inventario segun un atributo y los imprimo
 */
function verLibrosDisponibles() {
  //Filtro el array segun los productos disponibles
  let librosDisponibles = biblioteca.filter((libro) => libro.disponible);

  //Saco la tabla y la imprimo
  output.innerHTML = tablaDeObjetosEnArray(librosDisponibles);
}

/**Pido una categoria, filtro la biblioteca segun esta e imprimo el array resultante */
function verTitulosPorCategoria() {
  //Pido la categoria
  const categoriaEscogida = pedirCategoria();
  //La filtro
  const libros = biblioteca.filter(
    (libro) => libro.categoria == categoriaEscogida
  );
  //Saco la tabla y la imprimo
  output.innerHTML = tablaDeObjetosEnArray(libros);
}

/**Cuenta los libros que no se encuentran disponibles */
function contarLibrosPrestadors() {
  //Filtro el array
  const librosPrestados = biblioteca.filter((libro) => !libro.disponible);
  //Imprimo su longitud junto a un mensaje
  output.innerHTML = `<p>Libros prestados: ${librosPrestados.length}</p>`;
}

/**Filtro los libros segun un anio de corte */
function verLibrosPublicadosDespuesDeAnio() {
  //TODO validar anio correctamente

  //Pido el año de corte
  const anio = parseInt(prompt(`Introduzca el anio de corte.`));
  //Los filtro
  const librosFiltrados = biblioteca.filter((libro) => libro.anio > anio);
  //Saco la tabla y la imprimo
  output.innerHTML = tablaDeObjetosEnArray(librosFiltrados);
}

/**Verifico que todos los libros de un autor se encuentran disponibles */
function verificarDisponibilidadSegunAutor() {
  //Pido el autor
  const autor = prompt(`Introduzca el autor a verificar.`);

  //Filtramos el array segun ese autor
  let librosDeAutor = biblioteca.filter((libro) => libro.autor === autor);

  //Si se encuentran libros
  if (librosDeAutor.length !== 0) {
    //Si todos los libros estan disponibles imprimimos un mensaje u otro
    librosDeAutor.every((libro) => libro.disponible)
      ? (output.innerHTML = `<p>Todos los libros de ese autor estan disponibles.</p>`)
      : (output.innerHTML = `<p>Existen libros de ese autor no disponibles.</p>`);

    //Si no se encuentra el autor:
  } else {
    output.innerHTML = `<p>Ese autor no existe en nuesta base de datos.</p>`;
  }
}

/** Calcular el promedio de antiguedad de los libros*/
function calcularAntiguedadPromedia() {
  const anioActual = 2024;
  //Sacamos en un array los años de los libros
  let anios = Array.from(biblioteca, (element) => element.anio);
  //Sacamos la suma de todos los anios
  let suma = anios.reduce(
    (acumulador, valorActual) => acumulador + valorActual
  );

  //Calculamos el promedio
  let promedio = suma / anios.length;
  //Con el + lo casteamos devuelta a int y con el toFixed() le quitamos los decimales
  let antiguedad = +(anioActual - promedio).toFixed();

  //Imprimimos
  output.innerHTML = `<p>Antigüedad promedio de los libros: ${antiguedad} años.</p>`;
}

/**Listar autores unicos*/
function listarAutoresUnicos() {
  //Sacamos los libros en un array distinto
  const autores = Array.from(biblioteca, (elemento) => elemento.autor);

  //Funcion "filtro". Devuelve un booleano en funcion de si
  //el primer indice del elemento en el array es igual al ultimo
  let esUnico = (valor, indice, array) => {
    return array.indexOf(valor) === array.lastIndexOf(valor);
  };

  //Filtramos el array
  const autoresUnicos = autores.filter(esUnico);

  //Lo imprimimos
  let datos = ``;

  autoresUnicos.forEach((libro) => {
    datos += `<p>${libro}</p>`;
  });

  output.innerHTML = datos;
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
