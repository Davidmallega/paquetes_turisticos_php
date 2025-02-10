<?php include 'filtro_destinos.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar Destinos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <div class="container">
        <div class = "logo-container">
            <img src="images/logo2.png" alt="Logo de la empresa">
    </div>
    <h1>Filtrar Destinos</h1>
    <a href="index.php" class="back-button">⬅ Volver a Paquetes</a>
</header>

<section id="filtro">
    <h2>Busca tu destino ideal</h2>
    <form method="GET" action="">
        <label for="hotel">Nombre del Hotel:</label>
        <input type="text" name="hotel" id="hotel" placeholder="Ej. Hotel Cancún Resort">

        <label for="ciudad">Ciudad:</label>
        <input type="text" name="ciudad" id="ciudad" placeholder="Ej. Cancún">

        <label for="pais">País:</label>
        <input type="text" name="pais" id="pais" placeholder="Ej. México">

        <label for="fecha">Fecha de Viaje:</label>
        <input type="date" name="fecha" id="fecha">

        <label for="duracion">Duración del Viaje:</label>
        <input type="text" name="duracion" id="duracion" placeholder="Ej. 5 días">

        <button type="submit">Buscar</button>
    </form>

    <h3>Resultados de búsqueda:</h3>
    <div id="resultados">
        <?php include_once 'filtro_destinos.php'; ?>

        <?php if (!empty($resultados)) : ?>
            <ul>
                <?php foreach ($resultados as $destino) : ?>
                    <li>
                        <strong><?= $destino->nombreHotel ?></strong> - 
                        <?= $destino->ciudad ?>, <?= $destino->pais ?> |
                        <em><?= $destino->fechaViaje ?> - <?= $destino->duracion ?></em>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>No se encontraron resultados.</p>
        <?php endif; ?>
    </div>
</section>

</section>

</body>
</html>
