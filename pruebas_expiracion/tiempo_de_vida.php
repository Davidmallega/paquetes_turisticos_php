<?php
// Configurar la zona horaria a UTC p
date_default_timezone_set('UTC');

// Configurar el tiempo de vida de la sesión 
ini_set('session.gc_maxlifetime', 10);
session_set_cookie_params(10);

session_start();

// Incrementar o inicializar un contador 
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 1;
} else {
    $_SESSION['contador']++;
}

echo "Contador de sesión: " . $_SESSION['contador'] . "<br>";
echo "Hora actual (UTC): " . date("Y-m-d H:i:s") . "<br>";
?>
