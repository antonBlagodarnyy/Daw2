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
        <input type="submit" name="Exportar" value="Exportar datos">
        <input type="submit" name="Importar" value="Importar datos">
        <input type="submit" name="Salir" value="Salir">
    </form>

    <?php
    switch (true) {
        case isset($_POST['Guardar']) && !empty($_POST['nombre']):
            $_SESSION['agenda'][] = $_POST['nombre'];
            echo "<p>Mensaje guardado</p>";
            break;

        case isset($_POST['Leer']) :
            echo "<h2>Contactos guardados:</h2>";
            if(isset($_SESSION['agenda'])){
            foreach ($_SESSION['agenda'] as $nombre) {
                echo "<p>$nombre</p>";
            }
        }
            break;

        case isset($_POST['Exportar']):
            if (isset($_SESSION['agenda'])) {
                file_put_contents("data.php", serialize($_SESSION['agenda']));
                echo "<p>Contactos exportados con exito</p>";
            } else
            echo "<p>No hay datos en la agenda.</p>";

            break;

            case isset($_POST['Importar']):
                $_SESSION['agenda'] = unserialize( file_get_contents("data.php"));
                    echo "<p>Contactos importados con exito</p>";
        
                
                break;

        case isset($_POST['Salir']):
            session_unset();
            session_destroy();
            header("Location: Index.php");
            exit();
            break;
        default:
            break;
    }
    ?>
</body>

</html>