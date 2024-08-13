<?php
// Varios destinatarios
$para  = $email; // atención a la coma

// título
$título = 'Verificación De Usuario';

//Clave Aleatoria
$codigo = rand(1000, 9999);

// mensaje
$mensaje = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Código Para Validar El Usuario</title>

    <style>
        body {
            background: rgb(75,69,175);
            background: linear-gradient(0deg, rgba(75,69,175,1) 0%, rgba(149,218,232,1) 100%);
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        h1, h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Este Es Tu Código</h2>
    <h1>' . $codigo . '</h1>
    <p>
        <a href="http://localhost/Verificacion_Usuario/confirm.php?email=' . $email . '">Presiona Aquí Para Verificar Tu Cuenta</a>
    </p>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset="UTF-8"' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: ' . $para . '' . "\r\n";
$cabeceras .= 'From: validacionUsuarios@gmail.com' . "\r\n";

// Enviarlo
$enviado = false;

if (mail($para, $título, $mensaje, $cabeceras)) {
    $enviado = true;
}
