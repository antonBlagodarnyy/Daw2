document.addEventListener("click", () => console.log("DOCUMENTO"), true);
document.documentElement.addEventListener("click", () => console.log("HTML"), true);
document.body.addEventListener("click", () => console.log("BODY"), true);
document.getElementById("padre").addEventListener("click", () => console.log("PADRE"), true);
document.getElementById("hijo").addEventListener("click", () => console.log("HIJO"), true);

/* document.addEventListener("click", () => console.log("DOCUMENTO"));
document.documentElement.addEventListener("click", () => console.log("HTML"));
document.body.addEventListener("click", () => console.log("BODY"));
document.getElementById("padre").addEventListener("click", () => console.log("PADRE"));
document.getElementById("hijo").addEventListener("click", () => console.log("HIJO"));

 */
/* *
 * event.target vs. event.currentTarget
 * event.target → Elemento que disparó el evento (donde ocurrió realmente).
 * event.currentTarget → Elemento que tiene el listener (donde se está ejecutando el código)
 * target cambia según dónde hagas clic.
 * currentTarget siempre es el mismo: el elemento con el listener.
 */
document.getElementById("padre").addEventListener("click", function(event) {
    console.log("target:", event.target);       // Elemento que recibió el clic
    console.log("currentTarget:", event.currentTarget); // Elemento que tiene el listener
});
