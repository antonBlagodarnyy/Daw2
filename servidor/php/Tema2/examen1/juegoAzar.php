<?php

class juegoAzar {
    protected $nombreJuego;
    protected $tirada = [];

    public function __constructor($nombre){
        $this->nombreJuego = $nombre;

    }

    public function tirar(){}

    public function obtenerGanador(){}

    public function __toString(){
        return "$nombreJuego";
    }
}