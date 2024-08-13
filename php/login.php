<?php
include 'conexion.php';

// Añade esto antes de la verificación del reCAPTCHA
// ...

// Validar email y Contraseña
$email = $_POST['email'];
$password = sha1($_POST['pass']);

// Obtener la información del usuario
$res = $conexion->query("SELECT * FROM usuarios WHERE email='$email' AND confirmado = 'si'") or die($conexion->error);

if (mysqli_num_rows($res) > 0) {
    $usuario = $res->fetch_assoc();

    // Verificar si la cuenta está bloqueada temporalmente
    if ($usuario['tiempo_bloqueo'] != null && strtotime($usuario['tiempo_bloqueo']) > time()) {
        // Cuenta bloqueada, redirigir con un mensaje de espera
        echo '<script>window.location.href = "../login.php";
            alert("La cuenta está bloqueada temporalmente. Por favor, espere unos minutos antes de intentarlo nuevamente."); 
            </script>';
        exit;
    }

    // Verificar la contraseña y actualizar intentos fallidos si es necesario
    if (sha1($_POST['pass']) == $usuario['password']) {
        // Contraseña correcta, restablecer el contador de intentos fallidos
        $conexion->query("UPDATE usuarios SET intentos_fallidos = 0 WHERE email = '$email'");
        $conexion->query("UPDATE usuarios SET confirmado = 'si' WHERE email = '$email'");
        header('Location: ../index.php');
    } else {
        // Contraseña incorrecta, actualizar el contador de intentos fallidos
        $intentosFallidos = $usuario['intentos_fallidos'] + 1;
        $conexion->query("UPDATE usuarios SET intentos_fallidos = $intentosFallidos WHERE email = '$email'");

        // Verificar el límite de intentos fallidos y establecer bloqueo temporal si es necesario
        if ($intentosFallidos >= 3) {
            $tiempoEspera = 5; // Tiempo de espera en minutos
            $tiempoBloqueo = date('Y-m-d H:i:s', strtotime("+{$tiempoEspera} minutes"));
            $conexion->query("UPDATE usuarios SET tiempo_bloqueo = '$tiempoBloqueo' WHERE email = '$email'");

            // Redirigir a la página de inicio de sesión con un mensaje de espera
            echo '<script>window.location.href = "../login.php";
                alert("Cuenta bloqueada debido a múltiples intentos fallidos. Por favor, espere unos minutos antes de intentarlo nuevamente."); 
                </script>';
            exit;
        }
    }
} else {
    // Usuario no encontrado
    echo '<body
        style="
            overflow-y: hidden;
            background: rgb(75,69,175);
            background: linear-gradient(0deg, rgba(75,69,175,1) 0%, rgba(149,218,232,1) 100%);
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        "
    >';
    echo '<div 
        style="
            display: flex; 
            height: 100vh;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0%;
        "
    >';
    echo "<h2>Correo O Contraseña Incorrecta</h2>";
    echo '</div>';
    echo '</body>';
}
// ...


// Verificar reCAPTCHA
if (isset($_POST['submit'])) {
    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    $secretkey = "6LeXpW0pAAAAAKiDmbp6QCsDqRDQzrLIhUeyGHd6";

    $resCaptcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");

    $atributos = json_decode($resCaptcha, TRUE);

    if (!$atributos['success']) {
        echo '<script>window.location.href = "../login.php";
            alert("Error en el reCAPTCHA. Verifica que has seleccionado el captcha correctamente."); 
            </script>';
        exit;
    }
}

//Validar email y Contraseña
$email = $_POST['email'];
$password = sha1($_POST['pass']);
$res = $conexion->query("SELECT * FROM usuarios WHERE email='$email' 
    AND password='$password' 
    AND confirmado = 'si'") or die($conexion->error);
if (mysqli_num_rows($res) > 0) {
    $conexion->query("UPDATE usuarios SET confirmado = 'si' WHERE email = '$email'");
    header('Location: ../index.php');
} else {
    echo '
        <body
            style="
                overflow-y: hidden;
                background: rgb(75,69,175);
                background: linear-gradient(0deg, rgba(75,69,175,1) 0%, rgba(149,218,232,1) 100%);
                font-family: system-ui, -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            "
        >';
    echo '
        <div 
            style="
                display: flex; 
                height: 100vh;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin: 0%;
            "
        >';
    echo "<h2>Correo O Contraseña Incorrecta</h2>";
    echo '</div>';
    echo '</body>';
}
?>