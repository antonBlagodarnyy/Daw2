<?php

// SI LOS CAMPOS NO ESTÁN VACÍOS SE VA A PRINCIPAL

if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
    if (!empty($_POST['dni'])) {
       setcookie('dni',$_POST['dni'],time()+30);
        header('Location: principal.php');
    } 
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi Banco</title>
</head>

<body>
    <h1>Bienvenido a Mi Banco</h1>
    <p>Ingresa tus datos para acceder a tu cuenta bancaria.</p>
    <form method="post">
        <label for="dni">Ingresa tu DNI:</label>
        <input type="text" id="dni" name="dni" required>
        <br><br>
        <input type="submit" value="Entrar">
    </form>
</body>

</html>