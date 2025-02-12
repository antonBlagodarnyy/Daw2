<?php
require_once("clases.php");
$usuarios = unserialize(file_get_contents("Usuarios.php"));


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch (true) {

        case (isset($_POST['iniciar']) && $usuarios): //Ademas de checkear que sea login,
            //checkeo que el archivo usuarios no este vacio, si esta vacio $usuarios es false

            if (in_array($_POST['nombre'], array_keys($usuarios))) {
                 session_start();
                $_SESSION['usuario'] =$usuarios[$_POST['nombre']]; 
                if($_SESSION['usuario']->getTipo()=="alumno" ){
                    header("Location: alumno.php");
                    exit();
                }else{
                    header("Location: profesor.php");
                    exit();
                }
                
            } else {
                echo "<p>Ese login no esta registrado</p>";
            }
            break;

        case isset($_POST['registro']):
            setcookie("registro", true, time() + 5);
            header("Location: registro.php");
            exit();
            break;

        default:
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form action="index.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre"><br>
        <button type="submit" name="iniciar">Iniciar sesión</button>
        <button type="submit" name="registro">Registro</button>
    </form>
</body>

</html>