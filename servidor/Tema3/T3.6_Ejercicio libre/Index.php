<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio libre</title>
    <?php
     $usuarios = unserialize( file_get_contents("Usuarios.php"));
                  
    ?>
</head>
<!--Carrito de la compra
    Crear una tienda online en la que haya un sistema de registro de usuario.
     Los usuarios registrados se almacenaran en un fichero.
     Usa cookies y session para hacer que el carrito de cada usuario registrado sea no volatil.
-->
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

            case (isset($_POST['Login'])&& $usuarios)://Ademas de checkear que sea login,
                 //checkeo que el archivo usuarios no este vacio, si esta vacio $usuarios es false

                if (in_array($_POST['nombre'], $usuarios)) {
                    session_start();
                    $_SESSION['usuario'] = $_POST['nombre'];
                    header("Location: Catalogo.php");
                    exit();
                } else {
                    echo "<p>Ese login no esta registrado</p>";
                }
                break;
            
                case isset($_POST['Registrarse']):
                $usuarios[] = $_POST['nombre'];
                file_put_contents("Usuarios.php", serialize($usuarios));
               
                echo "<p>Registro exitoso</p>";
                break;
            
                default:
                break;
        }
    }
    ?>
</body>
</html>