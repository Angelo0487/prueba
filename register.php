<?php
include 'conexion.php'; // Asegúrate de que este archivo configure correctamente la conexión

$mensaje_exito = "";
$mostrar_formulario = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapar y sanitizar los datos del formulario
    $nombre = trim($_POST['Nombre']);
    $email = trim($_POST['Email']);
    $password = trim($_POST['Password']);

    try {
        // Usar sentencias preparadas con PDO
        $sql = "INSERT INTO clientes (nombre, email, password) VALUES (:nombre, :email, :password)";
        $stmt = $conn->prepare($sql);

        // Ejecutar la consulta
        if ($stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':password' => $password // Idealmente, hashea las contraseñas antes de almacenarlas
        ])) {
            $mensaje_exito = "Registro exitoso. Ahora puedes <a href='index1.php'>iniciar sesión</a>.";
            $mostrar_formulario = false;
        } else {
            $mensaje_error = "Error al registrar el usuario.";
        }
    } catch (PDOException $e) {
        $mensaje_error = "Error en la base de datos: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <?php if ($mostrar_formulario): ?>
        <form action="" method="POST">
            <label for="Nombre">Nombre:</label>
            <input type="text" id="Nombre" name="Nombre" required><br>

            <label for="Email">Email:</label>
            <input type="email" id="Email" name="Email" required><br>

            <label for="Password">Contraseña:</label>
            <input type="password" id="Password" name="Password" required><br>

            <button type="submit">Registrarse</button>
        </form>
    <?php else: ?>
        <p><?= $mensaje_exito ?></p>
    <?php endif; ?>
</body>
</html>
