<?php
require_once("cliente.php");
require_once("fotocopia.php");

$pepe = new Cliente("Pepe");
$fotocopia1 = new fotocopia(10,10);

echo 'Tamaño de la fotocopia: '. $fotocopia1->calcularEspacio();

$pepe->comprar($fotocopia1);

echo $fotocopia1->__toString();

echo 