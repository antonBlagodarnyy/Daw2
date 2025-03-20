<?php
class Usuario
{
    private $nombre;
    private $clave;
    private $color = "white";
    function __construct(string $nombre, string $clave)
    {
        $this->nombre = $nombre;
        $this->clave = $clave;
    }
    function setColor(string $color)
    {
        $this->color = $color;
    }
    function getNombre()
    {
        return $this->nombre;
    }
    function getColor()
    {
        return $this->color;
    }
}

class Mensaje
{
    private $autor;
    private $mensaje;
    function __construct(string $autor, string $mensaje)
    {
        $this->autor = $autor;
        $this->mensaje = $mensaje;
    }
    function __toString()
    {
        return $this->autor . ": " . $this->mensaje;
    }
}
