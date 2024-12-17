<?php
include 'conexion.php';
require 'sesion.php';
echo "<h1>Hoteles Registrados</h1>";
$sql_hoteles = "SELECT * FROM HOTEL";
$hoteles = $conn->query($sql_hoteles)->fetchAll(PDO::FETCH_ASSOC);

foreach ($hoteles as $hotel) {
    echo "ID: {$hotel['id_hotel']} 
    - Nombre: {$hotel['nombre']} 
    - Ubicación: {$hotel['ubicación']} 
    - Habitaciones: {$hotel['habitaciones_disponibles']} 
    - Tarifa: {$hotel['tarifa_noche']}<br>";
}

echo "<h1>Vuelos Registrados</h1>";
$sql_vuelos = "SELECT * FROM VUELO";
$vuelos = $conn->query($sql_vuelos)->fetchAll(PDO::FETCH_ASSOC);

foreach ($vuelos as $vuelo) {
    echo "ID: {$vuelo['id_vuelo']} 
    - Origen: {$vuelo['origen']} 
    - Destino: {$vuelo['destino']} 
    - Fecha: {$vuelo['fecha']} 
    - Plazas: {$vuelo['plazas_disponibles']} 
    - Precio: {$vuelo['precio']}<br>";
}
?>