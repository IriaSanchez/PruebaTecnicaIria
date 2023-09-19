<?php
// verificar que se recibió el ID del jugador
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $jugadorId = $_GET['id'];

    require_once __DIR__ . '/../model/JugadorModel.php';

    // Crear una instancia de JugadorModel
$jugadorModel = new JugadorModel();

    $jugador = $jugadorModel->obtenerJugadorPorId($jugadorId);

    if (!$jugador) {
        echo "Jugador no encontrado.";
        exit();
    }
} else {
    echo "Solicitud no válida.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Jugador</title>
</head>
<body>
    <h1>Editar Jugador</h1>

    <form action="guardar_jugador.php" method="post">
        <input type="hidden" name="id" value="<?php echo $jugador['id']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $jugador['nombre']; ?>">
        <br><br>

        <label for="numero">Número:</label>
        <input type="number" id="numero" name="numero" value="<?php echo $jugador['numero']; ?>">
        <br><br>

        <button type="submit">Guardar Cambios</button>
   </form>

</body>
</html>
