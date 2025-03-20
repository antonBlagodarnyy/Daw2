<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Agenda</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <input type="submit" name="guardar" value="Guardar">
    </form>
    <form method="POST">
        <input type="submit" name="leer" value="Leer">
    </form>

    <?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // En caso de guardar
        if (isset($_POST['guardar'])) {
            // Crear la cookie con duración de 5 segundos
            setcookie('datos', 'activa', time() + 5, '/');

            // Si no existe la sesión 'nombres', inicializarla
            if (!isset($_SESSION['nombres'])) {
                $_SESSION['nombres'] = [$_POST['nombre']];
            } else {
                // Si ya existe, agregar el nuevo nombre
                $_SESSION['nombres'][] = $_POST['nombre'];
            }

            echo '<p>Nombre guardado correctamente.</p>';
        }

        // En caso de leer
        if (isset($_POST['leer'])) {
            // Verificar si la cookie está activa
            if (isset($_COOKIE['datos'])) {
                if (isset($_SESSION['nombres'])) {
                    echo '<p>La agenda contiene los siguientes nombres:</p>';
                    echo '<ul>';
                    foreach ($_SESSION['nombres'] as $nombre) {
                        echo '<li>' . htmlspecialchars($nombre) . '</li>';
                    }
                    echo '</ul>';
                } else {
                    echo '<p>No hay nombres en la agenda.</p>';
                }
            } else {
                echo '<p>La cookie ha caducado. No se puede acceder a la información.</p>';
            }
        }
    }
    ?>
</body>


</html>