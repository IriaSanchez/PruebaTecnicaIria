<?php
require_once __DIR__ . '/controller/EquipoController.php';

//Recojo con post todos los datos del formulario
$nombre = $_POST['nombre'];
$ciudad = $_POST['ciudad'];
$deporte = $_POST['deporte'];
$fecha = $_POST['fecha'];

// Creo una instancia del controlador y añado el equipo
$equipoController = new EquipoController();
$equipoController->agregarEquipo($nombre, $ciudad, $deporte, $fecha);
?>
