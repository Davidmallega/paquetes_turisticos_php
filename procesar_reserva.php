<?php
include 'conexion.php';

// Capturar datos del formulario
$cliente = trim($_POST['cliente']);
$email = trim($_POST['email']);
$id_vuelo = intval($_POST['id_vuelo']);
$id_hotel = intval($_POST['id_hotel']);

if (empty($cliente) || empty($email) || $id_vuelo <= 0 || $id_hotel <= 0) {
    die("⚠ Error: Todos los campos son obligatorios.");
}

// Verificar si el cliente ya existe en la base de datos (por email)
$stmt = $conn->prepare("SELECT id_cliente FROM CLIENTE WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Cliente ya existe, obtener su ID
    $row = $result->fetch_assoc();
    $id_cliente = $row['id_cliente'];
} else {
    // Cliente no existe, registrarlo
    $stmt = $conn->prepare("INSERT INTO CLIENTE (nombre, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $cliente, $email);
    if ($stmt->execute()) {
        $id_cliente = $stmt->insert_id; // Obtener el ID del cliente recién insertado
    } else {
        die("❌ Error al registrar el cliente: " . $conn->error);
    }
}

// Insertar la reserva en la base de datos
$stmt = $conn->prepare("INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES (?, NOW(), ?, ?)");
$stmt->bind_param("iii", $id_cliente, $id_vuelo, $id_hotel);

if ($stmt->execute()) {
    echo "✅ Reserva realizada con éxito.";
    // Actualizar disponibilidad
    $conn->query("UPDATE VUELO SET plazas_disponibles = plazas_disponibles - 1 WHERE id_vuelo = $id_vuelo");
    $conn->query("UPDATE HOTEL SET habitaciones_disponibles = habitaciones_disponibles - 1 WHERE id_hotel = $id_hotel");
} else {
    echo "❌ Error al reservar: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
