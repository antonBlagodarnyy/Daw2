<?php
class servicios extends productos
{
    private $periodoPrueba;
    private $cuotaMensual;


    public function __construct(Int $codigoProducto, String $nombre, String $descripcion, Int $periodoPrueba, Float $cuotaMensual)
    {

        parent::__construct($codigoProducto, $nombre, $descripcion);


        $this->periodoPrueba = $periodoPrueba;
        $this->cuotaMensual = $cuotaMensual;
    }

    public function coste()
    {

        return $this->cuotaMensual * parent::IVA / 100;
    }
}
