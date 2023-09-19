
 <!--En la vista creo un html básico con una tabla 
 para mostrar el resultado.
Además de esos campos, la bbdd contiene un id único autoincremental para cada uno de los equipos
aunque no se muestre en el html-->

<!DOCTYPE html>
<html>
<head>
    <!-- Añado el script de jQuery requerido en la práctica -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Deportes</title>
</head>
<body>



<h1>Listado de Equipos</h1>

<table>
    <tr>
        <th>Nombre</th>
        <th>Ciudad</th>
        <th>Deporte</th>
        <th>Fecha</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($equipos as $equipo) : ?>
        <tr>
            <td><?= $equipo['nombre'] ?></td>
            <td><?= $equipo['ciudad'] ?></td>
            <td><?= $equipo['deporte'] ?></td>
            <td><?= $equipo['fecha'] ?></td>
            <td>
                <!-- Agregar enlace para ver detalles -->
                <a href="ver_equipo.php?id=<?= $equipo['id'] ?>">Información</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
















    <form id="equipoForm">
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


<!-- Con este script añado la validación del lado del cliente con jQuery -->

<script>
$(document).ready(function() {
    $('#equipoForm').submit(function(event) {
        var nombre = $('#nombre').val();
        if (nombre === '') {
            alert('El campo "Nombre" es obligatorio.');
            event.preventDefault();
        }
    });
});
</script>


<!-- Con este script añado la validación del lado del servidor con PHP -->


<script>
$(document).ready(function() {
    $('#equipoForm').submit(function(event) {
        var nombre = $('#nombre').val();
        if (nombre === '') {
            alert('El campo "Nombre" es obligatorio.');
            event.preventDefault();
        } else {
            // Enviamos el formulario al controlador
            $.post('guardar_equipo.php', $(this).serialize(), function(response) {
                alert('Equipo guardado correctamente.');
                // Recargar la página o actualizar la lista de equipos
                window.location.reload();
            });
        }
    });
});
</script>





</body>
</html>
