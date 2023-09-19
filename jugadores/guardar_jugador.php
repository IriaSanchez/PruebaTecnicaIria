<?php
require_once __DIR__ . '/../model/JugadorModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];
    $equipoId = $_POST['equipoId'];

    $jugadorModel = new JugadorModel();

    if ($jugadorModel->insertarJugador($nombre, $numero, $equipoId)) {
        echo '<script>alert("Jugador insertado correctamente.");</script>';
        header("Location: ../equipos/ver_equipo.php?id=" . urlencode($equipoId));
        exit();
    } else {
        echo '<script>alert("Error al insertar el jugador.");</script>';
        header("Location: ../equipos/ver_equipo.php?id=" . urlencode($equipoId));
        exit();
    }
} else {
    echo "Acceso no válido.";
}
?>
