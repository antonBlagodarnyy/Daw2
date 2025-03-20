<?php
require_once("clases.php");
session_start();
$usuario = $_SESSION['usuario'];

if (isset($_COOKIE[$usuario->getNombre()])) {
    $color = $_COOKIE[$usuario->getNombre()];
} else {
    $color = "white";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch (true) {

        case isset($_POST['irForo']):
            //Declaro la cookie por primera vez aqui, despues se machaca en el caso de "enviar mensaje"
            setcookie("enviado", true, time() + 10);
            header("Location: foro.php");
            exit();
            break;
        case isset($_POST['cerrar_sesion']):
            session_unset();
            session_destroy();
            header("Location: Index.php");
            exit();
            break;
        case isset($_POST['colorear']):
            //check-darle caducidad a la cookie
            setcookie($usuario->getNombre(), $_POST['color'], time() + 5);
            $usuario->setColor($_POST['color']);
            header("Refresh:0");
            break;
        default:
            break;
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Principal</title>
    <style>
        body {
            background-color: <?= $color ?>;
        }
    </style>
</head>

<body>
    <h1>Bienvenido,<?= $usuario->getNombre() ?></h1>
    <form method="POST">
        <button name="irForo">Ir al foro</button>

        <label for="color">Color del tema:</label>
        <select name="color" id="color">
            <option value="white">Blanco</option>
            <option value="green">Verde</option>
            <option value="blue">Azul</option>
            <option value="red">Rojo</option>
        </select>

        <button name="colorear">Seleccionar color</button>
        <button name="cerrar_sesion">Cerrar sesión</button>
    </form>
</body>

</html>