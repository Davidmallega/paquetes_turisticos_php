<?php
include 'conexion.php';

// Verificar si los datos fueron enviados correctamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origen = trim($_POST['origen']);
    $destino = trim($_POST['destino']);
    $fecha = $_POST['fecha'];
    $plazas = intval($_POST['plazas']);
    $precio = floatval($_POST['precio']);

    // Validación en PHP
    if (empty($origen) || empty($destino) || empty($fecha) || $plazas <= 0 || $precio <= 0) {
        die("⚠ Error: Datos inválidos.");
    }

    // Evitar SQL Injection
    $stmt = $conn->prepare("INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssdi", $origen, $destino, $fecha, $plazas, $precio);

    if ($stmt->execute()) {
        echo "✅ Vuelo agregado con éxito.";
    } else {
        echo "❌ Error al agregar el vuelo: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "⚠ Acceso no permitido.";
}
?>
