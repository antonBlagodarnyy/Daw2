<?php
class Vehiculo
{
    private $marca;
    private $color;
    private $plazas;
    private $aparcado = true;

    function __construct(int $plazas = 0)
    {
        $this->plazas = $plazas;
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
        if ($marca > 0)
            $this->marca = $marca;
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
            "Aparcado: " . $this->aparcado . "<br>";
    }
}
