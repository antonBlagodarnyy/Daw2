<?php
require_once('clases.php');
require_once('../Servicios/UsuarioService.php');

if (!isset($_COOKIE['registro'])) {
    header('Location: index.php');
    exit();
}

setcookie("registro", time(), time() + 30);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registrar'])) {
    if (
        !empty($_POST['nombre']) && !empty($_POST['tipo']) && !empty($_POST['dni']) &&
        !empty($_POST['telefono']) && !empty($_POST['email']) && !empty($_POST['ciudad']) &&
        !empty($_POST['clave'])
    ) {
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $ciudad = $_POST['ciudad'];
        $contrasenia = $_POST['clave'];


        // Dependiendo del tipo creamos el objeto correspondiente
        /* if ($tipo == 'alumno') {
        $usuario = new Alumno($nombre);
    } else {
        $usuario = new Profesor($nombre);
    } */

        // Guardamos el usuario en la bd
        insertUsuario($nombre, $dni, $telefono, $email, $ciudad, $contrasenia, $tipo);

        echo '¡Registro exitoso!';
    } else echo "Introduzca todos los datos.";
    header('Location: index.php');
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
        <label for="dni">DNI:</label>
        <input type="text" name="dni"><br>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"><br>
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono"><br>
        <label for="email">email:</label>
        <input type="text" name="email"><br>
        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad"><br>
        <label for="clave">Contraseña:</label>
        <input type="password" name="clave"><br>
        <label for="tipo">Tipo:</label>
        <select name="tipo">
            <option value="profesor">Profesor</option>
            <option value="alumno">Alumno</option>
        </select><br>
        <button type="submit" name="registrar">Registrar</button>
    </form>
</body>

</html>