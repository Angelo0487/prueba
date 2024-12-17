<?php
include 'conexion.php';
require 'sesion.php';
try {
    // Consulta para insertar reservas
    $sql = "INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel)
            VALUES (:id_cliente, :fecha_reserva, :id_vuelo, :id_hotel)";
    $stmt = $conn->prepare($sql);

    // Generar 10 reservas aleatorias
    for ($i = 1; $i <= 10; $i++) {
        $stmt->execute([
            ':id_cliente' => rand(1, 3), // Suponiendo que hay clientes con IDs 1 a 3
            ':fecha_reserva' => date('Y-m-d', strtotime("+$i days")),
            ':id_vuelo' => rand(2, 4), // IDs de vuelos existentes
            ':id_hotel' => rand(3, 5)  // IDs de hoteles existentes
        ]);
    }

    echo "10 reservas registradas con éxito.<br>";
    echo "<a href='index1.php'>Volver al inicio</a>";
} catch (PDOException $e) {
    echo "Error al registrar reservas: " . $e->getMessage();
}
?>
