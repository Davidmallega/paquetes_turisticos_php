<?php
include 'seguridad_sesion.php';

// Validar si los datos fueron enviados correctamente desde registro.php
if (isset($_GET['hotel'], $_GET['ciudad'], $_GET['pais'], $_GET['fecha'], $_GET['duracion'])) {
    $_SESSION['detalles'] = [
        'hotel' => htmlspecialchars($_GET['hotel']),
        'ciudad' => htmlspecialchars($_GET['ciudad']),
        'pais' => htmlspecialchars($_GET['pais']),
        'fecha' => htmlspecialchars($_GET['fecha']),
        'duracion' => htmlspecialchars($_GET['duracion'])
    ];
    header("Location: detalles.php"); // Redirigir a la página de detalles
    exit;
} else {
    // Si no hay datos, redirigir a registro.php
    header("Location: registro.php");
    exit;
}
