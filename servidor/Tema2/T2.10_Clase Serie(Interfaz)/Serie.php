<?php
class Serie
{
    private $titulo;
    private $numTemporadas;
    private $entregado;
    private $genero;

    function __construct(string $titulo, int $numTemporadas, string $genero)
    {
        $this->titulo = $titulo;
        $this->numTemporadas = $numTemporadas;
        $this->genero = $genero;
        $this->entregado = false;
    }

    function get_titulo(): string
    {
        return $this->titulo;
    }
    function get_numTemporadas(): int
    {
        return $this->numTemporadas;
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
        $this->numTemporadas = $numTemporadas;
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
            Numero temporadas: " . $this->numTemporadas . "<br>
            Genero: " . $this->genero . "<br>
            Entregado: " . ($this->isEntregado() ? "Si" : "No") . "<br>";
    }
}
