<?php
require_once(__DIR__ . "/services/recetasService.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    switch (true) {
        case isset($_POST['login']):
            header("Location: pages/auth/login.php");

            break;
        case isset($_POST['registrar']):

            header("Location: pages/auth/registro.php");
            break;
        default:
            break;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Recetario</title>
</head>

<body>
    <h1>Recetario</h1>
    <!-- MOSTRAR LA RECETA QUE MAS VECES SEA FAVORITA -->

    <?php
    $recetasFavoritas = recetasFavoritas();

    if (count($recetasFavoritas) <= 3 && count($recetasFavoritas)>1): ?>
        <h2>Recetas favoritas:</h2>
        <h3>Seleccionadas favoritas <?=$recetasFavoritas[0]['occurrences']?> veces.</h3>
        <ul>
            <?php foreach ($recetasFavoritas as $recetaRaw): ?>
                <li><?= obtenerReceta($recetaRaw['receta_id'])->getTitulo() ?></li>
            <?php endforeach; ?>
        </ul>
    <?php elseif (count($recetasFavoritas) == 1): ?>
        <h2>Receta favorita:</h2>
        <h3>Seleccionada favorita <?=$recetasFavoritas[0]['occurrences']?> veces.</h3>
        <p><?= $receta = obtenerReceta($recetasFavoritas[0]['receta_id'])->getTitulo() ?></p>
    <?php else: ?>
        <h2>No hay un top de favoritos</h2>
    <?php endif; ?>

    <form action="" method="POST">
        <!-- Botones para editar y eliminar -->
        <button type="submit" name="login">Log in</button>
        <button type="submit" name="registrar">Registrarse</button>
    </form>
</body>

</html>