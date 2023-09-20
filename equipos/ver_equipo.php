<!DOCTYPE html>
<html>

<head>

    <title>Detalles del Equipo</title>

    <!--Estilos muy básicos para mejorar un poco la apariencia de cara al usuario -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f0f0f0;
        }

        table {
            width: 50%;
            background-color: #fff;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

    </style>
</head>

<body>

    <?php

    /*Utilizo require para poder incluir en este script de controlador 
    el EquipoModel.php y JugadorModel.php que no está en este script*/
    require_once __DIR__ . '/../model/EquipoModel.php';
    require_once __DIR__ . '/../model/JugadorModel.php';

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

        // Obtengo los jugadores asociados a este equipo
        // Y se muestran en una tabla si los hay, sino, un mensaje con echo
        $jugadores = $jugadorModel->obtenerJugadoresPorEquipo($equipoId);

        if ($jugadores) {
            echo "<h2>Jugadores del equipo</h2>";
            echo "<table>";
            echo "<tr><th>Nombre</th><th>Número</th><th>Opciones</th></tr>";

            foreach ($jugadores as $jugador) {

                echo "<tr>";
                echo "<td>{$jugador['nombre']}</td>";
                echo "<td>{$jugador['numero']}</td>";
                echo "<td>";
                echo "<a href='../jugadores/editar_jugador.php?id={$jugador['id']}'>Editar</a> ";
                echo " | ";
                echo "<a href='../jugadores/eliminar_jugador.php?id={$jugador['id']}'>Eliminar</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No hay jugadores asociados a este equipo.";
        }

    }
    ?>
</body>

</html>