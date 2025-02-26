<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Vuelo</title>
    <link rel="stylesheet" href="gestion.css">
    <link rel="stylesheet" href="styles.css">
    
    <script>
        function validarFormulario() {
            let origen = document.getElementById("origen").value.trim();
            let destino = document.getElementById("destino").value.trim();
            let fecha = document.getElementById("fecha").value;
            let plazas = document.getElementById("plazas").value;
            let precio = document.getElementById("precio").value;
            let hoy = new Date().toISOString().split("T")[0]; // Fecha actual en formato YYYY-MM-DD

            // Validación de campos vacíos
            if (origen === "" || destino === "" || fecha === "" || plazas === "" || precio === "") {
                alert("⚠ Todos los campos son obligatorios.");
                return false;
            }
            // Validación de fecha (no permitir fechas pasadas)
            if (fecha < hoy) {
                alert("⚠ La fecha del vuelo no puede ser en el pasado.");
                return false;
            }
            // Validación de plazas (deben ser números positivos)
            if (plazas <= 0 || isNaN(plazas)) {
                alert("⚠ Las plazas disponibles deben ser un número positivo.");
                return false;
            }
            // Validación de precio (debe ser un número positivo)
            if (precio <= 0 || isNaN(precio)) {
                alert("⚠ El precio debe ser un número positivo.");
                return false;
            }
            return true; // Si todo está bien, permite enviar el formulario
        }
    </script>
</head>
<body>

<header>
    <div class="container">
        <h1>Panel de Administración</h1>
        <a href="index.php" class="back-button">🏠 Volver al Inicio</a>
    </div>
</header>



<div class="form-container"> 
<h2>Agregar Vuelo</h2>
    <form action="procesar_vuelo.php" method="POST" onsubmit="return validarFormulario();" novalidate>
        Origen: <input type="text" id="origen" name="origen"><br><br>
        Destino: <input type="text" id="destino" name="destino"><br><br>
        Fecha: <input type="date" id="fecha" name="fecha"><br><br>
        Plazas Disponibles: <input type="number" id="plazas" name="plazas"><br><br>
        Precio: <input type="number" id="precio" name="precio" step="0.01"><br><br>
        <input type="submit" value="Agregar Vuelo">
    </form>
</div>
</body>
</html>
