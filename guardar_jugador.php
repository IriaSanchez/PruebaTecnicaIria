<?php
require_once __DIR__ . '/model/JugadorModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];
    $equipoId = $_POST['equipoId'];

    if (empty($nombre) || empty($numero) || empty($equipoId) || !is_numeric($numero)) {
        echo 'Todos los campos son obligatorios y el número debe ser un valor numérico.';
    } else {
        $jugadorModel = new JugadorModel();
        $jugadorModel->insertarJugador($nombre, $numero, $equipoId);
        echo 'Jugador agregado correctamente.';
    }
} else {
    echo "Acceso no válido.";
}
