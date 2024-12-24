const output = document.getElementById("output");

const urlRegex =
  /^(https?:\/\/)?([\w.-]+)\.([a-z]{2,6})(:[0-9]{1,5})?(\/[^\s]*)?$/i;


class Puntuacion {
  constructor(url, puntos) {
    this.url = url;
    this.puntos = puntos;
  }
}
function crearPuntuacion(url, puntos) {
  if (url.match(urlRegex) && puntos > 0 && puntos < 6)
    puntuaciones.push(new Puntuacion(url, puntos));
  else console.log("valores no validos");
}
const puntuaciones = [
  new Puntuacion("https://example.com", 85),
  new Puntuacion("http://miweb.org", 90),
  new Puntuacion("https://sitio.net/blog", 78),
];


function agregarPuntuacion() {
  let url = prompt(`Introduzca una url valida`);
  let puntos = parseInt(prompt(`Introduzca una puntuacion entre 0 y 5`));
  crearPuntuacion(url, puntos);
}

function calificarPaginaActual() {
  let puntos = pedirInt(`Introduzca una puntuacion entre 0 y 5`);
  puntuaciones.push(new Puntuacion(window.location.href, puntos));
}

function mostrarCalificacionesPorConsola() {
  puntuaciones.forEach((e) => console.log(e));

}

//Funcionalidades
function pedirInt(mensaje) {
  let num;
  do {
    num = parseInt(prompt(mensaje));
  } while (isNaN(num));
  return num;
}
