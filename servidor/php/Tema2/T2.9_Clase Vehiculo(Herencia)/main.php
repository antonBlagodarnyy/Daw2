<?php
require_once("Vehiculo.php");
require_once("Coche.php");
$miBicicleta = new Vehiculo();

$miBicicleta->set_marca("Orbea");
$miBicicleta->set_plazas(4);
$miBicicleta->set_color("Rosa");
$miBicicleta->arrancar();

echo $miBicicleta->__toString();

$miCoche = new Coche("1234FDG");

echo $miCoche->__toString();
