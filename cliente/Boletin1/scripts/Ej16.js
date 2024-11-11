const output = document.getElementById("output");

//Expresion regular que encuantra todas las palabras
const palabrasReg = /[a-zA-Z]+/g;

const frases = [
  "Esta es la primera.",
  "La segunda frase también está aquí.",
  "A veces, las cosas no son lo que parecen.",
  "El sol brilla después de la tormenta.",
  "Cada día es una nueva oportunidad para aprender.",
  "La práctica constante lleva a la mejora.",
  "JavaScript es un lenguaje versátil y poderoso.",
  "La perseverancia es clave para alcanzar el éxito.",
  "El tiempo es el recurso más valioso.",
  "Un pequeño paso puede iniciar un gran cambio.",
];

function verFrases() {
  let datos = ``;
  frases.forEach((element) => {
    datos += `<p>${element}</p><br>`;
  });
  output.innerHTML = datos;
}

function contarPalabras() {
  let conteo = 0;

  //Recorremos todas las frases
  frases.forEach((element) => {
    conteo += element.match(palabrasReg).length;
  });

  output.innerHTML = `<p>${conteo}</p>`;
}

function conteoDePalabras() {
  let palabras = [];
  //Recorremos las frases
  frases.forEach((frase) => {
    //Recorremos las palabras
    frase.match(palabrasReg).forEach((palabra) => {
      //Metemos la palabra en un array
      palabras.push(palabra);
    });
  });

  //Declaro el objeto
  let conteoDePalabras = new Map();

  //Recorro todas las palabras
  palabras.map((palabra) => {
    //Por cada palabra declaro un set con la palabra y el resultado de reducirla en el array palabras
    conteoDePalabras.set(
      palabra,
      palabras.reduce((acumulador, valorActual) => {
        //Si hay match devuelvo el acumulador incrementado
        if (valorActual == palabra) return acumulador + 1;
        //En caso contrario, lo devuelvo tal cual
        else return acumulador;
      }, 0)
    );
  });

  console.log(conteoDePalabras);
}

function listarFrasesLargas(){
    let frasesLargas = [];

    //Recorremos todas las frases
    frases.forEach((element) => {
        //Si superan la longitud de 5 les hacemos push
        if(element.match(palabrasReg).length>5)
            frasesLargas.push(element);
    });

    //Las imprimimos
    let datos = ``;
    frasesLargas.forEach((element) => {
    datos += `<p>${element}</p><br>`;
  });
  output.innerHTML = datos;
}