<?php

class juegoAzar {
    protected $nombreJuego;
    protected $tirada = [];

    public function __construct($nombre){
        $this->nombreJuego = $nombre;
        $this->tirada = [];
    }

    public function tirar(array $jugadores){}

    public function obtenerGanador(){}

    public function __toString(){
        return "$this->nombreJuego";
    }
}