<?php
include 'seguridad_sesion.php';

if (isset($_GET['id']) && isset($_SESSION['carrito'][$_GET['id']])) {
    unset($_SESSION['carrito'][$_GET['id']]);
}

header("Location: carrito.php");
exit();
?>
