const formularios = document.querySelectorAll("form");
formularios[0].addEventListener("submit", escogerTema);
formularios[1].addEventListener("submit", login);

function checkPassword(password) {
  return password == localStorage.getItem("password");
}


//Inicializamos la contrasenia
localStorage.setItem("password","12345");

function escogerTema() {
  let nombre = document.getElementById("nombre");
  let contrasenia = document.getElementById("contrasenia");

  if (nombre.value == "") alert("Introduzca un nombre");
  else {
    if (checkPassword(contrasenia.value)) {
      document.querySelector("dialog").show();
    } else alert("Contraseña incorrecta");
  }
}

function login() {
  let id = Math.floor(Math.random() * 100);
  let nombre = document.getElementById("nombre");
  let tema = document.getElementById("tema");

  if (nombre.value == "") alert("Introduzca un nombre");
  else {
    localStorage.setItem("nombre",nombre.value);
    localStorage.setItem("id",id);
    localStorage.setItem("tema",tema.value);

    window.location.replace("Inicio.html");
  }
}
