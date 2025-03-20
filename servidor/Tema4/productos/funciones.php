<?php

require_once('parametros.php');

function conectar()
{
    try {
        $connection = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USERNAME, PASSWORD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (PDOException $e) {
        echo "Error de conexion: " . $e->getMessage();
        exit();
    }
}

function desconectar($conexion)
{
    $conexion = NULL;
}

function crearProducto($nombre, $descripcion, $precio)
{
    $conn = conectar();
    $query = "INSERT INTO productos (nombre,descripcion,precio) VALUES (:nombre,:descripcion,:precio)";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":nombre", $nombre, $conn::PARAM_STR);
    $stmt->bindParam(":descripcion", $descripcion, $conn::PARAM_STR);
    $stmt->bindParam(":precio", $precio, $conn::PARAM_STR);

    if ($stmt->execute()) {
        echo "Producto agregado con exito";
    } else {
        echo "Error al insertar el usuario";
    }

    return $conn->lastInsertId();
}

function obtenerProductos()
{
    $conn = conectar();
    $query = "SELECT * FROM productos";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $productos =  $stmt->fetchAll(PDO::FETCH_ASSOC);
    desconectar($conn);
    return $productos;
}

function obtenerProductoPorId($id)
{
    $conn = conectar();
    $query = "SELECT * FROM productos WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam('id', $id, PDO::PARAM_STR);
    $stmt->execute();
    $productos =  $stmt->fetch(PDO::FETCH_ASSOC);
    desconectar($conn);
    return $productos;
}

function actualizarProducto($id, $nombre, $descripcion, $precio)
{
    $conn = conectar();
    $query = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam('id', $id, PDO::PARAM_STR);
    $stmt->bindParam('nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam('descripcion', $descripcion, PDO::PARAM_STR);
    $stmt->bindParam('precio', $precio, PDO::PARAM_STR);

    $stmt->execute();

    $id = $conn->lastInsertId();
    desconectar($conn);
    return $id;
}

function eliminarProducto($id) {
    $conn = conectar();
    $query = "DELETE FROM productos  WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam('id', $id, PDO::PARAM_STR);


    $stmt->execute();
    
 
    desconectar($conn);
}
