<?php
require_once('parametros.php');

// Iniciar sesión y conexión a base de datos
session_start();

// Función para obtener la cita más valorada
function obtener_cita_destacada()
{
    //COMPLETAR
    /*     $stmt = $pdo->prepare("
            SELECT c.texto, c.autor, (rp.likes - rp.dislikes) AS puntuacion
            FROM citas c LEFT JOIN resumen_puntuaciones rp ON c.id = rp.cita_id
            ORDER BY puntuacion DESC 
            LIMIT 1
        "); */
}



// Función de registro





// Función para votar cita
function votar_cita($usuario_id, $cita_id, $puntuacion)
{
    /* $stmt = $pdo->prepare("INSERT INTO puntuaciones (usuario_id, cita_id, puntuacion) 
                                VALUES (:usuario_id, :cita_id, :puntuacion)
                                    ON DUPLICATE KEY UPDATE puntuacion = :puntuacion"); */
}


// Actualizar puntuacion en bbdd cuando pulsan megusta
function meGusta($usuario_id, $cita_id) {}

// Actualizar puntuacion en bbdd cuando pulsan nomegusta
function noMeGusta($usuario_id, $cita_id) {}

// Obtiene el total de puntos de una cita
function obtener_puntos_cita($cita_id)
{
    // COMPLETAR
    /*     $stmt = $pdo->prepare("SELECT SUM(puntuacion) as puntuacion
                             FROM puntuaciones
                            WHERE cita_id = :cita_id"); */
}

// Obtiene los puntos que un usuario ha dado a una cita
function obtener_puntos_cita_usuario($usuario_id, $cita_id)
{
    // COMPLETAR
    /*     $stmt = $pdo->prepare("SELECT puntuacion
                             FROM puntuaciones
                            WHERE cita_id = :cita_id
                              AND usuario_id = :usuario_id"); */
}
