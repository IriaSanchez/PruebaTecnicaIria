<?php

require_once __DIR__ . '/../model/JugadorModel.php';

class JugadorController
{
    private $jugadorModel;

    public function __construct()
    {
        $this->jugadorModel = new JugadorModel();
    }

    public function agregarJugador($nombre, $numero, $equipoId)
    {
        // Llama al método para insertar jugador en el modelo
        $resultado = $this->jugadorModel->insertarJugador($nombre, $numero, $equipoId);
    
        if ($resultado) {
            // Si la inserción fue exitosa, redirige a la página del equipo
            header("Location: /equipos/ver_equipo.php?id=" . $equipoId);
            exit();
        } else {
            echo "Error al insertar el jugador.";
        }
    }
    
    

    public function obtenerJugadoresPorEquipo($equipoId)
    {
        $jugadores = $this->jugadorModel->obtenerJugadoresPorEquipo($equipoId);
        require_once __DIR__ . '/../view/JugadorView.php';
    }
}
?>