<?php
interface iCliente{
    const LIMITE_EDAD = 18;
    public static function listarClientes();
    public function aforo();
    public function ordenarDNI();
    
}