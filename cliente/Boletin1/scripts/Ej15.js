const output = document.getElementById("output");

function contarLongitud() {
  const texto = document.getElementById("comentario").value;
  output.innerHTML = `<p>Ese comentario mide: ${texto.length} caracteres.</p>`;
}

function buscarPalabraClave() {
  const texto = document.getElementById("comentario").value;

  let palabra = prompt(`Introduzca la palabra que desea buscar`);

  //Sacamos la expresion regular
  const regex = new RegExp(`${palabra}\\s|$`);
  //La buscamos en el texto
  const resultado = regex.exec(texto);

  //Imprimimos el resultado en funcion de si el resultado es nulo o no.
  output.innerHTML = `<p>La palabra ${palabra} ${
    resultado != null ? "si" : "no"
  } se encuentra en el texto.</p>`;
}

function cortarComentario(){
    const texto = document.getElementById("comentario").value;
     
    //TODO: Validar datos correctamente
    let comienzo = parseInt(prompt(`¿A partir de que caracter quiere cortar?`))
    let cantidad = parseInt(prompt(`¿Cuantos caracteres desea cortar?`));

    output.innerHTML = `<p>${texto.slice(comienzo,comienzo+=cantidad)}</p>`;
}

function corregirComentario(){
  alert('Bajo desarrollo!');

}

function contarPalabras(){
  const texto = document.getElementById("comentario").value;
  const regex = /[a-zA-Z]+/g;
  const resultado = texto.match(regex);

  output.innerHTML = `<p>${resultado.length}</p>`
}