<?php
require_once 'clases.php';


// Función para leer movimientos de un usuario específico
function leerMovimientos($dni)
{
    return unserialize(file_get_contents($dni . '.dat'));
}

// Función para guardar todos los movimientos de un usuario
function guardarMovimientos($dni, $movimientos)
{
    file_put_contents($dni . '.dat', serialize($movimientos));
}

// Función para añadir un nuevo movimiento
function anadirMovimiento($dni, $movimiento) {}
