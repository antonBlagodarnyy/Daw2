<?php


$tasks = json_decode(scandir("./tasks.json"));
var_dump($tasks);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch (true) {
        case isset($_POST['nuevaNota']) && isset($_POST['titulo']) && isset($_POST['contenido']):
            if (!file_exists("./notas/" . $_POST['titulo'])) {
                chdir("./notas");
                file_put_contents($_POST['titulo'], $_POST['contenido']);
                chdir("..");
                header("Refresh:0");
            } else
                echo "Ya existe una nota con ese titulo!";
            break;
        case isset($_POST['eliminar']):
            chdir("./notas");
            unlink($_POST['eliminar']);
            chdir("..");
            header("Refresh:0");
            break;
        case isset($_POST['abrir']):
            echo file_get_contents("./notas/" . $_POST['abrir']);
            break;
        default:
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
</head>

<body>
    <div>

        <h2>Notas:</h2>

        <?php foreach ($notas as $nota): ?>
            <form method="POST">
                <?php if ($nota != "." && $nota != ".."): ?>
                    <?= $nota . '<button type="submit" name="eliminar" value="' . $nota . '">Eliminar Nota</button><br>
                    <button type="submit" name="abrir" value="' . $nota . '">Abrir nota</button><br>' ?>
                <?php endif ?>
            </form>
        <?php endforeach ?>

    </div>
    <div>
        <form method="POST">
            <label for="nuevaNota">Nueva nota</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo de la nota" required>
            <input type="text" id="contenido" name="contenido" placeholder="Contenido de la nota" required>
            <button type="submit" name="nuevaNota" id="nuevaNota">Nueva nota</button>
        </form>
    </div>

</body>

</html>