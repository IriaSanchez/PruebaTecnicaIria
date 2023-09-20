<?php


/*Utilizo require para poder incluir en este script de controlador 
el EquipoController.php que no está en este script*/

require_once __DIR__ . '/controller/EquipoController.php';

//Instancia de la clase EquipoController
$equipoController = new EquipoController();

/* Se llama al método obtenerEquipos de la instancia de EquipoController
 y se almacena el resultado en la variable equipos*/
$equipos = $equipoController->obtenerEquipos();

require_once __DIR__ . '/view/EquipoView.php';
?>