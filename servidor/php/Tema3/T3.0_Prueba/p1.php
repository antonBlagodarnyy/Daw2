<?php

session_start();

    if( $_SERVER['REQUEST_METHOD']==='POST'){

        $nombre = $_POST['nombre'];
        
        $_SESSION['nombre'] = $nombre;

        header("Location: p2.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Introduce tu nombre</h1>
    <form method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <button type="submit">Enviar</button>
</body>
</html>