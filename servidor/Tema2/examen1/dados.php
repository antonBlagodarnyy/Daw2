<?php
require_once("juegoAzar.php");

class dados extends juegoAzar
{
    const DADOS = [1, 2, 3, 4, 5, 6];
    const JUEGO = "JUEGO";
    public $nombreJuego;
    public $numRondas;
    public $ganador;

    public function __construct(int $numRondas)
    {
        parent::__construct(self::JUEGO);
        $this->numRondas = $numRondas;
    }

    public function tirar(array $jugadores)
    {

        foreach ($jugadores as $key => $value) { //Recorremos los jugadores
            if ($value->permitido) { //Nos aseguramos de que sea mayor de edad

                $rondas = []; //Creamos el array de rondas que va en el jugador
                for ($i = 0; $i < $this->numRondas; $i++) {
                    array_push($rondas, self::DADOS[rand(0, 5)]);
                }

                $this->tirada[$key] = $rondas; //Atribuimos las rondas al jugador
            }
        }
    }

    public function mostrarJugada()
    {
        foreach ($this->tirada as $key => $value) {
            echo "<p>Jugada de $key</p>";
            $this->mostrarTirada($value);
        }
    }

    function mostrarTirada($dados)
    {
        foreach ($dados as $k => $v) {
            $this->mostrarDado($v);
        }
    }
    function mostrarDado($dado)
    {
        switch ($dado) {
            case 1:
                echo "<img src=\"dados/1.svg\">";
                break;
            case 2:
                echo "<img src=\"dados/2.svg\">";
                break;
            case 3:
                echo "<img src=\"dados/3.svg\">";
                break;
            case 4:
                echo "<img src=\"dados/4.svg\">";
                break;
            case 5:
                echo "<img src=\"dados/5.svg\">";
                break;
            case 6:
                echo "<img src=\"dados/6.svg\">";
                break;
            default:
                echo "error en switch
                             valor:  $dado";
        }
    }

    public function obtenerGanador():string {
        $puntos=0;
        
        foreach ($this->tirada as $key => $value) {
            $puntosJugador = $this->contarPuntos($value);
            if($puntos<$puntosJugador){
                $puntos=$puntosJugador;
                $this->ganador = $key;
            }
            
        }

        return "<p>El ganador de la partida es $this->ganador</p>";
    }

    private function contarPuntos(array $dados):int{
       $puntos=0;
        for ($i=0; $i < count($dados); $i++) { 
        $puntos+=$dados[$i];
       }
       return $puntos;
    }
       
    
    public function __toString() {
        $respuesta= parent::__toString();
         $respuesta .= $this->obtenerGanador();
         return $respuesta;
    }
}
