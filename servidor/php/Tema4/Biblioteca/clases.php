<?php

// Clase base para materiales bibliográficos
class Material
{
    private $identificador;
    private $titulo;
    private $disponible = true;
    function __construct(string $identificador, string $titulo)
    {
        $this->identificador = $identificador;
        $this->titulo = $titulo;
    }
    function cambiarDisponibilidad()
    {
        $this->disponible = !$this->disponible;
    }
    function getTitulo()
    {
        return $this->titulo;
    }
    function getIdentificador()
    {
        return $this->identificador;
    }
    function getDisponibilidad(){
        return $this->disponible;
    }
}

// Clase para libros que hereda de Material
class Libro extends Material
{
    private $autor;
    function __construct(string $ISBN, string $titulo,  string $autor)
    {
        parent::__construct($ISBN, $titulo,);
        $this->autor = $autor;
    }
    function getDetalle()
    {
        return $this->autor;
    }
}

// Clase para revistas que hereda de Material
class Revista extends Material
{
    private $numero;
    function __construct(string $ISSN, string $titulo, string $numero)
    {
        parent::__construct($ISSN, $titulo);
        $this->numero = $numero;
    }
    function getDetalle()
    {
        return $this->numero;
    }
}
