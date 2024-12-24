<?php
require_once("iCliente.php");

class jugador implements iCliente
{
    private static $jugadores = [];

    public $dni;
    public $nombre;
    public $permitido;
    private $edad;

    public function __construct(string $dni, string $nombre, int $edad= 0)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->set_edad($edad);

        echo "<p>Creado $this->nombre</p>";

        self::$jugadores[$dni] = $this;
    }
    public function __destruct()
    {
        unset(self::$jugadores[$this->dni]);
        echo "Eliminado $this->nombre";
    }

    public function mayorDeEdad(int $edad)
    {
        return $edad >= iCliente::LIMITE_EDAD;
    }

    public function set_edad(int $edad)
    {
        $this->edad = $edad;
        if ($this->edad >= iCliente::LIMITE_EDAD)
            $this->permitido = true;
        else
            $this->permitido = false;
    }

    public function __toString()
    {
        $respuesta= "<p>$this->nombre , con dni  $this->dni ,";
       
         $this->permitido ? $respuesta .= " tiene permitido  jugar ($this->edad años)</p>"
         :  $respuesta .= " no tiene permitido jugar  ($this->edad años)</p>";
         return  $respuesta;
    }

    public static function listarClientes()
    {

        if (empty(self::$jugadores) == 1) {
            echo "<h2>No hay jugadores</h2>";
        } else {
            echo "<h2>Listado de jugadores</h2>";
            foreach (self::$jugadores as $jugador) {
                echo $jugador;
            }
        }
    }
    public static function aforo()
    {
        echo "<p>Hay ".count(self::$jugadores)." jugadores</p>" ;
    }

    public static function ordenarDNI() {
        sort(self::$jugadores);
    }
    public static function getJugadores():array{
        return self::$jugadores;
    }
}
