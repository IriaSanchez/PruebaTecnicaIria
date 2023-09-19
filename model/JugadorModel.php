<?php

class JugadorModel
{
    private $host = 'localhost';
    private $usuario = 'root';
    private $contrasena = '';
    private $db_nombre = 'deportes';
    private $puerto = 3307;
    private $conexion;

    public function __construct()
    {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->contrasena, $this->db_nombre, $this->puerto);

        if ($this->conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $this->conexion->connect_error);
        }
    }

    public function insertarJugador($nombre, $numero, $equipoId)
    {
        $query = "INSERT INTO Jugador (nombre, numero, equipo_id) VALUES ('$nombre', $numero, $equipoId)";

        if ($this->conexion->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerJugadoresPorEquipo($equipoId)
    {
        $query = "SELECT * FROM Jugador WHERE equipo_id = $equipoId";
        $result = $this->conexion->query($query);

        $jugadores = array();

        while ($row = $result->fetch_assoc()) {
            $jugadores[] = $row;
        }

        return $jugadores;
    }

    public function editarJugador($jugadorId, $nuevoNombre, $nuevoNumero)
    {
        $query = "UPDATE Jugador SET nombre = '$nuevoNombre', numero = $nuevoNumero WHERE id = $jugadorId";

        if ($this->conexion->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarJugador($jugadorId)
    {
        $query = "DELETE FROM Jugador WHERE id = $jugadorId";
        return $this->conexion->query($query);
    }



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



    public function actualizarAsociacionEquipo($jugadorId, $nuevoEquipoId)
    {
        // Validar que los parámetros son numéricos
        if (!is_numeric($jugadorId) || !is_numeric($nuevoEquipoId)) {
            return false;
        }

        // Actualizar la asociación del jugador con un nuevo equipo en la base de datos
        $query = "UPDATE Jugador SET equipo_id = $nuevoEquipoId WHERE id = $jugadorId";

        if ($this->conexion->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}



?>