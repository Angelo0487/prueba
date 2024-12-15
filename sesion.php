<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['email'] === 'Visitante') {
    echo "<p>Para ver el contenido primero debes iniciar sesión.</p>";
    echo "<button onclick=\"window.location.href='login.php'\">Iniciar Sesión</button>";
    exit;
}