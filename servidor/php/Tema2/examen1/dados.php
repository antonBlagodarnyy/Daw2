<?php
class dados extends juegoAzar{
    const DADOS = [1,2,3,4,5,6];
    CONST JUEGO = "JUEGO";
    public $nombreJuego;
    public $numRondas;

    public function __construct(int $numRondas){
        $this->numRondas = $numRodas;
        $this->nombreJuego = self::JUEGO;
    }

    public function tirar(){

    }
    public function mostrarJugada(){

    }
    public function obtenerGanador(){

    }
    public function __toString(){

        
    }
}