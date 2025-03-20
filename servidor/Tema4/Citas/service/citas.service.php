<?php
require_once(__DIR__ . '/../controller/citas.controller.php');

// Función para crear cita
function crear_cita($texto, $autor, $usuario_id)
{
    if (insertarCita($texto, $autor, $usuario_id)) {
        $mensaje = 'Cita insertada con exito';
    } else {
        $mensaje = 'Error al insertar la cita';
    }
    return $mensaje;
}
function obtenerCitas()
{
    $citas = fetchCitas();

    if ($citas)
        $mensaje = 'Citas recuperadas con exito.';
    else $mensaje = 'Error al recuperar las citas.';

    return ['mensaje' => $mensaje, 'citas' => $citas];
}
