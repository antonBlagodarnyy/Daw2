<?php
require_once("../connection.php");
function insertNota($idUsuario, $nota, $asignatura)
{
    $db = Database::getConnection();
    $query = "INSERT INTO notas (id_usuario,asignatura,nota) 
    VALUES (:id_usuario,:asignatura,:nota)";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":id_usuario", $idUsuario, $db::PARAM_INT);
    $stmt->bindParam(":asignatura", $asignatura, $db::PARAM_STR);
    $stmt->bindParam(":nota", $nota, $db::PARAM_STR);

    if ($stmt->execute()) {
        return $db->lastInsertId();
    } else {
        return null;
    }

    
}

function selectNotas($idUsuario)
{
    $db = Database::getConnection();
    $query = "SELECT asignatura, nota FROM notas
    WHERE id_usuario = :id_usuario";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id_usuario',$idUsuario,PDO::PARAM_STR);
    $stmt->execute();
    $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $usuario;
}
