<?php
require_once(__DIR__ . "/../controller/valoracionesController.php");
require_once(__DIR__ . "/../model/receta.php");

function guardarValoracion(
    $usuarioId,
    $recetaId,
    $valoracionActual,
    $puntuacionNueva,
    $comentarioNuevo,
    $favoritoNuevo
) {
    $output = "";
    if (!empty($comentarioNuevo) && !empty($puntuacionNueva) && !empty($favoritoNuevo)) {
        //Si ya existia una valoracion
        if (isset($valoracionActual['comentario']) || isset($valoracionActual['puntuacion'])) {
            if ($puntuacionNueva > 0 && $puntuacionNueva <= 5) //Comprobamos restricciones
                //La actualizamos
                if (updateValoracion($usuarioId, $recetaId, $comentarioNuevo, $puntuacionNueva)) {
                    $output = "Valoracion actualizada!\n";
                }
        } else {
            if ($puntuacionNueva > 0 && $puntuacionNueva <= 5)
                //Si no, la creamos
                if (createValoracion($usuarioId, $recetaId, $comentarioNuevo, $puntuacionNueva)) {
                    $output = "Valoracion creada!\n";
                }
        }

        //Si ya estaba marcado
        if ($valoracionActual['favorito']) {
            if (!$favoritoNuevo) { //Delete de la columna
                if (deleteFavorito($usuarioId, $recetaId)) {
                    $output .= "Se ha desmarcado la receta de los favoritos.";
                }
            }
            //Si no estaba marcado
        } else {
            if ($favoritoNuevo) { //Insert de la columna
                if (createFavorito($usuarioId, $recetaId)) {
                    $output .= "Receta agregada a favoritos.";
                }
            }
        }
    } else $output = "Rellene todos los campos del formulario";
    return $output;
}

function esFavorito($usuarioId, $receta): bool
{

    return fetchEsFavorito($usuarioId, $receta->getId()) == 1;
}

function getValoracion($usuarioId, $receta)
{
    $output = [];

    $valoracion = fetchValoracion($usuarioId, $receta->getId());

    if (!empty($valoracion['comentario']) || !empty($valoracion['puntuacion'])) {
        $output['comentario'] = $valoracion['comentario'];
        $output['puntuacion'] = $valoracion['puntuacion'];
    }

    $output['favorito'] = esFavorito($usuarioId, $receta);

    return $output;
}

function puntuacionMedia($receta)
{
    return fetchPuntuacion(($receta->getId()));
}
