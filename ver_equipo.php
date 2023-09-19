

<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Equipo</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-family: Arial, sans-serif;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>



<?php
require_once __DIR__ . '/model/EquipoModel.php';
require_once __DIR__ . '/model/JugadorModel.php';

// Recojo el id del equipo
$equipoId = $_GET['id'];

// Creo una instancia del modelo
$equipoModel = new EquipoModel();
$jugadorModel = new JugadorModel();

$equipo = $equipoModel->obtenerEquipoPorId($equipoId);

if ($equipo) {
    // Muestro la info del equipo
    echo "<h2>Detalles del Equipo</h2>";
    echo "<p><strong>Nombre:</strong> {$equipo['nombre']}</p>";
    echo "<p><strong>Ciudad:</strong> {$equipo['ciudad']}</p>";
    echo "<p><strong>Deporte:</strong> {$equipo['deporte']}</p>";
    echo "<p><strong>Fecha:</strong> {$equipo['fecha']}</p>";

    // Obtener jugadores asociados a este equipo
    $jugadores = $jugadorModel->obtenerJugadoresPorEquipo($equipoId);

    if ($jugadores) {
        echo "<h2>Jugadores del equipo</h2>";
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Número</th></tr>";
        foreach ($jugadores as $jugador) {
            echo "<tr><td>{$jugador['nombre']}</td><td>{$jugador['numero']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No hay jugadores asociados a este equipo.";
    }

} else {
    echo "Equipo no encontrado.";
}
?>
</body>
</html>