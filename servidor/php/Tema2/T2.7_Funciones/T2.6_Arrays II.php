<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays II</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    require_once("dados.php");
    require_once("cartas.php");

    ?>

    <!--Ejercicios-->
    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 1</h1>
            <h2>Gestos de manos</h2>
            <p>Escriba un programa que muestre un emoji de un gesto de manos al azar, con diferentes tonos de piel.</p><br>
            <p>Las entidades numéricas para los distintos emoji son:</p>
            <p> 128070, 128071, 128072, 128073, 128074, 128075, 128076, 128077, 128078, 128079, 128080, 128133, 128170, 128400, 128405, 128406, 128588, 128591, 129295, 129304, 129305, 129306, 129307, 129308, 129310, 129311, 129330.</p><br>
            <p>Los tonos de color de piel se consiguen con los modificadores Fitzpatrick & #127995; & #127996; & #127997; & #127998; y & #127999;</p><br>

            <p> Hay varias formas de combinar los modificadores Fitzpatrick con emojis. En este ejercicio aparecen las secuencias más simples, en las que el modificador se escribe a continuación del carácter del emoji. </p>
            <p> Ejemplo: echo "span style=\"font-size: 8em\">&#númeroEmoji;&#númeroPiel/span>/p>";
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
    </div>

    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 2</h1>
            <h2>Negacion de bits</h2>
            <p>
                Actualice la página para mostrar una secuencia aleatoria de bits y su complementaria.</p>
        </div>
        <div class="ejercicio">
            <?php

            $bits = [];
            $output = '';

            for ($i = 0; $i < 10; $i++)
                array_push($bits, rand(0, 1));

            foreach ($bits as $bit)
                $output .= $bit;

            echo '<p>Secuencia de bits:</p>' . $output . '<br>';

            for ($i = 0; $i < count($bits); $i++) {
                if ($bits[$i] == 0) {
                    $bits[$i] = 1;
                } else {
                    $bits[$i] = 0;
                }
            }

            $output = '';

            foreach ($bits as $bit)
                $output .= $bit;

            echo '<br><p>Secuencia de bits negada:</p>' . $output;

            ?>
        </div>
    </div>

    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 3</h1>
            <h2>Partida de dados</h2>
            <p>Escriba un programa que enfrente a dos jugadores tirando una serie de dados al azar entre 3 y 9 e indique el resultado.</p>
            <p>Los dados se comparan en orden (el primero con el primero, el segundo con el segundo, etc.) y gana el jugador que obtenga el número más alto.</p><br>
            <p>Mostrar un resumen con cuántas veces ha ganado cada jugador y en conjunto qué jugador ha ganado.</p><br>
            <p>NOTA: A la hora de mostrar los dados de cada jugador utiliza la estructura foreach</p>
            </p>
        </div>
        <div class="ejercicio">

            <?php
            $veces = rand(3, 9);

            $jugador1 = generarTirada($veces);


            $jugador2 = generarTirada($veces);


            $ganaJ1 = 0;
            $ganaJ2 = 0;
            $empate = 0;

            for ($i = 0; $i < $veces; $i++) {
                if ($jugador1[$i] > $jugador2[$i])
                    $ganaJ1++;
                else if ($jugador1[$i] < $jugador2[$i])
                    $ganaJ2++;
                else
                    $empate++;
            }

            echo "<p>Jugado 1:</p>";
            mostrarTirada($jugador1);

            echo "<p>Jugado 2:</p>";
            mostrarTirada($jugador2);


            echo "<p>El jugador 1 ha ganado {$ganaJ1} veces, el jugador 2 ha ganado {$ganaJ2} veces y los jugadores han empatado {$empate} veces.</p>";

            partida($jugador1,$jugador2);
            ?>

        </div>
    </div>
    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 4</h1>
            <h2>Eliminar valores repetidos</h2>
            <p>
                Escriba un programa: Que muestre primero un grupo de entre 5 y 15 cartas de corazones numeradas del 1
                al 10 al azar (carpeta cartas).</p><br>
            <p>Muestra de nuevo el grupo inicial, pero habiendo eliminado del grupo los valores
                repetidos.</p>


            </p>
        </div>
        <div class="ejercicio">
            <?php
            $veces = rand(5, 15);

            $cartas = generarBaraja($veces);


            echo "<p>Entre estas {$veces} cartas corazones...</p>";

            imprimirCartas($cartas);

            $cartasDistintas = array_unique($cartas);
            $numCartas = count($cartasDistintas);
            echo "<p>... hay $numCartas cartas corazones distintas.</p>";

            imprimirCartas($cartasDistintas);


            ?>
        </div>
    </div>

    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 5</h1>
            <h2> Eliminar dado</h2>
            <p>Escriba un programa:</p><br>
            <ul>
                <li>Que muestre primero una tirada de un número de dados al azar (número de tiradas aleatorio: mínimo 1, máximo 10).</li>
                <li>Que muestre a continuación un dado al azar.</li>
                <li>Que muestre de nuevo la tirada inicial, pero habiendo eliminado de la tirada los
                    dados que coincidan con el dado suelto (si hay alguno).</li>
                NOTA: A la hora de mostrar los dados utiliza la estructura foreach.
            </ul>

            </p>
        </div>
        <div class="ejercicio">
            <?php
            $tiradas = rand(1, 10);

            $dados = generarTirada($tiradas);

            echo '<h2>Tirada de ' . $tiradas . ' dados</h2>';

            mostrarTirada(($dados));

            $dado = rand(1, 6);

            echo '<h2>Dado a eliminar</h2>';

            mostrarDado($dado);

            $dadosRestantes = array_diff($dados, [$dado]);

            echo '<h2>Dados restantes</h2>';
            mostrarTirada($dadosRestantes);


            ?>
        </div>
    </div>

    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 6</h1>
            <h2>Contar cartas</h2>
            <p>Escriba un programa:</p><br>

            <ul>
                <li>Que muestre primero un grupo de entre 10 y 20 cartas de corazones numeradas del 1 al 10 al azar.</li>
                <li>Que indique cuántas veces ha aparecido cada una de las cartas.</li>
            </ul>
        </div>
        <?php
        $veces = rand(10, 20);

        $cartas = generarBaraja($veces);

        echo "<h2>{$veces} cartas de corazones...</h2>";

        imprimirCartas($cartas);

        $frecuencias = array_count_values($cartas);

        echo '<h2>Conteo</h2>';

        foreach ($frecuencias as $k => $v) {
            echo '<h3>' . $v . '-';
            imprimirCarta($k);
            echo '</h3>';
        };
        ?>
    </div>

    <div class="container">
        <div class="enunciado">
            <h1>Ejercicio 7</h1>
            <h2>Repartir cartas</h2>

            <p>Escriba un programa:</p><br>

            <ul>
                <li>Que muestre un número par de cartas de corazones, entre 4 y 10, al azar y no
                    repetidas.</li>
                <li>Que reparta las cartas entre dos jugadores, al azar.
                <li>Quien más sume, gana.</li>
            </ul>
        </div>
        <div class="ejercicio">
            <?php
            //Logica de la baraja
            $veces = 0;

            do {
                $veces = rand(4, 10);
            } while ($veces % 2 !== 0);

            $cartas = generarBaraja($veces);
            
            echo '<h3>Las ' . $veces . ' cartas a repartir</h3>';

            imprimirCartas($cartas);

            //Logica del reparto
            $jugador1 = [];
            $jugador2 = [];


            //Valores para encontrar un numero al azar no repetido
            $keys = [];
            $k = 0;
            //Recorremos todas las cartas
            for ($i = 0; $i < count($cartas); $i++) {

                //Buscamos una carta aleatoria que no haya salido todavia
                do {
                    $loop = true;
                    $k = rand(0, count($cartas) - 1);
                    //La almacenamos
                    if (!in_array($k, $keys)) {
                        array_push($keys, $k);
                        $loop = false;
                    }
                } while ($loop);


                //La agregamos a un jugador variante
                if ($i % 2 ==  0 || $i == 0)
                    array_push($jugador1, $cartas[$k]);
                else
                    array_push($jugador2, $cartas[$k]);
            }

            echo '<h3>Jugador 1:</h3>';
            imprimirCartas($jugador1);

            echo '<h3>Jugador 2:</h3>';
            imprimirCartas($jugador2);

            //Logica de la puntuacion
            $puntosJ1 = 0;
            $puntosJ2 = 0;

            foreach ($jugador1 as $indice => $carta) {
                $puntosJ1 += $carta;
            }

            foreach ($jugador2 as $indice => $carta) {
                $puntosJ2 += $carta;
            }

            echo '<h3>Puntuacion:</h3><h4>Jugador1: ' . $puntosJ1 . '</h4><h4>Jugador2: ' . $puntosJ2 . '</h4>';

            partida($puntosJ1,$puntosJ2);

            ?>
        </div>
</body>

</html>