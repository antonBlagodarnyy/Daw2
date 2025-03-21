<?php
// Clase base para movimientos
class Movimiento {
    private $fecha;
    private $concepto;
    private $cantidad;
    function __construct(DateTime $fecha, string $concepto, float $cantidad)
    {
        $this->fecha = $fecha;
        $this->concepto = $concepto;
        $this->cantidad = $cantidad;
    }
    function mostrarInfo(){
        return $this->fecha . ' ' . $this->concepto . ' ' . $this->cantidad;
    }
    function getFecha(){
        return $this->fecha;
    }
    function getConcepto(){
        return $this->concepto;
    }
    function getCantidad(){
        return $this->cantidad;
    }
}

// Clase para gastos
class Gasto extends Movimiento{
    private $destinatario;
    function __construct(DateTime $fecha, string $concepto, float $cantidad, string $destinatario)
    {
        parent::__construct($fecha,$concepto,$cantidad);
        $this->destinatario = $destinatario;
    }
    function mostrarInfo()
    {
        return parent::mostrarInfo() . ' ' . $this->destinatario;
    }
    function getDesdeHacia(){
        return $this->destinatario;
    }
}

// Clase para ingresos
class Ingreso extends Movimiento{
    private $origen;
    function __construct(DateTime $fecha, string $concepto, float $cantidad, string $origen)
    {
        parent::__construct($fecha,$concepto,$cantidad);
        $this->origen = $origen;
    }
    function mostrarInfo()
    {
        return parent::mostrarInfo() . ' ' . $this->origen;
    }
    function getDesdeHacia(){
        return $this->origen;
    }
}
?>