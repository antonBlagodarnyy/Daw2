<?php
require_once("Serie.php");
require_once("Videojuego.php");

$series = [];
$videojuegos = [];

for ($i = 0; $i < 5; $i++) {
    $series[$i] = new Serie("Serie {$i}", rand(1, 8), "Genero {$i}");
}

for ($i = 0; $i < 5; $i++) {
    $videojuegos[$i] = new Videojuego("Videojuego {$i}", rand(1, 8), "Genero {$i}");
}


$series[3]->entregar();



$series[1]->entregar();



$videojuegos[3]->entregar();


$seriesEntregadas = array_filter($series, fn($serie) => $serie->isEntregado());
$videojuegosEntregados = array_filter($videojuegos, fn($videojuego) => $videojuego->isEntregado());
$entregados = array_merge($seriesEntregadas, $videojuegosEntregados);

echo "<p> Hay ".count($entregados) . "entregables entregados.</p>";

foreach ($entregados as $value) {
    $value->devolver();  
}

foreach ($series as $key => $value) {
    echo $key . " " . $value;
}