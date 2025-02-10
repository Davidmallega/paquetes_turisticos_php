<?php
include 'seguridad_sesion.php';
// Si no existe la sesión de destinos, la inicializamos
if (!isset($_SESSION['destinos'])) {
    $_SESSION['destinos'] = [];
}

// Procesar el formulario cuando se envíen datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreHotel = isset($_POST['hotel']) ? trim($_POST['hotel']) : "";
    $ciudad = isset($_POST['ciudad']) ? trim($_POST['ciudad']) : "";
    $pais = isset($_POST['pais']) ? trim($_POST['pais']) : "";
    $fechaViaje = isset($_POST['fecha']) ? $_POST['fecha'] : "";
    $duracion = isset($_POST['duracion']) ? trim($_POST['duracion']) : "";

    // Validar que todos los campos estén llenos
    if (!empty($nombreHotel) && !empty($ciudad) && !empty($pais) && !empty($fechaViaje) && !empty($duracion)) {
        // Guardar en la sesión (simulación de una base de datos)
        $_SESSION['destinos'][] = [
            'hotel' => $nombreHotel,
            'ciudad' => $ciudad,
            'pais' => $pais,
            'fecha' => $fechaViaje,
            'duracion' => $duracion
        ];
    }
}

// Redireccionar de vuelta al formulario después del registro
header("Location: registro.php");
exit;
