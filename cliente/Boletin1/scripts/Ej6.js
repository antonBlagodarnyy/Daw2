//Ejercicio6
//Pedir hora minutos y segundos y decir las horas, minutos y segundos que seran un segundo despues
 var hora;
var minuto;
var segundo;


do {
  hora = parseInt(prompt("Introduzca la hora."));
} while (isNaN(hora) || hora > 24 || hora < 1);
do {
  minuto = parseInt(prompt("Introduzca los minutos."));
} while (isNaN(minuto) || minuto > 59 || minuto < 0);
do {
  segundo = parseInt(prompt("Introduzca los segundos."));
} while (isNaN(segundo) || segundo > 59 || segundo < 0);

alert(`Datos introducidos: Hora:${hora} Minutos:${minuto} Segundos:${segundo} `);

if(segundo<59){
    segundo++; 
} else {
    if(minuto<59){
        minuto++;
        segundo=0;
    } else {
        if(hora < 23){
            hora++;
            minuto=0;
            segundo=0;
        } else{
            hora=0;
            minuto=0;
            segundo=0;
        }

    }
}

alert(`Dentro de un segundo seran las: Hora: ${hora} Min: ${minuto} Seg: ${segundo}`) 
