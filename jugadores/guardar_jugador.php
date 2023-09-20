<?php

/*Utilizo require para poder incluir en este script de controlador 
el JugadorModel.php que no está en este script*/
require_once __DIR__ . '/../model/JugadorModel.php';

/*Necesito saber si la solicitud es de tipo post y con ello se almacenan las variables que
obtenemos del formulario*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];
    $equipoId = $_POST['equipoId'];

    //Instancia de la clase JugadorModel
    $jugadorModel = new JugadorModel();

    /*Se intenta insertar el jugador llamando al método
    insertarJugador de JugadorModel*/
    if ($jugadorModel->insertarJugador($nombre, $numero, $equipoId)) {
        echo '<script>alert("Jugador insertado correctamente.");</script>';
        header("Location: ../equipos/ver_equipo.php?id=" . urlencode($equipoId));
        exit();
    } else {
        echo '<script>alert("Error al insertar el jugador.");</script>';
        //Si se insertó, redirige a ver_equipo.php
        header("Location: ../equipos/ver_equipo.php?id=" . urlencode($equipoId));
        exit();
    }
} else {
    echo "Acceso no válido.";
}
?>
