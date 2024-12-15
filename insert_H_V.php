<?php
require 'sesion.php';
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si la solicitud es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Identificar el formulario que se ha enviado
    $formulario = $_POST['formulario'];

    // Comprobar si el formulario enviado es el de "vuelo"
    if ($formulario === "vuelo") {
        // Obtener y limpiar los datos del formulario de vuelo
        $origen = trim($_POST['origen']);  // Eliminar espacios innecesarios en 'origen'
        $destino = trim($_POST['destino']); // Eliminar espacios innecesarios en 'destino'
        $fecha = $_POST['fecha'];  // Obtener la fecha del vuelo
        $plazas = (int)$_POST['plazas_disponibles'];  // Convertir el número de plazas a un entero
        $precio = (float)$_POST['precio'];  // Convertir el precio a un valor flotante

        try {
            // Preparar la consulta SQL para insertar los datos del vuelo
            $sql = "INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) 
                    VALUES (:origen, :destino, :fecha, :plazas, :precio)";
            
            // Preparar la declaración SQL con PDO
            $stmt = $conn->prepare($sql);
            
            // Ejecutar la consulta con los valores proporcionados
            $stmt->execute([
                ':origen' => $origen,
                ':destino' => $destino,
                ':fecha' => $fecha,
                ':plazas' => $plazas,
                ':precio' => $precio
            ]);
            
            // Mensaje de éxito y enlaces para registrar otro vuelo o volver al inicio
            echo "Vuelo registrado exitosamente.<br>";
            echo "<a href='formulario_vuelo.php'>Registrar otro vuelo</a> 
                | <a href='index1.php'>Volver al inicio</a>";
        } catch (PDOException $e) {
            // Mostrar error si ocurre un problema con la base de datos
            echo "Error al registrar el vuelo: " . $e->getMessage();
        }
        
    // Comprobar si el formulario enviado es el de "hotel"
    } elseif ($formulario === "hotel") {
        // Obtener y limpiar los datos del formulario de hotel
        $nombre = trim($_POST['nombre']);  // Eliminar espacios innecesarios en 'nombre'
        $ubicacion = trim($_POST['ubicacion']);  // Eliminar espacios innecesarios en 'ubicacion'
        $habitaciones = (int)$_POST['habitaciones_disponibles'];  // Convertir el número de habitaciones a un entero
        $tarifa = (float)$_POST['tarifa_noche'];  // Convertir la tarifa a un valor flotante

        try {
            // Preparar la consulta SQL para insertar los datos del hotel
            $sql = "INSERT INTO HOTEL (nombre, ubicación, habitaciones_disponibles, tarifa_noche) 
                    VALUES (:nombre, :ubicacion, :habitaciones, :tarifa)";
            
            // Preparar la declaración SQL con PDO
            $stmt = $conn->prepare($sql);
            
            // Ejecutar la consulta con los valores proporcionados
            $stmt->execute([
                ':nombre' => $nombre,
                ':ubicacion' => $ubicacion,
                ':habitaciones' => $habitaciones,
                ':tarifa' => $tarifa
            ]);
            
            // Mensaje de éxito y enlaces para registrar otro hotel o volver al inicio
            echo "Hotel registrado exitosamente.<br>";
            echo "<a href='formulario_hotel.php'>Registrar otro hotel</a> 
                | <a href='index1.php'>Volver al inicio</a>";
        } catch (PDOException $e) {
            // Mostrar error si ocurre un problema con la base de datos
            echo "Error al registrar el hotel: " . $e->getMessage();
        }
    }
}
?>
