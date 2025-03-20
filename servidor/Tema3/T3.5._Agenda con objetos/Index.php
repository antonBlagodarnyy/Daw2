<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <?php
    // Obtener el valor actual de la cookie, si existe. Si no existe una, la creamos
    if (isset($_COOKIE['logins'])) {
        $personas = unserialize($_COOKIE['logins']);
    } else {
        $personas = array();
    }

    // Actualizar 
    setcookie('logins', serialize($personas));
    ?>
</head>

<body>
    <h1>Login</h1>
    <form method="POST">
        <input type="text" name="nombre" id="nombre">
        <input type="submit" name="Login" value="Login">
        <input type="submit" name="Registrarse" value="Registrarse">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        switch (true) {

            case (isset($_POST['Login'])):
                if (in_array($_POST['nombre'], $personas)) {
                    header("Location: Agenda.php");
                    exit();
                } else {
                    echo "<p>Ese login no esta registrado</p>";
                }
                break;

            case isset($_POST['Registrarse']):
                $personas[] = $_POST['nombre'];
                setcookie('logins', serialize($personas));
                echo "<p>Registro exitoso</p>";
                break;

            default:
                break;
        }
    }
    ?>
</body>

</html>