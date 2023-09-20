<!DOCTYPE html>
<html>

<head>

  <title>Editar Jugador</title>

  <!--Estilos muy básicos para mejorar un poco la apariencia de cara al usuario -->
  <style>

    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }

    table {
      background-color: #fff;
    }

    th,td {
      border: 1px solid #dddddd;
      padding: 8px;
      text-align: left;
    }

    form input,form input,form select {
      vertical-align: top;
      padding: 3px;
    }

    form button {
      padding: 8px 8px;
      background-color: gray;
    }

  </style>
</head>

<body>


    <?php

    // Compruebo que he recibido el id y lo almaceno en la variable jugadorId
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
      $jugadorId = $_GET['id'];


      require_once __DIR__ . '/../model/JugadorModel.php';

      // Creo una instancia de JugadorModel
      $jugadorModel = new JugadorModel();

      /*Llama al método obtenerJugadorPorId de JugadorModel 
      para obtener los detalles del jugador por su id*/
      $jugador = $jugadorModel->obtenerJugadorPorId($jugadorId);

      if (!$jugador) {
        echo "Jugador no encontrado.";
        exit();
      }
    } else {
      echo "Solicitud no válida.";
      exit();
    }
    ?>

  <!--Formulario para editar el jugador-->
  <h2>Editar Jugador</h2>


  <form action="guardar_jugador.php" method="post">

    <!--Necesito añadir hidden para crear un campo oculto que almacene el id pero no lo muestre -->
    <input type="hidden" name="id" value="<?php echo $jugador['id']; ?>">
   
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $jugador['nombre']; ?>">
    <br><br>

    <label for="numero">Número:</label>
    <input type="number" id="numero" name="numero" value="<?php echo $jugador['numero']; ?>">
    <br><br>

    <label for="equipo">Equipo:</label>
    <select id="equipo" name="equipoId">
      <?php
      require_once __DIR__ . '/../model/EquipoModel.php';

      $equipoModel = new EquipoModel();
      $equipos = $equipoModel->obtenerEquipos();

      //Itero sobre las opciones de equipos que hay para poder seleccionar una
      foreach ($equipos as $equipo) {
        echo "<option value='{$equipo['id']}'";
        if ($equipo['id'] == $jugador['equipo_id']) {
          echo " selected";
        }
        echo ">{$equipo['nombre']}</option>";
      }
      ?>
    </select>
    <br><br>

    <button type="submit">Guardar Cambios</button>
  </form>

</body>

</html>