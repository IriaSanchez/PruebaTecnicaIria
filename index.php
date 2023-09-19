<?php

/*Utilizo require para poder incluir en este script el controlador*/
require_once __DIR__ . '/controller/EquipoController.php';

//Creo la instancia del controlador y llamo al método que hay en él
$equipoController = new EquipoController();
$equipoController->mostrarEquipos();
?>

