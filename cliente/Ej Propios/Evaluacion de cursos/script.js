/*
Imagina que estás desarrollando un sistema para una plataforma educativa. Tienes una lista de cursos donde cada curso es un objeto con las siguientes propiedades:

título: Nombre del curso.
duración: Duración del curso en horas.
categoría: Categoría del curso (como "programación", "diseño", etc.).
estudiantes: Número de estudiantes inscritos.
calificaciónPromedio: Calificación promedio del curso (de 1 a 5 estrellas).
activo: Indica si el curso está activo (true o false).
Implementa las siguientes funcionalidades:

Obtener cursos populares: Usando filter y una función flecha, crea un nuevo array con los cursos que tienen más de un número determinado de estudiantes (introducido por el usuario).

Incrementar calificaciones: Usa map para incrementar en una cantidad determinada (proporcionada por el usuario) la calificación promedio de todos los cursos activos. Asegúrate de que la calificación no supere 5.

Calcular la duración total de una categoría: Usando filter y reduce, calcula la duración total de los cursos de una categoría introducida por el usuario.

Verificar cursos destacados: Usa some para verificar si existe algún curso que tenga tanto una calificación promedio mayor o igual a 4.5 como más de 100 estudiantes inscritos.

Obtener nombres de cursos inactivos: Usando filter y map, genera un array con los nombres de todos los cursos que están inactivos.

Determinar si todos los cursos en una categoría están activos: Usa every para comprobar si todos los cursos de una categoría específica están activos.

Calcular el promedio de estudiantes por curso: Usando reduce, calcula el promedio de estudiantes inscritos en todos los cursos.

Lista de categorías únicas: Genera un array con todas las categorías de cursos, asegurándote de que no haya duplicados.*/
const output = document.getElementById("output");

const cursos = [
    {
        título: "JavaScript para principiantes",
        duración: 10,
        categoría: "programación",
        estudiantes: 150,
        calificacionPromedio: 4.2,
        activo: true
    },
    {
        título: "Diseño Gráfico Básico",
        duración: 8,
        categoría: "diseño",
        estudiantes: 80,
        calificacionPromedio: 3.9,
        activo: true
    },
    {
        título: "Machine Learning Avanzado",
        duración: 25,
        categoría: "programación",
        estudiantes: 50,
        calificacionPromedio: 4.7,
        activo: false
    }
];
function verCursos() {
    output.innerHTML = tablaDeObjetosEnArray(cursos);
}

function obtenerCursosPopulares() {
    let numEstudiantesMinimo;
    do {
        numEstudiantesMinimo = parseInt(prompt("Introduzca el numero de estudiantes de corte."));
    } while (isNaN(numEstudiantesMinimo) || eleccion <= 0);

    let cursosPopulares = cursos.filter((curso) => curso.estudiantes > numEstudiantesMinimo);

    output.innerHTML = tablaDeObjetosEnArray(cursosPopulares);
}

function incrementarCalificaciones() {
    let cantidadAIncrementar;

    do {
        cantidadAIncrementar = parseInt(prompt("Introduzca la cantidad a incrementar."));
    } while (isNaN(cantidadAIncrementar) || cantidadAIncrementar <= 0);

    cursos.filter((curso) => curso.activo).map((curso) => curso.calificacionPromedio += cantidadAIncrementar);

    output.innerHTML = tablaDeObjetosEnArray(cursos);
}

function calcularDuracionTotalDeUnaCategoria() {
    let categoriaElegida;

    do {
        categoriaElegida = prompt("Introduzca una categoria valida")
    } while (categoriaElegida != "programación" && categoriaElegida != "diseño");

    let duracionTotal = cursos.filter((curso) => curso.categoría == categoriaElegida)
        .reduce((acumulador, currentValue) => acumulador + currentValue.duración, 0);

    output.innerHTML = "<p>" + duracionTotal + "</p>";
}

function verificarCursosDestacados() {
    const notaCorte = 4.5;
    const estudiantesCorte = 100;
    let existenCursosDestacados = cursos.some((curso) => curso.calificacionPromedio >= notaCorte, (curso) => curso.estudiantes >= estudiantesCorte);

    existenCursosDestacados ? output.innerHTML = `<p>Existen cursos destacados</p>` : output.innerHTML = `No existen cursos destacados`;
}

function obtenerCursosInactivos() {
    // Filtrar cursos inactivos y obtener nombres
    const nombresInactivos = cursos
        .filter(curso => !curso.activo) // Selecciona solo los cursos inactivos
        .map(curso => curso.título);   // Obtén solo los títulos de esos cursos

    console.log(nombresInactivos)
    output.innerHTML = nombresInactivos;
}

function determinarSiTodosLosCursosDeUnaCategoriaEstanActivos() {
    let categoriaElegida;
    do {
        categoriaElegida = prompt("Introduzca una categoria valida")
    } while (categoriaElegida != "programación" && categoriaElegida != "diseño");

    let cursosCategoria = cursos.filter((curso) => curso.categoría == categoriaElegida);

    cursosCategoria.some((curso) => !curso.activo) ? output.innerHTML = `No todos los cursos de la categoria ${categoriaElegida} estan activos` : output.innerHTML = `Todos los cursos de la categoria ${categoriaElegida} estan activos`;
}

function calcularElPromedioDeEstudiantes() {
    let total = cursos.reduce((acumulador, currentValue) => acumulador += currentValue.estudiantes, 0);
    let promedio = Math.round(total / cursos.length);

    output.innerHTML = `<p>Promedio de estudiantes: ${promedio}</p>`;
}

function listarCategoriasUnicas() {
    let categorias = Array.from(cursos, (curso) => curso.categoría);

    //Funcion "filtro". Devuelve un booleano en funcion de si
    //el primer indice del elemento en el array es igual al ultimo
    let esUnico = (valor, indice, array) => {
        return array.indexOf(valor) === array.lastIndexOf(valor);
    };

    //Filtramos el array
    let categoriasUnicas = categorias.filter(esUnico);

    //Lo imprimimos
    let datos = ``;

    categoriasUnicas.forEach((categoria) => {
        datos += `<p>${categoria}</p>`;
    });

    output.innerHTML = datos;

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

