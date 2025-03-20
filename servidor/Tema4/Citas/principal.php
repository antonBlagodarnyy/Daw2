<?php
require_once(__DIR__ . '/service/citas.service.php');

session_start();
if (!isset($_SESSION['usuario'])) header('Location: index.php');

// Procesar acciones
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Botón de logout
    if (isset($_POST['logout'])) {
        session_destroy();
        header('Location: index.php');
    }

    // Botón de nueva cita
    if (isset($_POST['nueva_cita'])) {
        header('Location: nueva_cita.php');
    }

    // Procesar likes
    if (isset($_POST['like'])) {
        $cita_id = $_POST['like'];

        // meGusta($_SESSION['usuario_id'], $cita_id);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    // Procesar dislikes
    if (isset($_POST['dislike'])) {
        $cita_id = $_POST['dislike'];
        noMeGusta($_SESSION['usuario_id'], $cita_id);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

// Obtener citas
$citas = obtenerCitas();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Citas Célebres</title>
    <style>
        .verde {
            background-color: green;
            color: white;
        }

        .rojo {
            background-color: red;
            color: white;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Citas Célebres</h1>
        <form method="POST" style="display: inline;">
            <span>Hola, <?php echo $_SESSION['usuario']['nombre'] ?></span>
            <button type="submit" name="logout">Salir</button>
        </form>
    </div>

    <form method="POST">
        <button type="submit" name="nueva_cita">Nueva Cita</button>
    </form>

    <?php if (!isset($citas['citas'])): ?>
        <p>No hay citas disponibles.</p>
    <?php else: ?>
        <table border="1px">
            <thead>
                <tr>
                    <th>Cita</th>
                    <th>Autor</th>
                    <th>Publicada por</th>
                    <th>Puntuación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($citas['citas'] as $cita): ?>
                    <tr>
                        <td><?=$cita['texto']?></td>
                        <td><?=$cita['autor']?></td>
                        <td><?=$cita['texto']?></td>
                        <td></td>
                        <td>
                            <form method="POST">
                                <button type="submit" name="like" value="<?php echo $cita['id'] ?>" class="<?php echo $miPuntuacion == 1 ? 'verde' : '' ?>">Me gusta</button>
                                <button type="submit" name="dislike" value="<?php echo $cita['id'] ?>" class="<?php echo $miPuntuacion == -1 ? 'rojo' : '' ?>">No me gusta</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>

</html>