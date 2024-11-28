<?php
require_once("iEntregable.php");
class Videojuego implements iEntregable
{
    private $titulo;
    private $horasEstimadas;
    private $entregado;
    private $genero;

    function __construct(string $titulo, int $horasEstimadas, string $genero)
    {
        $this->titulo = $titulo;
        $this->horasEstimadas = $horasEstimadas;
        $this->genero = $genero;
        $this->entregado = false;
    }

    function get_titulo(): string
    {
        return $this->titulo;
    }
    function get_horasEstimadas(): int
    {
        return $this->horasEstimadas;
    }
    function get_genero(): string
    {
        return $this->genero;
    }

    function set_titulo($titulo): void
    {
        $this->titulo = $titulo;
    }
    function set_numTemporadas($numTemporadas): void
    {
        $this->horasEstimadas = $numTemporadas;
    }
    function set_genero($genero): void
    {
        $this->genero = $genero;
    }

    function entregar(): void
    {
        $this->entregado = true;
    }
    function devolver(): void
    {
        $this->entregado = false;
    }
    function isEntregado(): bool
    {
        return  $this->entregado;
    }

    function __toString(): string
    {
        return "Titulo: " . $this->titulo . "<br>
            Numero temporadas: " . $this->horasEstimadas . "<br>
            Genero: " . $this->genero . "<br>
            Entregado: " . ($this->isEntregado() ? "Si" : "No") . "<br>";
    }
}
