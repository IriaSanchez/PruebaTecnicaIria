<?php

class JugadorModel {
    private $host = 'localhost';
    private $usuario = 'root';
    private $contrasena = '';
    private $db_nombre = 'deportes';
    private $puerto = 3307;
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->contrasena, $this->db_nombre, $this->puerto);

        if ($this->conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $this->conexion->connect_error);
        }
    }

    public function insertarJugador($nombre, $numero, $equipoId) {
        $query = "INSERT INTO Jugador (nombre, numero, equipo_id) VALUES ('$nombre', $numero, $equipoId)";

        if ($this->conexion->query($query) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerJugadoresPorEquipo($equipoId) {
        $query = "SELECT * FROM Jugador WHERE equipo_id = $equipoId";
        $result = $this->conexion->query($query);

        $jugadores = array();

        while ($row = $result->fetch_assoc()) {
            $jugadores[] = $row;
        }

        return $jugadores;
    }
}

?>
