<?php
abstract class Vehiculo2 implements iTransporte
{

    protected $marca;
    protected $modelo;
    protected $velocidadActual = 0;

    public function __construct($marca, $modelo) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function acelerar($cantidad)
    {

        $this->velocidadActual += $cantidad;
        if ($this->velocidadActual > iTransporte::VELOCIDAD_MAXIMA)
            $this->velocidadActual = iTransporte::VELOCIDAD_MAXIMA;
    }
    public function detener(){
        $this->velocidadActual=0;
    }
    public function __toString()
    {
        echo "Vehiculo: $this->marca $this->modelo, Velocidad Actual: $this->velocidadActual<br> ";
    }
}
