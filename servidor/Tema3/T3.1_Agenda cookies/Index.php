<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    if (isset($_COOKIE['agenda']))
        $personas = unserialize($_COOKIE['agenda']);
    else
        $personas = [];

    setcookie('agenda', serialize($personas), time() + 15);
    ?>
</head>

<body>
    <h1>Agenda</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <input type="submit" name="guardar" value="Guardar">
        <input type="submit" name="leer" value="Leer">
    </form>
    <?php
    switch (true) {
        case isset($_POST['leer']):
            if (!empty($personas)) {
                echo "<p>La agenda contiene los siguientes nombres:</p>";
                echo "<ul>";

                foreach ($personas as $key => $persona) {
                    echo "<p>La agenda esta vacia.</p>";
                }
            }
            break;
        case isset($_POST('guardar')):
            $nombre = $POST['nombre'];

            if (!empty($nombre)) {
                $personas[] = $nombre;

                setcookie('agenda', serialize($personas), time() + 15);

                echo "<p>Nombre guardado exitosamente: $nombre</p>";
            } else
                echo "<p>Introduce un valor para guardar.</p>";

            break;
        default:
            break;
    }
    ?>
</body>


</html>