<?php
require_once __DIR__ . '/../model/JugadorModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $jugadorId = $_GET['id'];

    $jugadorModel = new JugadorModel();

    // Intenta eliminar al jugador
    if ($jugadorModel->eliminarJugador($jugadorId)) {
        echo "Jugador eliminado exitosamente.";
    } else {
        echo "No se pudo eliminar al jugador.";
    }
} else {
    echo "Solicitud no válida.";
}
?>