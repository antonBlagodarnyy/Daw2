<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();

    if(!isset($_SESSION['nombre'])) {
        echo "No se ha hecho login";
    }
    else {
        echo "Bienvenido " . $_SESSION['nombre'];
    }
    ?>

    <?php
    if(isset($_POST['button1'])) {
           session_destroy();
           header("Location: p1.php");
            exit();
        }
    ?>
    
    <form method="post">
        <input type="submit" name="button1"
                value="Salir"/>

</body>
</html>