window.onload = code;

function code() {
  let titulo = localStorage.getItem("musica");
  let fila = localStorage.getItem("fila");
  let columna = localStorage.getItem("columna");

    

  let p = document.createElement("p");
  if(titulo && fila && columna){
    p.textContent =
    "El usuario se ha decantado por escuchar " +
    titulo +
    ". En cuanto a la ubicacion de la pantalla, ha pulsado en la fila: " +
    fila +
    ", columna: " +
    columna;
  } else {
    p.textContent = "No existen datos de navegacion";
  }
 

  document.getElementById("position").append(p);
}
