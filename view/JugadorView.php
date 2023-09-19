<h2>Listado de Jugadores</h2>

<table id="tablaJugadores">
    <tr>
        <th>Nombre</th>
        <th>Número</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($jugadores as $jugador): ?>
        <tr>
            <td><?= $jugador['nombre'] ?></td>
            <td><?= $jugador['numero'] ?></td>
            <td>
                <a href="editar_jugador.php?id=<?= $jugador['id'] ?>">Editar</a>
                <a href="eliminar_jugador.php?id=<?= $jugador['id'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
