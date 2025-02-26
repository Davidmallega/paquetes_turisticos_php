<?php
include 'conexion.php';

$sql = "SELECT h.nombre, COUNT(r.id_reserva) AS total_reservas
        FROM HOTEL h
        JOIN RESERVA r ON h.id_hotel = r.id_hotel
        GROUP BY h.nombre
        HAVING total_reservas > 2";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoteles con más de 2 Reservas</title>
</head>
<body>
    <h2>Hoteles con más de 2 Reservas</h2>
    <table border="1">
        <tr>
            <th>Hotel</th>
            <th>Total de Reservas</th>
        </tr>
        <?php if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['nombre'] ?></td>
                    <td><?= $row['total_reservas'] ?></td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="2">No hay hoteles con más de 2 reservas.</td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
<?php
$conn->close();
?>
