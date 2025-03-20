<?php

// Comprobamos si existe el archivo de datos, si no, lo creamos
define("ARCHIVO", "biblioteca.dat");

if (!file_exists(ARCHIVO)) {
    $materiales = [];
    file_put_contents(ARCHIVO, serialize($materiales));
}


// Función para guardar materiales en el archivo
function guardarMateriales($materiales): void
{
    file_put_contents(ARCHIVO, serialize($materiales));
}

// Función para leer materiales desde el archivo
function leerMateriales(): array
{
    return unserialize(file_get_contents(ARCHIVO));
}

// Función para añadir materiales
function anadirMaterial($material): void
{
    $materiales = unserialize(file_get_contents(ARCHIVO));
    array_push($materiales, $material);
    file_put_contents(ARCHIVO, serialize($materiales));
}

// Función para cambiar disponibilidad
function cambiarDisponibilidad($identificador): void
{
    $materiales = leerMateriales();
    array_map(fn($material) => ($material->getIdentificador() == $identificador) ?
        $material->cambiarDisponibilidad() : $material, $materiales);
    guardarMateriales($materiales);
}

// Función para borrar un material
function borrarMaterial($identificador): void
{
    $materiales = leerMateriales();
    $key = array_search(pillarMaterialPorId($identificador), $materiales);
    unset($materiales[$key]);
    guardarMateriales($materiales);
}
function pillarMaterialPorId($identificador)
{
    $materiales = leerMateriales();
    $material = array_filter($materiales, fn($material) => $material->getIdentificador() == $identificador);

    return reset($material);
}
// Gestión de cookies
function registrarVisita($titulo)
{
    $mensaje = "Ultima visita: " . date('m/d/Y h:i:s a', time());
    $mensaje .= "| Ultima consulta: " . $titulo;
    setcookie("consulta", $mensaje, time() + 5);
}

// Mensaje de cookies
function obtenerMensaje(): string
{
    return $_COOKIE['consulta'];
}
