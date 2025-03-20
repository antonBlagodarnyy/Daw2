<?php
require_once("../connection.php");
function insertUsuario($nombre, $dni, $telefono, $email, $ciudad, $contrasenia, $tipo)
{
    $db = Database::getConnection();
    $query = "INSERT INTO usuarios (dni,nombre,telefono,email,ciudad,clave,rol) 
    VALUES (:dni,:nombre,:telefono,:email,:ciudad,:clave,:rol)";

    $stmt = $db->prepare($query);

    $stmt->bindParam(":dni", $dni, $db::PARAM_STR);
    $stmt->bindParam(":nombre", $nombre, $db::PARAM_STR);
    $stmt->bindParam(":telefono", $telefono, $db::PARAM_STR);
    $stmt->bindParam(":email", $email, $db::PARAM_STR);
    $stmt->bindParam(":ciudad", $ciudad, $db::PARAM_STR);

    $contrasenia = password_hash($contrasenia, PASSWORD_BCRYPT);
    $stmt->bindParam(":clave", $contrasenia, $db::PARAM_STR);

    $stmt->bindParam(":rol", $tipo, $db::PARAM_STR);

    if ($stmt->execute()) {
        echo "Usuario agregado con exito";
    } else {
        echo "Error al insertar el usuario";
    }

    return $db->lastInsertId();
}

function selectUsuario($email)
{
    $db = Database::getConnection();
    $query = "SELECT id,dni,nombre,telefono,email,ciudad,clave,rol FROM USUARIOS
    WHERE email = :email";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':email',$email,PDO::PARAM_STR);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    return $usuario;
}

function selectUsuarioNombre($nombre){
    $db = Database::getConnection();
    $query = "SELECT id,rol FROM USUARIOS
    WHERE nombre = :nombre";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':nombre',$nombre,PDO::PARAM_STR);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    return $usuario;
}