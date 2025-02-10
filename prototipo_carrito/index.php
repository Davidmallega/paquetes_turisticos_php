<?php
session_start();
$paquetes = [
    ['id' => 1, 'nombre' => 'Tour a Cancún', 'precio' => 500],
    ['id' => 2, 'nombre' => 'Viaje a París', 'precio' => 1200],
    ['id' => 3, 'nombre' => 'Aventura en Machu Picchu', 'precio' => 900]
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Paquetes Turísticos</title>
</head>
<body>
    <h1>Selecciona tu paquete turístico</h1>
    <ul>
        <?php foreach ($paquetes as $paquete): ?>
            <li>
                <?php echo $paquete['nombre'] . " - $" . $paquete['precio']; ?>
                <a href="agregar.php?id=<?php echo $paquete['id']; ?>">Agregar al carrito</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="carrito.php">Ver Carrito</a>
</body>
</html>
