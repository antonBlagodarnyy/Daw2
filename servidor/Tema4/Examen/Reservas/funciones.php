<?php
require_once("connection.php");

// Función para comprobar si un aula está disponible
function comprobarDisponibilidad($aula_id): bool
{
    $conn = conectar();

    $sql = "SELECT * FROM reservas WHERE aula_id = :aula_id AND reservada = TRUE";

    // Si hay resultados, significa que el aula ya está reservada
    // Si no hay resultados, está libre

}

// Crear nueva reserva
function crearReserva($profesor_id, $aula_id, $fecha, $motivo): bool
{
    $pdo = conectarBD();
    // Comprobar disponibilidad, usando la función anterior

    // Si el aula está libre, hago la reserva
    $stmt = $pdo->prepare("INSERT INTO reservas (profesor_id, aula_id, fecha, motivo) VALUES (:profesor_id, :aula_id, :fecha, :motivo)");
}

// Eliminar reserva
function eliminarReserva($reserva_id, $profesor_id): bool
{

    $stmt = $pdo->prepare("DELETE FROM reservas WHERE id = :reserva_id AND profesor_id = :profesor_id");
}

// Obtener reservas del profesor actual
function obtenerReservas($profesor_id)
{
    $conn = conectar();
    $stmt = $conn->prepare("SELECT r.*, a.nombre as aula_nombre 
                             FROM reservas r JOIN aulas a ON r.aula_id = a.id 
                            WHERE r.profesor_id = :profesor_id 
                            ORDER BY r.fecha DESC");
    $stmt->bindParam(":profesor_id", $profesor_id, $conn::PARAM_INT);
    $stmt->execute();
    $reservas = [];
    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $reservas[] = $fila;
    }
    desconectar($conn);
    return $reservas;
}

// OBTENER AULAS LIBRES
function obtenerAulas()
{
    $conn = conectar();
    $sql = "SELECT a.* FROM aulas a 
             WHERE a.id NOT IN (SELECT DISTINCT r.aula_id 
                                  FROM reservas r 
                                 WHERE r.reservada = TRUE) 
             ORDER BY a.nombre";
    $stmt = $conn->prepare($sql);
    $aulas = [];
    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $aulas[] = $fila;
    }
    desconectar($conn);
    return $aulas;
}

// Cambiar estado de reserva (de activa a terminada)
function cambiarEstadoReserva($reserva_id, $profesor_id)
{
    //SI NO HAY RESERVA, NO TIENE FILAS EN LA TABLA RESERVAS
    // SI TIENE UNA FILA CON "RESERVADA" VALOR 1, ESTÁ RESERVADA
    // SI TIENE UNA FILA CON "RESERVADA" VALOR 0, ESTÁ TERMINADA

    // Obtener estado actual
    $stmt = $pdo->prepare("SELECT reservada FROM reservas WHERE id = :reserva_id AND profesor_id = :profesor_id");

    // Actualizar desde reservada (reservada = 1), a terminada (reservada = 0)
    $stmt = $pdo->prepare("UPDATE reservas SET reservada = :reservada WHERE id = :reserva_id AND profesor_id = :profesor_id");
}
