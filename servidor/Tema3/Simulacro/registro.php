<?php
require_once('clases.php');

$usuarios = unserialize(file_get_contents("Usuarios.php"));

if (!isset($_COOKIE['registro'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registrar'])) {
    $usuarioNuevo;
    if ($_POST['tipo'] == "alumno") {
        $usuarioNuevo = new Alumno($_POST['nombre'], $_POST['tipo']);
    } else {
        $usuarioNuevo = new Profesor($_POST['nombre'], $_POST['tipo']);
    }

    $usuarios[$usuarioNuevo->getNombre()] = $usuarioNuevo;
    file_put_contents("Usuarios.php", serialize($usuarios));

    header("Location: index.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>

<body>
    <h2>Formulario de Registro</h2>
    <form action="registro.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"><br>
        <label for="tipo">Tipo:</label>
        <select name="tipo">
            <option value="profesor">Profesor</option>
            <option value="alumno">Alumno</option>
        </select><br>
        <button type="submit" name="registrar">Registrar</button>
    </form>
</body>

</html>