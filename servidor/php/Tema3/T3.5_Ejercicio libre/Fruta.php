<?php
 class Fruta {
    private $nombre;
    private $cantidad;

    public function __construct(string $nombre, float $cantidad) {
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
    }


    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getCantidad(): float {
        return $this->cantidad;
    }

    public function setCantidad(float $cantidad): void {
        $this->cantidad = $cantidad;
    }

    public function __toString(): string {
        return "Fruta: " . $this->nombre . ", Cantidad: " . $this->cantidad . " kg";
    }
}

?>