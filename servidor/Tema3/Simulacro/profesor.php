<?php
require_once("clases.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch (true) {

        case (isset($_POST['asignar'])):
            $usuarios = unserialize(file_get_contents("Usuarios.php"));
            if(isset( $usuarios[$_POST['nombreAlumno']])){
            $alumno = $usuarios[$_POST['nombreAlumno']];
            $alumno->aniadirNota($_POST['asignatura'], $_POST['nota']);

            $usuarios[$alumno->getNombre()] = $alumno;
            file_put_contents("Usuarios.php", serialize($usuarios));
            } else echo "<p>Alumno no encontrado</p>";
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
    <h2>Asignar Notas</h2>
    <form action="" method="POST">
        <label for="nombreAlumno">Nombre del alumno:</label>
        <input type="text" name="nombreAlumno" required><br>
        <label for="asignatura">Asignatura:</label>
        <input type="text" name="asignatura" required><br>
        <label for="nota">Nota:</label>
        <input type="number" name="nota" min="0" max="10" required><br>
        <button type="submit" name="asignar">Asignar nota</button>
    </form>

    <form action="profesor.php" method="POST">
        <button type="submit" name="cerrar">Cerrar</button>
    </form>
</body>

</html>