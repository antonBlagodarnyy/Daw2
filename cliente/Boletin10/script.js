//Ej4
function getRandomColor() {
  return `#${Math.floor(Math.random() * 16777215).toString(16)}`;
}

const contenedorBotones = document.getElementById("contenedor-botones");

const botones = contenedorBotones.querySelectorAll("button");

for (const button of botones) {
  button.addEventListener("click", (e) => {
    e.target.style.backgroundColor = getRandomColor();
  });
}

//Ej5
document.getElementById("campo-texto").addEventListener("keydown", (e) => {
  document.getElementById("info-tecla").textContent = `${e.key}`;
});

//Ej6
const contenedorListas = document.getElementById("listas");
const listas = contenedorListas.querySelectorAll("ul");
for (const lista of listas) {
  lista.addEventListener("click", (e) => {
    document.getElementById("resultado-lista").textContent = `
      Lista: ${e.currentTarget.getAttribute("id")} Elemento: ${
      e.target.textContent
    }`;
  });
}

//Ej7
function contador(p) {
  let span;
  if (p.querySelector("span") == null) {
    span = document.createElement("span");
    p.prepend(span);
  } else span = p.querySelector("span");
  let contador = p.getAttribute("data-contador");
  contador++;
  p.setAttribute("data-contador", contador);
  span.textContent = `Contador: ${p.getAttribute("data-contador")} `;
}

const contenedorTextos = document.getElementById("textos");
const ps = contenedorTextos.querySelectorAll("p");

for (const p of ps) {
  p.addEventListener("click", (e) => {
    contador(p);
  });
}

//Ej8
const contenedorMouse = document.getElementById("area-mouse");

contenedorMouse.addEventListener("mousemove", (e) => {
  document.getElementById(
    "posicion-mouse"
  ).textContent = `X: ${e.clientX}, Y: ${e.clientY}`;
});

//Ej9
const listaDinamica = document.getElementById("lista-dinamica");

const campoTexto = document.createElement("input");
campoTexto.setAttribute("id", "campo-texto");
listaDinamica.parentElement.append(campoTexto);

campoTexto.addEventListener("keydown", (e) => {
  if (e.key == "Enter") {
    let li = document.createElement("li");
    li.textContent = campoTexto.value;
    listaDinamica.appendChild(li);
  }
});

//Ej10
const listaResaltable = document.getElementById("lista-resaltable");

for (const li of listaResaltable.querySelectorAll("li")) {
  li.addEventListener("mouseenter", (e) => {
    e.target.style.backgroundColor = "lightblue";
  });
  li.addEventListener("mouseout", (e) => {
    e.target.style.backgroundColor = "lightgrey";
  });
}

//Ej11
const listaEliminable = document.getElementById("lista-eliminable");
listaEliminable.addEventListener("dblclick", (e) => {
  listaEliminable.removeChild(e.target);
});

//Ej12
const listaDrag = document.getElementById("lista-drag");

//dragConNextElementSibling();
dragConMousePosition();

function dragConNextElementSibling() {
  listaDrag.addEventListener("dragstart", (e) => {
    e.target.setAttribute("id", "dragging");
  });

  listaDrag.addEventListener("dragover", (e) => {
    e.preventDefault();
  });

  listaDrag.addEventListener("drop", (e) => {
    let insertable = document.getElementById("dragging");

    if (e.target.nodeName == "LI") {
      let position;
      e.target.nextElementSibling == undefined
        ? (position = "afterend")
        : (position = "beforebegin");

      e.target.insertAdjacentElement(position, insertable);
    }
    insertable.removeAttribute("id");
  });
}

function dragConMousePosition() {
  listaDrag.addEventListener("dragstart", (e) => {
    e.target.setAttribute("id", "dragging");
  });

  listaDrag.addEventListener("dragover", (e) => {
    e.preventDefault();
  });

  listaDrag.addEventListener("drop", (e) => {
    let insertable = document.getElementById("dragging");

    if (e.target.nodeName == "LI") {
      let position;
      e.clientY > getCenterY(e.target.getBoundingClientRect())
        ? (position = "afterend")
        : (position = "beforebegin");

      e.target.insertAdjacentElement(position, insertable);
    }
    insertable.removeAttribute("id");
  });
}
function getCenterY(coords) {
  let centerY = coords.y + (coords.bottom - coords.y) / 2;
  return centerY;
}

//Ej13
document.addEventListener("keydown", (e) => {
  let color;
  if (e.target.tagName != "INPUT") {
    switch (e.key) {
      case "r":
        color = "red";
        break;
      case "g":
        color = "green";
        break;
      case "b":
        color = "blue";
        break;
      default:
        break;
    }
    document.body.style.backgroundColor = color;
  }
});
