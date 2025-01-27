<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temas de una pagina</title>
    <?php
    //Si ya existe la cookie 
    if (isset($_COOKIE['tema']))
        $tema = unserialize($_COOKIE['tema']);

    else {
        //Si no existe la inicializa como defecto
        $tema = "defecto";
    }

    //Si se ha mandado el formulario
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        //Si se inicia machaca la cookie e inicia la session
        if (isset($_POST['iniciar'])) {

            setcookie('tema', serialize($_POST['tema']), time() + 15);
            $tema = $_POST['tema'];
        }
    }
    ?>

    <!--Dependiendo del valor del tema, se usa un css u otro-->
    <?php if ($tema == "claro"): ?>
        <link rel="stylesheet" href="claro.css">
    <?php elseif ($tema == "defecto"): ?>
        <link rel="stylesheet" href="defecto.css">
    <?php elseif ($tema == "oscuro"): ?>
        <link rel="stylesheet" href="oscuro.css">
    <?php endif; ?>
</head>

<body>
    <h1>Selecciona un Tema</h1>
    <p>El tema actual es <?= $tema ?></p>
    <form method="POST">
        <label>Seleccione el tema de la pagina</label>
        <select name="tema">
            <option value="claro">Claro</option>
            <option value="oscuro">Oscuro</option>
        </select>
        <input type="submit" name="iniciar" value="Iniciar">

    </form>

</body>

</html>