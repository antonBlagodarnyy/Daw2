<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <?php
    session_start();
    ?>
</head>

<body>
    <h1>Agenda</h1>
    <form method="POST">
        <input type="text" name="nombre" id="nombre">
        <input type="submit" name="Leer" value="Leer">
        <input type="submit" name="Guardar" value="Guardar">
        <input type="submit" name="Salir" value="Salir">
    </form>

    <?php
    switch (true) {
        case isset($_POST['Guardar']) && !empty($_POST['nombre']):
            $_SESSION['agenda'][] = $_POST['nombre'];
            echo "<p>Mensaje guardado</p>";
            break;
        case isset($_POST['Leer']) && isset($_SESSION['agenda']):
            echo "<h2>Contactos guardados</h2>";
            foreach ($_SESSION['agenda'] as $nombre) {
                echo "<p>$nombre</p>";
            }
            break;
        case isset($_POST['Salir']):
            session_unset();
            session_destroy();
            header("Location: Index.php");
            exit();
        }   
    ?>
</body>

</html>