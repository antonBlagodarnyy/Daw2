<?php
require_once(__DIR__ . "/../connection/connection.php");

function fetchEsFavorito(int $idUsuario, int $idReceta)
{
    $conn = conectar();
    $query = "SELECT COUNT(*) AS column_exists FROM favoritos 
    WHERE usuario_id = :usuario_id AND receta_id = :receta_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':usuario_id', $idUsuario, PDO::PARAM_STR);
    $stmt->bindParam(':receta_id', $idReceta, PDO::PARAM_STR);
    $stmt->execute();
    $favorito =  $stmt->fetch(PDO::FETCH_COLUMN);
    desconectar($conn);
    return $favorito;
}
function createFavorito(int $usuarioId, int $recetaId)
{
    $conn = conectar();
    $query = "INSERT INTO favoritos (receta_id ,usuario_id ) VALUES (:receta_id,:usuario_id)";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":receta_id", $recetaId, $conn::PARAM_INT);
    $stmt->bindParam(":usuario_id", $usuarioId, $conn::PARAM_INT);


    $stmt->execute();

    desconectar($conn);
    return $conn->lastInsertId();
}
function deleteFavorito(int $usuarioId, int $recetaId)
{
    $conn = conectar();
    $query = "DELETE FROM favoritos 
    WHERE receta_id = :receta_id AND usuario_id = :usuario_id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":receta_id", $recetaId, $conn::PARAM_INT);
    $stmt->bindParam(":usuario_id", $usuarioId, $conn::PARAM_INT);


    $stmt->execute();

    desconectar($conn);
    return $stmt->rowCount() > 0;
}
function fetchPuntuacion(int $idReceta)
{
    $conn = conectar();
    $query = "SELECT AVG(puntuacion) AS puntuacionMedia FROM comentarios 
    WHERE receta_id = :receta_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':receta_id', $idReceta, PDO::PARAM_STR);
    $stmt->execute();
    $puntuacionMedia =  (float)$stmt->fetch(PDO::FETCH_COLUMN);

    desconectar($conn);
    return $puntuacionMedia;
}

function fetchValoracion(int $idUsuario, int $idReceta)
{
    $conn = conectar();
    $query = "SELECT *  FROM comentarios 
    WHERE usuario_id = :usuario_id AND receta_id = :receta_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':usuario_id', $idUsuario, PDO::PARAM_STR);
    $stmt->bindParam(':receta_id', $idReceta, PDO::PARAM_STR);
    $stmt->execute();
    $valoracion =  $stmt->fetch(PDO::FETCH_ASSOC);
    desconectar($conn);
    return $valoracion;
}
function createValoracion(int $idUsuario, int $idReceta, string $comentario, int $puntuacion)
{
    $conn = conectar();
    $query = "INSERT INTO comentarios (receta_id ,usuario_id , comentario, puntuacion ) VALUES (:receta_id,:usuario_id,:comentario, :puntuacion)";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":receta_id", $idReceta, $conn::PARAM_INT);
    $stmt->bindParam(":usuario_id", $idUsuario, $conn::PARAM_INT);
    $stmt->bindParam(":comentario", $comentario, $conn::PARAM_STR);
    $stmt->bindParam(":puntuacion", $puntuacion, $conn::PARAM_INT);

    $stmt->execute();

    desconectar($conn);
    return $conn->lastInsertId();
}
function updateValoracion(int $idUsuario, int $idReceta, string $comentario, int $puntuacion)
{
    $conn = conectar();
    $query = "UPDATE comentarios 
    SET comentario = :comentario, puntuacion = :puntuacion 
    WHERE receta_id = :receta_id  AND usuario_id = :usuario_id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":receta_id", $idReceta, $conn::PARAM_INT);
    $stmt->bindParam(":usuario_id", $idUsuario, $conn::PARAM_INT);
    $stmt->bindParam(":comentario", $comentario, $conn::PARAM_STR);
    $stmt->bindParam(":puntuacion", $puntuacion, $conn::PARAM_INT);

    $stmt->execute();

    desconectar($conn);
    return $stmt->rowCount() > 0;
}
