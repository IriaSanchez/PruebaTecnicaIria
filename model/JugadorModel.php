<?php

/*Defino la clase del modelo con el host, usuario, contraseña,
bbdd a la que quiero acceder,  el puerto de MariaDB y la conexión privada también*/
class JugadorModel
{
    private $host = 'localhost';
    private $usuario = 'root';
    private $contrasena = '';
    private $db_nombre = 'deportes';
    private $puerto = 3307;
    private $conexion;


      /*Creo el constructor de la clase creando una nueva instancia de la clase mysqli
    para poder establecer la conexión a la bbdd con los valores declarados antes*/
    public function __construct()
    {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->contrasena, $this->db_nombre, $this->puerto);

        //Ahora comprueblo si hay error en la conexión , si es así, finaliza el programa con die
        if ($this->conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $this->conexion->connect_error);
        }
    }




    //Creo la función para hacer la inserccion del jugador
    //Devuelve true o false según se insertó o no
    public function insertarJugador($nombre, $numero, $equipoId)
    {
        $query = "INSERT INTO Jugador (nombre, numero, equipo_id) VALUES ('$nombre', $numero, $equipoId)";

        if ($this->conexion->query($query)) {
            return true; 
        } else {
            echo "Error en la inserción: " . $this->conexion->error;
            return false; 
        }
    }





    //Creo la función para hacer la consulta y almaceno su resultado en una variable nueva
    public function obtenerJugadoresPorEquipo($equipoId)
    {
        $query = "SELECT * FROM Jugador WHERE equipo_id = $equipoId";
        $result = $this->conexion->query($query);

        //Creo el array de equipos para guardar todos los jugadores que haya en la bbdd
        $jugadores = array();

        //Recorro el array con un while
        while ($row = $result->fetch_assoc()) {
            $jugadores[] = $row;
        }

        //Devuelvo el resultado
        return $jugadores;
    }




    //Función para poder editar un jugador que actualiza los datos seteando los que hay por los nuevos
    public function editarJugador($jugadorId, $nuevoNombre, $nuevoNumero)
    {
        $query = "UPDATE Jugador SET nombre = '$nuevoNombre', numero = $nuevoNumero WHERE id = $jugadorId";

        //Update ok
        if ($this->conexion->query($query)) {
            return true; 
        //Error al actualizar    
        } else {
            echo "Error en la actualización: " . $this->conexion->error;
            return false; 
        }
    }
  
    
    
    
    
    //Función para eliminar jugador pasandole el id
    public function eliminarJugador($jugadorId)
    {
        $query = "DELETE FROM Jugador WHERE id = $jugadorId";
        return $this->conexion->query($query);
    }




    //Función para buscar jugadores por id
    public function obtenerJugadorPorId($jugadorId)
    {
        $query = "SELECT * FROM Jugador WHERE id = $jugadorId";
        $result = $this->conexion->query($query);

        if ($result->num_rows === 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }



    //Función que actualiza el equipo que tiene asociado un jugador
    public function actualizarAsociacionEquipo($jugadorId, $nuevoEquipoId)
    {
        // Validación
        if (!is_numeric($jugadorId) || !is_numeric($nuevoEquipoId)) {
            return false;
        }

        // Actualizo la asociación del jugador con un nuevo equipo en la bbdd
        $query = "UPDATE Jugador SET equipo_id = $nuevoEquipoId WHERE id = $jugadorId";

        if ($this->conexion->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}



?>