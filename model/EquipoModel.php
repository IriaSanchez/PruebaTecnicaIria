<?php

/*Defino la clase del modelo con el host, usuario, contraseña,
bbdd a la que quiero acceder,  el puerto de MariaDB y la conexión privada también*/
 
class EquipoModel {

    private $host = 'localhost';
    private $usuario = 'root';
    private $contrasena = '';
    private $db_nombre = 'deportes';
    private $puerto = 3307; 
    private $conexion;


    /*Creo el constructor de la clase creando una nueva instancia de la clase mysqli
    para poder establecer la conexión a la bbdd con los valores declarados antes*/

    public function __construct() {

        $this->conexion = new mysqli($this->host, $this->usuario, $this->contrasena, $this->db_nombre, $this->puerto);

        //Ahora comprueblo si hay error en la conexión , si es así, finaliza el programa con die
        if ($this->conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $this->conexion->connect_error);
        }
    }




    //Creo la función para hacer la inserccion 

    public function insertarEquipo($nombre, $ciudad, $deporte, $fecha) {
        // Creo la consulta para insertar el equipo
        $query = "INSERT INTO Equipo (nombre, ciudad, deporte, fecha) VALUES ('$nombre', '$ciudad', '$deporte', '$fecha')";
    
        
        // La consulta devuelve true si todo fue bien o false si no no se insertó bien
        
        if ($this-> conexion-> query($query) === TRUE) {
            return true; 

        } else {
            return false;  
        }
    }
    
    




    //Creo la función donde almaceno la consulta y almaceno su resultado en una variable nueva
    public function obtenerEquipos() {

        $query = "SELECT * FROM Equipo";
        $result = $this->conexion->query($query);

        //Creo el array de equipos para guardar todos los equipos que haya en la bbdd
        $equipos = array();

        //Recorro el array con un while
        while ($row = $result->fetch_assoc()) {
            $equipos[] = $row;
        }

        //Devuelvo el resultado
        return $equipos;
    }


    //Función para crear una página propia para cada equipo. Busca por su id único
    public function obtenerEquipoPorId($equipoId) {

        // Creo la consulta
        $query = "SELECT * FROM Equipo WHERE id = $equipoId";

        //La ejecuto
        $result = $this->conexion->query($query);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();

        } else {
            return null;  
        }
    }


}
?>
