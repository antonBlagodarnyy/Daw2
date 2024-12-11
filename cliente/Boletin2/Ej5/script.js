let ventana;

function openWin() {
    ventana = window.open("", "",
        "width=100, height=100");
}

function resize() {
    let ancho = parseInt(prompt("Introduzca el ancho"));
    let alto = parseInt(prompt("Introduzca el alto"));

    ventana.resizeTo(ancho, alto);
}

function move() {
    let X = parseInt(prompt("Eje X"));
    let Y = parseInt(prompt("Eje Y"));

    ventana.moveTo(X, Y);
}
