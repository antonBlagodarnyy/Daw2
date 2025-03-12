<?php
require_once(__DIR__ . "/../connection/connection.php");
function ocurrenciaRecetas()
{
    $ocurrencias = null;
    $conn = conectar();
    $query = "SELECT receta_id, COUNT(*) AS occurrences
    FROM favoritos
    GROUP BY receta_id";

    $stmt = $conn->prepare($query);
    $stmt->execute();


    if ($stmt->execute()) {
        $ocurrencias =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "No se ha encontrado receta favorita";
    }

    return $ocurrencias;
}

function fetchRecetas()
{
    $conn = conectar();
    $query = "SELECT * FROM recetas";
    $stmt = $conn->prepare($query);

    $stmt->execute();
    $recetas =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    desconectar($conn);
    return $recetas;
}
function fetchReceta($idReceta)
{
    $conn = conectar();
    $query = "SELECT * FROM recetas WHERE id = :id;";
    $stmt = $conn->prepare($query);
    $stmt->bindParam('id', $idReceta, PDO::PARAM_STR);
    $stmt->execute();
    $receta =  $stmt->fetch(PDO::FETCH_ASSOC);
    desconectar($conn);
    return $receta;
}
function fetchCategoria($id)
{
    $conn = conectar();
    $query = "SELECT * FROM categorias WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam('id', $id, PDO::PARAM_STR);
    $stmt->execute();
    $categoria =  $stmt->fetch(PDO::FETCH_ASSOC);
    desconectar($conn);
    return $categoria['nombre'];
}
