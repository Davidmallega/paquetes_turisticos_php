<?php
ini_set('session.cookie_httponly', 1); // Evita acceso de JavaScript a cookies
ini_set('session.cookie_secure', 1); // Solo permitir en HTTPS
ini_set('session.use_strict_mode', 1); // Evita reutilización de IDs de sesión
session_start();
?>


<?php
// Inicia la sesión con la configuración definida en php.ini
session_start();

// Si no existe la variable 'contador', la inicializa, sino la incrementa
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 1;
} else {
    $_SESSION['contador']++;
}

echo "Contador de sesión: " . $_SESSION['contador'];
echo "<br>ID de sesión: " . session_id();
?>
