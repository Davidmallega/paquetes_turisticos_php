<?php
include 'seguridad_sesion.php';

// Si no hay detalles en la sesión, redirigir a registro.php
if (!isset($_SESSION['detalles'])) {
    header("Location: registro.php");
    exit;
}

// Obtener los detalles desde la sesión
$detalles = $_SESSION['detalles'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Destino</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h1>Detalles del Destino</h1>
    <a href="registro.php" class="back-button">⬅ Volver al Registro</a>
</header>

<section id="detalles">
    <h2><?= $detalles['hotel'] ?></h2>
    <p><strong>Ubicación:</strong> <?= $detalles['ciudad'] ?>, <?= $detalles['pais'] ?></p>
    <p><strong>Fecha de Viaje:</strong> <?= $detalles['fecha'] ?></p>
    <p><strong>Duración:</strong> <?= $detalles['duracion'] ?></p>
</section>

</body>
</html>



