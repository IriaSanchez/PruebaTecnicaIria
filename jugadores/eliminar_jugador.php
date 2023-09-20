<?php

/*Utilizo require para poder incluir en este script de controlador 
el JugadorModel.php que no está en este script*/
require_once __DIR__ . '/../model/JugadorModel.php';

/*Necesito saber si la solicitud es de tipo get,
 si se ha proporcionado un id y si es numérico;
se almacena en la variable jugadorId*/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $jugadorId = $_GET['id'];

    //Nueva instancia de la clase JugadorModel
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