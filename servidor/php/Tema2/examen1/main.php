<?php
require_once("jugador.php");
require_once("dados.php");

jugador::listarClientes();
$fran = new jugador ("111111111A", "Fran");

echo $fran;

$susana = new jugador("333333333C", "Susana", 5);

echo $susana;

$andres = new jugador ("222222222B", "Andres", 39);

echo $andres;

$samuel = new jugador ("444444444D", "Andres", 36);

echo $samuel;

jugador::listarClientes();

jugador::aforo();

$partidaDados = new dados(3);

$partidaDados->tirar(jugador::getJugadores());

$partidaDados->mostrarJugada();

echo $partidaDados->obtenerGanador();