<?php
// Conexión inicial sin base de datos
$servername = "localhost"; // Asegúrate de usar el puerto correcto
$username = "root";
$password = "";

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear la base de datos si no existe
$sql = "CREATE DATABASE IF NOT EXISTS AGENCIA";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada con éxito <br>";
} else {
    die("Error al crear la base de datos: " . $conn->error);
}

// Ahora nos conectamos a la base de datos creada
$conn->select_db("AGENCIA");

// Crear las tablas
$sql = "
CREATE TABLE IF NOT EXISTS VUELO (
    id_vuelo INT AUTO_INCREMENT PRIMARY KEY,
    origen VARCHAR(100),
    destino VARCHAR(100),
    fecha DATE,
    plazas_disponibles INT,
    precio DECIMAL(10,2)
);

CREATE TABLE IF NOT EXISTS HOTEL (
    id_hotel INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    ubicación VARCHAR(100),
    habitaciones_disponibles INT,
    tarifa_noche DECIMAL(10,2)
);

CREATE TABLE IF NOT EXISTS RESERVA (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    fecha_reserva DATE,
    id_vuelo INT,
    id_hotel INT,
    FOREIGN KEY (id_vuelo) REFERENCES VUELO(id_vuelo),
    FOREIGN KEY (id_hotel) REFERENCES HOTEL(id_hotel)
);
";

if ($conn->multi_query($sql)) {
    echo "Tablas creadas con éxito";
} else {
    echo "Error en la creación de tablas: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
