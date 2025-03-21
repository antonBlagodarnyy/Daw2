<?php
require_once('funciones.php');
// Verificar si la cookie está activa y renovar cookie
// Si la cookie ha caducado, nos manda a index.php
if (!isset($_COOKIE['dni'])) {
    header('Location: index.php');
    exit();
} else {
    setcookie('dni', $_COOKIE['dni'], time() + 30);
}

// Inicializar archivo del usuario si no existe. 
// Cada usuario tiene su fichero dni.dat, el cual resulta de concatenar el dni con ".dat"
if (!file_exists($_COOKIE['dni'] . '.dat')) {
    file_put_contents($_COOKIE['dni'] . '.dat', serialize([]));
}
$movimientos = leerMovimientos($_COOKIE['dni']);
// Procesar acciones de formularios
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // BOTON Agregar movimiento
    if (isset($_POST['nuevoMovimiento'])) {
        if ($_POST['tipo'] == 'gasto') {
            array_push($movimientos, new Gasto(date_create($_POST['fecha']), $_POST['concepto'], $_POST['cantidad'], $_POST['desdeHasta']));
        } else {
            array_push($movimientos, new Ingreso(date_create($_POST['fecha']), $_POST['concepto'], $_POST['cantidad'], $_POST['desdeHasta']));
        }
        guardarMovimientos($_COOKIE['dni'], $movimientos);
    }

    // BOTÓN Cerrar sessión, caducando la cookie
    if (isset($_POST['cerrar'])) {
        setcookie('dni', '', time() - 1);
        header('Location: index.php');
        exit();
    }
}

// Obtener movimientos de tu propio fichero, para mostrar


// Calcular saldo, recorriendo los movimientos y sumando/restando
$saldo = 0.0;
if($movimientos){
foreach ($movimientos as  $movimiento) {
    if (get_class($movimiento) == "Gasto") {
        $saldo -= $movimiento->getCantidad();
    } else $saldo += $movimiento->getCantidad();
}
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi Banco - Principal</title>
</head>

<body>
    <h1>Bienvenido, <?= $_COOKIE['dni'] ?></h1>

    <!--  Botón cerrar sesión -->
    <form method="post">
        <input type="submit" name="cerrar" value="Cerrar sesión">
    </form>

    <!--  MENSAJE INFORMATIVO -->


    <h2><?php echo 'Añadir nuevo movimiento'; ?></h2>

    <!--  FORMULARIO DE AÑADIR -->
    <form method="POST">
        <table border="0">

            <tr>
                <label for="tipo">Tipo de movimiento:</label>
                <select name="tipo" id="tipo">
                    <option value="gasto">Gasto</option>
                    <option value="ingreso">Ingreso</option>
                </select>
            </tr>
            <tr>
                <td><label for="fecha">Fecha:</label></td>
                <td><input type="date" id="fecha" name="fecha" required></td>
            </tr>
            <tr>
                <td><label for="concepto">Concepto:</label></td>
                <td><input type="text" id="concepto" name="concepto" required></td>
            </tr>
            <tr>
                <td><label for="cantidad">Cantidad (€):</label></td>
                <td><input type="number" id="cantidad" step="0.01" name="cantidad" required>
                </td>
            </tr>
            <tr>
                <td><label for="desdeHasta">Desde/hacia (persona)</label></td>
                <td><input type="text" name="desdeHasta"></td>
            </tr>
            <tr>
                <td>

                    <form method="POST">
                        <input type="submit" name="nuevoMovimiento" value="Añadir">
                    </form>
                </td>
            </tr>
        </table>
    </form>

    <!-- Tabla de movimientos -->
    <h2>Movimientos (Saldo actual: <?= $saldo//MUESTRA AQUÍ EL SALDO 
                                    ?>€)</h2>


    <?php if (empty($movimientos)): ?>
        <p>No hay movimientos registrados.</p>
    <?php else : ?>

        <table border="1">
            <tr>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Concepto</th>
                <th>Cantidad</th>
                <th>Detalles</th>
            </tr>
            <?php foreach ($movimientos as $key => $movimiento): //INICIO DE LA TABLA DE MOVIMIENTOS 
            ?>
                <tr>
                    <td><?= get_class($movimiento) //INGRESO O GASTO 
                        ?></td>
                    <td><?= date_format($movimiento->getFecha(), 'd/m/y')
                        ?></td>
                    <td><?= $movimiento->getConcepto() //CONCEPTO 
                        ?></td>
                    <td><?= $movimiento->getCantidad() //CANTIDAD 
                        ?>€</td>
                    <td><?= $movimiento->getDesdeHacia() //DESDE / HACIA
                        ?></td>
                </tr>
            <?php endforeach; //fin de la tabla 
            ?>
        </table>
    <?php endif ?>

</body>

</html>