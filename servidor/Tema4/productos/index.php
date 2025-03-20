<?php
require_once("funciones.php");
session_start();
$productos = obtenerProductos();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['crear'])) {
    crearProducto($_POST['nombre'], $_POST['descripcion'], $_POST['precio']);
    header("Refresh:0");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['actualizar'])) {
    actualizarProducto($_POST['actualizar'], $_POST['nombre'], $_POST['descripcion'], $_POST['precio']);
    header("Refresh:0");
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['borrar'])) {
    eliminarProducto($_POST['borrar']);
    header("Refresh:0");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
</head>

<body>
    <h1>Productos</h1>


    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editar'])):  ?>
        <!-- Formulario para agregar producto -->
        <?php $producto = obtenerProductoPorId($_POST['editar']);

        $_SESSION['id'] = $producto['id'];
        $_SESSION['nombre'] = $producto['nombre'];
        $_SESSION['descripcion'] = $producto['descripcion'];
        $_SESSION['precio'] = $producto['precio'];

        ?>

        <h1>Editar Producto</h1>
        <form action="index.php?>" method="POST">
            <input type="text" name="nombre" value="<?= $_SESSION['nombre'] ?>" required>
            <textarea name="descripcion"><?= $_SESSION['descripcion'] ?></textarea>
            <input type="number" step="0.01" name="precio" value="<?= $_SESSION['precio'] ?>" required>
            <button type="submit" name="actualizar"  value="<?= $_SESSION['id'] ?>">Actualizar</button>
        </form>


    <?php else: ?>
        <form action="" method="POST">
            <h1>Añadir producto</h1>
            <input type="text" name="nombre" placeholder="Nombre" required><br>
            <textarea name="descripcion" placeholder="Descripción"></textarea><br>
            <input type="number" step="0.01" name="precio" placeholder="Precio" required>
            <button type="submit" name="crear" value="crear">Añadir</button>
        </form>
    <?php endif; ?>


    <h2>Lista de productos</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Fecha de creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($productos as $key => $producto):
            ?>
                <tr>

                    <td><?= $producto['id']; ?></td>
                    <td><?= $producto['nombre'] ?></td>
                    <td><?= $producto['descripcion'] ?></td>
                    <td><?= $producto['precio'] ?></td>
                    <td><?= $producto['fecha_creacion'] ?></td>
                    <td>
                        <form action="" method="POST">
                            <!-- Botones para editar y eliminar -->
                            <button type="submit" name="editar" value="<?= $producto['id'] ?>">Editar</button>
                            <button type="submit" name="borrar" value="<?= $producto['id'] ?>">Borrar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>