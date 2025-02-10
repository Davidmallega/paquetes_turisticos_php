<?php
include 'seguridad_sesion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Destinos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
<div class="container">
        <div class = "logo-container">
            <img src="images/logo2.png" alt="Logo de la empresa">
    </div>
    <h1>Registro de Destinos</h1>
    <a href="index.php" class="back-button">⬅ Volver a Paquetes</a>
</header>

<section id="registro">
    <h2>Registra un nuevo destino</h2>
    <form method="POST" action="procesar_registro.php">
        <label for="hotel">Nombre del Hotel:</label>
        <input type="text" name="hotel" id="hotel" required placeholder="Ej. Hotel Cancún Resort">

        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" id="ciudad" required placeholder="Ej. Cancún">

        <label for="pais">País:</label>
        <input type="text" name="pais" id="pais" required placeholder="Ej. México">

        <label for="fecha">Fecha de Viaje:</label>
        <input type="date" name="fecha" id="fecha" required>

        <label for="duracion">Duración del Viaje:</label>
        <input type="text" name="duracion" id="duracion" required placeholder="Ej. 5 días">

        <button type="submit">Registrar</button>
    </form>
</section>

<!-- Mostrar destinos registrados -->
<section id="destinos-registrados">
    <h2>Destinos Registrados</h2>
    <ul>
        <?php if (!empty($_SESSION['destinos'])): ?>
            <?php foreach ($_SESSION['destinos'] as $destino): ?>
                <li>
                    <strong><?= htmlspecialchars($destino['hotel']) ?></strong> - 
                    <?= htmlspecialchars($destino['ciudad']) ?>, <?= htmlspecialchars($destino['pais']) ?> |
                    <em><?= htmlspecialchars($destino['fecha']) ?> - <?= htmlspecialchars($destino['duracion']) ?></em>

                    <!-- Botón para ver detalles  -->
                    <form action="procesar_detalles.php" method="GET">
                        <input type="hidden" name="hotel" value="<?= htmlspecialchars($destino['hotel']) ?>">
                        <input type="hidden" name="ciudad" value="<?= htmlspecialchars($destino['ciudad']) ?>">
                        <input type="hidden" name="pais" value="<?= htmlspecialchars($destino['pais']) ?>">
                        <input type="hidden" name="fecha" value="<?= htmlspecialchars($destino['fecha']) ?>">
                        <input type="hidden" name="duracion" value="<?= htmlspecialchars($destino['duracion']) ?>">
                        <button type="submit">Ver detalles</button>
                    </form>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay destinos registrados aún.</p>
        <?php endif; ?>
    </ul>
</section>



</body>
</html>
