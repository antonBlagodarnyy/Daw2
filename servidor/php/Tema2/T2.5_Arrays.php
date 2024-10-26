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

            echo "<p>Minimo: " . min($tabla) . " Maximo: " . max($tabla);
            ?>
        </div>
    </div>

    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 2</h1>
            <p>Dadas las siguientes tablas con nombre y edad de los alumnos de dos clases diferentes: -- Crea dos arrays independientes para guardar los datos de cada una de las tablas
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

            $clases = [];

            array_push($clases, $primero);
            array_push($clases, $segundo);

            echo "<table>";
            echo "<th><td>Alumnos</td></th>";
            foreach ($clases as $index => $clase) {

                foreach ($clase as $name => $age) {
                    echo "<tr><td>" . $name . "</td><td>" . $age . "</td></tr>";
                }
            }
            echo "</table>";

            ?>
        </div>
    </div>

    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 3</h1>
            <p>Escribe un programa que genere 6 números aleatorios de 1 al 6 y los guarde en un array.
                Una vez generado el array:

                <br>Mostrar cuántas veces aparece cada uno de los valores, del 1 al 6, en el array
                generado.
                Obtener otro número al azar entre 1 y 6. Con ese número obtenido comprobar si se encuentra en el array generado y en caso de que así sea mostrar todos los índices donde aparezca ese número.
                <br>Mostrar el array original ordenada de mayor a menor.
                <br>Mostrar el array sin valores duplicados y sin huecos en los índices.
            </p>
        </div>
        <div class="ejercicio">
            <?php
            $arr = [];
            for ($i = 0; $i < 6; $i++) {
                array_push($arr, rand(0, 6));
            }

            echo "Array de 6 numeros aleatorios del 0 al 6:<br>";
            echo "<pre>";
            var_dump($arr);
            echo "</pre>";

            echo "Numero de ocurrencias de cada elemento del array:<br>";
            echo "<pre>";
            var_dump(array_count_values($arr));
            echo "</pre>";

            echo "Numero aleatorio:<br>";
            $num = rand(0, 6);
            echo $num . "<br>";


            $indicesDeNum = [];
            if (in_array($num, $arr)) {


                foreach ($arr as $key => $value) {
                    if ($value == $num) {
                        array_push($indicesDeNum, $key);
                    }
                }

                echo "Indices en los que se encuentra el " . $num . ": ";

                echo '<pre>';
                print_r($indicesDeNum);
                echo '</pre>';
            } else {
                echo "Num no se encuentra en el array";
            }

            rsort($arr);
            echo "Array ordenado de mayor a menor:<br>";
            echo "<pre>";
            var_dump($arr);
            echo "</pre>";

            echo "Array sin duplicados:<br>";
            echo "<pre>";
            var_dump(array_unique($arr));
            echo "</pre>";
            ?>
        </div>
    </div>

    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 4</h1>
            <p>
                Escribe un programa php que muestre una página con un desplegable que muestre el "idioma origen" y otro el "idioma destino". Al pulsar el botón traducir, debe mostrar Una tabla con dos columnas, una con los meses en idioma de origen, y otra, traducido.
                Puedes usar también un encabezado para toda la tabla.
            </p>
        </div>
        <form action="" method="POST">
            <label for="origen">Idioma origen:</label><br>
            <select name="origen" id="origen" value="origen" required>
                <option></option>
                <option value="es">Español</option>
                <option value="en">Ingles</option>
                <option value="al">Aleman</option>
                <option value="fr">Frances</option>
            </select><br>
            <label for="traducido">Idioma traducido:</label><br>
            <select name="traducido" id="traducido" value="traducido" required>
            <option></option>
                <option value="es">Español</option>
                <option value="en">Ingles</option>
                <option value="al">Aleman</option>
                <option value="fr">Frances</option>
            </select>
            <input name="submit" type="submit">
        </form>

        <div class="ejercicio">
            <?php
            $paises = [
                "es" => ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                "en" => ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                "al" => ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"],
                "fr" => ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"]
            ];
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset( $_POST["submit"] )) {
                $origen = $_POST['origen'];
                $traducido = $_POST['traducido'];

                if (isset($paises[$origen])) {

                   echo "<table>
                   <thead><th>Idioma origen</th><th>Idioma traducido</th></thead>
                   <tbody>";
                    for ($i = 0; $i < 12; $i++) {
                        echo "<tr><td>".$paises[$origen][$i]."</td><td>".$paises[$traducido][$i]."</td></tr>";
                    }

                    echo "</tbody></table>";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>