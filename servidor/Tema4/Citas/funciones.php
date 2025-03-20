<?php
require_once('parametros.php');
require_once(__DIR__ . '/controller/citas.controller.php');
require_once(__DIR__ . '/db/conexion.php');


// Función para obtener la cita más valorada
function obtener_cita_destacada()
{
    //COMPLETAR
    $conn = conectar();
    $stmt = $conn->prepare("
            SELECT c.texto, c.autor, (rp.likes - rp.dislikes) AS puntuacion
            FROM citas c LEFT JOIN resumen_puntuaciones rp ON c.id = rp.cita_id
            ORDER BY puntuacion DESC 
            LIMIT 1
        ");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


// Función para votar cita
function votar_cita($usuario_id, $cita_id, $puntuacion)
{
    $conn = conectar();
    $stmt = $conn->prepare("INSERT INTO puntuaciones (usuario_id, cita_id, puntuacion) 
                                VALUES (:usuario_id, :cita_id, :puntuacion)
                                    ON DUPLICATE KEY UPDATE puntuacion = :puntuacion");

    $stmt->bindParam(":puntuacion", $puntuacion, $conn::PARAM_INT);
    $stmt->bindParam(":cita_id", $cita_id, $conn::PARAM_INT);
    $stmt->bindParam(":usuario_id", $usuario_id, $conn::PARAM_INT);

    $stmt->execute();

    return $conn->lastInsertId();
}


// Actualizar puntuacion en bbdd cuando pulsan megusta
function meGusta($usuario_id, $cita_id)
{
    votar_cita($usuario_id, $cita_id, 1);
}

// Actualizar puntuacion en bbdd cuando pulsan nomegusta
function noMeGusta($usuario_id, $cita_id)
{
    votar_cita($usuario_id, $cita_id, -1);
}
