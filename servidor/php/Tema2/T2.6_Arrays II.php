<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays II</title>
</head>

<body>
    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 1</h1>
            <p>
                Ejercicio 1 - Gestos de manos
                Escriba un programa que muestre un emoji de un gesto de manos al azar, con diferentes tonos de piel. Las entidades numéricas para los distintos emoji son: 128070, 128071, 128072, 128073, 128074, 128075, 128076, 128077, 128078, 128079, 128080, 128133, 128170, 128400, 128405, 128406, 128588, 128591, 129295, 129304, 129305, 129306, 129307, 129308, 129310, 129311, 129330.
                Los tonos de color de piel se consiguen con los modificadores Fitzpatrick &#127995; &#127996; &#127997; &#127998; y &#127999; Hay varias formas de combinar los modificadores Fitzpatrick con emojis. En este ejercicio aparecen las secuencias más simples, en las que el modificador se escribe a continuación del carácter del emoji. Ejemplo:

                echo "
            <p>span style=\"font-size: 8em\">&#númeroEmoji;&#númeroPiel/span>/p>";
            </p>
        </div>
        <div class="ejercicio">
            <?php
            $emojis = ["128070", "128071", "128072", "128073", "128074", "128075", "128076", "128077", "128078", "128079", "128080", "128133", "128170", "128400", "128405", "128406", "128588", "128591", "129295", "129304", "129305", "129306", "129307", "129308", "129310", "129311", "129330"];
            $pieles = ["&#127995", "&#127996", "&#127997", "&#127998",  "&#127999"];
            $iEmoji = rand(0, count($emojis) - 1);
            $iPieles = rand(0, count($pieles) - 1);
            echo "<p><span style=\"font-size: 8em\">&#{$emojis[$iEmoji]};{$pieles[$iPieles]}</span></p>";
            ?>
        </div>

        <div class="container">
            <div class="enunciado">
                <h1>Ejercicio 2</h1>
                <p>
                    Actualice la página para mostrar una secuencia aleatoria de bits y su complementaria.</p>

                <div class="ejercicio">
                    <?php

                    $bits = [];

                    for ($i = 0; $i < 10; $i++)
                        array_push($bits, rand(0, 1));

                    var_dump($bits);

                    for ($i = 0; $i < count($bits); $i++) {
                        if ($bits[$i] == 0) {
                            $bits[$i] = 1;
                        } else {
                            $bits[$i] = 0;
                        }
                    }

                    var_dump($bits);

                    ?>
                </div>

                <div class="container">
                    <div class="enunciado">
                        <h1>Ejercicio 3</h1>
                        <p>
                            Escriba un programa que enfrente a dos jugadores tirando una serie de dados al azar entre 3 y 9 e indique el resultado. Los dados se comparan en orden (el primero con el primero, el segundo con el segundo, etc.) y gana el jugador que obtenga el número más alto.
                            Mostrar un resumen con cuántas veces ha ganado cada jugador y en conjunto qué jugador ha ganado.
                            NOTA: A la hora de mostrar los dados de cada jugador utiliza la estructura foreach
                        </p>
                    </div>
                    <div class="ejercicio">
                        <?php
                        $veces = rand(3,9);

                        $jugador1 = [];

                        for ($i = 0; $i < $veces; $i++)
                            array_push($jugador1, rand(3, 9));

                        $jugador2 = [];
                        for ($i = 0; $i < $veces; $i++)
                            array_push($jugador2, rand(3, 9));

                        $ganaJ1=0;
                        $ganaJ2=0;
                        $empate=0;

                        for ($i = 0; $i < $veces; $i++) {
                            if ($jugador1[$i] > $jugador2[$i])
                                $ganaJ1++;
                            else if ($jugador1[$i] < $jugador2[$i])
                                $ganaJ2++;
                            else
                                $empate++;
                        }

                       foreach ($jugador1 as $k => $v) {
                        switch($v){
                            case 1:
                                echo "<img src"
                        }
                       }
                        ?>

                    </div>
</body>

</html>