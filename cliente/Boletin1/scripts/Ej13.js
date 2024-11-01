const Inventario = [];


class Producto {
    disponibilidad;
    constructor(nombre, stock, precio, categoria) {
        this.stock = stock;
        this.nombre = nombre;
        this.precio = precio;
        this.categoria = categoria;
        this.verDisponibilidad();

    }
    verDisponibilidad() {
        if (this.stock > 0)
            this.disponibilidad = true;
        else
            this.disponibilidad = false;
    }
    sumarStock() {
        this.stock++;
        this.verDisponibilidad();
    }
    restarStock() {
        this.stock--;
        this.verDisponibilidad();
    }
}
const Categoria = {
    Electronica: 'Electronica',
    Ropa: 'Ropa',
    Hogar: 'Hogar'
};

//Main
let salir = false;
do {
  switch (menu()) {
    case 1:
      
      break;
    case 2:
      
      break;
    case 3:
      
      break;
    case 4:
      salir = true;
      alert(`Adios`);
      break;
      Default: alert(`Valor fuera de rango`);
  }
} while (!salir);


function menu() {
    let eleccionMenu;
    do {
      eleccionMenu = eleccion(
        1,
        4,
        `
              +++++++++++++PARKING++++++++++
              Seleccione una accion:
              1.-Ver listado de productos.
              2.-Aniadir producto.
              3.-Eliminar producto.
              4.-Salir.
              `
      );
    } while (isNaN(eleccionMenu));
  
    return eleccionMenu;
  }


//Funcionalidades
function eleccion(numMinimo, numMaximo, mensaje) {
    let eleccion;
    do {
      eleccion = parseInt(prompt(mensaje));
    } while (isNaN(eleccion) || eleccion < numMinimo || eleccion > numMaximo);
    return eleccion;
  }