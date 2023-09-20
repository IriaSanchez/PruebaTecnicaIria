<?php

/*Utilizo require para poder incluir en este script de controlador 
el JugadorModel.php que no está en este script*/

require_once __DIR__ . '/../model/JugadorModel.php';



class JugadorController{

    /*Declaro jugadorModel para almacenar una instancia de la clase JugadorModel
     que se encuentra en otro script distinto*/
    private $jugadorModel;




    //Creo el constructor de la clase creando una nueva instancia
    public function __construct(){

        $this->jugadorModel = new JugadorModel();
    }



    //Método con sus parámetros para agregar un jugador
    public function agregarJugador($nombre, $numero, $equipoId)
    {
        // Llamo al método para insertar jugador en el modelo
        $resultado = $this->jugadorModel->insertarJugador($nombre, $numero, $equipoId);
    
        if ($resultado) {
            //Si se insertó, me redirige a la página de ver_equipo
            header("Location: /equipos/ver_equipo.php?id=" . $equipoId);
            exit();
        } else {
            echo "Error al insertar el jugador.";
        }
    }
    
    
    //Método para obtener los jugadores de cada equipo
    public function obtenerJugadoresPorEquipo($equipoId)
    {
        $jugadores = $this->jugadorModel->obtenerJugadoresPorEquipo($equipoId);
        require_once __DIR__ . '/../view/JugadorView.php';
    }
}
?>