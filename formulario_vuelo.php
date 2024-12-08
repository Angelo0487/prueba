<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Vuelo</title>
</head>

<body>
    <h1>Registro de Vuelo</h1>
    <form method="POST" action="insert_H_V.php">
        <input type="hidden" name="formulario" value="vuelo">
        Origen: <input type="text" name="origen" required><br><br>
        Destino: <input type="text" name="destino" required><br><br>
        Fecha: <input type="date" name="fecha" required><br><br>
        Plazas Disponibles: <input type="number" name="plazas_disponibles" required><br><br>
        Precio: <input type="number" step="0.01" name="precio" required><br><br>
        <button type="submit">Registrar Vuelo</button>
    </form>
    <script src="validaciones.js" defer></script> <!-- Enlace al archivo JavaScript -->
</body>

</html>