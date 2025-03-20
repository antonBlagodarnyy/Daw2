<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piramidillas</title>
</head>

<body>
    <h1>Piramidillas</h1>
    <!--Piramide 1-->

    <form name="form" method="post">
        <label for="repeticiones">Introduzca la cantidad de repeticiones:</label>
        <input type="number" name="repeticiones" id="repeticiones">
        <input type="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['repeticiones'])) {
        $repeticiones = $_POST['repeticiones'];

        for ($x = 0; $x <= $repeticiones; $x++) {

            echo "<p style=\"color: " . getRandomColor() . "\">";
            for ($y = 0; $y <= $x; $y++) {

                echo "hola ";
            }
            echo "</p>";
        }
    }
    function getRandomColor()
    {
        // Generate random values for red, green, and blue
        $r = rand(0, 255); // Random value for red
        $g = rand(0, 255); // Random value for green
        $b = rand(0, 255); // Random value for blue
    
        // Return the color in the format "rgb(r, g, b)"
        return "rgb($r, $g, $b)";
    }
    ?>
    <br>

    <!--Piramide 2-->
    <?php
    $total = 10;
    $decremento = $total;

    for ($x = 0; $x <= $total; $x++) {
        echo "<p>";

        for ($y = $decremento / 2; $y >= 0; $y--) {
            echo "&nbsp";
        }
        $decremento--;

        for ($y = 0; $y <= $x; $y++) {
            echo "x";
        }
        echo "</p>";
    }

    ?>
</body>

</html>