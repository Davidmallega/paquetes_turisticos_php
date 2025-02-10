<?php
include 'seguridad_sesion.php';

// Lista de ofertas disponibles
$ofertas = [
    "🔥 20% de descuento en tu próximo viaje a París.",
    "🌴 Oferta especial en Cancún: 3 noches por el precio de 2.",
    "🏙️ Descuento exclusivo para Nueva York. ¡Reserva ahora!",
    "🏝️ Rapa Nui con 15% de descuento este mes."
];

// Generar una oferta aleatoria en cada recarga
$notificacion = $ofertas[array_rand($ofertas)];

?>
