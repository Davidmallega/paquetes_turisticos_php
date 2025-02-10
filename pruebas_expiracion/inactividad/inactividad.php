<?php

session_start();

date_default_timezone_set('UTC');

// Para pruebas, definimos el tiempo máximo de inactividad en 10 segundos.

$tiempo_max_inactividad = 10;

if (isset($_SESSION['ultimo_acceso'])) {
    $tiempo_transcurrido = time() - $_SESSION['ultimo_acceso'];
    if ($tiempo_transcurrido > $tiempo_max_inactividad) {
        // Si se supera el tiempo máximo de inactividad, se cierra la sesión
        session_unset();    // Elimina todas las variables de sesión
        session_destroy();  // Destruye la sesión

        echo "Inactividad detectada. La sesión ha sido cerrada.<br>";
        echo "Redirigiendo al login en 3 segundos...<br>";
        header("Refresh: 3; URL=login.php"); // Redirige a login.php en 3 segundos
        exit();
    }
}

// Si la sesión aún está activa, se actualiza el tiempo de último acceso
$_SESSION['ultimo_acceso'] = time();

// Mostrar información para verificar que la sesión está activa
echo "Sesión activa. Último acceso actualizado: " . date("Y-m-d H:i:s", $_SESSION['ultimo_acceso']) . "<br>";
echo "<a href='inactividad.php'>Recargar página</a>";
?>
