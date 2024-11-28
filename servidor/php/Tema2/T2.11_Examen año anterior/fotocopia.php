<?php
require_once("papel.php");
class fotocopia extends Papel{
    private $color;

    public function __construct(int $alto, int $largo, bool $dobleCara = false)
    {
        parent::__construct($alto,$largo,$dobleCara);
    }
}