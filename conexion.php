<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Definir el nombre del servidor
$host = "localhost";
// Definir el nombre de usuario (predeterminado de XAMPP)
$username = "root";
// Definir la contraseña (vacía en XAMPP)
$password = "";
// Definir el nombre de la base de datos
$dbname = "agencia";

// Crear una nueva conexión a la base de datos usando mysqli
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa a la base de datos.<br>";
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

