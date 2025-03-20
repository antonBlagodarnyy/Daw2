<?php
require_once(__DIR__.'/../parametros.php');

function conectar()
{
    try {
        $connection = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USUARIO, CLAVE);
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
