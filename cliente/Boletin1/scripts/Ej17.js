const output = document.getElementById("output");

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
    const nombreReg = /Nombre:\s([a-zA-ZÁ-ÿ]+)\s([a-zA-ZÁ-ÿ]+)/;

    let nombreObj = nombreReg.exec(texto);

    let nombre = `${nombreObj[1]} ${nombreObj[2]}`;

    output.innerHTML = `<p>${nombre}</p>`;
}

function validarNumeroDeCuenta() {
    const numCuentaReg = /Número\sde\scuenta: (\d{4}-\d{4}-\d{4}-\d{4}-\d{4})/;

    /* let numCuentaObj = numCuentaReg.exec(texto);
    let numCuenta = numCuentaObj[0].slice("Número de cuenta: ".length)
    output.innerHTML = `<p>${numCuenta}</p>`; */

    output.innerHTML = numCuentaReg.test(texto) ? "<p>Numero de cuenta valido.</p>" : "<p>Numero de cuenta no valido.</p>"
}

function validarCorreo() {
    const correoReg = /Correo\selectrónico:\s[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/;

    output.innerHTML = correoReg.test(texto) ? "<p>Correo valido.</p>" : "<p>Correo no valido.</p>"
}

function sumarTransacciones(){
const transaccionReg = /Transacción\s\d+:\s(\d+)€/g;

let transaccionObj = texto.match(transaccionReg);

console.log(transaccionObj)
}