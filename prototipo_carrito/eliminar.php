<?php
session_start();

if (isset($_GET['id']) && isset($_SESSION['carrito'][$_GET['id']])) {
    unset($_SESSION['carrito'][$_GET['id']]); // Elimina el paquete seleccionado
}

header("Location: carrito.php");
exit();
