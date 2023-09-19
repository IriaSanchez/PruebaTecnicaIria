<?php
require_once __DIR__ . '/controller/EquipoController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $ciudad = $_POST['ciudad'];
    $deporte = $_POST['deporte'];
    $fecha = $_POST['fecha'];

    if (empty($nombre) || empty($ciudad) || empty($deporte) || empty($fecha)) {
        echo 'Todos los campos son obligatorios';
    } else {
        $equipoController = new EquipoController();
        $equipoController->agregarEquipo($nombre, $ciudad, $deporte, $fecha);
        echo 'Equipo guardado correctamente.';
    }
} else {
    echo "Acceso no válido.";
}

// Redirige a index.php
header("Location: index.php");
?>
