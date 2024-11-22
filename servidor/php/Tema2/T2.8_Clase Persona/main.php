<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persona</title>
</head>

<body>
    <form name="form" method="post" action="#">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos">
        <br>

        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad">
        <br>

        <input type="submit"></input>
    </form>
</body>

</html>

<?php
require_once("Persona.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['edad'])) {
    
    $PersonaA = new Persona();

    $PersonaA->setNombre($_POST['nombre']);
    $PersonaA->setApellidos($_POST['apellidos']);
    $PersonaA->setEdad($_POST['edad']);

    echo "<p>" . $PersonaA->nombreCompleto() . "</p>";

    echo "<p>" . var_dump($PersonaA->mayorEdad()) . "</p>";
}

?>