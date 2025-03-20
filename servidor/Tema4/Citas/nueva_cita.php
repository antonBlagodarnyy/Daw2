<?php
require_once __DIR__ . '/service/citas.service.php';
session_start();
if(!isset($_SESSION['usuario'])) header('Location: index.php');


$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Botón de volver
    if (isset($_POST['volver'])) {
        header('Location: principal.php');
    }

    // Botón de guardar cita
    if (isset($_POST['guardar'])) {
        if (!empty($_POST['texto']) || !empty($_POST['autor'])) {
            $mensaje =  crear_cita($_POST['texto'], $_POST['autor'], $_SESSION['usuario']['id']);
        } else $mensaje = 'Rellene todo el formulario';
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nueva Cita</title>
</head>

<body>
    <form method="POST">
        <h2>Nueva Cita</h2>

        <label for="texto">Texto:</label><br>
        <textarea
            name="texto"
            placeholder="Texto de la cita"
            rows="4"
            required value="">
        </textarea><br>

        <label for="autor">Autor:</label><br>
        <input
            type="text"
            name="autor"
            placeholder="Autor"
            required
            value=""><br><br>

        <button type="submit" name="guardar">Guardar Cita</button>
    </form>
    <form method="POST">
        <button type="submit" name="volver">Volver</button>
    </form>
    <?= $mensaje ?>
</body>

</html>