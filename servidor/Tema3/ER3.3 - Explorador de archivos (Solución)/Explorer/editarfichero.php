<?php
session_start();

// Inicializamos las variables
if (!isset($_SESSION['dirActual']) || empty($_SESSION['dirActual'])) {
    $_SESSION['dirActual'] = getcwd(); 
}

    // Recuperamos el archivo desde la sesión
    $fichero = $_SESSION['fichero'];
    // Si existe se lee
    if( is_file($fichero))
    {
        $texto = file_get_contents($fichero);
    }

// Verificamos si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /**
     *  Guardar nuevo fichero
     */
    if (isset($_POST['btnModificar']) && isset($_POST['contenido']) && is_file($fichero)) {
        // Se guarda el contenido
        file_put_contents($fichero, $_POST['contenido']);
        unset($_SESSION['fichero']);
        header("Location: index.php");
        exit;
    }

    if (isset($_POST['btnCancelar'])) {
        // Se vuelve
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
