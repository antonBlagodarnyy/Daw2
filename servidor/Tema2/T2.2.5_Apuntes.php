<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apuntes</title>
</head>

<body>
    <?php
    $ciudades = ["Sevilla", "Madrid", "Lugo", "Barcelona", "Cadiz", "Granada", "Badajoz", "Valencia"];

    echo "<pre>";
    var_dump($ciudades);
    echo "</pre>";

   unset($ciudades [rand(0,7)]);

    echo "<pre>";
    var_dump($ciudades);
    echo "</pre>";

    ?>
</body>

</html>