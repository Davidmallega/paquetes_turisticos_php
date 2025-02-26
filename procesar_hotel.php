<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$ubicacion = $_POST['ubicacion'];
$habitaciones = intval($_POST['habitaciones']);
$tarifa = floatval($_POST['tarifa']);

if (empty($nombre) || empty($ubicacion) || $habitaciones <= 0 || $tarifa <= 0) {
    die("⚠ Error: Datos inválidos.");
}

$stmt = $conn->prepare("INSERT INTO HOTEL (nombre, ubicación, habitaciones_disponibles, tarifa_noche) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssdi", $nombre, $ubicacion, $habitaciones, $tarifa);

if ($stmt->execute()) {
    echo "✅ Hotel agregado con éxito.";
} else {
    echo "❌ Error al agregar el hotel: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
