<?php
class Papel{
   static public $paginasGastadas;
   static public $paginasRecicladas;
    protected $dobleCara;
    private $alto;
    private $largo;

public function __construct(int $alto, int $largo, bool $dobleCara)
{
    $this->alto = $alto;
    $this->largo = $largo;
    $this->dobleCara = $dobleCara;
}
public function calcularEspacio(){}

public function getDobleCara():bool{
    return $this->dobleCara;
}

public function __toString()
{
    return "Se usa un papel de tamaño (alto x largo): $this->alto x $this->largo.";
}

}
