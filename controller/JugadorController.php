<?php

require_once __DIR__ . '/../model/JugadorModel.php';

class JugadorController {
    private $jugadorModel;

    public function __construct() {
        $this->jugadorModel = new JugadorModel();
    }

    public function agregarJugador($nombre, $numero, $equipoId) {
        $resultado = $this->jugadorModel->insertarJugador($nombre, $numero, $equipoId);

        if ($resultado) {
            echo "Jugador insertado correctamente.";
        } else {
            echo "Error al insertar el jugador.";
        }
    }

    public function obtenerJugadoresPorEquipo($equipoId) {
        $jugadores = $this->jugadorModel->obtenerJugadoresPorEquipo($equipoId);
        require_once __DIR__ . '/../view/JugadorView.php';
    }
}
?>
