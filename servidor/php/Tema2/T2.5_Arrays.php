<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>

<body>
    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 1</h1>
            <p>Escribe un programa que cada vez que se ejecute genere un número entre 1 y 10 al azar y a continuación guarde en un array la tabla de multiplicar de dicho número. Saca también el valor mínimo y máximo del array generado.
                NOTA: Para generar el array utiliza la función range.</p>
        </div>

        <div class="ejercicio">
            <?php
            $num = rand(1, 10);

            echo "<p>" . $num . "</p>";
            $tabla = range(0, $num * 10, $num);

            
            var_dump($tabla);

            echo"<p>Minimo: " . min($tabla) . " Maximo: " . max($tabla);
            ?>
        </div>
    </div>

    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 2</h1>
            <p>Dadas las siguientes tablas con nombre y edad de los alumnos de dos clases diferentes: --  Crea dos arrays independientes para guardar los datos de cada una de las tablas
                anteriores y muestra por pantalla la información de ambas.
                A continuación une ambas tablas en una sóla y muestra los datos de esta nueva
                tabla.</p>
        </div>
        <div class="ejercicio">
            <?php

            $primero = [
                "Juan" => 21,
                "Maria" => 19,
                "Pedro" => 24,
                "Antonio" => 30,
                "Carmen" => 24,
                "Carlos" => 26,
                "Lucia" => 22,
            ];

            $segundo = [
                "Jaime" => 27,
                "Luisa" => 21,
                "Aitor" => 33,
                "Macarena" => 22,
                "Maria" => 27,
                "Pedro" => 28,
                "Juan" => 24,
            ];

            $clases = array_push($primero, $segundo);

            var_dump($clases);

            ?>
        </div>
    </div>
</body>

</html>