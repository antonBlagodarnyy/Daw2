<?php
require_once("connection.php");
class usuarioController
{
    public static function insertUsuario($data)
    {
        $db = Database::getConnection();
        $query = "INSERT INTO usuario (nombre,clave,correo) VALUES (?,?,?)";
        $stmt = $db->prepare($query);

        $nombre = $data['nombre'];
        $clave = $data['clave'];
        $correo = $data['correo'];

        $stmt->bind_param("sss", $nombre, $clave, $correo);
        $stmt->execute();

        return $stmt->insert_id;
    }
}
