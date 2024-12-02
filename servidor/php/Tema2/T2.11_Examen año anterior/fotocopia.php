<?php
require_once("papel.php");
class fotocopia extends Papel
{
    private $color;

    public function __construct(int $alto, int $largo, bool $dobleCara = false)
    {
        parent::__construct($alto, $largo, $dobleCara);
        parent::$paginasGastadas++;
    }
    public function calcularEspacio()
    {
        return $this->largo * $this->alto;
    }
    public function __destruct()
    {
        parent::$paginasRecicladas++;
    }
    public function __toString()
    {
        return parent::__toString() + parent::getDobleCara();
    }
}
