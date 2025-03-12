const botones = document.querySelectorAll("button");
const table = document.querySelector("table");

//Contador de ids
var counter = 1;
//Array para almacenar los trs
var trs = [];

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
  trs.push(tr);
  counter++;
  imprimirTabla();
}

//Para poder eliminar trs de forma dinamica, elimino todo el body y lo creo de nuevo con los trs
function imprimirTabla() {
  table.removeChild(table.querySelector("tbody"));
  let nuevoBody = document.createElement("tbody");
  trs.forEach((tr) => {
    nuevoBody.append(tr);
  });
  table.append(nuevoBody);
}

//Con la id a eliminar, saco el tr correspondiente y reimprimo la tabla
function eliminarFilaSeleccionada(id) {
  let trFiltrado = trs.filter((tr) => tr.getAttribute("id") != id);
  trs = trFiltrado;
  imprimirTabla();
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
 editarFila(fila);

}

function eliminarFila() {
  let fila = parseInt(prompt("Que fila desea eliminar?"));

    eliminarFilaSeleccionada(fila);

}
