
<?php


/*Utilizo require para poder incluir en este script de controlador 
el EquipoController.php que no está en este script*/
require_once __DIR__ . '/../controller/EquipoController.php';

//Se comprueba que la consulta sea de tipo post y se recogen los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $ciudad = $_POST['ciudad'];
    $deporte = $_POST['deporte'];
    $fecha = $_POST['fecha'];

    //Se valida que no etén los campos vacíos
    if (empty($nombre) || empty($ciudad) || empty($deporte) || empty($fecha)) {
        echo 'Todos los campos son obligatorios';
    } else {

        //Llamo a agregarEquipo con los datos del formulario y lanzo un mensaje de guardado ok
        $equipoController = new EquipoController();
        $equipoController->agregarEquipo($nombre, $ciudad, $deporte, $fecha);
        echo 'Equipo guardado correctamente.';
    }
} else {
    echo "Acceso no válido.";
}

// Redirige a index.php
header("Location: index.php");
?>