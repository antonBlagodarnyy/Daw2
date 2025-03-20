<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persona</title>
</head>

<body>
    <form name="form" method="post" action="#">
        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca">
        <br>

        <label for="color">Color:</label>
        <input type="text" name="color" id="color">
        <br>

        <label for="plazas">Plazas:</label>
        <input type="number" name="plazas" id="plazas">
        <br>


        <input type="submit"></input>
    </form>
</body>

</html>

<?php
require_once("Vehiculo.php");
require_once("Coche.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['marca']) && !empty($_POST['color']) && !empty($_POST['plazas'])) {
    $miCoche = new Vehiculo($_POST['marca'], $_POST['color'], intval($_POST['plazas']));
  
    echo "<p>" . $miCoche->__toString() . "</p>";

    $miCoche->arrancar();

    echo "<p>" . $miCoche->__toString() . "</p>";
}


?>