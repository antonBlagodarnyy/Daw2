class Usuario {
    constructor(login, password, admin) {
      this.login = login;
      this.password = password;
      this.admin = admin;
    }
  }

let usuarios = [
  usuario1 = new Usuario("user1", "pass1", false),
  usuario2 = new Usuario("user2", "pass2", false),
  admin1 = new Usuario("admin1", "pass12", true),
];

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

//Main
let usuario = null;
console.log(usuarios);
do {
  login = prompt("Introduzca su login");
  password = prompt("Introduzca su contrasenia");
  usuario = autentificarse(login, password);
} while (usuario == null);

alert(`Bienvenido ${usuario.login}.`)

function menuUsuario(){
    let eleccion;
    do {
        eleccion = parseInt(prompt(`Que desea hacer?
            1.-Mostrar datos usuario
            2.-Cambiar contrasenia
            3.-Salir`));

      } while (isNaN(eleccion)|| eleccion!= 1 || eleccion != );
}