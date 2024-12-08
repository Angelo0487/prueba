<?php
session_start(); 
include 'conexion.php'; // Archivo de conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Captura y sanitiza las entradas del formulario
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    try {
        // Usar consultas preparadas para mayor seguridad
        $sql = "SELECT id_cliente, password FROM clientes WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':email' => $email]); // Pasar parámetros preparados

        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($cliente) {
            // Verificar la contraseña (ajustar si usas contraseñas hasheadas)
            if ($password === $cliente['password']) { 
                $_SESSION['email'] = $email;
                $_SESSION['id_cliente'] = $cliente['id_cliente']; // Guardar Cliente_ID en sesión
                header("Location: index1.php");
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Correo electrónico no encontrado.";
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Iniciar Sesión</title>
</head>

<body>
    <div class="container">
        <h1>Iniciar Sesión</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <!-- Mensaje de error si ocurre -->
        <?php if (!empty($errorMessage)): ?>
            <p class="error"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
    </div>
</body>

</html>
