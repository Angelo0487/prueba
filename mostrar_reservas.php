<?php
include 'conexion.php';

try {
    // Consulta para mostrar todas las reservas
    $sql = "SELECT RESERVA.id_reserva, CLIENTES.nombre AS cliente, VUELO.origen, VUELO.destino, HOTEL.nombre AS hotel, RESERVA.fecha_reserva
            FROM RESERVA
            LEFT JOIN CLIENTES ON RESERVA.id_cliente = CLIENTES.id_cliente
            LEFT JOIN VUELO ON RESERVA.id_vuelo = VUELO.id_vuelo
            LEFT JOIN HOTEL ON RESERVA.id_hotel = HOTEL.id_hotel";
    $stmt = $conn->query($sql);

    // Mostrar resultados
    echo "<h2>Lista de Reservas</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID Reserva</th>
                <th>Cliente</th>
                <th>Origen Vuelo</th>
                <th>Destino Vuelo</th>
                <th>Hotel</th>
                <th>Fecha de Reserva</th>
            </tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$row['id_reserva']}</td>
                <td>{$row['cliente']}</td>
                <td>{$row['origen']}</td>
                <td>{$row['destino']}</td>
                <td>{$row['hotel']}</td>
                <td>{$row['fecha_reserva']}</td>
              </tr>";
    }
    echo "</table>";
    echo "<a href='index.php'>Volver al inicio</a>";
} catch (PDOException $e) {
    echo "Error al consultar reservas: " . $e->getMessage();
}
?>
