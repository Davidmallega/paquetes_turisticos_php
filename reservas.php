<?php
include 'conexion.php';

// Capturar el destino desde la URL
$destinoSeleccionado = isset($_GET['destino']) ? urldecode($_GET['destino']) : "";

// Obtener vuelos disponibles filtrando por destino
if ($destinoSeleccionado) {
    $stmt = $conn->prepare("SELECT id_vuelo, origen, destino, fecha, precio 
                            FROM VUELO 
                            WHERE plazas_disponibles > 0 AND LOWER(destino) = LOWER(?)");
    $stmt->bind_param("s", $destinoSeleccionado);
    $stmt->execute();
    $vuelos = $stmt->get_result();
} else {
    $vuelos = $conn->query("SELECT id_vuelo, origen, destino, fecha, precio FROM VUELO WHERE plazas_disponibles > 0");
}

// Obtener hoteles disponibles filtrando por la ciudad (ignorando el país)
if ($destinoSeleccionado) {
    $stmt = $conn->prepare("SELECT id_hotel, nombre, ubicación, tarifa_noche 
                            FROM HOTEL 
                            WHERE habitaciones_disponibles > 0 
                            AND LOWER(SUBSTRING_INDEX(ubicación, ',', 1)) = LOWER(?)");
    $stmt->bind_param("s", $destinoSeleccionado);
    $stmt->execute();
    $hoteles = $stmt->get_result();
} else {
    $hoteles = $conn->query("SELECT id_hotel, nombre, ubicación, tarifa_noche FROM HOTEL WHERE habitaciones_disponibles > 0");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Vuelo y Hotel</title>
    <link rel="stylesheet" href="reservas.css">
    <link rel="stylesheet" href="styles.css">
    <script>
        function validarFormulario() {
            let cliente = document.getElementById("cliente").value.trim();
            let email = document.getElementById("email").value.trim();
            let vuelo = document.getElementById("id_vuelo").value;
            let hotel = document.getElementById("id_hotel").value;

            if (cliente === "" || email === "" || vuelo === "" || hotel === "") {
                alert("⚠ Todos los campos son obligatorios.");
                return false;
            }

            // Validación de email
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("⚠ Ingresa un correo válido.");
                return false;
            }

            return true; 
        }
    </script>
</head>
<body>
<header>
    <div class="container">
        <h1>Reservar Vuelo y Hotel</h1>
        <a href="index.php" class="back-button">🏠 Volver al Inicio</a>
    </div>
</header>

<div class="form-container">
    <h2>Reservar Vuelo y Hotel</h2>
    <form action="procesar_reserva.php" method="POST" onsubmit="return validarFormulario();" novalidate>
        
        <label for="cliente">Nombre del Cliente:</label>
        <input type="text" id="cliente" name="cliente" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="id_vuelo">Selecciona un vuelo:</label>
        <select id="id_vuelo" name="id_vuelo" required>
            <option value="">-- Selecciona un vuelo --</option>
            <?php while ($row = $vuelos->fetch_assoc()) { ?>
                <option value="<?= $row['id_vuelo'] ?>" <?= ($row['destino'] === $destinoSeleccionado) ? 'selected' : '' ?>>
                    <?= $row['origen'] ?> a <?= $row['destino'] ?> (<?= $row['fecha'] ?>) - $<?= $row['precio'] ?>
                </option>
            <?php } ?>
        </select>

        <label for="id_hotel">Selecciona un hotel:</label>
        <select id="id_hotel" name="id_hotel" required>
            <option value="">-- Selecciona un hotel --</option>
            <?php while ($row = $hoteles->fetch_assoc()) { ?>
                <option value="<?= $row['id_hotel'] ?>" <?= (trim(explode(',', $row['ubicación'])[0]) === $destinoSeleccionado) ? 'selected' : '' ?>>
                    <?= $row['nombre'] ?> - <?= $row['ubicación'] ?> ($<?= $row['tarifa_noche'] ?>/noche)
                </option>
            <?php } ?>
        </select>

        <input type="submit" value="Reservar">
    </form>
</div>
</body>
</html>
