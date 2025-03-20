<?php
session_start();

// Inicializamos las variables
if (!isset($_SESSION['dirActual']) || empty($_SESSION['dirActual'])) {
    $_SESSION['dirActual'] = getcwd(); 
    $items = scandir($_SESSION['dirActual']);
}
else {
    $items = scandir($_SESSION['dirActual']);
}

// Comprobamos las acciones
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /**
     *  NUEVA CARPETA
     */
    if (isset($_POST['btnNuevaCarpeta'])) {

        // Se recupea el nombre
        $nombreCarpeta = $_SESSION['dirActual'] . DIRECTORY_SEPARATOR . $_POST['nuevaCarpeta'];

        // Si no existe ya, se crea
        if (!file_exists($nombreCarpeta)) {
            mkdir($nombreCarpeta);
        }

        // Se recarga la página.
        header("Location: index.php");
        exit();
    }
    /**
     *  ENTRAR A UNA CARPETA
     */
    if (isset($_POST['btnEntrar'])) {

        if(is_dir($_SESSION['dirActual'] . DIRECTORY_SEPARATOR . $_POST['item']))
        {
            // Si es una carpeta
            $_SESSION['dirActual'] = $_SESSION['dirActual'] . DIRECTORY_SEPARATOR . $_POST['item'];
            header("Location: index.php");
            exit();
        }else {
            // Si es un fichero
            $_SESSION['fichero'] = $_SESSION['dirActual'] . DIRECTORY_SEPARATOR . $_POST['item'];
            header("Location: editarfichero.php");
            exit;

        }
    }

    /**
     *  SALIR DEL DIRECTORIO (SUBIR)
     */
    if (isset($_POST['btnSalir'])) {
        $_SESSION['dirActual'] = dirname($dir);
        header("Location: index.php");
        exit();
    }

    /**
     *  Nuevo fichero
     */
    if (isset($_POST['btnNuevoFichero'])) {
        header("Location: nuevofichero.php");
        exit();
    }

    /**
     *  RESETEAR SESIÓN
     */
    if (isset($_POST['btnUnset'])) {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Explorador de Archivos</title>
</head>
<body>
    <h1>Explorador</h1>
    <h2>Directorio actual: <?php echo $_SESSION['dirActual']; ?></h2>
    <form method="POST" action="">

        <!-- Mostrar los items del directorio -->
        <?php
        foreach ($items as $item) {
            if ($item !== '.' && $item !== '..') {
                echo '<input type="radio" name="item" value="' . htmlspecialchars($item) . '"> ';
                echo htmlspecialchars($item) . '<br>';
            }
        }
        ?>

        <br>
        
        <button type="submit" name="btnNuevaCarpeta">Nueva Carpeta</button>
        <input type="text" name="nuevaCarpeta">
        <br><br>
        <button type="submit" name="btnNuevoFichero">Nuevo Fichero</button>

        <br><br>
        <button type="submit" name="btnEntrar">Entrar</button>
        <button type="submit" name="btnSalir">Salir</button>
        <!--<button type="submit" name="btnUnset">Reset Sesión</button>-->
    </form>
</body>
</html>
