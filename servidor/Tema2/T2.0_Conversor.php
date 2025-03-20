<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor moneda</title>
</head>

<body>
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        .formulario{
            background-color: #DCDCDC;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .resultado{
            background-color: #DCDCDC;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
<div class="formulario">
    <form name="form" method="post">
        <label for="valor">Valor de la moneda:</label>
        <input type="number" name="valor" id="valor">
        <br>

        <label>
            <input type="radio" name="action" value="E"> Convertir a euros
        </label>
        <label>
            <input type="radio" name="action" value="P"> Convertir a pesetas
        </label>
        <br>
        <input type="submit"></input>
    </form>
    </div>

   <div class="resultado">
    <?php
    define("EurPta", 166.386);
    define("PtaEur", number_format(1 / 166.386, 3));
    echo "<p>Valor de la constante \"EurPta\": " . EurPta . "</p>";
    echo "<p>Valor de la constante \"PtaEur\": " . PtaEur . "</p>";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['valor']) && !empty($_POST['action'])) {
        $valor = $_POST['valor'];
        $action = $_POST['action'];

        if ($action == "P") {
            echo "<p>El resultado es de " . $valor * EurPta;
        } else if ($action == "E") {
            echo "<p>El resultado es de " . $valor * PtaEur;
        }
    } else {
        echo "<p>Introduzca los valores</p>";
    }
    ?>
    </div>
</body>

</html>