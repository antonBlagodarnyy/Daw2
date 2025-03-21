<?php
require_once("parametros.php");
function conectar()
{
    try {
        $connection = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, USER, PASS);
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
