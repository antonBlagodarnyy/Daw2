<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>

    <?php
    require_once("Fruta.php");
    session_start();
    if (isset($_COOKIE[$_SESSION['usuario']])) {
        $carrito = unserialize($_COOKIE[$_SESSION['usuario']]);
    } else {
        $carrito = array();
    }

    setcookie($_SESSION['usuario'], serialize($carrito));
    ?>
</head>

<body>
    <form method="POST">
        <!-- Manzana -->
        <input type="checkbox" id="Manzana" name="Manzana" value="Manzana">
        <label for="Manzana">Manzana</label><br>
        <input type="number" id="kgManzana" name="kgManzana" min="1"><br>

        <!-- Naranja -->
        <input type="checkbox" id="Naranja" name="Naranja" value="Naranja">
        <label for="Naranja">Naranja</label><br>
        <input type="number" id="kgNaranja" name="kgNaranja" min="1"><br>

        <!-- Pera -->
        <input type="checkbox" id="Pera" name="Pera" value="Pera">
        <label for="Pera">Pera</label><br>
        <input type="number" id="kgPera" name="kgPera" min="1"><br>

        <!-- Sandía -->
        <input type="checkbox" id="Sandia" name="Sandia" value="Sandia">
        <label for="Sandia">Sandía</label><br>
        <input type="number" id="kgSandia" name="kgSandia" min="1"><br>

        <!-- Fresa -->
        <input type="checkbox" id="Fresa" name="Fresa" value="Fresa">
        <label for="Fresa">Fresa</label><br>
        <input type="number" id="kgFresa" name="kgFresa" min="1"><br>


        <input type="submit" name="verCarrito" value="Ver carrito">
        <input type="submit" name="Guardar" value="Guardar">
        <input type="submit" name="Borrar" value="Eliminar carrito">
        <input type="submit" name="Salir" value="Salir">
        <?php
        switch (true) {
            case isset($_POST['Guardar']):

                $carrito = [];
                //Lo idoneo seria no poder seleccionar los kg si no se ha seleccionado la fruta antes
                //Pero eso solo se me ocurre hacerlo con js
                //Por eso lo dejo con el doble condicional
                if (isset($_POST['Manzana']) && isset($_POST['kgManzana'])) {
                    $carrito[] = new Fruta('Manzana', $_POST['kgManzana']);
                }

                if (isset($_POST['Naranja']) && isset($_POST['kgManzana'])) {
                    $carrito[] = new Fruta('Naranja', $_POST['kgNaranja']);
                }

                if (isset($_POST['Pera']) && isset($_POST['kgManzana'])) {
                    $carrito[] = new Fruta('Pera', $_POST['kgPera']);
                }

                if (isset($_POST['Sandia']) && isset($_POST['kgManzana'])) {
                    $carrito[] = new Fruta('Sandia', $_POST['kgSandia']);
                }

                if (isset($_POST['Fresa']) && isset($_POST['kgManzana'])) {
                    $carrito[] = new Fruta('Fresa', $_POST['kgFresa']);
                }

                setcookie($_SESSION['usuario'], serialize($carrito));
                echo "<p>Carrito seleccionado</p>";
                break;


            case isset($_POST['verCarrito']):
                echo "<h2>Cesta de la compra:</h2>";

                if (isset($_COOKIE[$_SESSION['usuario']])) {
                    foreach (unserialize($_COOKIE[$_SESSION['usuario']]) as $fruta) {
                        echo "<p>$fruta</p>";
                    }
                }
                break;

            case isset($_POST['Borrar']):
                if (isset($_COOKIE[$_SESSION['usuario']])) {
                    setcookie($_SESSION['usuario'], "", time() - 3600);
                    echo "<p>Carrito borrado</p>";
                } else
                    echo "<p>Carrito vacio.</p>";

                break;


            case isset($_POST['Salir']):
                session_unset();
                session_destroy();
                header("Location: Index.php");
                exit();
                break;
            default:
                break;
        }
        ?>
    </form>
</body>

</html>