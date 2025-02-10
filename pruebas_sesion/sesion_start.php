<?php
session_start(); // Iniciar la sesión
session_regenerate_id(true); // Regenerar el ID de sesión para mayor seguridad
?>




<?php
// Inicia la sesión
session_start();

// Guarda el ID de sesión actual en una variable
$old_session_id = session_id();

// Regenera el ID de sesión, eliminando el antiguo (true)
session_regenerate_id(true);

// Guarda el nuevo ID de sesión
$new_session_id = session_id();

// Muestra ambos IDs para compararlos
echo "ID de sesión anterior: " . $old_session_id . "<br>";
echo "ID de sesión nueva: " . $new_session_id . "<br>";
?>


<?php
// Establece las opciones de sesión en tiempo de ejecución
ini_set('session.cookie_httponly', 1);  // Impide el acceso a la cookie desde JavaScript
ini_set('session.cookie_secure', 1);    // Solo envía la cookie a través de HTTPS
ini_set('session.use_strict_mode', 1);    // Obliga a PHP a generar un ID de sesión válido

// Inicia la sesión
session_start();

// Incrementa un contador en la sesión para demostrar que se almacena información
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 1;
} else {
    $_SESSION['contador']++;
}

echo "Contador de sesión: " . $_SESSION['contador'] . "<br>";
echo "ID de sesión: " . session_id();
?>
