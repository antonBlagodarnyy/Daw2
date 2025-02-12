<?php
require_once("clases.php");
//Si la cookie esta gastada nos salimos de la pagina 
if(!isset($_COOKIE['enviado'])){
    header("Location: principal.php");
    exit();
}

session_start();
$usuario = $_SESSION['usuario'];
//check-hacer que si esta 10 segundos sin mandar mensajes se salga del foro
if (file_get_contents("./foro/mensajes.txt")) {
    $mensajes = unserialize(file_get_contents("./foro/mensajes.txt"));
} else {
    $mensajes = [];
}


switch (true) {
    case isset($_POST['enviar']):
        $mensaje = new Mensaje($usuario->getNombre(), $_POST['mensaje']);

        array_push($mensajes, $mensaje);
        file_put_contents("./foro/mensajes.txt", serialize($mensajes));

        setcookie("enviado",true,time()+10);

        break;
        case isset($_POST['volver']):
            header("Location: Principal.php");
            exit();
            break;
    default:
        break;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Foro</title>
    <style>
        body {
            background-color: <?= $_COOKIE[$usuario->getNombre()] ?>;
        }
    </style>
</head>

<body>
    <h2>Foro</h2>
    <div id="content">
        <?php if (empty($mensajes)): ?>
            <p>No hay mensajes en el foro.</p>
        <?php else: ?>
            <ol>
                <?php foreach ($mensajes as $mensaje): ?>
                    <li><?= $mensaje ?></li>
                <?php endforeach; ?>
            </ol>
        <?php endif; ?>
    </div>
    <form method="POST">
        <textarea name="mensaje" placeholder="Escribe tu mensaje aquí..." required></textarea><br>
        <button type="submit" name="enviar">Enviar</button>
    </form>
    <form method="POST">
        <button type="submit" name="volver">Volver</button>
    </form>

</body>

</html>