<?php
interface iCliente{
    const LIMITE_EDAD = 18;
    public static function listarClientes();
    public static function aforo();
    public static function ordenarDNI();
    
}