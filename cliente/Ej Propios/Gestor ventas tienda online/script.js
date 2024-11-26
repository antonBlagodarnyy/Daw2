const Ventas = [];
const output = document.getElementById("output");
const regExFecha = /^\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])$/;

class Venta {
  static idContador = 0;
  constructor(nombre, precio, cantidad, fecha) {
    this.id = Venta.idContador;
    Venta.idContador++;
    this.nombre = nombre;
    this.precio = precio;
    this.cantidad = cantidad;
    this.fecha = fecha; //YYYY-MM-DD
  }
}

Ventas.push(new Venta("Silla", 25, 10, "2024-11-26"), 
new Venta("Sofa",23.50,15,"2024-11-24"),
new Venta("Monitor",99.89,5,"2024-11-20"));

function verVentas(){
output.innerHTML = tablaDeObjetosEnArray(Ventas);
}

function totalIngresosDiarios(){
let fechaEscogida;
do{
    fechaEscogida=prompt("Introduzca una fecha en formato YYYY-MM-DD");
}while (!regExFecha.test(fechaEscogida));

let ventasDiarias = Ventas.filter((venta)=>venta.fecha==fechaEscogida);
let ingresos = ventasDiarias.reduce((acumulador, valorActual) => acumulador + valorActual.precio*valorActual.cantidad,0);
output.innerHTML = `Ingresos del dia ${fechaEscogida}: ${ingresos}.`
}

function productosMasVendidos(){
  let productoMasVendido;
  let cantidad = 0;
  Ventas.forEach(venta => {
      if (cantidad< venta.cantidad){
        productoMasVendido = venta;
        cantidad = venta.cantidad;
      }
    });

    output.innerHTML= `Producto mas vendido: ${productoMasVendido.nombre}`;

}

function promedioDeVentasPorProducto(){

}

function ventasPorIntervaloDeFechas(){

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
  
  /**Recibe un array de objetos iguales y devuelve una tabla HTML
   * que muestra las propiedades de los objetos
   *
   * @param {Object[]} array
   * @returns {string} Tabla HTML template literal
   */
  function tablaDeObjetosEnArray(array) {
    //Creo las etiquetas que abren la tabla de la tabla
    let tabla = `<table>
    <thead>`;
  
    //Saco el primer objeto del array para recorrer solo las propiedades
    let objeto = array[0];
    //Creo las cabeceras con las propiedades
    for (let propt in objeto) {
      tabla += `<th>${propt}</th>`;
    }
  
    //Cierro la cabeza de la tabla y abro el body
    tabla += `</thead>
    <tbody>`;
  
    //Recorro los objetos y por cada objeto abro una fila,
    //dentro de la fila llamo a la funcionalidad "imprimir objeto"
    array.forEach((objeto) => {
      tabla += `<tr>${imprimirObjeto(objeto)}</tr>`;
    });
  
    tabla += `</tbody></table>`;
  
    return tabla;
  }
  /**Recorre un objeto y devuleve <td>s con los valores de sus propiedades
   *
   * @param {Object} objeto
   * @returns {String} columnas con los valores de las propiedades del objeto
   */
  function imprimirObjeto(objeto) {
    let datos = ``;
  
    //Recorro las propiedades del objeto
    for (let propt in objeto) {
      //Si es un boolean
      if (typeof objeto[propt] === "boolean") {
        //Concateno "si" o "no", dependiendo del valor del boolean
        datos += `<td>${objeto[propt] ? "Si" : "No"}</td>`;
        //En caso contrario concateno el valor de la propiedad directamente
      } else {
        datos += `<td>${objeto[propt]}</td>`;
      }
    }
    //Devuelvo los <td>s
    return datos;
  }
  