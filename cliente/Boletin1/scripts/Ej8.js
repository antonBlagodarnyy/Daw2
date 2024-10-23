let grados;
do {
    grados = parseFloat(prompt("Introduzca la temperatura en grados Celsius"));
    if (grados < -273.15) {
        alert('Error, valor inferior al cero absoluto.');
    }
} while (isNaN(grados) || grados <= -273.15);

alert(`Celsius: ${grados}// Fahrenheit: ${celsiusAFahrenheit(grados)}// Kelvin: ${celsiusAKelvin(grados)}.`);

function celsiusAFahrenheit(grados) {
    return (grados * 9 / 5) + 32;
}

function celsiusAKelvin(grados) {
    return grados + 273.15;
}