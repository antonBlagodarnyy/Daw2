<?php
class Persona
{
    private $nombre;
    private $apellidos;
    private $edad;

    function __construct()
    {
        $this->edad = 18;
    }

    function get_nombre()
    {
        return $this->nombre;
    }
    function get_apellidos()
    {
        return $this->apellidos;
    }
    function get_edad()
    {
        return $this->edad;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
    function setEdad($edad)
    {
        $this->edad = $edad;
    }

    function mayorEdad(): bool
    {
        return $this->edad > 18;
    }
    function nombreCompleto(): string
    {
        return $this->nombre . " " . $this->apellidos;
    }
}
