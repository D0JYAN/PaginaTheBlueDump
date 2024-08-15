<?php
if (session_status() == PHP_SESSION_NONE) {
    // Inicia la sesión solo si no está iniciada
    session_start();
}

// Verifica si el tiempo de inactividad ha superado 1 minuto (60 segundos)
$inactivity_timeout = 60; // 1 minuto

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $inactivity_timeout)) {
    session_unset(); // Limpia todas las variables de sesión
    session_destroy(); // Destruye la sesión
    // Muestra un mensaje de sesión cerrada por inactividad
    echo "<script>alert('Tu sesión ha sido cerrada debido a inactividad. Por favor, vuelve a iniciar sesión.'); window.location.href = 'login.php';</script>";
    exit();
}

$_SESSION['last_activity'] = time(); // Actualiza el tiempo de la última actividad
?>
