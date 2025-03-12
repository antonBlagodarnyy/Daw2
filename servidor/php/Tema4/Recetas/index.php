<?php
require_once(__DIR__ . "/services/recetasService.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    switch (true) {
        case isset($_POST['login']):
            header("Location: pages/auth/login.php");
  
            break;
        case isset($_POST['registrar']):

            header("Location: pages/auth/registro.php");
            break;
        default:
            break;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Recetario</title>
</head>

<body>
    <h1>Recetario</h1>
    <!-- MOSTRAR LA RECETA QUE MAS VECES SEA FAVORITA -->
    <?php
    $recetasFavoritas = recetasFavoritas();
    foreach ($recetasFavoritas as $receta) {
        //TODO Imprimir recetas favoritas
    }

    ?>
    <?php var_dump($recetasFavoritas); ?>

    <form action="" method="POST">
        <!-- Botones para editar y eliminar -->
        <button type="submit" name="login">Log in</button>
        <button type="submit" name="registrar">Registrarse</button>
    </form>
</body>

</html>