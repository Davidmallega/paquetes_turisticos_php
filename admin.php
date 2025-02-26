<?php
include 'seguridad_sesion.php'; // Solo administradores deberían acceder
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="cssadmin.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <div class="container">
        <h1>Panel de Administración</h1>
        <a href="index.php" class="back-button">🏠 Volver al Inicio</a>
    </div>
</header>

<main>
    <div class="admin-container">
        <h2>Gestión de Datos</h2>
        <div class="button-container">
            <a href="agregar_vuelo.php" class="admin-button">✈️ Agregar Vuelos</a>
            <a href="agregar_hotel.php" class="admin-button">🏨 Agregar Hoteles</a>
        </div>
    </div>
</main>

</body>
</html>
