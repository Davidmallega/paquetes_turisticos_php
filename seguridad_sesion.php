<?php
// Solo configurar las sesiones si no están activas
if (session_status() == PHP_SESSION_NONE) {
    // Configurar seguridad en sesiones antes de iniciar sesión
    ini_set('session.cookie_httponly', 1); 
    ini_set('session.cookie_secure', 1); 
    ini_set('session.use_strict_mode', 1); 
    ini_set('session.gc_maxlifetime', 3600); 
    session_set_cookie_params(3600); 
    session_start(); // Iniciar sesión solo si no está activa
}

// Verificar inactividad y cerrar sesión si excede el tiempo definido
$tiempo_expiracion = 1800; // 30 minutos

if (isset($_SESSION['ultimo_acceso']) && (time() - $_SESSION['ultimo_acceso'] > $tiempo_expiracion)) {
    session_unset(); // Limpiar variables de sesión
    session_destroy(); // Destruir la sesión
    header("Location: index.php"); // Redirigir a la página principal
    exit();
}

// Regenerar el ID de sesión cada 5 minutos, sin perder el carrito
if (!isset($_SESSION['ultimo_regenerado'])) {
    $_SESSION['ultimo_regenerado'] = time();
}

if ((time() - $_SESSION['ultimo_regenerado']) > 300) { // Cada 5 minutos (300 segundos)
    $temp_carrito = $_SESSION['carrito'] ?? []; // Guardar carrito temporalmente
    session_regenerate_id(true);
    $_SESSION['carrito'] = $temp_carrito; // Restaurar carrito después de regenerar sesión
    $_SESSION['ultimo_regenerado'] = time();
}

// Actualizar el tiempo de acceso
$_SESSION['ultimo_acceso'] = time();
?>
