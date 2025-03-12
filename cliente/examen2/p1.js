class Chiste {
  constructor(type, parte1, parte2) {
    this.type = type;
    this.parte1 = parte1;
    this.parte2 = parte2;
  }
  toString(nombre) {
    return `${this.parte1}  ${nombre.value}  ${this.parte2}`;
  }
}

var Chistes = [
  new Chiste("lepero", "Estaba Lepero sentado junto a ", " y paso un señor..."),
  new Chiste(
    "lepero",
    "Siendo lepero un hombre mas mayor que ",
    " deberia de poder..."
  ),
  new Chiste(
    "lepero",
    "A veces el lepero es parecido a ",
    " , pero no siempre..."
  ),
  new Chiste("jaimito", "En la casa de Jaimito ", " siempre puede entrar..."),
  new Chiste("jaimito", "A Jaimito ", " le ha dicho..."),
  new Chiste(
    "jaimito",
    "Despues del colegio, Jaimito le pregunto a ",
    " por sus hijos..."
  ),
];

function jueguen() {
  //Recogemos las variables que vamos a utilizar del html
  const nombre = document.getElementById("nombre");
  const tipos = document.getElementsByName("tipo");
  //Recorremos los tipos de chistes
  for (const tipo of tipos) {
    //Si se ha seleccionado ese chiste
    if (tipo.checked) {
      //Filtramos el array de chistes segun su valor
      let chistesFiltrados = Chistes.filter(
        (chiste) => chiste.type == tipo.value
      );
      //Si no quedan chistes se avisa al usuario
      if (chistesFiltrados.length < 1) {
        alert("No quedan chistes de " + tipo.value);
      } else {
        //En caso contrario generamos un indice para seleccionar un chiste
        let index = Math.floor(Math.random() * chistesFiltrados.length);
        //Seleccionamos el chiste
        let chiste = chistesFiltrados[index];
        //Lo imprimimos
        document.querySelector("p").innerText = chiste.toString(nombre);
        //Lo eliminamos del array
        Chistes.splice(index, 1);
      }
    }
  }
}
