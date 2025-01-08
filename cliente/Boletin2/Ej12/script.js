const favoritos = [];
const ventanasAbiertas = [];

const urlRegex =
  /^(https?:\/\/)?([\w.-]+)\.([a-z]{2,6})(:[0-9]{1,5})?(\/[^\s]*)?$/i;

function urlValida(url) {
  return url.match(urlRegex);
}

function agregarFavorito() {
  let url = prompt(`Introduzca una url.`);
  if (urlValida(url)) favoritos.push({ Url: url, visitas: 0 });
  else alert(" Url no valida");
}

function abrirFavorito() {
  let indice = prompt(`Introduzca el indice del favorito que desea abrir`);

  if (favoritos[indice] != undefined) {
    abrirVentana(favoritos[indice]);
  } else alert(`No se encuentra un favorito con ese indice.`);
}
function abrirVentana(ventana) {
  let nuevaVentana = window.open(ventana.Url, "_blank", "width=800,height=600");
  ventanasAbiertas.push({ ventanaAbierta: nuevaVentana });
}
function cerrarVentanasAbiertas() {
  for (let i = ventanasAbiertas.length - 1; i >= 0; i--) {
    ventanasAbiertas[i].ventanaAbierta.window.close();
    ventanasAbiertas.splice(i, 1); // Remove the element
  }
}

function verFavoritos() {
  favoritos.forEach((e) => console.log(e));
}

function eliminarFavoritoIndice() {
  let indice = pedirInt(`Introduzca el indice del favorito a eliminar.`);

  if (favoritos[indice] != undefined) favoritos.splice(indice, 1);
  else alert(`Indice no encontrado`);
}

function eliminarFavoritoTexto() {
  let nombre = prompt(`Introduzca el nombre del favorito`);

  if (favoritos.some((e) => e.Url == nombre))
    favoritos = favoritos.filter((e) => e.Url != nombre);
  else alert(`No se encuentra un favorito con ese nombre.`);
}

//Funcionalidades
function pedirInt(mensaje) {
  let num;
  do {
    num = parseInt(prompt(mensaje));
  } while (isNaN(num));
  return num;
}
