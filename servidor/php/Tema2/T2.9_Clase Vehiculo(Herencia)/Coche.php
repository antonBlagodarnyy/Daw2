<?php

class Coche extends Vehiculo
{
    private $matricula;
    private $kilometros = 0;

    function __construct($matricula = "")
    {

        if ($matricula === "") {
            $this->matricula = $matricula; // Cadena vacía por defecto
        } else {
            if ($this->validarMatricula($matricula)) {
                $this->matricula = $matricula;
            }
        }
    }
    function get_matricula(): String
    {
        return $this->matricula;
    }
    function set_matricula($matricula)
    {
        if ($this->validarMatricula($matricula))
            $this->matricula = $matricula;
    }
    function get_kilometros()
    {
        return $this->kilometros;
    }

    function puedeCircular()
    {
        return $this->validarMatricula($this->matricula);
    }

    function viajar($kilometros)
    {
        if ($this->puedeCircular() && !$this->isAparcado() && $kilometros > 0) {
            $this->kilometros += $kilometros;
        }
    }
    private function validarMatricula($matricula)
    {
        // Expresión regular para validar matrículas. Modifícala según tu región.
        // Ejemplo: Matrículas de formato español: 4 dígitos seguidos de 3 letras.
        return preg_match('/^\d{4}[B-DF-HJ-NP-TV-Z]{3}$/', strtoupper($matricula));
    }

    public function __toString()
    {
        return parent::__toString() .
            "Matricula: " . $this->get_matricula() . "<br>";
    }
}
