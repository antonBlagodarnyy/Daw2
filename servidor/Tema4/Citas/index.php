<?php
require_once __DIR__ . '/service/usuarios.service.php';

// Obtener la cita más valorada


$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Botón de registro
    if (isset($_POST['ir_registro'])) {
        header('Location: registro.php');
    }

    // Botón de login
    if (isset($_POST['login'])) {
        if (login_usuario($_POST['email'], $_POST['clave'])) {
            header('Location: principal.php');
        } else $error = 'No se ha podido iniciar sesion.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Citas Célebres - Login</title>
</head>

<body>
    <h1 class="titulo">Citas Célebres</h1>

    //Mostrar cita destacada

    <form method="POST">
        <h2>Iniciar Sesión</h2>

        <input type="email" name="email" placeholder="Correo"><br>
        <input type="password" name="clave" placeholder="Contraseña"><br>

        <button type="submit" name="login">Iniciar Sesión</button>
        <button type="submit" name="ir_registro">Registrarse</button>
    </form>

<?=$error?>

</body>

</html>