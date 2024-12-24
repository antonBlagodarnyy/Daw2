const output = document.getElementById("output");
const urlRegex =
  /^(https?:\/\/)?([\w.-]+)\.([a-z]{2,6})(:[0-9]{1,5})?(\/[^\s]*)?$/i;

const historial = [];

function agregarUrlActual() {
  historial.push(window.location.href);
}

function agregarUrlGoogle() {
  historial.push("https://www.google.com/");
}

function pedirUrlYAgregar() {
  let url;
  do {
    url = prompt("Introduzca una url valida");
  } while (!url.match(urlRegex) || url == null);
  historial.push(url);
}

function mostrarHistorial() {
  let answer = "";
  historial.forEach((element) => {
    answer += `${element} \n`;
  });
  alert(answer);
}

function irALaUltimaUrlDelHistorial(){
window.location.assign(historial[historial.length-1]);

}

