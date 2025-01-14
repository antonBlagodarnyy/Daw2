<?php 
require_once("cliente.php");
require_once("administradores.php");
require_once("articulos.php");

$administrador1 = new administradores("Administrador1","Apellido1","31906199R",697143616,"email@email.com","27/11/1998");

$articulo1 = new articulos(123,"ropa","Ropa de vestir");

$cliente1 = new cliente("Cliente1","apellido1","31924109X",68321231,"email2@email.com","27/12/1999");

$cliente1->aniadirProducto($articulo1);

echo $cliente1;