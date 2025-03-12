<?php
require_once(__DIR__ . "/../../services/usuariosService.php");
session_start();

$output = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    switch (true) {
        case isset($_POST['volver']):
            header("Location: ../../index.php");
            exit();
            break;
        case isset($_POST['iniciar']):
            if (!empty($_POST['email']) && !empty($_POST['clave'])) {
                $inicio = iniciarSesion($_POST['email'], $_POST['clave']);
                if ($inicio['usuario']) {
                    $_SESSION['usuario'] = $inicio['usuario'];
                    header("Location: ../principal.php");
                    exit();
                } else
                    $output = $inicio['mensaje'];
            } else $output = "Rellene todos los campos";

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
    <h2>Login</h2>
    <form action="" method="POST">
        <label for="email">Email:</label>
        <input type="text" name="email"><br>
        <label for="clave">Contraseña:</label>
        <input type="password" name="clave"><br>
        <button type="submit" name="iniciar">Iniciar sesión</button>
        <button type="submit" name="volver">Volver</button>
    </form>
    <!-- Mensaje -->
    <span><?= $output ?></span>
</body>

</html>