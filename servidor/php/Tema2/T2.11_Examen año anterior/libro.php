<?php
require_once("papel.php");
require_once("iembalaje.php");

class libro extends papel implements iembalaje {
    public $libro;
    private $paginas;
    private $ancho = $paginas/100;
    public function __construct()
    {
        parent::$do
    }
}