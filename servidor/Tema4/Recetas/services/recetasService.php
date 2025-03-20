<?php
require_once(__DIR__ . "/../controller/recetasController.php");
require_once(__DIR__ . "/../model/receta.php");
// PUEDES USAR ESTAS FUNCIONES U OTRAS QUE TU ELIJAS

function obtenerRecetas()
{
    $recetas = [];
    $recetasRaw = fetchRecetas();
    foreach ($recetasRaw as  $receta) {
        array_push(
            $recetas,
            new Receta(
                $receta['id'],
                $receta['titulo'],
                $receta['descripcion'],
                $receta['pasos'],
                $receta['imagen'],
                fetchCategoria($receta['categoria_id']),
                $receta['usuario_id'],
                $receta['fecha_creacion']
            ),

        );
    }
    return $recetas;
}

function recetasFavoritas()
{
    $ocurrencias = ocurrenciaRecetas();

    $maximo = 0;
    $maximaOcurrencia = null;
    $ocurrenciasMaximas = [];

    foreach ($ocurrencias as $asociacion) {
        if ($asociacion["occurrences"] > $maximo) {
            $maximaOcurrencia = $asociacion;
            $maximo = $asociacion['occurrences'];
        }
    }


    foreach ($ocurrencias as $asociacion) {
        if ($asociacion['occurrences'] == $maximaOcurrencia['occurrences']) {
            array_push($ocurrenciasMaximas, $asociacion);
        }
    }

    return $ocurrenciasMaximas;
}

function obtenerReceta($idReceta)
{
    $recetaRaw = fetchReceta($idReceta);
    return new Receta(
        $recetaRaw['id'],
        $recetaRaw['titulo'],
        $recetaRaw['descripcion'],
        $recetaRaw['pasos'],
        $recetaRaw['imagen'],
        fetchCategoria($recetaRaw['categoria_id']),
        $recetaRaw['usuario_id'],
        $recetaRaw['fecha_creacion']
    );
}

function obtenerDetalle($id) {}
