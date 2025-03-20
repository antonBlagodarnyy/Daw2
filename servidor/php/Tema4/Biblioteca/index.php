<?php
require_once("funciones.php");
require_once("clases.php");

$materiales = leerMateriales();

?>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    switch (true) {
        case (isset($_POST["añadir_libro"])):
            $libro = new Libro($_POST['isbn'], $_POST['titulo'], $_POST['autor']);
            anadirMaterial($libro);
            setcookie("accion","Añadir libro.");
            header("Refresh:0");
            break;

        case (isset($_POST["añadir_revista"])):
            $revista = new Revista($_POST['issn'], $_POST['titulo'], $_POST['numero']);
            anadirMaterial($revista);
            setcookie("accion","Añadir revista.");
            header("Refresh:0");
            break;

        case (isset($_POST['cambiar'])):
            cambiarDisponibilidad($_POST['cambiar']);
            setcookie("accion","Cambiar disponibilidad");
            header("Refresh:0");
            break;
        case (isset($_POST['borrar'])):
            borrarMaterial($_POST['borrar']);
            setcookie("accion","Borrar material");
            header("Refresh:0");
            break;
        case (isset($_POST['consultar'])):
            registrarVisita($_POST['consultar']);
            setcookie("accion","Consultar material.");
            header("Refresh:0");
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
    <title>Biblioteca</title>
    <style>
        body {
            font-family: Arial;
            margin: 20px;
        }

        h1,
        h2,
        h3 {
            color: #333;
        }

        .mensaje {
            background: #f0f0f0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }

        form {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin: 5px 0;
        }

        input,
        select {
            margin-bottom: 10px;
        }

        .formulario {
            border: 1px solid #000;
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h1>Biblioteca</h1>

    <div class="mensaje">
        <?php
        $mensaje = "";
        if (!isset($_COOKIE['consulta']))
            $mensaje = "Sin consultas en los ultimos 5 segundos.";
        else
            $mensaje = obtenerMensaje();
        ?>

        <?= $mensaje ?>
    </div>

    <!-- Selector de tipo de material -->
    <h2>Añadir Material</h2>
    <form method="post">
        <label>Tipo de material:</label>
        <select name="tipo" onchange="this.form.submit()">
            <option value=""></option>
            <option value="libro">Libro</option>
            <option value="revista">Revista</option>
        </select>
    </form>

    <!-- Formulario específico según el tipo seleccionado -->
    <?php if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['tipo'])): ?>
        <div class="formulario">
            <?php if ($_POST['tipo'] == "libro"): ?>
                <!-- Formulario para libros -->
                <form method="post">
                    <h3>Añadir Libro</h3>

                    <label>ISBN:</label>
                    <input type="text" name="isbn" required>

                    <label>Título:</label>
                    <input type="text" name="titulo" required>

                    <label>Autor:</label>
                    <input type="text" name="autor" required>

                    <button type="submit" name="añadir_libro">Añadir Libro</button>
                </form>

            <?php elseif ($_POST['tipo'] == "revista"): ?>
                <!-- Formulario para revistas -->
                <form method="post">
                    <h3>Añadir Revista</h3>

                    <label>ISSN:</label>
                    <input type="text" name="issn" required>

                    <label>Título:</label>
                    <input type="text" name="titulo" required>

                    <label>Número:</label>
                    <input type="text" name="numero" required>

                    <button type="submit" name="añadir_revista">Añadir Revista</button>
                </form>
            <?php endif; ?>
        <?php endif; ?>
      
        <p>Ultima accion realizada: <?=isset($_COOKIE['accion']) ? $_COOKIE['accion'] : "" ?></p>
        </div>

        <!-- Lista de materiales -->
        <h2>Materiales Disponibles</h2>
        <?php if (empty($materiales)): ?>
            <p>No hay materiales en la biblioteca.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>Tipo</th>
                    <th>Identificador</th>
                    <th>Título</th>
                    <th>Detalles</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>

                <?php foreach ($materiales as $material):
                ?>
                    <tr>

                        <td><?= get_class($material) ?> </td>

                        <td><?= $material->getIdentificador() ?> </td>

                        <td><?= $material->getTitulo() ?> </td>

                        <td><?= $material->getDetalle() ?> </td>
                        <td><?= $material->getDisponibilidad() ? "Disponible" : "No disponible" ?> </td>
                        <td>
                            <form method="post" style="display: inline; margin: 0;">
                                <button type="submit" name="cambiar" value="<?= $material->getIdentificador() ?>">Cambiar disponibilidad</button>
                                <button type="submit" name="consultar" value="<?= $material->getTitulo() ?>">Consultar</button>
                                <button type="submit" name="borrar" value="<?= $material->getIdentificador() ?>">Borrar</button>
                            </form>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </table>
        <?php endif; ?>
</body>

</html>