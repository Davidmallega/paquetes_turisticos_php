<?php
session_start();

// Configura la zona horaria a Chile (Santiago)
date_default_timezone_set('America/Santiago');

// Definir tiempo de expiración en segundos (para pruebas, 10 segundos)
$tiempo_expiracion = 10;

if (isset($_SESSION['ultimo_acceso']) && (time() - $_SESSION['ultimo_acceso'] > $tiempo_expiracion)) {
    // Si ha pasado el tiempo de inactividad, se destruye la sesión
    session_unset();    // Borra todas las variables de sesión
    session_destroy();  // Destruye la sesión
    echo "Sesión cerrada. Por favor, inicia sesión de nuevo.<br>";
    echo "Hora actual: " . date("H:i:s") . "<br>";
} else {
    // Actualiza el tiempo de acceso y muestra el estado de la sesión
    $_SESSION['ultimo_acceso'] = time();
    echo "Sesión activa. Último acceso: " . date("H:i:s", $_SESSION['ultimo_acceso']) . "<br>";
    echo "Hora actual: " . date("H:i:s") . "<br>";
}
?>
