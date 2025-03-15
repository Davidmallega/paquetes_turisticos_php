<?php
include 'seguridad_sesion.php';
include 'paquetes_turisticos.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paquetes Turísticos</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="notificacion.css">
    <link rel="stylesheet" href="cssadmin.css">
    <link rel= "website icon" type="image/png" href="images/logo2.png">

</head>
<body>

<header>
    <div class="container">
        <div class="logo-container">
            <img src="images/logo2.png" alt="Logo de la empresa" class="logo">
        </div>
        <h1>Agencia de Viajes</h1>
        <a href="filtro.php" class="filter-button">🔍 Filtrar</a>
        <a href="registro.php" class="register-button">✍️ Registrar Destino</a>
        <a href="carrito.php" class="filter-button">🛒 Ver Carrito</a>
        <!-- Incluir BOTON FALTANTE  -->
         */boton faltante agregado*/

        <a href="ver_reservas.php" class="filter-button">⚙️ ver ver_reservas</a>
        
    </div>
</header>

<!-- Incluir la notificación de `notificacion.php` -->
<?php include 'notificacion.php'; ?>
<div class="notification">
    <p><?= $notificacion ?></p>
</div>

<script>
    // 5 segundos y desaparece la notificación
    setTimeout(function() {
        let notification = document.querySelector('.notification');
        if (notification) {
            notification.style.display = 'none';
        }
    }, 5000);
</script>

<main>
    <div id="packages-container">
        <?php foreach ($paquetes as $paquete) : ?>
            <div class="package-card">
                <img src="<?= $paquete->imagen ?>" alt="<?= $paquete->nombre ?>">
                <h3><?= $paquete->nombre ?></h3>
                <p><?= $paquete->descripcion ?></p>
                <p><strong>Duración:</strong> <?= $paquete->duracion ?></p>
                <p><strong>Precio:</strong> $<?= number_format($paquete->precio, 0, ',', '.') ?></p>
                

                <a href="agregar_al_carrito.php?id=<?= $paquete->id ?>" class="filter-button">🛒 Agregar al Carrito</a>


                <a href="reservas.php?destino=<?= urlencode($paquete->nombre) ?>" class="reserve-button">📅 Agregar Reserva</a>

            </div>
        <?php endforeach; ?>
    </div>
</main>


</body>
</html>
