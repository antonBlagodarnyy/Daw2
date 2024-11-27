//Sort:
const personas = [
    { nombre: "Ana", edad: 25 },
    { nombre: "Luis", edad: 30 },
    { nombre: "Juan", edad: 20 }
  ];
  
  // Ordenar por edad (ascendente)
  personas.sort((a, b) => a.edad - b.edad);
  console.log("Por edad (ascendente):", personas);
  
  // Ordenar por nombre (alfabéticamente)
  personas.sort((a, b) => a.nombre.localeCompare(b.nombre));
  console.log("Por nombre (alfabético):", personas);

  ///////////////

const palabras = ["manzana", "naranja", "banana", "uva"];

// Ordenar alfabéticamente (por defecto)
palabras.sort();
console.log("Alfabético:", palabras); // ["banana", "manzana", "naranja", "uva"]

// Ordenar en orden inverso
palabras.sort((a, b) => b.localeCompare(a));
console.log("Inverso:", palabras); // ["uva", "naranja", "manzana", "banana"]

/////////////////

const numeros = [3, 1, 4, 1, 5, 9, 2, 6];

// Ordenar en orden ascendente
numeros.sort((a, b) => a - b);
console.log("Ascendente:", numeros); // [1, 1, 2, 3, 4, 5, 6, 9]

// Ordenar en orden descendente
numeros.sort((a, b) => b - a);
console.log("Descendente:", numeros); // [9, 6, 5, 4, 3, 2, 1, 1]

//RegEx
const texto = "   Esto tiene espacios al inicio y al final.   ";
const textoLimpio = texto.replace(/^\s+|\s+$/g, "");
console.log(textoLimpio); // "Esto tiene espacios al inicio y al final."

const texto = "Hola, ¿cómo estás?";
const palabras = texto.split(/\W+/); // Divide por caracteres no alfanuméricos
console.log(palabras); // ["Hola", "cómo", "estás"]

const texto = "Mi número de teléfono es 123-456-7890.";
const numeros = texto.match(/\d+/g); // Busca uno o más dígitos
console.log(numeros); // ["123", "456", "7890"]

const texto = "Hola Mundo. Bienvenido al Mundo de JavaScript.";
const nuevoTexto = texto.replace(/Mundo/g, "Universo");
console.log(nuevoTexto); // "Hola Universo. Bienvenido al Universo de JavaScript."

const texto = "El perro persiguió al gato y el gato se escondió.";
const palabra = /gato/g; // Busca todas las ocurrencias de "gato"

const coincidencias = texto.match(palabra);
console.log(coincidencias); // ["gato", "gato"]
