const output = document.getElementById("output");

//Los parentesis sirven para obtener esos valores dentro del array que devuelve exec
const nombreReg = /Nombre:\s([a-zA-ZÁ-ÿ]+)\s([a-zA-ZÁ-ÿ]+)/;
const numCuentaReg = /Número\sde\scuenta:\s(\d{4}-\d{4}-\d{4}-\d{4}-\d{4})/;
const correoReg =
  /Correo\selectrónico:\s[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/;
const transaccionReg = /Transacción\s\d+:\s(\d+)/g;
const transaccionPalabraReg = /Transacción/g;

const texto = `
Nombre: Juan Pérez
Número de cuenta: 1234-5678-9876-5432-1234
Correo electrónico: juan.perez@banco.com
Transacción 1: 500€
Transacción 2: 300€
Transacción 3: 150€
Saldo total: 950€
Mensaje: ¡Gracias por usar Banco X! Recuerda que
tu saldo es 950€ y la próxima transacción es de
300€.`;

function extraerNombreCliente() {
  let nombreObj = nombreReg.exec(texto);

  console.log(nombreObj);

  let nombre = `${nombreObj[1]} ${nombreObj[2]}`;

  output.innerHTML = `<p>${nombre}</p>`;
}

function validarNumeroDeCuenta() {
  output.innerHTML = numCuentaReg.test(texto)
    ? "<p>Numero de cuenta valido.</p>"
    : "<p>Numero de cuenta no valido.</p>";
}

function validarCorreo() {
  output.innerHTML = correoReg.test(texto)
    ? "<p>Correo valido.</p>"
    : "<p>Correo no valido.</p>";
}

function sumarTransacciones() {
  let transaccionObj = texto.match(transaccionReg);

  let sumatorio = 0;

  //Recorro todas las transacciones
  for (var prop in transaccionObj) {
    //Evita recorrer las propiedades heredadas de prototipos
    if (Object.prototype.hasOwnProperty.call(transaccionObj, prop)) {
      //Suma el parseado a int
      sumatorio += parseInt(
        //Accedo a la propiedad, split recorta el string y devuelve un array, por eso accedo al puesto [1]
        transaccionObj[prop].split(/Transacción\s\d+:\s/)[1]
      );
    }
  }

  output.innerHTML = `<p>Total de las transacciones: ${sumatorio}€</p>`;
}

function cifrarNumeroCuenta() {
  let numCuentaObj = numCuentaReg.exec(texto);

  let numCuentaSinCifrar = numCuentaObj[1];

  let maskedPart = numCuentaSinCifrar.slice(0, -5).replace(/\d/g, "*");
  let visiblePart = numCuentaSinCifrar.slice(-5); // Last 5 characters (includes the last hyphen and 4 digits)

  let numCuenta = maskedPart + visiblePart;

  output.innerHTML = `<p>Numero cuenta cifrado: ${numCuenta}</p>`;
}

function contarPalabraTransaccion() {
  let transaccionObj = texto.match(transaccionPalabraReg);
  output.innerHTML = `<p>La palabra transaccion aparece ${transaccionObj.length} veces.</p>`
}
