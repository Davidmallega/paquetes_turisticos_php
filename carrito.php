<?php
include 'seguridad_sesion.php';
include 'paquetes_turisticos.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="carrito.css"> <!-- Enlace al nuevo CSS -->
</head>
<body>


<div id="cart-container">
<div class="logo-container">
            <img src="images/logo2.png" alt="Logo de la empresa" class="logo">
        </div>
    <h1>Carrito de Compras 🛒</h1>
    
    <?php if (!empty($_SESSION['carrito'])): ?>
        <?php foreach ($_SESSION['carrito'] as $id => $cantidad): ?>
            <div class="cart-item">
                <img src="<?= $paquetes[$id - 1]->imagen ?>" alt="<?= $paquetes[$id - 1]->nombre ?>">
                <div class="cart-item-info">
                    <h3><?= $paquetes[$id - 1]->nombre ?></h3>
                    <p>Precio: $<?= number_format($paquetes[$id - 1]->precio, 0, ',', '.') ?></p>
                    <p>Cantidad: <?= $cantidad ?></p>
                </div>
                <a href="eliminar_del_carrito.php?id=<?= $id ?>" class="remove-button">Eliminar</a>
            </div>
        <?php endforeach; ?>

        <div class="cart-actions">
            <a href="index.php">Seguir comprando</a>
        </div>

    <?php else: ?>
        <p>El carrito está vacío.</p>
        <div class="cart-actions">
            <a href="index.php">Ver paquetes</a>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
