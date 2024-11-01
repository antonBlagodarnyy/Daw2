
//Ejercicio propio

/* let listaHtml = document.getElementById('lista');
let x = `Elemento`

let li = `<li>${x}</li>`;

let lista = [`<ul>`];

for (let i = 0; i < 10; i++) {
    lista.push(li);
}
lista.push('</ul>');
lista.forEach(element => {
});

listaHtml.innerHTML = lista.join('');  */

//Ejercicio propio
/*  let listaHtml = document.getElementById('lista');
let lista= [`<ul class= "ul-lista">`];

var iteraciones = NaN;
do {
    iteraciones = parseInt(prompt("Introduzca el numero de elementos que llevara la lista."));
} while (isNaN(iteraciones));

for (let i = 0; i < iteraciones; i++) {
    lista.push(`<li>${prompt("Escriba un elemento para aniadir a la lista")}</li>`);
}

lista.push('</ul>');


listaHtml.innerHTML = lista.join('');  */

/* const alCuadrado = x => {
    console.log('Hola mundo');
    return x * x;
}

console.log(alCuadrado(2)); */

const vector = [10, 20, 30].map(e => e / 2);
console.log(vector);