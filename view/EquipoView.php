<!--En la vista creo un html básico con una tabla 
 para mostrar el resultado.
Además de esos campos, la bbdd contiene un id único autoincremental para cada uno de los equipos
aunque no se muestre en el html-->

<!DOCTYPE html>
<html>
<head>
  <title>Deportes</title>

    <!-- Aunque no se piden estilos, he añadido alguno básico para mejorar la lectura del usuario-->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>



   <!--Dentro del body añado el formulario y la tabla -->

<body>
<form id="equipoForm" action="guardar_equipo.php" method="post">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>

        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad">
        <br><br>

        <label for="deporte">Deporte:</label>
        <select id="deporte" name="deporte">
            <option value="Natacion">Natación</option>
            <option value="Gimnasia Ritmica">Gimnasia Rítmica</option>
            <option value="Ciclismo">Ciclismo</option>
            <option value="Quidditch">Quidditch</option>
        </select>
        <br><br>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha">
        <br><br>

        <button type="submit">Guardar Equipo</button>
    </form>



    <h1>Listado de Equipos</h1>

    <table id="tablaEquipos">
        <tr>
            <th>Nombre</th>
            <th>Ciudad</th>
            <th>Deporte</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($equipos as $equipo): ?>
            <tr>
                <td>
                    <?= $equipo['nombre'] ?>
                </td>
                <td>
                    <?= $equipo['ciudad'] ?>
                </td>
                <td>
                    <?= $equipo['deporte'] ?>
                </td>
                <td>
                    <?= $equipo['fecha'] ?>
                </td>
                <td>
                    <!-- Enlace para la info de cada uno -->
                    <a href="ver_equipo.php?id=<?= $equipo['id'] ?>">Información</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>






   <!--------------->
   <!--SCRIPTS -->
   <!--------------->



        <!-- Añade el script de jQuery requerido -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



        <!-- Script para la validación del lado del cliente -->

        <script>
    $(document).ready(function () {
        // ... Resto del código ...

        // Cambia el ID del formulario para evitar duplicaciones de ID
        $('#equipoForm').submit(function (event) {
            event.preventDefault();

            var nombre = $('#nombre').val().trim();
            var ciudad = $('#ciudad').val().trim();
            var deporte = $('#deporte').val();
            var fecha = $('#fecha').val();

            if (nombre === '' || ciudad === '' || deporte === '' || fecha === '') {
                alert('Todos los campos son obligatorios');
                return;
            }

            $.post('guardar_equipo.php', $(this).serialize(), function (response) {
                alert('Equipo guardado correctamente.');
                // Limpio el formulario
                $('#equipoForm')[0].reset();
                // Actualizo la tabla
                actualizarTablaEquipos();
            });

            $('#submitBtn').prop('disabled', true);

        });
    });
</script>

</body>
</html>