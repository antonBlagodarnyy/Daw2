const output = document.getElementById("output");

const conf = {
  X: 100,
  Y: 100,
  W: 100,
  H: 100,
};

let ventana;

function openWin() {
    ventana = window.open("", "",
        "width=100, height=100");
}

function modificarX(xValue) {
  conf.X = xValue;
}
function modificarY(yValue) {
  conf.Y = yValue;
}
function modificarW(wValue) {
  conf.W = wValue;
}
function modificarH(hValue) {
  conf.H = hValue;
}

function modificarValores() {
  switch (
    eleccion(
      1,
      4,
      `Que valor desea modificar?
    1.-X
    2.-Y
    3.-W
    4.-H`
    )
  ) {
    case 1:
      modificarX(pedirInt());
      break;
    case 2:
      modificarY(pedirInt());
      break;
    case 3:
      modificarW(pedirInt());
      break;
    case 4:
      modificarH(pedirInt());
      break;
    default:
      alert("Error en switch");
  }
  modificarVentana();
  console.log(conf)
}

function modificarVentana() {
  try {
    // Adjust window size
    ventana.resizeTo(conf.W, conf.H);

    // Move window position
    ventana.moveTo(conf.X, conf.Y);
  } catch (error) {
    // Handle errors gracefully
    console.warn("Algunas funciones de ventana no son compatibles con este navegador o están bloqueadas.");
    console.error(error.message);
  }
}

//Funcionalidades
/**Pide al usuario un numero entero y lo valida correctamente,
 * asegurandose que este entre el numMinimo y el numMaximo.
 *
 * @param {number} numMinimo
 * @param {number} numMaximo
 * @param {string} mensaje
 * @returns {number} Integer validada
 */
function eleccion(numMinimo, numMaximo, mensaje) {
  let eleccion;
  do {
    eleccion = parseInt(prompt(mensaje));
  } while (isNaN(eleccion) || eleccion < numMinimo || eleccion > numMaximo);
  return eleccion;
}

function pedirInt() {
  let num;
  do {
    num = parseInt(prompt(`Introduzca el valor`));
  } while (isNaN(num));
  return num;
}
