<?php
require_once("iCliente.php");

class jugador implements iCliente{
    private static $jugadores = [];

    //Para encontrar al jugador en el array
    private static $contadorJugadores = 0;
    private $posicion;

    public $dni;
    public $nombre;
    public $permitido;
    private $edad;

    public function __constructor(string $dni, string $nombre, int $edad){
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->edad = $edad;
        
        $this->posicion = self::$contadorJugadores;
        $contadorJugadores++;

        echo "Creado $nombre";

        array_push(self::$jugadores , [$dni,$this]  );


    }
    public function __destruct(){
        array_diff(self::$jugadores,[$this->dni,$this]);
    }

    public function mayorDeEdad(int $edad){
        return $edad >= 18;
    }

    public function set_edad(int $edad){
        $this->edad = $edad;
        if($this->edad >= 18)
            $this->permitido = true;
        else
            $this->permitido = false;
    }

    public function __toString(){
        return $this->nombre . ', con dni '. $this->dni . ', ' . $this->permitido ? 'esta permitido '. $this->$edad : 'no tiene permitido jugar.' . $this->edad;
    }

    public static function listarClientes(){

        if(empty(self::$jugadores)==0){
        echo "<h2>No hay jugadores</h2>";
        }else{
        foreach (self::$jugadores as $jugador) {
        echo $jugador;
        }
    }
        
    }
    public function aforo(){
        echo array_count_values(self::$jugadores);
    }
        public function ordenarDNI(){}


}