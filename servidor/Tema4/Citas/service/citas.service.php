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
function obtenerPuntosCita($cita_id)
{
    $puntos = fetchPuntosCita($cita_id);
    if ($puntos) {
        $mensaje = 'Datos recogidos con exito';
    } else {
        $mensaje = 'No se recogieron puntos';
    }
    return ['mensaje' => $mensaje, 'puntos' => $puntos];
}

function obtenerLike($citaId, $usuario_id)
{

    return ['like' => fetchLike($usuario_id, $citaId), 'mensaje' => 'Like recogido con exito.'];
}
