//Ejercicio 1-4
saludoConsola("Pedro"); 
saludoAlert();

 function saludoConsola(nombre) {
    console.log("Holaaaa" + nombre);
}
saludoAlert();
function saludoAlert() {
    alert("Holaa");
}

//Ejercicio5
 var edad = NaN;
do {
    edad = parseInt(prompt("Introduzca su edad."));
} while (isNaN(edad));
alert(`El año que viene tendras ${edad + 1}, ${edad > 18 ? `maldito viejo` : ` maldito crio`}`);



