<?php
require_once __DIR__ . '/controller/EquipoController.php';

$equipoController = new EquipoController();
$equipos = $equipoController->obtenerEquipos();

require_once __DIR__ . '/view/EquipoView.php';
?>
