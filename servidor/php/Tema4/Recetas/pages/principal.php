<?php
require_once(__DIR__ . "/../services/recetasService.php");
require_once(__DIR__ . "/../services/valoracionesService.php");

session_start();
$usuario = $_SESSION['usuario'];
$recetas = obtenerRecetas();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    switch (true) {
        case isset($_POST['cerrar']):
            session_destroy();
            header("Location: ../index.php");
            exit();
            break;
        case isset($_POST['detalle']):
            $_SESSION['receta'] = serialize(obtenerReceta($_POST['detalle']));
            header("Location: detalle.php");
            exit();
            break;
        case isset($_POST['misRecetas']):
            $recetas = array_filter($recetas, function ($receta) use ($usuario) {
               return esFavorito($usuario['id'], $receta);
            });
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
    <h2>Hola <?= $usuario['nombre'] ?></h2>
    <form action="" method="POST">
        <!-- Botones para editar y eliminar -->
        <button type="submit" name="listado">Buscar</button>
        <button type="submit" name="misRecetas">Mis recetas</button>
        <button type="submit" name="cerrar">Cerrar sesión</button>
        <br><br>
    </form>

    <TABLE border=1>
        <tr>
            <th>Núm. Receta</th>
            <th>Categoría</th>
            <th>Título</th>
            <th>Puntuación</th>
            <th>Favorito</th>
            <th>Acciones</th>

        </tr>

        <?php foreach ($recetas as  $receta): ?>
            <tr>
                <td><?= $receta->getId() ?></td>
                <td><?= $receta->getCategoria() ?></td>
                <td><?= $receta->getTitulo() ?></td>
                <td><?= $receta->getPuntuacionMedia() ?></td>
                <td><?= esFavorito($usuario['id'], $receta) ? "Si" : "No" ?></td>
                <td>
                    <form action="" method="POST">
                        <button type="submit" name="detalle" value="<?= $receta->getId() ?>">Detalle</button>
                    </form>
                </td>

            </tr>
        <?php endforeach; ?>

    </TABLE>
</body>

</html>