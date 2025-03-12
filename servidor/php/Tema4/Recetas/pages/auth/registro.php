<?php
require_once(__DIR__ . "/../../services/usuariosService.php");

$output = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    switch (true) {
        case isset($_POST['volver']):
            header("Location: ../../index.php");
            break;
        case isset($_POST['registrar']):
            if (!empty($_POST['nombre'])  && !empty($_POST['email']) && !empty($_POST['clave'] && !empty($_POST['clave2']))) {
                $registro = registrarse($_POST['nombre'], $_POST['email'], $_POST['clave'], $_POST['clave2']);
                $output = $registro['mensaje'];
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
    <h2>Registro</h2>
    <form action="" method="POST">
        <label for="email">Nombre:</label>
        <input type="text" name="nombre"><br>
        <label for="email">Email:</label>
        <input type="text" name="email"><br>
        <label for="clave">Contraseña:</label>
        <input type="password" name="clave"><br>
        <label for="clave">Confirmar contraseña:</label>
        <input type="password" name="clave2"><br>
        <button type="submit" name="registrar">Registrar</button>
        <button type="submit" name="volver">Volver</button>
    </form>
    <!-- Aquí informa del mensaje -->
    <span><?= $output ?></span>
</body>

</html>