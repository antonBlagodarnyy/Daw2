<?php
require_once('clases.php');
require_once('../Servicios/UsuarioService.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /**
     *  BOTÓN INICIAR
     */
    if (isset($_POST['iniciar'])) {
        $email = $_POST['email'];
        $usuario = selectUsuario($email);
   
        if ($usuario) {
            if ($usuario['email'] == $email) {
                if (password_verify($_POST['clave'], $usuario['clave'])) {
                    $_SESSION['usuario'] = $usuario;

                    if ($usuario['rol'] == 'a') {
                        header('Location: alumno.php');
                    } else {
                        header('Location: profesor.php');
                    }
                    exit;
                } else {
                    echo "Clave incorrecta";
                }
            }
           
        } else  echo 'Usuario no existe.';
    }

    /**
     *  BOTÓN REGISTRO
     */
    if (isset($_POST['registro'])) {

        // Establecer cookie de duración
        setcookie("registro", time(), time() + 5);
        header('Location: registro.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form action="index.php" method="POST">
        <label for="email">Email:</label>
        <input type="text" name="email"><br>
        <label for="clave">Contraseña:</label>
        <input type="text" name="clave"><br>
        <button type="submit" name="iniciar">Iniciar sesión</button>
        <button type="submit" name="registro">Registro</button>
    </form>
</body>

</html>