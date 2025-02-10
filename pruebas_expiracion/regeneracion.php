<?php
session_start();

// Si no existe el token en la sesión, lo creamos
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32)); // Crea un token único
}

// Guardamos el ID de sesión actual
$old_session_id = session_id();

// Renovamos el ID de sesión y eliminamos el anterior (true)
session_regenerate_id(true);

// Obtenemos el nuevo ID de sesión
$new_session_id = session_id();

// Mostramos el token y los IDs de sesión
echo "Token: " . $_SESSION['token'] . "<br>";
echo "ID de sesión anterior: " . $old_session_id . "<br>";
echo "ID de sesión nueva: " . $new_session_id . "<br>";
?>
