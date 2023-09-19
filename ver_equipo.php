<?php

require_once __DIR__ . '/model/EquipoModel.php';

//Recojo el id del equipo
$equipoId = $_GET['id'];

// Creo una instancia del modelo
$equipoModel = new EquipoModel();


$equipo = $equipoModel->obtenerEquipoPorId($equipoId);

if ($equipo) {
    // Mostrar los detalles del equipo si existe el id
    echo "<h2>Detalles del Equipo</h2>";
    echo "<p><strong>Nombre:</strong> {$equipo['nombre']}</p>";
    echo "<p><strong>Ciudad:</strong> {$equipo['ciudad']}</p>";
    echo "<p><strong>Deporte:</strong> {$equipo['deporte']}</p>";
    echo "<p><strong>Fecha:</strong> {$equipo['fecha']}</p>";

} else {
    echo "Equipo no encontrado.";
}
?>
