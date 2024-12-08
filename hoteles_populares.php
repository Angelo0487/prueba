<?php
include 'conexion.php';

try {
    // Consulta avanzada: contar reservas por hotel
    $sql = "SELECT HOTEL.nombre, COUNT(RESERVA.id_reserva) AS total_reservas
            FROM RESERVA
            INNER JOIN HOTEL ON RESERVA.id_hotel = HOTEL.id_hotel
            GROUP BY HOTEL.id_hotel
            HAVING total_reservas > 2";
    $stmt = $conn->query($sql);

    // Mostrar resultados
    echo "<h2>Hoteles con más de 2 reservas</h2>";
    echo "<table border='1'>
            <tr>
                <th>Hotel</th>
                <th>Total Reservas</th>
            </tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$row['nombre']}</td>
                <td>{$row['total_reservas']}</td>
              </tr>";
    }
    echo "</table>";
    echo "<a href='index.php'>Volver al inicio</a>";
} catch (PDOException $e) {
    echo "Error al consultar hoteles: " . $e->getMessage();
}
?>
