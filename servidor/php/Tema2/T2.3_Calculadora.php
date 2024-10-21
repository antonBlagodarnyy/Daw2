<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculador</title>
</head>

<body>
    <fieldset>
        <form action="" method="POST">
            <input type="number1" name="number1" id="number1" placeholder="Primer numero">
            <input type="number2"  name="number2" id="number2" placeholder="Segundo numero">
            <label for="operacion"></label>
            <select id="operacion" name="operacion">
                <option value="suma">Suma</option>
                <option value="resta">Resta</option>
                <option value="multiplicacion">Multiplicacion</option>
                <option value="division">Division</option>
            </select>
            <input type="submit" value="=">
        </form>
    </fieldset>

    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['number1']) && isset($_POST['number2'])) {
    $num1 = $_POST['number1'];
    $num2 = $_POST['number2'];
    $operacion = $_POST['operacion'];
    switch($operacion){
        case 'suma':
            echo $num1 + $num2;
            break;
            case 'resta':
                echo $num1 - $num2;
                break;
                case 'multiplicacion':
                    echo $num1 * $num2;
                    break;
                    case 'division':
                        echo $num1 / $num2;
                        break;
                        default:
                        echo "error en switch";
    }
}
    ?>


</body>

</html>