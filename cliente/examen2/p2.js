const botones = document.querySelectorAll("button");
const table = document.querySelector("table");

//Contador de ids
var counter = 1;

//Añadimos las funciones
botones[0].addEventListener("click", crearFila);
botones[1].addEventListener("click", modificarFila);
botones[2].addEventListener("click", eliminarFila);

function crearFila() {
  //Creamos un tr y le añadimos un tr para podes seleccionarlo despues
  let tr = document.createElement("tr");
  tr.setAttribute("id", counter);

  //Creamos las celdas que llevara la tabla
  let id = document.createElement("td");
  id.textContent = counter;

  let nombre = document.createElement("td");
  nombre.textContent = prompt(
    "Introduzca el nuevo nombre:",
    `Elemento ${counter}`
  );

  let botones = document.createElement("td");
  let editar = document.createElement("button");
  editar.textContent = "Editar";
  editar.addEventListener("click", () => {
    editarFila(tr.getAttribute("id"));
  });

  let eliminar = document.createElement("button");
  eliminar.textContent = "Eliminar";
  eliminar.addEventListener("click", () => {
    if (confirm("Esta seguro que desea eliminar la fila?"))
      eliminarFilaSeleccionada(tr.getAttribute("id"));
  });

  //Metemos todo dentro del tr, metemos el tr en el array e imprimimos la tabla
  botones.append(editar);
  botones.append(eliminar);
  tr.append(id);
  tr.append(nombre);
  tr.append(botones);
  table.querySelector("tbody").append(tr);
  counter++;
}

//Con la id a eliminar, saco el tr correspondiente
function eliminarFilaSeleccionada(id) {
  let trs = document.querySelectorAll("tr");
  for (const tr of trs) {
    if (tr.getAttribute("id") == id) tr.remove();
  }
}

//Con la id, pillo el tr y lo modifico
function editarFila(id) {
  let trsPillados = document.querySelectorAll("tr");
  for (const tr of trsPillados) {
    if (tr.getAttribute("id") == id) {
      let tds = tr.querySelectorAll("td");
      tds[1].textContent = prompt(
        "Introduzca el nuevo nombre",
        tds[1].textContent
      );
    }
  }
}

//Hago uso de los metodos creados para los botones
function modificarFila() {
  let fila = parseInt(prompt("Que fila desea modificar?"));
  let trs = document.querySelectorAll("tr");
  if (fila < trs.length && fila >= 0) {
    tds = trs[fila ].querySelectorAll("td");
    console.log(tds);
    tds[1].textContent = prompt(
      "Introduzca el nuevo nombre",
      tds[1].textContent
    );
  } else alert("Esa fila no existe");
}

function eliminarFila() {
  let fila = parseInt(prompt("Que fila desea eliminar?"));
  let trs = document.querySelectorAll("tr");
  if (fila < trs.length && fila >= 0) trs[fila].remove();
  else alert("Esa fila no existe");
}
