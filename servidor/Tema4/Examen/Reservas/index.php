<?php
require_once("usuariosService.php");
require_once("funciones.php");
session_start();

// Procesar inicio de sesión, si hace bien login va a principal, si falla se queda en index.
//Puedes hacerlo aquí o llamar a la función 
if (isset($_POST['login'])) {
    $output = iniciarSesion($_POST['email'], $_POST['password']);
    if ($output['usuario']) {
        $_SESSION['usuario'] = $output['usuario'];
        header('Location: principal.php');
        exit();
    }
}

// PROCESAR BOTÓN REGISTRO, VA A REGISTRO
if (isset($_POST['registro'])) {
    header('Location: registro.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Reservas de Aulas</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
    <table>
        <tr>
            <th colspan="2">Sistema de Reservas de Aulas</th>
        </tr>
    </table>



    <!-- MENSAJES INFORMATIVOS -->
    <div>
        <p><?= isset($output) ? $output['mensaje'] : '' ?></p>
    </div>


    <form method="post" action="">
        <table>
            <tr>
                <th colspan="2">Iniciar Sesión</th>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email" required></td>
            </tr>
            <tr>
                <td><label for="password">Contraseña:</label></td>
                <td><input type="password" id="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="login" value="Iniciar Sesión">
                    <input type="submit" name="registro" value="Registrarse" formnovalidate>
                </td>
            </tr>
        </table>
    </form>

</body>

</html>