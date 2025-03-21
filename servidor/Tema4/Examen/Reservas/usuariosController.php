<?php
require_once('connection.php');

function fetchUsuarioByEmail(string $email)
{
    $conn = conectar();
    $query = "SELECT * FROM profesores WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam('email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $usuario =  $stmt->fetch(PDO::FETCH_ASSOC);
    desconectar($conn);
    return $usuario;
}
function insertUsuario(string $email, string $nombre, string $contrasenia)
{
    $conn = conectar();
    $query = "INSERT INTO profesores (nombre,email, password) VALUES (:nombre,:email,:password)";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":nombre", $nombre, $conn::PARAM_STR);
    $stmt->bindParam(":email", $email, $conn::PARAM_STR);
    $stmt->bindParam(":password", $contrasenia, $conn::PARAM_STR);

    $stmt->execute();

    desconectar($conn);
    return $conn->lastInsertId();
}
