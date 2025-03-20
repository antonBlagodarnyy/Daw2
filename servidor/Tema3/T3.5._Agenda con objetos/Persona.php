<?php
class Persona {
    private $nombre;
    private $telefono;

    public function __construct($nombre, $telefono) {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function __toString() {
        return "Nombre: " . $this->nombre . ", Teléfono: " . $this->telefono;
    }
}