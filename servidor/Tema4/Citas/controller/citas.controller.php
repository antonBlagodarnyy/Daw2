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
