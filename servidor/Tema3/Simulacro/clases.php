<?php
class Alumno {
    private $nombre;
    private $tipo;
    private $notas = [];

    function __construct(string $nombre, string $tipo)
    {
        $this->nombre = $nombre;
        $this->tipo = $tipo;
    }
    public function getNombre():string{
        return $this->nombre;
    }
    public function getTipo():string{
        return $this->tipo;
    }
    public function getNotas():array{
        return $this->notas;
    }
    public function setNombre(string $nombre): void{
        $this->nombre = $nombre;
    }
    public function setTipo(string $tipo): void{
        $this->tipo = $tipo;
    }
    public function aniadirNota(string $asignatura, int $nota){
        $this->notas[$asignatura] = $nota;
    }

}

class Profesor {
    private $nombre;
    private $tipo;

    function __construct(string $nombre, string $tipo)
    {
        $this->nombre = $nombre;
        $this->tipo = $tipo;
    }
    public function getNombre():string{
        return $this->nombre;
    }
    public function getTipo():string{
        return $this->tipo;
    }
    public function setNombre(string $nombre): void{
        $this->nombre = $nombre;
    }
    public function setTipo(string $tipo): void{
        $this->tipo = $tipo;
    }

}
?>