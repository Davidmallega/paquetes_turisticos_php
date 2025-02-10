<?php
include 'seguridad_sesion.php';

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id] += 1;
    } else {
        $_SESSION['carrito'][$id] = 1;
    }
}

header("Location: carrito.php");
exit();
?>
