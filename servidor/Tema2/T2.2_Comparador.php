<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparador</title>
</head>

<body>
    <div class="formulario">
        <form name="form" method="post">
            <label for="num1">A</label>
            <input type="number" name="num1" id="num1"><br>
            <label for="num2">B</label>
            <input type="number" name="num2" id="num2"><br>
            <label for="num3">C</label>
            <input type="number" name="num3" id="num3"><br>
            <br>

            <input type="submit"></input>
        </form>
    </div>

    <div class="resultado">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['num1']) && !empty($_POST['num2']) && !empty($_POST['num3'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $num3 = $_POST['num3'];
            $respuesta = "";

            //Uno es el mayor
            if ($num1 == $num2 && $num1 == $num3) {
                $respuesta .= "Los tres numeros son iguales.";
                //Uno mayor y otros 2 iguales
            } else {
                //A es el mayor
                if ($num1 > $num2 && $num1 > $num3) {
                    $respuesta .= "A es mayor que ";
                    if ($num2 == $num3) {
                        //Los otros 2 numeros son iguales
                        $respuesta .= "B y C, y ambos son iguales.";
                    } else if ($num2 > $num3) {
                        //B es mayor que C
                        $respuesta .= "B, y ambos, mayor que C.";
                    } else {
                        //C es mayor que B
                        $respuesta .= "C, y ambos, mayor que B.";
                    }
                } else
                    //B es el mayor
                    if ($num2 > $num1 && $num2 > $num3) {
                        $respuesta .= "B es mayor que ";
                        if ($num1 == $num3) {
                            //Los otros 2 numeros son iguales
                            $respuesta .= "A y C, y ambos son iguales.";
                        } else if ($num1 < $num3) {
                            //A es mayor que C
                            $respuesta .= "A, y ambos, mayor que C.";
                        } else {
                            //C es mayor que A
                            $respuesta .= "C, y ambos, mayor que A.";
                        }
                    } else
                        //C es el mayor
                        if ($num3 > $num1 && $num3 > $num2) {
                            $respuesta .= "C es mayor que ";
                            if ($num1 == $num2) {
                                //Los otros 2 numeros son iguales  
                                $respuesta .= "A y B, y ambos son iguales.";
                            } else if ($num1 > $num2) {
                                //A es mayor que B
                                $respuesta .= "A, y ambos, mayor que B.";
                            } else {
                                //B es mayor que A
                                $respuesta .= "B, y ambos, mayor que A.";
                            }
                        }
            }
            //Uno menor y otros 2 iguales
                //A es el menor
                if($num1 < $num2 && $num2 == $num3){
                    $respuesta .= "A es menor, y B y C son iguales.";
                    //B es el menor
                } else if ($num2 < $num1 && $num1 == $num3){
                    $respuesta .= "B es menor, y A y C son iguales.";
                    //C es el menor
                } else if( $num3< $num1 && $num1 == $num2){
                    $respuesta .= "C es menor, y A y B son iguales.";
                }
                
                


            echo "<p>$respuesta</p>";
        } else {
            echo "<p>Introduzca valores validos</p>";
        }
        ?>

</body>

</html>