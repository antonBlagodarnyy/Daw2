<?php
require_once(__DIR__."/../env.php");
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
