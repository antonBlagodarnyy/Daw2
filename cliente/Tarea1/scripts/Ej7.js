//Pide al usuario un numero de segundos. A partir del mismo devuelve el numero de horas,
//minutos y segundos que representan.
let segundos;
do {
  segundos = parseInt(prompt("Introduzca los segundos"));
} while (isNaN(segundos) || segundos <= 0);
let horas = Math.floor(segundos / 3600);
let minutos;

if (horas > 0) {
  minutos = Math.floor((segundos % 3600) / 60);
} else {
  minutos = Math.floor(segundos / 60);
}
if (minutos > 0) segundos = segundos % 60;

alert(`Horas: ${horas} Minutos: ${minutos} Segundos ${segundos}`);
