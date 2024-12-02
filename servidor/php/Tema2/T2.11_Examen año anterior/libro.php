<?php

require_once("iembalaje.php");

class libro extends papel implements iembalaje {
    public $libro;
    private $paginas;
    private $ancho ;
    
    public function __construct(int $alto, int $largo, bool $dobleCara = false)
    {
        $this->ancho = $paginas/100;
        parent::__construct($alto, $largo, $dobleCara);
        
    }
}