const estudiantes = [
  {
    nombre: "Juan",
    calificaciones: [8, 9, 7, 6],
  },
  {
    nombre: "Ana",
    calificaciones: [0, 6, 9, 8],
  },
  {
    nombre: "Luis",
    calificaciones: [5, 6, 4, 7],
  },
  {
    nombre: "Sofía",
    calificaciones: [9, 0, 9, 8],
  },
  {
    nombre: "Carlos",
    calificaciones: [6, 6, 7, 6],
  },
  {
    nombre: "Jaime",
    calificaciones: [2, 6, 0, 6],
  },
];
const output = document.getElementById("output");

function verCalificaciones() {
  output.innerHTML = tablaDeObjetosEnArray(estudiantes);
}

function AniadirPromedioDeCalificaciones() {
  let promedio = estudiantes.map((estudiante) => {
    let suma = estudiante.calificaciones.reduce(
      (acumulador, currentValue) => acumulador + currentValue,
      0
    );
    let promedio = suma / estudiante.calificaciones.length;
    return { nombre: estudiante.nombre, promedio: promedio.toFixed(2) };
  });
  output.innerHTML = tablaDeObjetosEnArray(promedio);
}

function calcularPromedioGeneral() {
  let suma = 0;
  //Recorro todas las notas
  estudiantes.map((estudiante) => {
    //Por cada nota sumo a suma el resultado de recorrer todas las calificaciones de cada estudiante
    suma += estudiante.calificaciones.reduce((acumuladorNota, nota) => {
      acumuladorNota += nota;
      return acumuladorNota;
    }, 0);
  });
  //Saco la cantidad de notas
  let cantidadCalificaciones = estudiantes.reduce(
    (acumulador, estudiante) => acumulador + estudiante.calificaciones.length,
    0
  );
  //Calculo el promedio
  let promedio = suma / cantidadCalificaciones;

  output.innerHTML = promedio;
}

function estudiantesAprobados() {
  //Filtro el array de estudiantes
  let estudiantesAprobados = estudiantes.filter((estudiante) => {
    //Por cada estudiante saco el total de sus notas
    let totalNotaEstudiante = estudiante.calificaciones.reduce(
      (calificacionAcumulador, calificacionActual) =>
        (calificacionAcumulador += calificacionActual),
      0
    );
    //Calculo la media
    let mediaEstudiante =
      totalNotaEstudiante / estudiante.calificaciones.length;
    //Devuelvo un booleano si es mayor o igual a 5
    return mediaEstudiante >= 5;
  });

  output.innerHTML = tablaDeObjetosEnArray(estudiantesAprobados);
}

function mejorEstudiante() {
  let mejorEstudiante = estudiantes.reduce(
    (estudianteAcumulador, estudianteActual) => {
      if (calcularMedia(estudianteAcumulador) > calcularMedia(estudianteActual))
        return estudianteAcumulador;
      else return estudianteActual;
    }
  );

  output.innerHTML = imprimirObjeto(mejorEstudiante);
}
function calcularMedia(estudiante) {
  //Por cada estudiante saco el total de sus notas
  let totalNotaEstudiante = estudiante.calificaciones.reduce(
    (calificacionAcumulador, calificacionActual) =>
      (calificacionAcumulador += calificacionActual),
    0
  );
  //Calculo la media
  return totalNotaEstudiante / estudiante.calificaciones.length;
}

function ajustarCalificaciones() {
  let alumnosAjustados = estudiantes.map((estudiante) => {
    estudiante.calificaciones = estudiante.calificaciones.map(
      (calificacion) => {
        if (calificacion < 10) calificacion++;
        return calificacion;
      }
    );
    return estudiante;
  });
  console.log(alumnosAjustados);
  output.innerHTML = tablaDeObjetosEnArray(alumnosAjustados);
}

function numeroTotalCalificaciones() {
  let total = estudiantes.reduce((cantidadAcumulador, estudianteActual) => {
    cantidadAcumulador += estudianteActual.calificaciones.length;
    return cantidadAcumulador;
  }, 0);

  output.innerHTML = total;
}

function sumaTotalCalificaciones() {
  let total = estudiantes.reduce((cantidadAcumulador, estudianteActual) => {
    cantidadAcumulador += estudianteActual.calificaciones.reduce(
      (calificacionAcumulador, calificacionActual) =>
        calificacionAcumulador + calificacionActual
    );
    return cantidadAcumulador;
  }, 0);

  output.innerHTML = total;
}

function calificacionMasAlta() {
  var calificacion = 0;
  estudiantes.map((estudiante) => {
    estudiante.calificaciones.reduce((calificacionAcumulador) => {
      if (calificacion < calificacionAcumulador)
        calificacion = calificacionAcumulador;
    });
  });

  output.innerHTML=calificacion;
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
/**Recorre un objeto y devuelve <td>s con los valores de sus propiedades
 *
 * @param {Object} objeto
 * @returns {String} columnas con los valores de las propiedades del objeto
 */
function imprimirObjeto(objeto) {
  let datos = ``;

  for (let propt in objeto) {
    const value = objeto[propt];

    if (typeof value === "boolean") {
      // Si es boolean, muestra "Sí" o "No"
      datos += `<td>${value ? "Sí" : "No"}</td>`;
    } else if (Array.isArray(value)) {
      // Si es un array
      if (value.length > 0 && typeof value[0] === "object") {
        // Si es un array de objetos, genera una subtabla
        datos += `<td>${tablaDeObjetosEnArray(value)}</td>`;
      } else {
        // Si no, conviértelo en una lista separada por comas
        datos += `<td>${value.join(", ")}</td>`;
      }
    } else if (typeof value === "object") {
      // Si es un objeto, recursivamente imprimir su contenido
      datos += `<td>${imprimirObjeto(value)}</td>`;
    } else {
      // Para otros tipos, simplemente agregar el valor
      datos += `<td>${value}</td>`;
    }
  }

  return datos;
}
