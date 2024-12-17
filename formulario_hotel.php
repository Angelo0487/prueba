<?php
require 'sesion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Incluye las hojas de estilos -->
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/styles1.css">
    <title>Registrar Hotel</title>
</head>

<body>
    <section>
        <h1>Registro de Hotel</h1>
        <form method="POST" action="insert_H_V.php">
            <input type="hidden" name="formulario" value="hotel">
            Nombre: <input type="text" name="nombre" required><br><br>
            Ubicación: <input type="text" name="ubicacion" required><br><br>
            Habitaciones Disponibles: <input type="number" name="habitaciones_disponibles" required><br><br>
            Tarifa por Noche: <input type="number" step="0.01" name="tarifa_noche" required><br><br>
            <button type="submit">Registrar Hotel</button>
        </form>
    </section><!--fin registro de hotel-->
    <script src="validaciones.js" defer></script> <!-- Enlace al archivo JavaScript -->
</body>

</html>