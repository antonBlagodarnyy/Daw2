<?php
require_once("papel.php");
require_once("iembalaje.php");

class libro extends papel implements iembalaje
{
    private const DOBLE_CARA = true;

    public $libro;
    private $paginas;
    private $alto;
    public function __construct($largo, $ancho, $pagina)
    {
        parent::__construct($largo, $ancho, self::DOBLE_CARA);
        $this->paginas = $pagina;
        $this->alto = $pagina / 100;
        parent::$paginasGastadas += $pagina;
    }

    public function __destruct()
    {
        parent::$paginasRecicladas += $this->paginas;
    }

    // Métodos mágicos
    public function __get($propiedad)
    {
        if (property_exists($this, $propiedad)) {
            return $this->$propiedad;
        }
    }

    public function __set($propiedad, $valor)
    {

        return $this->$propiedad = $valor;
    }

    public function embalar($unidades)
    {
        $largo = $this->largo + (iembalaje::margen * 2);
        $alto = $this->alto + (iembalaje::margen * 2);
        $ancho = $this->ancho * $unidades + (iembalaje::margen * 2);
        $this->volumenEnvoltorio =  $largo * $ancho * $alto;
    }
}
