<?php
require_once __DIR__ . '/../model/JugadorModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jugadorId = $_POST['id'];
    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];

    $jugadorModel = new JugadorModel();

    if ($jugadorModel->editarJugador($jugadorId, $nombre, $numero)) {
        echo 'Jugador actualizado correctamente.';
    } else {
        echo 'Error al actualizar el jugador.';
    }
} else {
    echo "Acceso no válido.";
}
?>
