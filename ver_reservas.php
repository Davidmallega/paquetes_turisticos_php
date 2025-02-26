<?php
include 'conexion.php';

$sql = "SELECT r.id_reserva, c.id_cliente, c.nombre AS cliente, r.fecha_reserva,v.origen, v.destino, h.nombre AS hotel
        FROM RESERVA r
        JOIN CLIENTE c ON r.id_cliente = c.id_cliente
        JOIN VUELO v ON r.id_vuelo = v.id_vuelo
        JOIN HOTEL h ON r.id_hotel = h.id_hotel";

        
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
</head>
<body>
    <h2>Reservas Realizadas</h2>
    <table border="1">
        <tr>
            <th>ID Reserva</th>
            <th>ID Cliente</th> 
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Vuelo</th>
            <th>Hotel</th>
        </tr>
        <?php while ($row = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id_reserva'] ?></td>
                <td><?= $row['id_cliente'] ?></td> 
                <td><?= $row['cliente'] ?></td>
                <td><?= $row['fecha_reserva'] ?></td>
                <td><?= $row['origen'] ?> a <?= $row['destino'] ?></td>
                <td><?= $row['hotel'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
