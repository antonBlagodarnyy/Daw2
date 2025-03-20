<?php
class Usuario
{
    private static $contadorId = 0;
    private $nombre;
    private $edad;
    public $idUsuario;
    public function __construct(string $nombre, int $edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->idUsuario = self::$contadorId;
        self::$contadorId++;
        echo "Usuario $this->nombre registrado.";

    }
    public function __destruct()
    {
        echo "Usuario $this->nombre eliminado.";
    }
    public function viajar($transporte, int $distancia){
        
    }
}
