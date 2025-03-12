const formularios = document.querySelectorAll("form");
formularios[0].addEventListener("submit", escogerTema);
formularios[1].addEventListener("submit", login);

function checkPassword(password) {
  return password == getCookieValue("password");
}

function getCookieValue(name) {
  const regex = new RegExp(`(^| )${name}=([^;]+)`);
  const match = document.cookie.match(regex);
  if (match) {
    return match[2];
  }
}

//Inicializamos la contrasenia
let password = getCookieValue("password");
if (password == "" || password == undefined) document.cookie = "password=12345";

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
    document.cookie = `nombre=${nombre.value}`;
    document.cookie = `id=${id}`;
    document.cookie = `tema=${tema.value}`;

    window.location.replace("Inicio.html");
  }
}
