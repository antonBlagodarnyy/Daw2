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

echo "<p> Hay " . count($entregados) . " entregables entregados.</p>";

foreach ($entregados as $value) {
    $value->devolver();
}

$horasMayores = 0;
$videojuegoConMasHoras;

foreach ($videojuegos as $videojuego) {
    if ($videojuego->get_horasEstimadas() > $horasMayores) {
        $videojuegoConMasHoras = $videojuego;
        $horasMayores = $videojuego->get_horasEstimadas();
    }
}

echo "<p>Videojuego con mayor numero de horas: " . $videojuegoConMasHoras->get_titulo() . "</p>";

$numTemporadasMayor = 0;
$serieConMasTemporadas;

foreach ($series as $serie) {
    if ($serie->get_numTemporadas() > $numTemporadasMayor) {
        $serieConMasTemporadas = $serie;
        $numTemporadasMayor = $serie->get_numTemporadas();
    }
}

echo "<p>Serie con mayor numero de temporadas: " . $serieConMasTemporadas->get_titulo() . "</p>";

echo "<h2>Series:</h2>";

foreach ($series as $key => $serie) {
    echo "<p>".$serie->__toString()."</p>";
}

echo "<h2>Videojuegos:</h2>";

foreach ($videojuegos as $key => $videojuego) {
    echo "<p>".$videojuego->__toString()."</p>";
}