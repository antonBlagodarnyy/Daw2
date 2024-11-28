<?php
class Cliente
{
    private $nombre;
    private $producto;
    public $apodo;
    public static $clientela = 0;

    public function __construct(string $nombre, string $producto = "")
    {
        self::$clientela++;
        $this->nombre = $nombre;
        $this->producto = $producto;
        echo "<p>" . $this->nombre . "creado.</p>";
    }
    public function __destruct()
    {
        self::$clientela--;
    }
    public function comprar($prod): void
    {
        $this->producto = $prod;
    }
    public function getProducto(): string
    {
        return $this->producto;
    }
    public function mostrar(): void
    {
        echo "<p>" . $this->nombre . "que es conocido como " . $this->apodo . "</p>";
    }
}
