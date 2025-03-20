<?php
require_once('clases.php');
require_once('../Servicios/NotasService.php');

session_start();

if (!isset($_SESSION['usuario']) || isset($_POST['cerrar'])) {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit;
}

$usuario = $_SESSION['usuario'];


echo "<h1>Hola, {$usuario['nombre']}</h1>";
echo "<h2>Tus notas:</h2>";

$notas = selectNotas($usuario['id']);

if (count($notas) > 0) {
    echo "<ul>";
    foreach ($notas as $key => $nota) {
        echo "<li>$key: Asignatura: " . $nota['asignatura'] . " Nota: " . $nota['nota'] . "</li>";
    }
    echo "</ul>";
} else  echo "No tienes notas asignadas.";


?>

<form method="POST">
    <button type="submit" name="cerrar">Cerrar</button>
</form>