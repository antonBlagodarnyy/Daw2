<?php
require_once("clases.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch (true) {

        case (isset($_POST['Login'])):

            break;

        case isset($_POST['cerrar']):
            session_unset();
            session_destroy();
            header("Location: index.php");
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
    <title>Profesor</title>
</head>

<body>
    <h2>Tus notas</h2>
    <ul>
        <?php
        $alumno = $_SESSION['usuario'];

        foreach ($alumno->getNotas() as $asignatura => $nota) {
            echo "<li>" . $asignatura . ":" . $nota . "</li>";
        }

        ?>
    </ul>
    <form action="" method="POST">

        <button type="submit" name="cerrar">Cerrar</button>
    </form>
</body>

</html>