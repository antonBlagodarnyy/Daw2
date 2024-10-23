let num1;
let num2;
let operacion;
let repetir = true;

do {
  do {
    num1 = parseFloat(prompt("Introduzca el primer numero"));
  } while (isNaN(num1));

  do {
    num2 = parseFloat(prompt("Introduzca el segundo numero"));
  } while (isNaN(num2));
  
  do {
    operacion = parseInt(
      prompt(`¿Que operacion desea realizar?
        1.-Suma.
        2.-Resta.
        3.-Multiplicacion.
        4.-Division.`)
    );
  } while (isNaN(operacion) || operacion > 4 || operacion < 1);

  switch (operacion) {
    case 1:
      alert(`Resultado de la suma: ${suma(num1, num2)}`);
      break;
    case 2:
      alert(`Resultado de la resta: ${resta(num1, num2)}`);
      break;
    case 3:
      alert(`Resultado de la multiplicacion: ${multiplicacion(num1, num2)}`);
      break;
    case 4:
      alert(`Resultado de la division: ${division(num1, num2)}`);
      break;
    default:
      alert(`Error en switch`);
      break;
  }
} while (comprobarRepeticion());


function suma(num1, num2) {
  return num1 + num2;
}
function resta(num1, num2) {
  return num1 - num2;
}
function multiplicacion(num1, num2) {
  return num1 * num2;
}
function division(num1, num2) {
  return num1 / num2;
}


function comprobarRepeticion() {
  var repetirNum;

  do {
    repetirNum = parseInt(
      prompt(`¿Desear realizar otra operacion?
            1.-Si.
            2.-No.
            `)
    );
  } while (isNaN(repetirNum) && repetirNum !== 1 && repetirNum !== 2);
  if (repetirNum == 1) return true;
  else if (repetirNum == 2) return false;
}
