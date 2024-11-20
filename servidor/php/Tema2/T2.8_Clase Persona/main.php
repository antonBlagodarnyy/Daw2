<?php
require_once("Persona.php");

$PersonaA = new Persona();

$PersonaA->setNombre("Anton");
$PersonaA->setApellidos("Blagodarnyy");
$PersonaA->setEdad(25);

echo "<p>".$PersonaA->nombreCompleto()."</p>";

echo "<p>".var_dump($PersonaA->mayorEdad())."</p>";

