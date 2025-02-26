<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Hotel</title>
    <link rel="stylesheet" href="gestion.css">
    <link rel="stylesheet" href="styles.css">
    <script>
        function validarFormulario() {
            let nombre = document.getElementById("nombre").value.trim();
            let ubicacion = document.getElementById("ubicacion").value.trim();
            let habitaciones = document.getElementById("habitaciones").value;
            let tarifa = document.getElementById("tarifa").value;

            // Validar campos vacíos
            if (nombre === "" || ubicacion === "" || habitaciones === "" || tarifa === "") {
                alert("⚠ Todos los campos son obligatorios.");
                return false;
            }
            // Validar que las habitaciones sean un número positivo
            if (habitaciones <= 0 || isNaN(habitaciones)) {
                alert("⚠ Las habitaciones disponibles deben ser un número positivo.");
                return false;
            }
            // Validar que la tarifa sea un número positivo
            if (tarifa <= 0 || isNaN(tarifa)) {
                alert("⚠ La tarifa por noche debe ser un número positivo.");
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
<h2>Agregar Hotel</h2>
    <form action="procesar_hotel.php" method="POST" onsubmit="return validarFormulario();" novalidate>
        Nombre: <input type="text" id="nombre" name="nombre"><br><br>
        Ubicación: <input type="text" id="ubicacion" name="ubicacion"><br><br>
        Habitaciones Disponibles: <input type="number" id="habitaciones" name="habitaciones"><br><br>
        Tarifa por Noche: <input type="number" id="tarifa" name="tarifa" step="0.01"><br><br>
        <input type="submit" value="Agregar Hotel">
    </form>
</div>

</body>
</html>
