<?php
require_once(__DIR__ . '/../controller/usuarios.controller.php');
session_start();

function registrar_usuario($email, $nombre, $clave,$clave2)
{
    // COMPLETAR
    $usuarioAlreadyExists = fetchUsuarioByEmail($email);
    if($clave != $clave2){
        $mensaje = 'Las claves deben de coincidir.';
    } elseif ($usuarioAlreadyExists) {
        $mensaje = 'Ya existe un usuario registrado con ese correo';
    } else {
        $contrasenia = password_hash($clave, PASSWORD_BCRYPT);
        insertUsuario($email, $nombre, $contrasenia);
        $mensaje = 'Usuario creado!';
    }
    return $mensaje;
}
// Función de login
function login_usuario($email, $clave)
{
    // COMPLETAR
    $usuario = fetchUsuarioByEmail($email);
    // Si se ha leído de la bbdd, comprobamos la clave.
     if ($usuario && password_verify($clave, $usuario['clave'])) {
        // Si es correcta, guardo info en la sesión y devuelvo true
        $_SESSION['usuario'] = $usuario;
        return true;
    } else {
        // Si es incorrecta, devuelvo false
        return false;
    } 
}