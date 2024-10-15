<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletin 1</title>
    <style>
        .ejercicio {
            margin: 20px;
            padding: 20px;

        }

        .enunciado {
            padding: 20px;
            background-color: lightgrey;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="ejercicio">
        <div class="enunciado">
            <h1>Ejercicio 1</h1>
            <p>Define dos constantes, una numérica y otra de cadena y mediante una de las opciones,
                print y echo, aparezca en la página web resultante un texto sobre el tipo de
                cada una de ellas seguido de su valor.
            </p>

        </div>
        <?php
        define("num", 666);
        define("cad", "cadena");

        echo "<p>Tipo de la constante \"num\": " . getType(value: num) . " Y su valor es: " . num . "</p>";
        echo "<p>Tipo de la constante \"cad\": " . getType(value: cad) . " Y su valor es: " . cad . "</p>";

        ?>
    </div>
    <div class="ejercicio">
        <div class="enunciado">
            <h1>Ejercicio 2</h1>
            <p>Escribe un ejercicio en el que se definan 2 variables: $a y $b.
                A la variable a se le dará un valor numérico y la variable $b sea una referencia a la $a.
                Comprueba ambos valores, de forma que te muestre:
                La variable $a vale: 22
                La variable $b vale: 22
                Elimina a continuación la referencia y muestra de nuevo el valor de las 2 variables.
            </p>
        </div>
        <?php
        $a;
        $b;

        $a = 1;
        /*     $b = $a; */

        echo "<p>La variable \$a vale " . $a;
        echo "<p>La variable \$b vale " . $b;
        ?>
    </div>

    <div class="ejercicio">
        <div class="enunciado">
            <h1>Ejercicio 3</h1>
            <h2>Operadores</h2>
            <p> Escribe un ejercicio de nombre en el que se definan 2 variables,
                $a y $b. A esas variables habrá que darle valores numéricos. A continuación, para cada operador +,-,*,/
                deberá mostrarte unos mensajes del siguiente tipo:
                Realizarlo con echo, print y printf
                El resultado se sumar $a y $b es: xxx
                El resultado se restar $a y $b es: xxx
                El resultado se multiplicar $a y $b es: xxx
                El resultado se dividir $a y $b es: xxx
                El título de la página deberá ser Operadores. </p>
        </div>
        <?php
        $a = 1;
        $b = 2;
        echo "<p>El resultado de sumar $a y $b es:" . $a + $b . "</p>";
        echo "<p>El resultado de restar $a y $b es:" . $a - $b . "</p>";
        echo "<p>El resultado de multiplicar $a y $b es:" . $a * $b . "</p>";
        echo "<p>El resultado de dividir $a y $b es:" . $a / $b . "</p>";
        ?>
    </div>

    <div class="ejercicio">
        <div class="enunciado">
            <h1>Ejercicio 4</h1>
            <h2>Área de un triangulo</h2>
            <p>Realiza otro ejercicio que para 2 variables, $base y $altura, asigne a otra variable, $area, el área del triángulo.
                A continuación te deberá mostrar el siguiente mensaje:
                El área del triángulo cuya base es $base y altura $altura es: $area.
                Los datos de entrada se introducirán a mediante un formulario. Habrá que cambiar el color del texto,
                del fondo de la página y deberá tener el siguiente texto: </p>
        </div>
        <br>
        <fieldset>
            <legend>Introduzca las medidas del triangulo: </legend>
            <form name="form" action="" method="post">
                <label for="altura">Altura:</label>
                <input type="double" name="altura" id="altura"></input>
                <label for="base">Base:</label>
                <input type="double" name="base" id="base"></input>
                <input type="submit"></input>
            </form>
        </fieldset>

        <div class=resultado>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" &&  !empty($_POST['altura']) && !empty($_POST['base'])) {
                $altura = $_POST["altura"];
                $base = $_POST["base"];
                $area = $altura * $base / 2;
                echo "<p>El area del triangulo cuya base es " . $base . " y altura " . $altura . " es: " . $area . "</p>";
                piramide($base, $altura);
            } else {
                echo "<p>Introduzca los valores</p>";
            }
            function piramide($b, $h)
            {

                for ($i = 0; $i < $h; $i++) {
                    echo "<p>";
                    for ($u = 0; $u <=  $i; $u++) {
                        echo "*";
                    }
                    echo "</p>";
                }
            }

            ?>
        </div>
    </div>

    <div class="ejercicio">
        <div class="enunciado">
            <h1>Ejercicio 5</h1>
            <p>Realiza un ejercicio que asigne los siguientes valores a variables $a1 a $a10
                y después te muestre la variable y el tipo, usando gettype($var).</p>
        </div>
        <?php
        $a1 = 347;
        $a2 = 2147483647;
        $a3 = -2147483647;
        $a4 = 23.7678;
        $a5 = 3.1416;
        $a6 = "347";
        $a7 = "“3.1416";
        $a8 = "Solo literal";
        $a9 = "12.3 Literal con número";
        echo "$a1: " . gettype($a1) . "<br>";
        echo "$a2: " . gettype($a2) . "<br>";
        echo "$a3: " . gettype($a3) . "<br>";
        echo "$a4: " . gettype($a4) . "<br>";
        echo "$a5: " . gettype($a5) . "<br>";
        echo "$a6: " . gettype($a6) . "<br>";
        echo "$a7: " . gettype($a7) . "<br>";
        echo "$a8: " . gettype($a8) . "<br>";
        echo "$a9: " . gettype($a9) . "<br>";
        ?>
    </div>

    <div class="ejercicio">
        <div class="enunciado">
            <h1>Ejercicio 6</h1>
            <p>
                Escribe otro ejercicio que le asigne una serie de valores a las siguientes variables y muestre el nombre de la variable,
                el valor y el tipo de datos al que pertenece. A continuación se le deberá forzar el tipo a lo que se indique,
                y mostrar el tipo nuevo al que pertenece, el nombre de la variable y su valor. Usar las funciones settype y gettype.
            </p>

        </div>


        <?php
        $a1 = 347;
        $a2 = 2147483647;
        $a3 = -2147483647;
        $a4 = 23.7678;
        $a5 = 3.1416;
        $a6 = "347";
        $a7 = "“3.1416";
        $a8 = "Solo literal";
        $a9 = "12.3 Literal con número";

        //setType solo acepta float
        settype($a1, "float");
        settype($a2, "float");
        settype($a3, "float");
        settype($a4, "integer");
        settype($a5, "integer");
        settype($a6, "float");
        settype($a7, "integer");
        settype($a8, "float");
        settype($a9, "integer");

        echo "$a1: " . gettype($a1) . "<br>";
        echo "$a2: " . gettype($a2) . "<br>";
        echo "$a3: " . gettype($a3) . "<br>";
        echo "$a4: " . gettype($a4) . "<br>";
        echo "$a5: " . gettype($a5) . "<br>";
        echo "$a6: " . gettype($a6) . "<br>";
        echo "$a7: " . gettype($a7) . "<br>";
        echo "$a8: " . gettype($a8) . "<br>";
        echo "$a9: " . gettype($a9) . "<br>";
        ?>
    </div>
<div class="ejercicio">
    <div class="enunciado">
        <h1>Ejercicio 7</h1>
        <h2>Salario</h2>
       <p> Escribe un programa salario.php que calcule el salario de un trabajador una vez que se le descuente el impuesto.
Se usarán las variables: $salario, $impuesto, que vendrá dada en porcentaje.
Se deberá descontar el porcentaje del impuesto por ciento a $salario y se guardará en la variable $resultado. 
Después deberá mostrarse una de la siguiente información:
“El salario sin descontar el impuesto: xxxxx”
“El salario 'xxxx' una vez descontado: zzzz”
Deberán mostrarse las comillas, y el título de la página será: Salario.
Los datos del salario y del impuesto se introducirán mediante un formulario.
Habrá 2 botones, uno para que muestre la primera información y otro para que te muestre la segunda.
       </p>
    </div>

        <fieldset>

            <legend>Introduzca los datos de su salario:</legend>
            <form action="" method="POST">
                <label for="salario">Salario:</label>
                <input type="number" name="salario" id="salario"></input>
                <label for="impuesto">Impuesto:</label>
                <input type="number" name="impuesto" id="impuesto"></input>
                <br>

                <!-- Radiobutton -->
                <input type="radio" name="eleccion" value="sinImpuestos" checked> Sin impuestos
                <input type="radio" name="eleccion" value="conImpuestos"> Con impuestos
                <br>
                <input type=submit>
            </form>
        </fieldset>

        <?php
        $salario;
        $impuesto;
        $eleccion;
        $resultado;


        if ($_SERVER["REQUEST_METHOD"] == "POST" &&  !empty($_POST['impuesto']) && !empty($_POST['salario'])) {
            $salario = $_POST['salario'];
            $impuesto = $_POST['impuesto'];
            $eleccion = $_POST['eleccion'];

            if ($eleccion == "sinImpuestos") {
                echo "<p>“El salario sin descontar el impuesto:" . $salario . "”</p>";
            } else if ($eleccion == "conImpuestos") {
                echo "<p>“El salario ' " . $salario . " ' una vez descontado: " . $salario * $impuesto / 100 . "”</p>";
            }
        } else {
            echo "<p>Introduzca los datos.</p>";
        }


        ?>
</div>
</body>

</html>