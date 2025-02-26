const ul = document.querySelector("ul");

function addTask() {
  let li = document.createElement("li");
  li.append(document.querySelector("input").value);
  li.addEventListener("click", (event) => {
    if (confirm(`¿Esta seguro que desea completar la tarea?`))
      event.target.classList.toggle("completed");
  });
  ul.append(li);
}

function clearCompletedTasks() {
  let lis = document.querySelectorAll("li");
  for (const li of lis) {
    if (li.className == "completed") ul.removeChild(li);
  }
}


function deleteTask() {
  let lis = document.querySelectorAll("li");
  const inputs = document.querySelectorAll("input");
  const input = inputs[1];

  if (input.value !== "") {
    if (input.value > lis.length || input.value == 0)
      alert("No existe esa tarea");
    else {
      ul.removeChild(lis[input.value - 1]);
    }
  }
}
