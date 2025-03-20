<?php

class Bicicleta extends Vehiculo2
{
    const VELOCIDAD_MAXIMA_BICICLETA = 25;
    private $tipo;
    public function __construct(string $marca, string $modelo, string $tipo)
    {
        parent::__construct($marca, $modelo);
        $this->tipo = $tipo;
    }
    public function acelerar($cantidad){
        $this->velocidadActual += $cantidad;
        if ($this->velocidadActual > self::VELOCIDAD_MAXIMA_BICICLETA)
            $this->velocidadActual = self::VELOCIDAD_MAXIMA_BICICLETA;
    }
    public function __toString()
    {
        echo "Bicicleta $this->tipo: $this->marca $this->modelo";
    }
    public function calcularTiempo($distancia)
    {
        
    }
}
