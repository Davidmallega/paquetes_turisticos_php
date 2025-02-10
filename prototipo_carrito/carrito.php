<?php
session_start();
$paquetes = [
    1 => ['nombre' => 'Tour a Cancún', 'precio' => 500],
    2 => ['nombre' => 'Viaje a París', 'precio' => 1200],
    3 => ['nombre' => 'Aventura en Machu Picchu', 'precio' => 900]
];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Carrito de Compras</h1>
    <?php if (!empty($_SESSION['carrito'])): ?>
        <ul>
            <?php foreach ($_SESSION['carrito'] as $id => $cantidad): ?>
                <li>
                    <?php echo $paquetes[$id]['nombre'] . " - $" . $paquetes[$id]['precio'] . " x $cantidad"; ?>
                    <a href="eliminar.php?id=<?php echo $id; ?>">Eliminar</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="index.php">Seguir comprando</a>
    <?php else: ?>
        <p>El carrito está vacío.</p>
        <a href="index.php">Ver paquetes</a>
    <?php endif; ?>
</body>
</html>
