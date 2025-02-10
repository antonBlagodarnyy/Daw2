<?php
require_once("clases.php");

session_start();


if (file_get_contents("./credenciales/usuarios.txt")) {
    $usuarios = unserialize(file_get_contents("./credenciales/usuarios.txt"));
} else {
    $usuarios = [];
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    switch (true) {
        case isset($_POST['registro']) && is_array($usuarios):
            //Check-validar campos vacios
            //Check-controlar que ese usuario no esta registrado ya
            if (isset($_POST['nombre']) && isset($_POST['clave'])) {
                $usuario = new Usuario($_POST['nombre'], $_POST['clave']);
                if (!in_array($usuario, $usuarios)) {
                    array_push($usuarios, $usuario);
                    file_put_contents("./credenciales/usuarios.txt", serialize($usuarios));
                } else {
                    $error = "Ese usuario ya esta registrado.";
                }
            }


            break;
        case isset($_POST['login']):
            $usuario = new Usuario($_POST['nombre'], $_POST['clave']);
            if (in_array($usuario, $usuarios)) {
                $_SESSION['usuario'] = $usuario;

                header("Location: Principal.php");
                exit();
            } else {
                $error = "Ese usuario no se encuentra registrado o la contraseña es incorrecta.";
            }
            break;
        default:
            break;
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <form method="POST">
        <h2>Login</h2>
        <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
        <label>Usuario:</label>
        <input type="text" name="nombre" required><br>
        <label>Clave:</label>
        <input type="password" name="clave" required><br>
        <button type="submit" name="registro">Registro</button>
        <button type="submit" name="login">Iniciar sesión</button>
    </form>
    <br>


</body>

</html>