<?php
require_once('usuariosController.php');

function iniciarSesion(string $email, string $contrasenia)
{
    $output = [];

    $usuario = fetchUsuarioByEmail($email);

    if ($usuario) {
        if (password_verify($contrasenia, $usuario['password'])) {
            $output['usuario'] = $usuario;
            $output['mensaje'] = "Usuario loggeado!";
        } else {
            $output['usuario'] = null;
            $output['mensaje'] = "Clave incorrecta";
        }
    } else {
        $output['usuario'] = null;
        $output['mensaje'] = 'Usuario no existe.';
    }
    return $output;
}
function registrarse(string $nombre, string $email, string $contrasenia, string $contrasenia2)
{
    $output = [];
    if (fetchUsuarioByEmail($email)) {
        $output['mensaje'] = "Ese correo ya esta registrado";
    } else {
        if ($contrasenia != $contrasenia2) {
            $output['mensaje'] = "Las claves deben de coincidir";
        } else {
            $contrasenia = password_hash($contrasenia, PASSWORD_BCRYPT);
            insertUsuario($email, $nombre, $contrasenia);
            $output['usuario'] = fetchUsuarioByEmail($email);
            $output['mensaje'] = '¡Registro exitoso!';
        }
    }
    return $output;
}
