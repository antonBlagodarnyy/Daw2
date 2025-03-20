<?php
session_start();

if (!isset($_SESSION['dirActual']) || empty($_SESSION['dirActual'])) {
    $_SESSION['dirActual'] = getcwd();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['btnGuardar'])) {
        $fichero = $_POST['nombreFichero'];
        $texto = $_POST['contenido'] ?? '';
    }

    // Si el nombre del fichero no está vacío, lo creamos
    if (!empty($fichero)) {
        file_put_contents($_SESSION['dirActual'] . DIRECTORY_SEPARATOR . $fichero, $texto);
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo Fichero</title>
</head>

<body>
    <h1>Nuevo Fichero</h1>
    <form method="POST">
        <label for="nombreFichero">Nombre de fichero:</label>
        <input type="text" name="nombreFichero" required>
        <br>
        <textarea name="contenido"></textarea>
        <br>
        <button type="submit" name="btnGuardar">Guardar</button>
        <button type="submit">Atrás</button>
    </form>
</body>

</html>