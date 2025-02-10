<?php

if (!isset($_SESSION['dirActual']) || empty($_SESSION['dirActual'])) {
    $_SESSION['dirActual'] = getcwd();
}

$fichero = $SESSION['fichero'];

if (is_file($fichero)) {
    $texto = file_get_contents($fichero);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['btnModificar']) && isset($_POST['contenido']) && is_file($fichero)) {
        file_put_contents($fichero, $_POST['contenido']);
        unset($_SESSION['fichero']);
        header("Location: index.php");
        exit;
    }
    if (isset($_POST['btnCancelar'])) {
        unset($_SESSION['fichero']);
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Fichero</title>
</head>
<body>
    <h1>Editar Fichero</h1>
    <form method="POST">
        <textarea name="contenido"><?php echo htmlspecialchars($texto); ?></textarea>
        <br>
        <button type="submit" name ="btnModificar">Modificar</button>
        <button type="submit" name ="btnCancelar">Cancelar</button>
    </form>
</body>
</html>

