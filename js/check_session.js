   // Función para cerrar la sesión por inactividad
   function cerrarSesionPorInactividad() {
    // Tiempo de inactividad en milisegundos 
    var inactivityTimeout = 60000; 

    // Temporizador para verificar la inactividad
    setTimeout(function() {
        // Mostrar alerta de sesión caducada por inactividad
        alert('Tu sesión ha caducado debido a la inactividad.');
        // Cerrar la sesión por inactividad
        window.location.href = 'login.php'; 
    }, inactivityTimeout);
}

// Llama a la función al cargar la página
window.onload = cerrarSesionPorInactividad;

// Restablece el temporizador si hay actividad del usuario
document.onmousemove = document.onkeypress = function() {
    clearTimeout(timeout);
    cerrarSesionPorInactividad();
};