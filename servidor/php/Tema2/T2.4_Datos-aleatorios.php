<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos aleatorios</title>
</head>

<body>
    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 1</h1>
            <p>Código de color
                Escriba un programa que cada vez que se ejecute muestre un código de color RGB elegido
                al azar. Un código de color puede tener el formato rgb(rojo, verde, azul), donde rojo, verde y
                azul son números enteros entre 0 y 255. </p>
        </div>
        <div class="ejercicio">
            <?php
            echo "<div style='background-color: rgb(" . rand(0, 256) . ", " . rand(0, 256) . ", " . rand(0, 256) . "); width:200px; height:200px;'></div>";
            ?>
        </div>
    </div>

    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 2</h1>
            <p>Escriba un programa que cada vez que se ejecute muestre un emoticono elegido al azar
                entre los caracteres Unicode 128512 y 128586.
                Nota: Para mostrar el emoticono en HTML hay que anteponer &# al número</p>
        </div>
        <div class="ejercicio">
            <?php
            echo "&#" . rand(128512, 128586);
            ?>
        </div>
    </div>

    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 3</h1>
            <p>Escriba un programa que muestre un número del cero al 9 al azar y escriba en letras el
                valor obtenido.</p>
        </div>
        <div class="ejercicio">
            <?php
            $num = rand(0, 9);
            echo $num . " ";

            switch ($num) {
                case 0:
                    echo "Cero";
                    break;
                case 1:
                    echo "Uno";
                    break;
                case 2:
                    echo "Dos";
                    break;
                case 3:
                    echo "Tres";
                    break;
                case 4:
                    echo "Cuatro";
                    break;
                case 5:
                    echo "Cinco";
                    break;
                case 6:
                    echo "Seis";
                    break;
                case 7:
                    echo "Siete";
                    break;
                case 8:
                    echo "Ocho";
                    break;
                case 9:
                    echo "Nueve";
                    break;
                default:
                    echo "error en switch";
            }
            ?>
        </div>
    </div>

    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 4</h1>
            <p>Escriba un array de ocho ciudades de España. Elimina al azar una de ellas y muestra el
                nuevo array de ciudades.</p>
        </div>
        <div class="ejercicio">
            <?php
            $ciudades = ["Sevilla", "Madrid", "Lugo", "Barcelona", "Cadiz", "Granada", "Badajoz", "Valencia"];

            echo "<pre>";
            var_dump($ciudades);
            echo "</pre>";

            unset($ciudades[rand(0, 7)]);

            echo "<pre>";
            var_dump($ciudades);
            echo "</pre>";

            ?>
        </div>
    </div>

    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 5</h1>
            <p>Crea un array de claves valores de países con la siguiente información de cada país:
                <br>● Capital
                <br>● Población aproximada
                <br>● Idiomas principales de ese país
                <br>● ¿Si tiene costa?

                A continuación, en un formulario, haz una página con un menú desplegable y un botón "Ver". En el desplegable, deben visualizarse los países, y al pulsar el botón ver, mostrar su información.</p>
        </div>
        <div class="ejercicio">

            <fieldset>
                <form action="" method="POST">
                    <label for="pais">Escoja el pais</label>
                    <select id="pais" name="pais">
                        <option value="España">España</option>
                        <option value="Francia">Francia</option>
                        <option value="Alemania">Alemania</option>
                        <option value="Suiza">Suiza</option>
                        <option value="Brasil">Brasil</option>
                        <option value="Nepal">Nepal</option>
                    </select>
                    <input type="submit" value="Ver">
                </form>
            </fieldset>

            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pais'])) {
                $pais = $_POST['pais'];

                $paises = [
                    "España" => [
                        "capital" => "Madrid",
                        "poblacion" => 47450795,  // Aproximadamente 47.4 millones
                        "idiomas" => "Español",
                        "tiene_costa" => true
                    ],
                    "Francia" => [
                        "capital" => "París",
                        "poblacion" => 67348000,  // Aproximadamente 67.3 millones
                        "idiomas" => "Francés",
                        "tiene_costa" => true
                    ],
                    "Alemania" => [
                        "capital" => "Berlín",
                        "poblacion" => 83240000,  // Aproximadamente 83.2 millones
                        "idiomas" => "Alemán",
                        "tiene_costa" => true
                    ],
                    "Suiza" => [
                        "capital" => "Berna",
                        "poblacion" => 8700000,   // Aproximadamente 8.7 millones
                        "idiomas" => "Alemán",
                        "tiene_costa" => false
                    ],
                    "Brasil" => [
                        "capital" => "Brasilia",
                        "poblacion" => 203062512, // Aproximadamente 203 millones
                        "idiomas" => "Portugués",
                        "tiene_costa" => true
                    ],
                    "Nepal" => [
                        "capital" => "Katmandú",
                        "poblacion" => 30000000,  // Aproximadamente 30 millones
                        "idiomas" => "Nepalí",
                        "tiene_costa" => false
                    ]
                ];
                echo "Pais: " . $pais . "<br>"
                    . "Capital: " . $paises[$pais]["capital"] . "<br>"
                    . "Poblacion: " . $paises[$pais]["poblacion"] . "<br>"
                    . "Idiomas: " . $paises[$pais]["idiomas"] . "<br>"
                    . "Costa: " . $paises[$pais]["tiene_costa"] . "<br>";

                
            }
            ?>

        </div>

    </div>


</body>

</html>