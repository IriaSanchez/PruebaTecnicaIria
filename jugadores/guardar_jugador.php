<?php
require_once __DIR__ . '/../model/JugadorModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jugadorId = $_POST['id'];
    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];
    $nuevoEquipoId = $_POST['equipoId']; // Nuevo equipo seleccionado

    $jugadorModel = new JugadorModel();

    if ($jugadorModel->editarJugador($jugadorId, $nombre, $numero, $nuevoEquipoId)) {
        // Actualizar la asociación del jugador con un nuevo equipo en la base de datos
        $jugadorModel->actualizarAsociacionEquipo($jugadorId, $nuevoEquipoId);

        echo '<script>alert("Jugador actualizado correctamente.");</script>';
        // Redirigir a la página del equipo original
        header("Location: ../equipos/ver_equipo.php?id=" . urlencode($jugador['equipo_id']));
        exit();
    } else {
        echo '<script>alert("Error al actualizar el jugador.");</script>';
        // Redirigir a la página del equipo original
        header("Location: ../equipos/ver_equipo.php?id=" . urlencode($jugador['equipo_id']));
        exit();
    }
} else {
    echo "Acceso no válido.";
}

?>