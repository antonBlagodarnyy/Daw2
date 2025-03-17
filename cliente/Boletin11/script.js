function inicializarDatos() {
  let paradas = [];
  if (localStorage.getItem("paradas"))
    paradas = JSON.parse(localStorage.getItem("paradas"));

  let cAlojamiento = 0;
  if (localStorage.getItem("cAlojamiento"))
    cAlojamiento = parseInt(localStorage.getItem("cAlojamiento"));

  let cAlimentacion = 0;
  if (localStorage.getItem("cAlimentacion"))
    cAlimentacion = parseInt(localStorage.getItem("cAlimentacion"));

  return {
    paradas,
    cAlojamiento,
    cAlimentacion,
  };
}
function crearContenedorMayor() {
  let contenedorMayor = document.createElement("div");
  contenedorMayor.setAttribute("id", "contenedorMayor");
  document.querySelector("body").append(contenedorMayor);
  return contenedorMayor;
}
function crearViajes() {
  let viajes = document.createElement("div");
  viajes.setAttribute("id", "viajes");
  contenedorMayor.append(viajes);
  return viajes;
}
function crearItinerario() {
  let itinerario = document.createElement("div");
  itinerario.setAttribute("id", "itinerario");

  let infoItinerario = crearInfoItinerario();

  itinerario.append(infoItinerario);

  let ul = document.createElement("ul");
  ul.setAttribute("id", "listaItinerario");
  itinerario.append(ul);

  contenedorMayor.append(itinerario);
  return itinerario;
}
function crearInfoItinerario() {
  let infoItinerario = document.createElement("div");
  infoItinerario.setAttribute("class", "info");

  let titulo = document.createElement("h1");
  titulo.textContent = "Itinerario";
  infoItinerario.append(titulo);

  let info = document.createElement("div");

  let dias = document.createElement("p");
  dias.textContent = "Dias: ";
  let outputDias = document.createElement("span");
  outputDias.setAttribute("id", "oDias");
  outputDias.textContent = paradas.length / 2;
  dias.append(outputDias);

  info.append(dias);

  let alojamientoInfo = document.createElement("p");
  alojamientoInfo.textContent = "Coste alojamiento: ";
  let outputAlojamiento = document.createElement("span");
  outputAlojamiento.setAttribute("id", "cAlojamiento");
  outputAlojamiento.textContent = cAlojamiento;
  alojamientoInfo.append(outputAlojamiento);

  info.append(alojamientoInfo);

  let alimentacionInfo = document.createElement("p");
  alimentacionInfo.textContent = "Coste alimentacion: ";
  let outputAlimentacion = document.createElement("span");
  outputAlimentacion.setAttribute("id", "cAlimentacion");
  outputAlimentacion.textContent = cAlimentacion;
  alimentacionInfo.append(outputAlimentacion);

  info.append(alimentacionInfo);

  infoItinerario.append(info);
  return infoItinerario;
}
function pintarProvincias() {
  provincias.forEach((provincia) => {
    const contenedor = document.createElement("div");
    contenedor.setAttribute("class", "contenedor");

    const header = document.createElement("h1");
    header.textContent = provincia.nombre;
    contenedor.append(header);

    const img = document.createElement("img");
    img.setAttribute("src", "./imagenes/" + provincia.imagen);
    img.style.width = "30vh";
    contenedor.append(img);

    const info = document.createElement("div");
    info.setAttribute("class", "info");

    const alojamiento = document.createElement("span");
    alojamiento.textContent =
      "Coste alojamiento: " + provincia.coste_alojamiento;
    info.append(alojamiento);

    const alimentacion = document.createElement("span");
    alimentacion.textContent =
      "Coste alimentacion: " + provincia.coste_alojamiento;
    info.append(alimentacion);

    contenedor.append(info);

    const aniadir = document.createElement("button");
    aniadir.textContent = "Añadir a la ruta";
    aniadir.addEventListener("click", () => {
      cAlojamiento += provincia.coste_alojamiento;
      cAlimentacion += provincia.coste_alimentacion;
      paradas.push(provincia);
      aniadirParada(provincia);
    });
    contenedor.append(aniadir);

    viajes.append(contenedor);
  });
}
function aniadirParada(provincia) {
  let ul = document.getElementById("listaItinerario");
  let lis = ul.querySelectorAll("li");
  let exist = false;
  for (const li of lis) {
    if (li.getAttribute("id") == provincia.id) {
      exist = true;
      break;
    }
  }
  if (exist) {
    let li = document.getElementById(provincia.id);
    let span = li.querySelector("span");
    let counter = +span.textContent;
    counter++;
    span.textContent = counter;
  } else {
    let li = document.createElement("li");
    li.setAttribute("id", provincia.id);

    let span = document.createElement("span");
    span.textContent = "1";
    li.textContent = provincia.nombre + " x";
    li.append(span);

    li.append(document.createElement("br"));

    let eliminar = document.createElement("button");
    eliminar.textContent = "Eliminar del itinerario";
    eliminar.addEventListener("click", () => {
      paradas.splice(paradas.indexOf(provincia), 1);

      if (span.textContent == "1") li.remove();
      else span.textContent = +span.textContent - 1;

      cAlojamiento -= provincia.coste_alojamiento;
      cAlimentacion -= provincia.coste_alimentacion;

      document.getElementById("cAlojamiento").textContent = cAlojamiento;
      document.getElementById("cAlimentacion").textContent = cAlimentacion;

      document.getElementById("oDias").textContent = paradas.length / 2;

      localStorage.setItem("paradas", JSON.stringify(paradas));
      localStorage.setItem("cAlojamiento", cAlojamiento);
      localStorage.setItem("cAlimentacion", cAlimentacion);
    });
    li.append(eliminar);

    ul.append(li);
  }

  document.getElementById("cAlojamiento").textContent = cAlojamiento;
  document.getElementById("cAlimentacion").textContent = cAlimentacion;

  localStorage.setItem("paradas", JSON.stringify(paradas));
  localStorage.setItem("cAlojamiento", cAlojamiento);
  localStorage.setItem("cAlimentacion", cAlimentacion);

  document.getElementById("oDias").textContent = paradas.length / 2;
}

//localStorage.clear();

//Recojo los datos que voy a utilizar
const datos = inicializarDatos();
var paradas = datos.paradas;
var cAlojamiento = datos.cAlojamiento;
var cAlimentacion = datos.cAlimentacion;

//Renderizo los contenedores de la informacion
const contenedorMayor = crearContenedorMayor();
const viajes = crearViajes();
const itinerario = crearItinerario();

//Añado la informacion de las provinvias, 
//asi como los botones para añadir al itinerario y eliminarlo
pintarProvincias();

//Inicializamos las paradas ya creadas
paradas.forEach((parada) => {
  aniadirParada(parada);
});


