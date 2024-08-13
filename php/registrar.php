<?php

include "./conexion.php";

if (isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['pass2'])) {
    $name = $_POST['nombre'];
    $email = $_POST['email'];
    $pass = sha1($_POST['pass']);

    // Verificar si el correo ya existe en la base de datos
    $result = $conexion->query("SELECT * FROM usuarios WHERE email = '$email'");

    if ($result->num_rows > 0) {
        // El correo ya existe, mostrar un mensaje de error
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
        echo '<h2>El correo electrónico ya está registrado. Por favor, utiliza otro correo.</h2>';
        echo '<br>';
        echo '
        <h2>
            <a href="../register.php" 
                style="
                    margin-top: 10%; 
                    margin-bottom: 10%
                "
            >
                Volver Al Formualrio de Registro
            </a>
        </h2>';
        echo '</div>';
        echo '</body>';
    } else {
        // El correo no existe, proceder con la inserción
        include "./mail.php";

        if ($enviado) {
            $conexion->query("INSERT INTO usuarios (nombre, email, password, confirmado, codigo) 
                VALUES ('$name', '$email', '$pass', 'no', '$codigo')") or die($conexion->error);

            $email = $_POST['email'];
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
            echo '<h2>Favor De Revisar Tu Email Para Verificar Tu Cuenta</h2>';
            echo '</div>';
            echo '</body>';
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
            echo '<h2>No Se Pudo Enviar El Email</h2>';
            echo '</div>';
            echo '</body>';
        }
    }
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
    echo '<h2>Faltan Parámetros.</h2>';
    echo '</div>';
    echo '</body>';
}