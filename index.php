<?php
// Inicia la sesión
session_start();
// Establece un mensaje de bienvenida personalizado si el usuario está conectado
if (!isset($_SESSION['email'])) {
    $_SESSION['email'] = 'Visitante'; // Usuario por defecto si no se ha iniciado sesión
}// Establece un mensaje de bienvenida personalizado si el usuario está conectado
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Incluye las hojas de estilos -->
    <link rel="stylesheet" href="css/index.css">
    <title>Registro de Viaje</title>
</head>

<body>
    <section>
        <div class="registro">
            <h1>Bienvenido a la Agencia de Viajes</h1>
            <p>Hola, <?php echo htmlspecialchars($_SESSION['email']); ?>. ¡Aquí encontrarás todos los destinos que
                estuviste esperando!</p>
            <button onclick="window.location.href='login.php'">Iniciar Sesión</button>
            <button onclick="window.location.href='register.php'">Registrarse</button>
        </div>
        </section><!--Fin Registro -->
    <script src="script.js"></script><!-- Enlace al archivo JavaScript -->
</body>

</html>