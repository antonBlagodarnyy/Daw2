<?php
session_start();

if (!isset($_SESSION['dirActual']) || empty($_SESSION['dirActual'])) {
    $SESSION['dirActual'] = getcwd();
    $items = $_SESSION['dirActual'];
} else {
    $items = scandir($_SESSION['dirActual']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['btnNuevaCarpeta'])) {
        $nombreCarpeta = $_SESSION['dirActual'] . DIRECTORY_SEPARATOR . $_POST['nuevaCarpeta'];

        if (!file_exists(($nombreCarpeta))) {
            mkdir($nombreCarpeta);
        }

        header("Location: index.php");
        exit();
    }

    if (isset($_POST['btnEntrar'])) {
        if (is_dir($_SESSION['dirActual'] . DIRECTORY_SEPARATOR . $_POST['item'])) {
            $_SESSION['dirActual'] = $_SESSION['dirActual'] . DIRECTORY_SEPARATOR . $_POST['item'];
            header("Location: index.php");
            exit();
        } else {
            $_SESSION['fichero'] = $_SESSION['dirActual'] . DIRECTORY_SEPARATOR . $_POST['item'];
            header("Location: editarfichero.php");
            exit();
        }
    }

    if (isset($_POST['btnSalir'])) {
        $_SESSION['dirActual'] = dirname($dir);
        header("Location: index.php");
        exit();
    }


    if (isset($_POST['btnNuevoFichero'])) {
        header("Location: nuevofichero.php");
        exit();
    }

    if (isset($_POST['btnUnset'])) {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorador de Archivos</title>
</head>

<body>
    <h1>Explorador</h1>
    <h2>Directorio actual: <?= $_SESSION['dirActual']; ?></h2>

    <form method="POST" action="">

        <?php
        foreach ($items as $item) {
            if ($item !== '.' && $item != '..') {
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
    </form>
</body>

</html>