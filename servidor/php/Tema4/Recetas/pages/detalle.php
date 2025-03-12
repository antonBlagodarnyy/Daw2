<?php
require_once(__DIR__ . "/../model/receta.php");
require_once(__DIR__ . "/../services/valoracionesService.php");
require_once(__DIR__ . "/../services/recetasService.php");

session_start();

$usuario = $_SESSION['usuario'];
$receta = unserialize($_SESSION['receta']);
$valoracion = getValoracion($usuario['id'], $receta);

$output = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    switch (true) {
        case isset($_POST['volver']):
            header("Location: principal.php");
            exit();
            break;
        case isset($_POST['guardar']):
            //Guardamos la valoracion
            $output = guardarValoracion(
                $usuario['id'],
                $receta->getId(),
                $valoracion,
                floatval($_POST['puntuacion']),
                $_POST['comentario'],
                isset($_POST['favorito'])
            );

            //Actualizamos los valores de la receta actual
            $_SESSION['receta'] = serialize(obtenerReceta($receta->getId()));
            $receta = unserialize($_SESSION['receta']);

            break;

        default:
            break;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Principal</title>
</head>

<body>
    <h1>Recetario</h1>

    <form action="" method="POST">
        <!-- Botones para editar y eliminar -->
        <button type="submit" name="volver">Volver</button>
        <button type="submit" name="guardar">Guardar</button>
        <br><br>


        <h2>Titulo</h2>
        <TABLE border=1>
            <tr>
                <th>Categoría</th>
                <td><?= $receta->getCategoria() ?></td>
            </tr>
            <tr>
                <th>Descripción</th>
                <td><?= $receta->getDescripcion() ?></td>
            </tr>
            <tr>
                <th>Pasos</th>
                <td><?= $receta->getPasos() ?></td>
            </tr>
            <tr>
                <th>Puntuación</th>
                <td><input type="number" name="puntuacion" min=1 max=5 placeholder="<?= empty($valoracion['puntuacion']) ? "" : $valoracion['puntuacion'] ?>"></td>
            </tr>
            <tr>
                <th>Comentario</th>
                <td>
                    <input type="text" name="comentario" placeholder="<?= empty($valoracion['comentario']) ? "" : $valoracion['comentario'] ?>">
                </td>
            </tr>
            <tr>
                <th>Favorito</th>
                <td><input type="checkbox" name="favorito" <?= $valoracion['favorito']  ? "checked" : "" ?>></td>
            </tr>
        </TABLE>
    </form>
    <!-- Mensaje -->
    <span><?= $output ?></span>
</body>

</html>