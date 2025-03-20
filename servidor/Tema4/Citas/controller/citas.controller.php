<?php
require_once(__DIR__ . '/../db/conexion.php');
function insertarCita($texto, $autor, $usuario_id)
{
    $conn = conectar();
    $stmt = $conn->prepare("INSERT INTO citas (texto, autor, usuario_id) values(:texto,:autor,:usuario_id)");

    $stmt->bindParam(":texto", $texto, $conn::PARAM_STR);
    $stmt->bindParam(":autor", $autor, $conn::PARAM_STR);
    $stmt->bindParam(":usuario_id", $usuario_id, $conn::PARAM_INT);

    $stmt->execute();

    desconectar($conn);
    return $conn->lastInsertId();
}

// Función para obtener citas
function fetchCitas()
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT c.*, u.nombre AS usuario_nombre
            FROM citas c      JOIN usuarios u  ON c.usuario_id = u.id       ");
    $stmt->execute();
    $citas = [];
    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $citas[] = $fila;
    }

    return $citas;
}
// Obtiene el total de puntos de una cita
function fetchPuntosCita($cita_id)
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT SUM(puntuacion) as puntuacion
                             FROM puntuaciones
                            WHERE cita_id = :cita_id");

    $stmt->bindParam(":cita_id", $cita_id, $conn::PARAM_INT);
    $stmt->execute();
    $puntos = $stmt->fetch(PDO::FETCH_ASSOC);

    return $puntos['puntuacion'];
}
function fetchLike($id_usuario, $id_cita)
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT puntuacion
    FROM puntuaciones
   WHERE cita_id = :cita_id
     AND usuario_id = :usuario_id");

    $stmt->bindParam(":cita_id", $id_cita, $conn::PARAM_INT);
    $stmt->bindParam(":usuario_id", $id_usuario, $conn::PARAM_INT);

    $stmt->execute();
    $like = $stmt->fetch(PDO::FETCH_ASSOC);

    $like ? $output = $like['puntuacion']  : $output = 0;
    return $output;
}
