<?php
class Vehiculo
{
    private $marca;
    private $color;
    private $plazas;
    private $aparcado = true;

    function __construct(string $marca, string $color, $plazas = 0)
    {
        $this->marca = $marca;
        $this->color = $color;

        if ($plazas >= 0 && is_int($plazas))
            $this->plazas = $plazas;
        else
            throw new Exception("Plazas negativas");
    }

    //Gets
    function get_marca(): String
    {
        return $this->marca;
    }
    function get_color(): String
    {
        return $this->color;
    }
    function get_plazas(): int
    {
        return $this->plazas;
    }

    //Sets
    function set_marca($marca)
    {
        $this->marca = $marca;
    }
    function set_color($color)
    {
        $this->color = $color;
    }
    function set_plazas(int $plazas)
    {
        if ($plazas > 0)
            $this->plazas = $plazas;
    }

    function aparcar()
    {
        $this->aparcado = true;
    }
    function arrancar()
    {
        $this->aparcado = false;
    }

    function isAparcado(): bool
    {
        return $this->aparcado;
    }

    function __toString()
    {
        return "Marca: " . $this->marca . "<br>" .
            "Color: " . $this->color . "<br>" .
            "Plazas: "  . $this->plazas . "<br>" .
            "Aparcado: " . ($this->isAparcado() ? 'Yes' : 'No')  . "<br>";
    }
}
