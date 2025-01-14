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

function filtrarFavoritos(){
  let minVisitas = pedirInt(`Introduzca el numero minimo de visitas.`)
  favoritosFiltrados = favoritos.filter((e)= e.visitas>minVisitas);
  favoritosFiltrados.forEach(element => {
    console.log(element);
  });
}

function obtenerMediaVisitas(){
  let cantidad = favoritos.length;
  let sumaTotal = favoritos.reduce((acumulador,valorActual)=>acumulador+valorActual.visitas,0);
  let media = sumaTotal/cantidad;
  console.log(`Media de visitas: ${media}`);
}

function obtenerUrlMasVisitada(){
  let visitasContador=0;
let urlMasVisitada = favoritos.map(favorito)=>{
  if(visitasContador<favorito.visitas){

  }
}
};



}

//Funcionalidades
function pedirInt(mensaje) {
  let num;
  do {
    num = parseInt(prompt(mensaje));
  } while (isNaN(num));
  return num;
}
