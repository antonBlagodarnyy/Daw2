const taskContainer = document.getElementById("task-list-container");
const addTaskButton = document.getElementById("add-task-btn");
const taskInput = document.getElementById("task-input");

var tareas;



localStorage.getItem("tareas")
  ? (tareas = JSON.parse(localStorage.getItem("tareas")))
  : (tareas = []);

console.log(tareas);

function crearTarea() {
  return {
    contenido: taskInput.value,
    checked: false,
  };
}

function pintarTarea(tarea) {
  const divPrincipal = document.createElement("div");

  divPrincipal.setAttribute(
    "class",
    "task d-flex justify-content-between align-items-center p-2 mb-2 border border-secondary rounded"
  );

  const span = document.createElement("span");
  span.setAttribute("class", "flex-grow-1");

  if (tarea.checked) span.style.textDecoration = "line-through";
  span.textContent = tarea.contenido;

  const divBotones = document.createElement("div");

  const completada = document.createElement("button");
  completada.addEventListener("click", () => {
    marcarTarea(tarea);
  });
  completada.textContent = "Completar";
  completada.setAttribute("class", "btn btn-info btn-sm complete-btn mx-1");

  const eliminar = document.createElement("button");
  eliminar.addEventListener("click", () => {
    eliminarTarea(tarea);
  });
  eliminar.textContent = "Eliminar";
  eliminar.setAttribute("class", "btn btn-danger btn-sm remove-btn mx-1");

  divBotones.append(completada, eliminar);
  divPrincipal.append(span, divBotones);
  taskContainer.append(divPrincipal);
}

function guardarTarea(tarea) {
  tareas.push(tarea);
  localStorage.setItem("tareas", JSON.stringify(tareas));
}

function eliminarTarea(tarea) {
  let tareasDom = document.getElementsByClassName("task");
  Array.from(tareasDom).forEach((e, i) => {
    if (i == tareas.indexOf(tarea)) e.remove();
  });

  tareas = tareas.filter((tareaFiltered) => tareaFiltered != tarea);

  localStorage.setItem("tareas", JSON.stringify(tareas));
}

function marcarTarea(tarea) {
  tarea.checked = !tarea.checked;
  let tareasDom = document.getElementsByClassName("task");
  Array.from(tareasDom).forEach((e, i) => {
    if (i == tareas.indexOf(tarea)) {
      tarea.checked
        ? (e.style.textDecoration = "line-through")
        : (e.style.textDecoration = "");
    }
  });
  localStorage.setItem("tareas",JSON.stringify(tareas))
}

addTaskButton.addEventListener("click", () => {
  let tarea = crearTarea();
  pintarTarea(tarea);
  guardarTarea(tarea);
});

for (const tarea of tareas) {
  pintarTarea(tarea);
}

