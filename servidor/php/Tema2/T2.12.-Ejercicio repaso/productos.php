<?php
require_once("stock.php");
 abstract class productos implements stock
{

    const IVA = 21;

    private $catalogo = [];

    private $codigoProducto;
    private $nombre;
    private $descripcion;
    function __construct(Int $codigoProducto, String $nombre, String $descripcion)
    {
        $this->nombre = $nombre;
        $this->codigoProducto = $codigoProducto;
        $this->descripcion = $descripcion;
    }
    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __toString()
    {
        $info =  '| Nombre: ' . $this->nombre . ' | Codigo producto: ' . $this->codigoProducto . ' | Descripcion ' . $this->descripcion . ' | Catalogo: ' . implode(', ', $this->catalogo);
        return $info;
    }

   public abstract function coste();
    
}
 