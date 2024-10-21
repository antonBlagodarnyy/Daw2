class Usuario {
  constructor(login, password, admin) {
    this.login = login;
    this.password = password;
    this.admin = admin;
  }
}

let usuarios = [
  (usuario1 = new Usuario("user1", "pass1", false)),
  (usuario2 = new Usuario("user2", "pass2", false)),
  (admin1 = new Usuario("admin1", "pass12", true)),
];

//Main
let usuario = null;
let eleccionPrincipal;

do {
  eleccionPrincipal = eleccion(
    1,
    3,
    `Escoja una opcion:
    1.-Login.
    2.-Registrarse.
    3.-Salir.`
  );
  if (eleccionPrincipal == 1) {
    login();
  } else if (eleccionPrincipal == 2) {
    registrarse();
  } else alert(`Adios!`);
} while (eleccionPrincipal != 3);

//Funciones
function login() {
  do {
    user = prompt("Introduzca su login");
    password = prompt("Introduzca su contrasenia");
    usuario = autentificarse(user, password);
    if (usuario == null) alert(`Usuario no encontrado`);
    else {
      if (!usuario.admin) menuUsuario();
      else {
        menuAdmin();
      }
    }
  } while (usuario == null);
}
function autentificarse(login, password) {
  let usuarioAutentificado = null;
  for (let usuario of usuarios) {
    if (usuario.login === login && usuario.password === password) {
      usuarioAutentificado = usuario;
      break;
    }
  }
  return usuarioAutentificado;
}
function registrarse() {
  let nuevoLogin, nuevoPassword, esAdmin;
  let usuarioExistente;

  // Solicitar login y asegurarse de que no exista ya un usuario con ese login
  do {
    nuevoLogin = prompt("Introduzca un nuevo login:");
    usuarioExistente = usuarios.some((usuario) => usuario.login === nuevoLogin);

    if (usuarioExistente) {
      alert("Este login ya está en uso. Por favor, elija otro.");
    }
  } while (usuarioExistente);

  // Solicitar contraseña
  nuevoPassword = prompt("Introduzca una contraseña:");

  // Preguntar si el usuario es admin
  let respuestaAdmin = eleccion(
    1,
    2,
    "¿El usuario será administrador?\n1.-Sí\n2.-No"
  );
  esAdmin = respuestaAdmin === 1;

  // Crear el nuevo usuario y agregarlo al array
  let nuevoUsuario = new Usuario(nuevoLogin, nuevoPassword, esAdmin);
  usuarios.push(nuevoUsuario);

  alert("Usuario registrado exitosamente.");
}


//Usuario
function menuUsuario() {
  let eleccionAccion;
  do {
    eleccionAccion = eleccion(
      1,
      3,
      `Que desea hacer?
            1.-Mostrar datos usuario
            2.-Cambiar contrasenia
            3.-Salir`
    );
    switch (eleccionAccion) {
      case 1:
        alert(`Usuario: ${usuario.login}. Admin: ${usuario.admin}`);
        break;
      case 2:
        cambiarContrasenia();
        break;
      case 3:
        alert("Adios!");

        break;
        Default: alert("Error en switch");
    }
  } while (eleccionAccion != 3);
}
function cambiarContrasenia() {
  usuario.password = prompt("Introduzca su nueva contrasenia");
}

//Admin
function menuAdmin() {
  let eleccionAccion;
  do {
    eleccionAccion = eleccion(
      1,
      3,
      `Que desea hacer?
            1.-Mostrar datos usuario
            2.-Eliminar usuario
            3.-Salir`
    );
    switch (eleccionAccion) {
      case 1:
        alert(`Usuario: ${usuario.login}. Admin: ${usuario.admin}`);
        break;
      case 2:
        eliminarUsuario();
        break;
      case 3:
        alert("Adios!");

        break;
        Default: alert("Error en switch");
    }
  } while (eleccionAccion != 3);
}
function eliminarUsuario() {
  userName = prompt(`Introduzca el login del usuario.`);

  // Check if login is in array
  let usuarioExiste = usuarios.some((usuario) => usuario.login === userName);

  if (usuarioExiste) {
    usuarios = usuarios.filter((usuario) => usuario.login != userName);
    alert(`Usuario ${userName} eliminado.`);
  } else {
    alert(`Usuario ${userName} no encontrado.`);
  }
}

//Funcionalidades
function eleccion(numMinimo, numMaximo, mensaje) {
  let eleccion;
  do {
    eleccion = parseInt(prompt(mensaje));
  } while (isNaN(eleccion) || eleccion < numMinimo || eleccion > numMaximo);
  return eleccion;
}

