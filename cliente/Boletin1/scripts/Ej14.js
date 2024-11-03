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
    false
  )
);

//Metodos secundarios
function pedirCategoria() {
  let categoriaEscogida;
  switch (
    eleccion(
      1,
      3,
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
function verLibros() {
  imprimirArray(biblioteca);
}

function verLibrosDisponibles() {
  let librosDisponibles = structuredClone(
    biblioteca.filter((libro) => libro.disponible)
  );
  imprimirArray(librosDisponibles);
}

function verTitulosPorCategoria() {
  const categoriaEscogida = pedirCategoria();
  const libros = biblioteca.filter(
    (libro) => libro.categoria == categoriaEscogida
  );

  let datos = ``;

  libros.forEach((libro) => {
    datos += `<p>${libro.titulo}</p>`;
  });

  output.innerHTML = datos;
}

function contarLibrosPrestadors() {
  const librosPrestados = biblioteca.filter((libro) => !libro.disponible);

  output.innerHTML = librosPrestados.length;
}

function verLibrosPublicadosDespuesDeAnio() {
  //TODO validar anio correctamente
  const anio = parseInt(prompt(`Introduzca el anio de corte.`));
  const librosFiltrados = biblioteca.filter((libro) => libro.anio > anio);

  let datos = ``;

  librosFiltrados.forEach((libro) => {
    datos += `<p>Libro: ${libro.titulo} | Autor: ${libro.autor}</p>`;
  });

  output.innerHTML = datos;
}

function verificarDisponibilidadSegunAutor() {
  //TODO validar autor correctamente
  const autor = prompt(`Introduzca el autor a verificar.`);

  let librosDeAutor = biblioteca.filter((libro) => libro.autor === autor);

  librosDeAutor.every((libro) => libro.disponible)
    ? (output.innerHTML = `Todos los libros de ese autor estan disponibles.`)
    : (output.innerHTML = `Existen libros de ese autor no disponibles.`);
}

function listarAutoresUnicos() {
  const autores = biblioteca.map((libros) => libros.autor);
  const autoresUnicos = new Set(autores);

  let datos = ``;

  autoresUnicos.forEach((autor) => {
    datos += `<p>${autor}</p>`;
  });

  output.innerHTML = datos;
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
function imprimirArray(arr) {
  let datos = ``;
  arr.forEach((libro) => {
    datos += `<p>${imprimirObjeto(libro)}</p>`;
  });
  output.innerHTML = datos;
}
