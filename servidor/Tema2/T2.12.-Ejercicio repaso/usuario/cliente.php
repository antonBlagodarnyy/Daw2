<?php 
require_once("usuario.php");
class cliente extends usuario{
 private $carrito = [];

    function __toString()
    {
        $parentString = parent::__toString(); 
        $carritoString = "Carrito: " . implode(", ", $this->carrito);
        return $parentString . " | " . $carritoString;
    }

    function aniadirProducto($producto){
        array_push($this->carrito,$producto);
    }

}