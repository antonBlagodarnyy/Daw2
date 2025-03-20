<?php
interface iTransporte{
    const VELOCIDAD_MAXIMA = 120;
    public function calcularTiempo($distancia);
    
}