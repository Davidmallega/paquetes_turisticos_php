<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id] += 1; // Incrementa la cantidad si ya está en el carrito
    } else {
        $_SESSION['carrito'][$id] = 1; // Agrega el paquete al carrito
    }
}

header("Location: carrito.php");
exit();
